<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';

$slug = preg_replace('/[^a-z0-9-]/', '', strtolower($_GET['slug'] ?? ''));
if (!isset($SOLUTIONS[$slug])) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    exit;
}
$d = $SOLUTIONS[$slug];
$canonicalPath = '/' . $slug;

$page = [
    'title' => $d['seo']['title'],
    'description' => $d['seo']['description'],
    'keywords' => $d['seo']['keywords'],
    'path' => $canonicalPath,
    'og_type' => 'article',
    'nav' => 'simple',
    'jsonld' => [
        [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn($f) => [
                '@type' => 'Question', 'name' => $f[0],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]],
            ], $d['faqs']),
        ],
        [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => SITE_URL . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => $d['intent'], 'item' => abs_url($canonicalPath)],
            ],
        ],
    ],
];
require __DIR__ . '/includes/header.php';
?>

<div class="breadcrumb"><div class="container">
  <a href="/">Home</a><span>›</span><strong><?= e($d['intent']) ?></strong>
</div></div>

<section class="section-b">
  <div class="container sub-hero">
    <div>
      <div class="pill"><?= icon($d['icon'], 14) ?> <?= e($d['eyebrow']) ?></div>
      <h1><?= e($d['h1']) ?></h1>
      <p class="lead"><?= e($d['sub']) ?></p>
      <div class="btn-row">
        <a href="/signup" class="btn btn-primary">Start your <?= TRIAL_DAYS ?>-day free trial <?= icon('arrow-right', 16) ?></a>
        <a href="/#contact" class="btn btn-white">Talk to us →</a>
      </div>
      <p class="mono tiny muted inline-icon mt-6"><?= icon('sparkles', 12) ?> No credit card · 5 channels · Cancel anytime</p>
    </div>
    <div>
      <div class="stat-card">
        <div class="eyebrow-grey">Why it matters</div>
        <div class="stat-kpi"><?= e($d['stat']['kpi']) ?></div>
        <p class="small mt-2"><?= e($d['stat']['label']) ?></p>
        <div class="stat-foot"><?= icon('clock', 12) ?> Live in under 5 minutes</div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/channels-band.php'; ?>

<section class="section-b section">
  <div class="container">
    <h2 class="display-md"><?= e($d['problem']['title']) ?></h2>
    <div class="grid grid-2 mt-8">
      <?php foreach ($d['problem']['points'] as $i => $p): ?>
      <div class="problem-card"><div class="problem-n"><?= $i + 1 ?></div><p class="small"><?= e($p) ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-b section bg-muted">
  <div class="container">
    <h2 class="display-md">How it works</h2>
    <p class="muted mt-3">From sign-up to your first booked customer in minutes.</p>
    <ol class="grid grid-4 mt-10">
      <?php foreach ($d['how'] as $i => [$t, $b]): ?>
      <li class="card card-shadow pad-6">
        <div class="step-n"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></div>
        <div class="h5 mt-3"><?= e($t) ?></div>
        <p class="tiny muted mt-2"><?= e($b) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section class="section-b section">
  <div class="container">
    <h2 class="display-md">Simple pricing. Pay for what you use.</h2>
    <p class="muted mt-3 narrow-3">Starter and above include voice, WhatsApp, web chat, SMS and email — pick the volume that fits your business.</p>
    <div class="grid grid-3 pricing mt-8">
      <?php foreach (array_slice($PLANS, 1) as $p): ?>
      <div class="card card-shadow plan<?= !empty($p['featured']) ? ' plan-featured' : '' ?>">
        <?php if (!empty($p['sales'])): ?><div class="sales-badge"><?= icon('sparkles', 11) ?> Sales Assistant Included</div><?php endif; ?>
        <div class="h3"><?= e($p['name']) ?></div>
        <div class="tiny muted"><?= e($p['tagline']) ?></div>
        <div class="price"><span class="price-n">$<?= (int) $p['price'] ?></span><span class="mono tiny muted">/mo</span></div>
        <ul class="plan-list">
          <li><?= icon('check', 14, 'c-green') ?> <span><?= number_format($p['minutes']) ?> voice minutes</span></li>
          <li><?= icon('check', 14, 'c-green') ?> <span><?= number_format($p['messages']) ?> AI messages</span></li>
          <li><?= icon('check', 14, 'c-green') ?> <span>All 5 channels included</span></li>
          <li><?= icon('check', 14, 'c-green') ?> <span>Live agent override</span></li>
        </ul>
      </div>
      <?php endforeach; ?>
    </div>
    <a href="/#pricing" class="btn btn-white mt-6">See full pricing →</a>
  </div>
</section>

<section class="section-b section bg-muted">
  <div class="container container-4xl">
    <h2 class="display-md">Frequently asked</h2>
    <div class="faq mt-8">
      <?php foreach ($d['faqs'] as [$q, $a]): ?>
      <details>
        <summary><span><?= e($q) ?></span><span class="faq-plus" aria-hidden="true">+</span></summary>
        <div class="faq-a small"><?= e($a) ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-b section">
  <div class="container grid grid-2" style="gap:2.5rem">
    <div>
      <div class="eyebrow">About BotNira</div>
      <h2 class="display-md">An AI receptionist for every business that hates missed calls.</h2>
      <p class="mt-4">BotNira is an AI receptionist platform for service businesses, clinics, salons, consultants, immigration practices, agencies and small-to-mid B2B companies. It answers every call, message, email and DM the moment it lands — booking appointments, qualifying leads and capturing payments — in 90+ languages, 24 hours a day.</p>
      <p class="mt-3">Every business has its own isolated workspace, data is encrypted in transit, and plans hard-stop at their limits so you never get a surprise bill.</p>
      <div class="btn-row">
        <a href="/#contact" class="btn btn-primary">Talk to our team</a>
        <a href="/signup" class="btn btn-white">Start free trial</a>
      </div>
    </div>
    <div class="card card-shadow pad-6 bg-muted">
      <div class="eyebrow-grey inline-icon"><?= icon('building', 11) ?> Company details</div>
      <dl class="dl small mt-4">
        <div><dt>Product</dt><dd>BotNira — AI Receptionist &amp; Sales Assistant Platform</dd></div>
        <div><dt>Company</dt><dd>The DigiSparrow</dd></div>
        <div><dt>Headquarters</dt><dd>Hamilton, Ontario, Canada</dd></div>
        <div><dt>Serving</dt><dd>Canada · United States · United Kingdom · India · Australia · 90+ languages</dd></div>
        <div><dt>Contact</dt><dd><a class="u" href="mailto:<?= e(TEAM_EMAIL) ?>"><?= e(TEAM_EMAIL) ?></a> · WhatsApp <a class="u" href="<?= e(wa_link(TEAM_WA)) ?>"><?= e(TEAM_WA_DISPLAY) ?></a></dd></div>
      </dl>
    </div>
  </div>
</section>

<section class="section-b section bg-blue cta-band">
  <div class="container container-4xl">
    <h2 class="display-lg">Ready when your next customer calls.</h2>
    <p class="lead lead-light"><?= TRIAL_DAYS ?> days free. All channels. Cancel anytime.</p>
    <div class="btn-row" style="justify-content:center"><a href="/signup" class="btn btn-yellow btn-lg">Start your free trial <?= icon('arrow-right', 18) ?></a></div>
  </div>
</section>

<a href="/" class="home-float"><?= icon('chevron-left', 12) ?> Home</a>
<?php require __DIR__ . '/includes/footer.php'; ?>
