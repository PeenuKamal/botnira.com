<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';

if (APP_URL !== '') {
    $qs = $_SERVER['QUERY_STRING'] ?? '';
    header('Location: ' . APP_URL . '/signup' . ($qs !== '' ? '?' . $qs : ''), true, 302);
    exit;
}

$plan = preg_replace('/[^a-z]/', '', $_GET['plan'] ?? '');
$planName = '';
foreach ($PLANS as $p) { if ($p['id'] === $plan) { $planName = $p['name']; } }

$page = [
    'title' => 'Start your free trial — BotNira',
    'description' => 'Create your BotNira workspace. ' . TRIAL_DAYS . '-day free trial, no credit card.',
    'path' => '/signup',
    'robots' => 'noindex, follow',
    'nav' => 'none',
    'footer' => 'none',
];
require __DIR__ . '/includes/header.php';
$sent = isset($_GET['sent']);
?>
<div class="auth">
  <div class="auth-main">
    <div class="card card-lg auth-card">
      <a href="/" class="brand"><img src="/assets/img/botnira-mark.png" width="32" height="32" alt=""><span>BotNira</span></a>
      <h1 class="h1 mt-6" style="font-size:2rem">Create your workspace</h1>
      <p class="small muted mt-1"><?= TRIAL_DAYS ?>-day free trial. No credit card. Each business is isolated.</p>

      <div class="form-msg form-info mt-6">
        <strong>Self sign-up is opening soon on our new platform.</strong> Leave your details and our team will set up your workspace<?= $planName ? ' on the <strong>' . e($planName) . '</strong> plan' : '' ?> and send your log-in within one business day.
      </div>

      <form class="form mt-6" method="post" action="/api/contact.php" data-ajax-form>
        <div class="form-msg form-ok" role="status" <?= $sent ? '' : 'hidden' ?>>✓ Thanks! We'll email you within one business day to finish setting up your workspace.</div>
        <div class="form-msg form-err" role="alert" hidden></div>
        <div><label class="field-label" for="business_name">Business name</label><input id="business_name" name="business_name" required maxlength="160" autocomplete="organization"></div>
        <div><label class="field-label" for="name">Your full name</label><input id="name" name="name" required maxlength="120" autocomplete="name"></div>
        <div><label class="field-label" for="email">Work email</label><input id="email" name="email" type="email" required maxlength="160" autocomplete="email"></div>
        <div><label class="field-label" for="phone">Mobile number</label><input id="phone" name="phone" type="tel" maxlength="40" autocomplete="tel"></div>
        <input type="hidden" name="message" value="New workspace / free-trial request<?= $planName ? ' — plan: ' . e($planName) : '' ?>">
        <input type="hidden" name="source" value="signup">
        <input type="text" name="website" tabindex="-1" autocomplete="off" class="hp" aria-hidden="true">
        <input type="hidden" name="ts" value="<?= time() ?>">
        <button type="submit" class="btn btn-primary btn-block">Request my workspace</button>
      </form>
      <p class="small mt-4">Already a customer? <a href="/login" class="u bold">Log in</a></p>
    </div>
  </div>
  <div class="auth-side">
    <a href="/" class="brand"><img src="/assets/img/botnira-mark.png" width="32" height="32" alt=""><span>BotNira</span></a>
    <div>
      <div class="auth-big">Give your<br>front desk<br>a<span style="color:#6f8cff"> brain.</span></div>
      <div class="mono small op-80 mt-6">VENDOR WORKSPACE — ISOLATED BY DESIGN</div>
    </div>
    <div class="mono tiny op-70">© <?= date('Y') ?> BotNira</div>
  </div>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
