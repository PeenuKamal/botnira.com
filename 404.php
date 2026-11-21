<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';
if (!headers_sent()) { http_response_code(404); }
$page = [
    'title' => 'Page not found — BotNira',
    'description' => 'This page could not be found.',
    'path' => strtok($_SERVER['REQUEST_URI'] ?? '/', '?') ?: '/',
    'robots' => 'noindex, follow',
];
require __DIR__ . '/includes/header.php';
?>
<section class="section-lg bg-grid">
  <div class="container container-4xl center">
    <div class="mono bold c-blue">404</div>
    <h1 class="display-xl mt-2">This line went<br><span class="mark-blue">unanswered.</span></h1>
    <p class="lead narrow-2">The page you're looking for doesn't exist or has moved. BotNira would never leave a customer hanging like this.</p>
    <div class="btn-row" style="justify-content:center">
      <a href="/" class="btn btn-primary"><?= icon('home', 16) ?> Back to home</a>
      <a href="/#contact" class="btn btn-white">Contact us</a>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
