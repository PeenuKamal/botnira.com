<?php
/**
 * LOCAL DEVELOPMENT ONLY — mimics the .htaccess rules for PHP's built-in server.
 * Run:  php -S localhost:8000 router.php
 * Hostinger uses .htaccess instead; this file is blocked there.
 */
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$root = __DIR__;

if (preg_match('#^/(includes|storage)(/|$)#', $path)) { http_response_code(403); exit('Forbidden'); }

if ($path !== '/' && is_file($root . $path)) {
    if (substr($path, -4) === '.php') { require $root . $path; return true; }
    return false; // let the built-in server send static files
}

if ($path === '/') { require $root . '/index.php'; return true; }
$p = rtrim($path, '/');

if (preg_match('#^/use-case/([a-z0-9-]+)$#', $p, $m)) { $_GET['slug'] = $m[1]; require $root . '/use-case.php'; return true; }
if (preg_match('#^/(ai-sales-agent|ai-appointment-booking-software|ai-chatbot-for-immigration-consultants|replace-sales-team-with-ai|whatsapp-ai-assistant|24-7-ai-receptionist)$#', $p, $m)) {
    $_GET['slug'] = $m[1]; require $root . '/solution.php'; return true;
}
if (preg_match('#^/([a-z0-9-]+)$#', $p, $m) && is_file($root . '/' . $m[1] . '.php')) { require $root . '/' . $m[1] . '.php'; return true; }

require $root . '/404.php';
return true;
