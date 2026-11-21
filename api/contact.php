<?php
/**
 * Contact / free-trial request handler.
 *
 * Emails each inquiry to CONTACT_TO using PHP mail() (works on Hostinger
 * shared hosting) and also appends it to storage/inquiries.csv as a backup,
 * so no lead is lost if email delivery fails.
 *
 * Accepts a normal form POST (redirects back) or fetch() with
 * "Accept: application/json" (returns JSON).
 */
require_once __DIR__ . '/../includes/config.php';

$wantsJson = stripos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false;

function respond(bool $ok, string $error = '', bool $json = false, string $source = ''): void
{
    if ($json) {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($ok ? 200 : 400);
        echo json_encode($ok ? ['ok' => true] : ['ok' => false, 'error' => $error]);
        exit;
    }
    $base = $source === 'signup' ? '/signup' : '/';
    $q = $ok ? '?sent=1' : '?error=' . rawurlencode($error);
    header('Location: ' . $base . $q . ($source === 'signup' ? '' : '#contact'), true, 303);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: /#contact', true, 303);
    exit;
}

$clean = function (string $key, int $max): string {
    $v = trim((string) ($_POST[$key] ?? ''));
    $v = str_replace(["\r", "\0"], '', $v);
    return mb_substr($v, 0, $max);
};

$source   = $clean('source', 20) === 'signup' ? 'signup' : 'contact';
$name     = $clean('name', 120);
$business = $clean('business_name', 160);
$email    = $clean('email', 160);
$phone    = $clean('phone', 40);
$message  = $clean('message', 4000);
$honeypot = $clean('website', 200);
$ts       = (int) ($_POST['ts'] ?? 0);

// Spam traps: hidden field filled, or the form was submitted in under 3 seconds.
// Pretend success so bots learn nothing.
if ($honeypot !== '' || ($ts > 0 && time() - $ts < 3)) {
    respond(true, '', $wantsJson, $source);
}

if ($name === '' || $email === '' || $message === '') {
    respond(false, 'Please fill in your name, email and message.', $wantsJson, $source);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'Please enter a valid email address.', $wantsJson, $source);
}
// Header-injection guard
foreach ([$name, $email, $business] as $v) {
    if (preg_match('/[\n\r]/', $v)) { respond(false, 'Invalid input.', $wantsJson, $source); }
}

// Simple per-IP rate limit: 5 submissions / 10 minutes
$storage = __DIR__ . '/../storage';
if (!is_dir($storage)) { @mkdir($storage, 0750, true); }
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$rlFile = $storage . '/rl_' . md5($ip) . '.json';
$now = time();
$hits = is_file($rlFile) ? (json_decode((string) @file_get_contents($rlFile), true) ?: []) : [];
$hits = array_values(array_filter($hits, fn($t) => $now - $t < 600));
if (count($hits) >= 5) {
    respond(false, 'Too many messages — please try again in a few minutes, or email us directly.', $wantsJson, $source);
}
$hits[] = $now;
@file_put_contents($rlFile, json_encode($hits), LOCK_EX);

// Backup copy (CSV). The storage folder is blocked from the web by .htaccess.
$csv = $storage . '/inquiries.csv';
$isNew = !is_file($csv);
if ($fh = @fopen($csv, 'a')) {
    if (flock($fh, LOCK_EX)) {
        if ($isNew) { fputcsv($fh, ['date', 'source', 'name', 'business', 'email', 'phone', 'message', 'ip']); }
        // Prefix cells that start with formula characters so the CSV is safe to open in Excel
        $safe = fn($s) => preg_match('/^[=+\-@\t]/', $s) ? "'" . $s : $s;
        fputcsv($fh, array_map($safe, [date('c'), $source, $name, $business, $email, $phone, $message, $ip]));
        flock($fh, LOCK_UN);
    }
    fclose($fh);
}

// Email
$subject = ($source === 'signup' ? 'New free-trial request' : 'New website inquiry') . ' — ' . ($business !== '' ? $business : $name);
$body = "Source:   " . ($source === 'signup' ? 'Sign-up page' : 'Contact form') . "\n"
      . "Name:     {$name}\n"
      . "Business: {$business}\n"
      . "Email:    {$email}\n"
      . "Phone:    {$phone}\n"
      . "IP:       {$ip}\n"
      . "Date:     " . date('Y-m-d H:i:s T') . "\n\n"
      . "Message:\n{$message}\n";
$headers = [
    'From: BotNira Website <' . CONTACT_FROM . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'Content-Type: text/plain; charset=UTF-8',
    'X-Mailer: PHP/' . PHP_VERSION,
];
$encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
@mail(CONTACT_TO, $encodedSubject, $body, implode("\r\n", $headers), '-f' . CONTACT_FROM);

// We already saved the CSV backup, so report success even if mail() is unavailable.
respond(true, '', $wantsJson, $source);
