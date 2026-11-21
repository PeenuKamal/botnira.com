<?php
/**
 * Page header: <head>, analytics, and the sticky top navigation.
 *
 * Set these before including:
 *   $page = [
 *     'title'       => '...',            // <title>
 *     'description' => '...',
 *     'path'        => '/privacy',        // canonical path
 *     'keywords'    => '...',            // optional
 *     'og_type'     => 'website',        // optional
 *     'jsonld'      => [ ...arrays ],     // optional structured data blocks
 *     'robots'      => 'noindex',         // optional
 *     'body_class'  => '',                // optional
 *     'nav'         => 'full' | 'simple', // optional
 *   ];
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/icons.php';

$page = $page ?? [];
$title       = $page['title'] ?? (SITE_NAME . ' — ' . SITE_TAGLINE);
$description = $page['description'] ?? 'BotNira is an AI receptionist and AI calling software that answers business calls, WhatsApp, SMS, email and chat 24/7.';
$path        = $page['path'] ?? '/';
$canonical   = abs_url($path);
$ogImage     = abs_url('/assets/img/botnira-mark-512.png');
$navMode     = $page['nav'] ?? 'full';
$current     = $path;
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#002FA7">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($description) ?>">
<?php if (!empty($page['keywords'])): ?>
<meta name="keywords" content="<?= e($page['keywords']) ?>">
<?php endif; ?>
<meta name="robots" content="<?= e($page['robots'] ?? 'index, follow, max-image-preview:large') ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<link rel="icon" type="image/png" href="/assets/img/botnira-mark-512.png">
<link rel="apple-touch-icon" href="/assets/img/botnira-mark-512.png">

<meta property="og:type" content="<?= e($page['og_type'] ?? 'website') ?>">
<meta property="og:site_name" content="BotNira">
<meta property="og:title" content="<?= e($title) ?>">
<meta property="og:description" content="<?= e($description) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:image" content="<?= e($ogImage) ?>">
<meta property="og:locale" content="en_US">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($title) ?>">
<meta name="twitter:description" content="<?= e($description) ?>">
<meta name="twitter:image" content="<?= e($ogImage) ?>">
<?php if (GOOGLE_SITE_VERIFICATION): ?>
<meta name="google-site-verification" content="<?= e(GOOGLE_SITE_VERIFICATION) ?>">
<?php endif; ?>

<link rel="preconnect" href="https://api.fontshare.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=cabinet-grotesk@900,800,700,500&f[]=satoshi@900,700,500,400&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Azeret+Mono:wght@400;700&display=swap">
<link rel="stylesheet" href="<?= asset('css/style.css') ?>">

<?php
// Structured data
$ld = $page['jsonld'] ?? [];
$ld[] = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'BotNira',
    'url' => SITE_URL . '/',
    'logo' => $ogImage,
    'description' => 'AI receptionist and AI calling software that answers business calls, WhatsApp, SMS, email and chat 24/7.',
    'sameAs' => array_values(SOCIAL),
    'contactPoint' => [[
        '@type' => 'ContactPoint',
        'contactType' => 'customer support',
        'email' => SUPPORT_EMAIL,
        'availableLanguage' => ['English', 'French', 'Hindi', 'Punjabi', 'Spanish'],
    ]],
];
foreach ($ld as $block): ?>
<script type="application/ld+json"><?= json_encode($block, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?></script>
<?php endforeach; ?>

<?php if (GA4_ID): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= e(GA4_ID) ?>"></script>
<script>
window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}
gtag('js',new Date());gtag('config','<?= e(GA4_ID) ?>');<?php if (GOOGLE_ADS_ID): ?>gtag('config','<?= e(GOOGLE_ADS_ID) ?>');<?php endif; ?>
</script>
<?php endif; ?>
<?php if (META_PIXEL_IDS): ?>
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
<?php foreach (META_PIXEL_IDS as $px): ?>fbq('init','<?= e($px) ?>');<?php endforeach; ?>fbq('track','PageView');
</script>
<?php endif; ?>
<?php if (CLARITY_ID): ?>
<script>(function(c,l,a,r,i,t,y){c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);})(window,document,"clarity","script","<?= e(CLARITY_ID) ?>");</script>
<?php endif; ?>
</head>
<body class="<?= e($page['body_class'] ?? '') ?>">
<a class="skip-link" href="#main">Skip to content</a>

<?php if ($navMode === 'none'): /* auth pages draw their own chrome */ ?>
<?php elseif ($navMode === 'simple'): ?>
<header class="nav" id="top">
  <div class="container nav-inner">
    <a href="/" class="brand"><img src="/assets/img/botnira-mark.png" width="32" height="32" alt=""><span>BotNira</span></a>
    <nav class="nav-simple" aria-label="Main">
      <a href="/#pricing" class="hide-sm">Pricing</a>
      <a href="/#usecases" class="hide-sm">Use cases</a>
      <a href="/#contact" class="hide-sm">Contact</a>
      <a href="/signup" class="btn btn-primary btn-sm">Start free <?= icon('arrow-right', 14) ?></a>
    </nav>
  </div>
</header>
<?php else: ?>
<header class="nav" id="top">
  <div class="container nav-inner">
    <a href="/" class="brand"><img src="/assets/img/botnira-mark.png" width="32" height="32" alt=""><span>BotNira</span></a>
    <nav class="nav-links" aria-label="Main">
      <a href="/#features">Features</a>
      <a href="/#channels">Channels</a>
      <a href="/#how">How it works</a>
      <a href="/#try">Try live</a>
      <a href="/#usecases">Use cases</a>
      <a href="/#pricing">Pricing</a>
      <a href="/referrals"<?= $current === '/referrals' ? ' aria-current="page"' : '' ?>>Referrals <span class="tag-earn">earn 15%</span></a>
      <a href="/blog"<?= $current === '/blog' ? ' aria-current="page"' : '' ?>>Blog</a>
      <a href="/team"<?= $current === '/team' ? ' aria-current="page"' : '' ?>>Team</a>
      <a href="/#faq">FAQ</a>
      <a href="/#contact">Contact</a>
    </nav>
    <div class="nav-cta">
      <a href="/login" class="nav-login">Log in</a>
      <a href="/signup" class="btn btn-primary btn-sm">Get started <?= icon('arrow-right', 16) ?></a>
    </div>
    <button type="button" class="nav-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
      <span class="when-closed"><?= icon('menu', 20) ?></span><span class="when-open"><?= icon('x', 20) ?></span>
    </button>
  </div>
  <div class="mobile-menu" id="mobile-menu" hidden>
    <nav aria-label="Mobile">
      <a href="/#features">Features</a>
      <a href="/#channels">Channels</a>
      <a href="/#how">How it works</a>
      <a href="/#try">Try live</a>
      <a href="/#usecases">Use cases</a>
      <a href="/#pricing">Pricing</a>
      <a href="/referrals">Referrals <span class="tag-earn">earn 15%</span></a>
      <a href="/blog">Blog</a>
      <a href="/team">Team</a>
      <a href="/#faq">FAQ</a>
      <a href="/#contact">Contact</a>
    </nav>
    <div class="mobile-menu-cta">
      <a href="/login" class="btn btn-white btn-block">Log in</a>
      <a href="/signup" class="btn btn-primary btn-block">Get started <?= icon('arrow-right', 16) ?></a>
    </div>
  </div>
</header>
<?php endif; ?>
<main id="main">
