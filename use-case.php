<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';

$slug = preg_replace('/[^a-z0-9-]/', '', strtolower($_GET['slug'] ?? ''));
if (!isset($USE_CASES[$slug])) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    exit;
}
$d = $USE_CASES[$slug];
$canonicalPath = '/use-case/' . $slug;

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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Use Cases', 'item' => SITE_URL . '/#usecases'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $d['industry'], 'item' => abs_url($canonicalPath)],
            ],
        ],
    ],
];
require __DIR__ . '/includes/header.php';
$others = array_slice(array_filter($USE_CASES, fn($k) => $k !== $slug, ARRAY_FILTER_USE_KEY), 0, 4, true);
?>

<div class="breadcrumb"><div class="container">
  <a href="/">Home</a><span>›</span><a href="/#usecases">Use Cases</a><span>›</span><strong><?= e($d['industry']) ?></strong>
</div></div>

<section class="section-b">
  <div class="container sub-hero">
    <div>
      <div class="pill"><?= icon($d['icon'], 14) ?> <?= e($d['eyebrow']) ?></div>
      <h1><?= e($d['h1']) ?></h1>
      <p class="lead"><?= e($d['sub']) ?></p>
      <div class="btn-row">
        <a href="/signup" class="btn btn-primary">Start your <?= TRIAL_DAYS ?>-day free trial <?= icon('arrow-right', 16) ?></a>
        <a href="/#try" class="btn btn-white">Try it live →</a>
      </div>
      <p class="mono tiny muted inline-icon mt-6"><?= icon('sparkles', 12) ?> No credit card · 5 channels included · Cancel anytime</p>
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
    <h2 class="display-md">Why a <?= e($d['noun']) ?> needs an AI receptionist.</h2>
    <p class="muted mt-3 narrow-3">The four problems BotNira solves first.</p>
    <div class="grid grid-2 mt-10">
      <?php foreach ($d['why'] as [$t, $b]): ?>
      <div class="card card-hover pad-6">
        <div class="h4"><?= e($t) ?></div>
        <p class="small mt-3"><?= e($b) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-b section bg-yellow-50">
  <div class="container">
    <div class="eyebrow">How it works</div>
    <h2 class="display-md">From "ring ring" to confirmed booking.</h2>
    <div class="grid grid-4 mt-10">
      <?php foreach ($d['workflow'] as $i => $step): ?>
      <div class="card pad-6">
        <div class="step-n"><?= $i + 1 ?></div>
        <div class="bold mt-3"><?= e($step) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-b section">
  <div class="container container-3xl">
    <h2 class="display-md">Common questions about AI for <?= e(strtolower($d['industry'])) ?>.</h2>
    <div class="faq-stack mt-10">
      <?php foreach ($d['faqs'] as [$q, $a]): ?>
      <details class="faq-item">
        <summary><span><?= e($q) ?></span><span class="faq-plus" aria-hidden="true">+</span></summary>
        <div class="faq-a small"><?= e($a) ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-b section">
  <div class="container">
    <h2 class="display-md">More businesses BotNira powers.</h2>
    <div class="grid grid-4 mt-8">
      <?php foreach ($others as $oslug => $o): ?>
      <a href="/use-case/<?= e($oslug) ?>" class="card card-hover pad-6">
        <span class="c-blue"><?= icon($o['icon'], 20) ?></span>
        <div class="h5 mt-3">AI for <?= e($o['industry']) ?></div>
        <div class="mono tiny muted mt-2">/use-case/<?= e($oslug) ?> →</div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-b section bg-blue cta-band">
  <div class="container container-4xl">
    <h2 class="display-lg">Stop missing customers tonight.</h2>
    <p class="lead lead-light"><?= TRIAL_DAYS ?> days free. All channels. Cancel anytime. Live in under 5 minutes.</p>
    <div class="btn-row" style="justify-content:center"><a href="/signup" class="btn btn-yellow btn-lg">Start your free trial <?= icon('arrow-right', 18) ?></a></div>
  </div>
</section>

<a href="/" class="home-float"><?= icon('chevron-left', 12) ?> Home</a>
<?php require __DIR__ . '/includes/footer.php'; ?>
