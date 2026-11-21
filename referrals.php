<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';

const REF_RATE = 0.15;

$refFaqs = [
    ['Do I need to be a paying BotNira customer to refer?', 'No. Many referrers only use the free account for the Referrals tab. Sign up, grab your link, share it. Even if your own trial expires, the Referrals page stays open so you can keep earning.'],
    ['How is the 15% calculated?', "15% of your referred customer's monthly invoice subtotal (before taxes). On a Pro plan (\$399/mo) that's \$59.85 per month, every month, for as long as they stay subscribed."],
    ['When do I get paid?', 'At the end of each calendar month we total your earned commissions and wire them to your bank in USD at the start of the next month. Wires usually arrive within 3–5 business days.'],
    ['What if my referral cancels?', "Commissions you've already earned stay with you. Future commissions stop the day they cancel — you don't owe anything back."],
    ['Can I refer myself or my own businesses?', 'No — the same email or IP address is blocked automatically. Referring separate businesses with different owners is fine.'],
    ['Is there a limit on how much I can earn?', 'No cap. Your link is yours — refer as many businesses as you like.'],
    ['Does my link ever expire?', "Never. It's tied to your account for life. Print it on business cards or put it in your email signature."],
    ['Which countries can receive payouts?', 'Anywhere with a bank that accepts USD wires. We support SWIFT, IBAN and routing numbers.'],
];

