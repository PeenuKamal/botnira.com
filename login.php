<?php
require_once __DIR__ . '/includes/config.php';

// Once the new app/backend is live, set APP_URL in includes/config.php and
// this page forwards visitors straight to it.
if (APP_URL !== '') { header('Location: ' . APP_URL . '/login', true, 302); exit; }

$page = [
    'title' => 'Log in — BotNira',
    'description' => 'Log in to your BotNira workspace.',
    'path' => '/login',
    'robots' => 'noindex, follow',
    'nav' => 'none',
    'footer' => 'none',
];
require __DIR__ . '/includes/header.php';
?>
<div class="auth">
  <div class="auth-main">
    <div class="card card-lg auth-card">
      <a href="/" class="brand"><img src="/assets/img/botnira-mark.png" width="32" height="32" alt=""><span>BotNira</span></a>
      <h1 class="h1 mt-6" style="font-size:2rem">Welcome back</h1>
      <p class="small muted mt-1">Log in to your BotNira workspace.</p>

      <div class="form-msg form-info mt-6" role="status">
        <strong>We're upgrading the BotNira dashboard.</strong> Log-in is paused for a short time while we move to our new platform. Your account and data are safe. Need help now? Message us on <a class="u bold" href="<?= e(wa_link(TEAM_WA)) ?>">WhatsApp</a> or email <a class="u bold" href="mailto:<?= e(TEAM_EMAIL) ?>"><?= e(TEAM_EMAIL) ?></a>.
      </div>

      <form class="form mt-6" onsubmit="return false" aria-disabled="true">
        <div><label class="field-label" for="email">Work email</label><input id="email" type="email" autocomplete="email" disabled></div>
        <div><label class="field-label" for="password">Password</label><input id="password" type="password" autocomplete="current-password" disabled></div>
        <button class="btn btn-primary btn-block" disabled>Log in</button>
      </form>
      <p class="small mt-4">New to BotNira? <a href="/signup" class="u bold">Create a workspace</a></p>
    </div>
  </div>
  <div class="auth-side">
    <a href="/" class="brand"><img src="/assets/img/botnira-mark.png" width="32" height="32" alt=""><span>BotNira</span></a>
    <div>
      <div class="auth-big">The front desk<br>that never<br><span style="color:#6f8cff">clocks out.</span></div>
      <div class="mono small op-80 mt-6">VENDOR WORKSPACE — ISOLATED BY DESIGN</div>
    </div>
    <div class="mono tiny op-70">© <?= date('Y') ?> BotNira</div>
  </div>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
