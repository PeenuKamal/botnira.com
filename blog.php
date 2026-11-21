<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';
$page = [
    'title' => 'BotNira Blog — AI Receptionist Guides & Updates',
    'description' => 'Guides on AI receptionists, AI calling, WhatsApp automation and never missing a customer — from the BotNira team.',
    'path' => '/blog',
];
require __DIR__ . '/includes/header.php';
?>
<section class="section-b section bg-grid">
  <div class="container">
    <div class="eyebrow">Blog</div>
    <h1 class="display-xl mt-2">Guides for front desks<br>that never sleep.</h1>
    <p class="lead">Articles on AI receptionists, AI calling, WhatsApp automation and turning missed calls into booked customers.</p>
  </div>
</section>

<section class="section-b section bg-muted">
  <div class="container">
    <div class="empty">
      <span class="icon-box icon-box-blue icon-box-lg" style="margin:0 auto"><?= icon('file-text', 22) ?></span>
      <h2 class="h3 mt-4">New articles are on the way.</h2>
      <p class="muted mt-2 narrow-2">We're moving our blog to the new site. In the meantime, these guides explain how BotNira works for different businesses.</p>
    </div>

    <div class="grid grid-3 mt-10">
      <?php foreach ($SOLUTIONS as $slug => $s): ?>
      <a href="/<?= e($slug) ?>" class="card card-shadow card-hover pad-6">
        <span class="icon-box icon-box-blue"><?= icon($s['icon'], 18) ?></span>
        <div class="eyebrow-grey mt-4">Guide</div>
        <div class="h4"><?= e($s['h1']) ?></div>
        <p class="small muted mt-2"><?= e($s['seo']['description']) ?></p>
        <span class="link-arrow small mt-4">Read guide <?= icon('arrow-right', 14) ?></span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