$page = [
    'title' => 'BotNira Referral Program — Earn 15% Recurring Commission',
    'description' => 'Refer businesses to BotNira and earn 15% recurring commission on every payment they make, for as long as they stay. Free to join — get your unique referral link today.',
    'path' => '/referrals',
    'jsonld' => [[
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(fn($f) => ['@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]]], $refFaqs),
    ]],
];
require __DIR__ . '/includes/header.php';

$money = fn($n) => '$' . number_format($n, 2);
?>

<!-- Hero -->
<section class="section-b ref-hero">
  <div class="container hero-grid">
    <div>
      <div class="pill"><?= icon('gift', 14) ?> BotNira Referral Program · Earn 15% Recurring</div>
      <h1 class="display-xl">Refer once.<br><span class="mark-black">Get paid every month.</span></h1>
      <p class="lead" style="color:#262626">Share your unique BotNira link. Every business you refer pays you <strong>15% commission on every monthly invoice — recurring for as long as they stay subscribed.</strong> No support work, no quotas, no cap.</p>
      <div class="btn-row">
        <a href="/signup" class="btn btn-primary btn-lg">Create free account <?= icon('arrow-right', 18) ?></a>
        <a href="#how" class="btn btn-white btn-lg">See how it works</a>
      </div>
      <div class="grid grid-3 mini-grid mt-8">
        <?php foreach ([['repeat', '15% recurring', 'Every month they pay'], ['banknote', 'Paid in USD', 'Wired to your bank'], ['shield-check', 'No fine print', 'Link never expires']] as [$ic, $l, $s]): ?>
        <div class="card pad-6" style="padding:.75rem"><?= icon($ic, 16) ?><div class="h5 mt-1" style="font-size:.9rem"><?= e($l) ?></div><div class="tiny muted"><?= e($s) ?></div></div>
        <?php endforeach; ?>
      </div>
    </div>

    <div>
      <div class="card card-lg">
        <div class="card-bar bar-black"><?= icon('gift', 14) ?><span class="mono">YOUR REFERRAL DASHBOARD</span><span class="mono push-right op-70">SAMPLE</span></div>
        <div class="card-body" style="display:flex;flex-direction:column;gap:1rem">
          <div class="mock-link">
            <div style="min-width:0"><div class="eyebrow-grey" style="color:#404040">Your link</div><div class="mono small break">botnira.com/r/<strong>your-business-x7k2</strong></div></div>
            <span class="mock-btn"><?= icon('copy', 12) ?> Copy</span>
          </div>
          <div class="grid grid-2" style="gap:.75rem;grid-template-columns:1fr 1fr">
            <div class="mock-stat bg-green-100"><div class="eyebrow-grey">This month</div><div class="k"><?= $money(149 * 10 * REF_RATE) ?></div><div class="tiny muted">10 Growth referrals</div></div>
            <div class="mock-stat bg-amber-100"><div class="eyebrow-grey">Pending payout</div><div class="k"><?= $money(149 * 10 * REF_RATE) ?></div><div class="tiny muted">Paid on the 1st</div></div>
          </div>
          <div class="mock-stat">
            <div class="eyebrow-grey">Commission per plan</div>
            <ul class="mock-list mt-2">
              <?php foreach (array_reverse($PLANS) as $p): ?>
              <li><span><?= e($p['name']) ?> · $<?= $p['price'] ?>/mo</span><span class="bold c-green">+<?= $money($p['price'] * REF_RATE) ?></span></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <p class="center mono tiny muted mt-3">Sample numbers — your dashboard updates automatically.</p>
    </div>
  </div>
</section>

<!-- Program facts -->
<section class="section-b" style="background:#fff">
  <div class="container grid grid-4 grid-2-sm" style="padding-top:2.5rem;padding-bottom:2.5rem;gap:1rem">
    <?php foreach ([['repeat', '15%', 'Recurring · every month'], ['dollar', '$' . number_format(399 * REF_RATE, 2), 'Per Pro referral / month'], ['trending-up', 'No cap', 'On what you can earn'], ['globe', 'USD', 'Paid worldwide via wire']] as [$ic, $v, $l]): ?>
    <div class="card card-hover pad-6 bg-muted"><?= icon($ic, 20) ?><div class="h2 mt-2"><?= e($v) ?></div><div class="tiny muted mt-1"><?= e($l) ?></div></div>
    <?php endforeach; ?>
  </div>
</section>

<!-- How it works -->
<section id="how" class="section-b section bg-muted">
  <div class="container">
    <div class="narrow-3">
      <div class="eyebrow">How it works</div>
      <h2 class="display-lg">From sign-up to your <span class="mark-yellow">first commission</span> in under a week.</h2>
      <p class="muted mt-4">No quotas. No interviews. No partner application. Anyone can refer.</p>
    </div>
    <div class="grid grid-3 mt-12" style="gap:2rem 1.25rem">
      <?php foreach ([
        ['user-plus', 'Create a free BotNira account', "Sign up in 60 seconds. No credit card. You don't need to use BotNira for your own business to start earning.", true],
        ['link', 'Open the Referrals tab', 'Inside your dashboard, the Referrals tab holds your unique link. Copy it anywhere: emails, WhatsApp, Instagram bios, business cards.', false],
        ['share', 'Share with businesses that need it', 'Dentists, salons, gyms, real-estate agents, online stores, restaurants, clinics — every business with a phone needs an AI front desk.', false],
        ['credit-card', 'They pay → you earn 15%, every month', 'The moment they pay for any plan ($29–$399/mo), you earn 15% of every monthly invoice for as long as they stay. If they upgrade, your commission grows too.', false],
        ['wallet', 'Add your bank → get paid monthly in USD', 'Add your bank details (account #, SWIFT/IBAN, country). At the start of each month we wire last month\'s earnings to you in USD.', false],
      ] as $i => [$ic, $t, $b, $cta]): ?>
      <div class="card card-hover pad-6" style="position:relative">
        <span class="step-tag">Step <?= $i + 1 ?></span>
        <?= icon($ic, 26) ?>
        <div class="h4 mt-3"><?= e($t) ?></div>
        <p class="small muted mt-2"><?= e($b) ?></p>
        <?php if ($cta): ?><a href="/signup" class="link-arrow small mt-4">Start your free account <?= icon('arrow-right', 14) ?></a><?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Example earnings -->
<section class="section-b section bg-black">
  <div class="container">
    <div class="narrow-3">
      <div class="eyebrow" style="color:#ffd600">What referrals add up to</div>
      <h2 class="display-lg">Three ways people <span class="c-yellow">use their link.</span></h2>
      <p class="op-80 mt-4">Example earnings worked out from real plan prices — your results depend on who you refer.</p>
    </div>
    <div class="grid grid-3 mt-10">
      <?php foreach ([
        ['megaphone', 'Marketing agency', 'bg-pink-100', 40, 149, 'Adds a "BotNira partner" badge to client proposals. Existing clients sign up on the Growth plan.', ['agencies', 'dentists', 'spas']],
        ['building', 'Realtor & broker', 'bg-blue-100', 25, 49, 'Tells fellow agents who miss evening leads. Most start on Starter.', ['real estate', 'insurance']],
        ['users', 'Small-business consultant', 'bg-green-100', 8, 399, 'Recommends BotNira to a handful of multi-location clinics on the Pro plan.', ['consultants', 'clinics']],
      ] as [$ic, $who, $accent, $n, $price, $desc, $tags]): $m = $n * $price * REF_RATE; ?>
      <div class="accent-card">
        <div class="accent-head <?= $accent ?>"><span class="icon-box icon-box-black icon-box-lg"><?= icon($ic, 20) ?></span><div><div class="h5"><?= e($who) ?></div><div class="mono tiny muted"><?= $n ?> referrals · $<?= $price ?> plan</div></div></div>
        <div class="card-body" style="display:flex;flex-direction:column;flex:1">
          <div class="earn-box">
            <div><div class="eyebrow-grey" style="color:#000">Earns per month</div><div class="k"><?= $money($m) ?></div></div>
            <div style="text-align:right"><div class="eyebrow-grey" style="color:#000">Per year</div><div class="mono bold"><?= '$' . number_format($m * 12) ?></div></div>
          </div>
          <p class="small mt-4" style="flex:1"><?= e($desc) ?></p>
          <div class="tag-cloud mt-4" style="gap:.35rem"><?php foreach ($tags as $t): ?><span class="tag-mini"><?= e($t) ?></span><?php endforeach; ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="center mt-10">
      <a href="/signup" class="btn btn-yellow btn-lg" style="border-color:#fff">Get my referral link <?= icon('arrow-right', 18) ?></a>
      <p class="mono tiny op-60 mt-3">No credit card · free forever · earn from day one</p>
    </div>
  </div>
</section>

<!-- Calculator -->
<section class="section-b section" style="background:#fff">
  <div class="container calc-grid" data-calc data-rate="<?= REF_RATE ?>">
    <div>
      <div class="eyebrow">Earnings calculator</div>
      <h2 class="display-lg">Do the maths on <span class="mark-yellow">your network.</span></h2>
      <p class="muted mt-4">How many businesses do you know that need an AI receptionist? Drag the sliders.</p>
      <div class="mt-8" style="display:flex;flex-direction:column;gap:1.5rem">
        <div>
          <label class="range-label" for="calc-signups"><span>Active referrals</span><output data-out="signups">20</output></label>
          <input id="calc-signups" type="range" name="signups" min="1" max="200" step="1" value="20">
        </div>
        <div>
          <label class="range-label" for="calc-plan"><span>Average plan price</span><output data-out="plan">$149/mo</output></label>
          <input id="calc-plan" type="range" name="plan" min="29" max="399" step="10" value="149">
          <div class="mono tiny muted" style="display:flex;justify-content:space-between;margin-top:.25rem;flex-wrap:wrap;gap:.25rem"><span>$29 Basic</span><span>$49 Starter</span><span>$149 Growth</span><span>$399 Pro</span></div>
        </div>
      </div>
    </div>
    <div class="calc-result">
      <div class="eyebrow-grey" style="color:#404040">You earn (recurring)</div>
      <div class="calc-big"><span data-out="monthly">$447</span><small>/mo</small></div>
      <div class="small bold mt-3 inline-icon"><?= icon('trending-up', 14) ?> <span data-out="yearly">$5,364</span> per year, if numbers hold.</div>
      <div class="grid grid-3 mt-6" style="gap:.5rem;grid-template-columns:repeat(3,1fr)">
        <div class="mini"><div class="l">Per referral / mo</div><div class="v" data-out="per-mo">$22</div></div>
        <div class="mini"><div class="l">Per referral / yr</div><div class="v" data-out="per-yr">$268</div></div>
        <div class="mini"><div class="l">Over 2 years</div><div class="v" data-out="two-yr">$10,728</div></div>
      </div>
      <a href="/signup" class="btn btn-black mt-6">Get my referral link <?= icon('arrow-right', 16) ?></a>
    </div>
  </div>
</section>

<!-- Who refers -->
<section class="section-b section bg-muted">
  <div class="container">
    <div class="narrow-3">
      <div class="eyebrow">Who refers BotNira</div>
      <h2 class="display-lg">Anyone with a network. <span class="mark-yellow">Including you.</span></h2>
    </div>
    <div class="grid grid-3 mt-10" style="gap:1rem">
      <?php foreach ([
        ['megaphone', 'Marketers & agencies', 'You already advise small businesses. Offer them BotNira and earn 15% on every recurring invoice.'],
        ['briefcase', 'Freelancers & consultants', 'Add a passive income line that pays you every month, on autopilot.'],
        ['bar-chart', 'Influencers & creators', 'Drop your link in your bio. Every business owner who follows you is a potential commission.'],
        ['zap', 'Existing BotNira customers', 'Happy with us? Refer a few peers and your commissions can cover your own subscription.'],
        ['users', 'Local community leaders', 'Chamber of Commerce, BNI, Rotary — recommend BotNira at every meet-up.'],
        ['globe', 'International partners', 'We pay in USD wires worldwide. No region restrictions.'],
      ] as [$ic, $t, $b]): ?>
      <div class="card card-hover pad-6"><?= icon($ic, 22) ?><div class="h5 mt-2"><?= e($t) ?></div><p class="small muted mt-1"><?= e($b) ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="section-b section" style="background:#fff">
  <div class="container container-4xl">
    <div class="eyebrow">FAQ</div>
    <h2 class="display-lg">Questions, answered.</h2>
    <div class="faq-stack mt-8" style="gap:.5rem">
      <?php foreach ($refFaqs as $i => [$q, $a]): ?>
      <details class="faq-item"<?= $i === 0 ? ' open' : '' ?>>
        <summary><span style="font-size:1rem"><?= e($q) ?></span><span class="faq-plus" aria-hidden="true">+</span></summary>
        <div class="faq-a small"><?= e($a) ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="section-b section bg-blue">
  <div class="container two-col">
    <div>
      <div class="eyebrow" style="color:#ffd600">Start earning today</div>
      <h2 class="display-xl mt-2">Your link is <span style="color:#ffd600">already waiting.</span></h2>
      <p class="lead lead-light">60-second sign-up. The Referrals tab is right there in your dashboard. Paste your link anywhere — and start earning 15% recurring commission.</p>
      <div class="btn-row">
        <a href="/signup" class="btn btn-yellow">Create my free account <?= icon('arrow-right', 18) ?></a>
        <a href="/login" class="btn btn-white">I already have an account</a>
      </div>
    </div>
    <div class="final-box">
      <div class="eyebrow-grey" style="color:rgba(255,255,255,.7)">What you get</div>
      <ul class="mt-3">
        <?php foreach (['Unique referral link that never changes', '15% recurring commission on every paid invoice', 'Real-time dashboard — track every dollar', 'USD wire payouts every month', 'Works worldwide — no region limits', 'Referrals tab stays open even if your trial expires'] as $t): ?>
        <li><?= icon('check', 16) ?><?= e($t) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
