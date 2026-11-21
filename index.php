<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';

$page = [
    'title' => 'BotNira — AI Receptionist & AI Calling Software for Every Business',
    'description' => 'BotNira is an AI receptionist and AI calling software that answers business calls, WhatsApp, SMS, email and chat 24/7. Trained only on your business — books appointments automatically. Try free.',
    'keywords' => 'AI receptionist, AI calling, AI based calling software, AI phone answering service, AI voice agent, virtual receptionist, AI call answering, WhatsApp AI, AI appointment booking, automated receptionist, BotNira',
    'path' => '/',
    'jsonld' => [
        [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'BotNira',
            'url' => SITE_URL . '/',
        ],
        [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => 'BotNira AI Receptionist',
            'operatingSystem' => 'Web',
            'applicationCategory' => 'BusinessApplication',
            'description' => 'AI receptionist and AI calling software that answers business calls, WhatsApp, SMS, email and chat 24/7.',
            'url' => SITE_URL . '/',
            'offers' => array_map(fn($p) => [
                '@type' => 'Offer', 'name' => $p['name'], 'price' => (string) $p['price'], 'priceCurrency' => 'USD',
            ], $PLANS),
        ],
        [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn($f) => [
                '@type' => 'Question', 'name' => $f['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
            ], $FAQS),
        ],
    ],
];
require __DIR__ . '/includes/header.php';

$sent = isset($_GET['sent']);
$formError = $_GET['error'] ?? '';
?>

<!-- ============================ HERO ============================ -->
<section class="section-b hero bg-grid">
  <div class="container hero-grid">
    <div>
      <div class="pill"><?= icon('sparkles', 14) ?> AI Receptionist · AI Calling Software</div>
      <h1 class="display-xl">The AI receptionist<br>that never<br><span class="mark-blue">clocks out.</span></h1>
      <p class="lead">Don't take our word for it — <strong>hear it.</strong> BotNira answers your phone calls, WhatsApp, SMS, email and chat <strong>24/7</strong>, books appointments automatically, and speaks your customer's language.</p>

      <a href="tel:<?= e(DEMO_PHONE) ?>" class="call-now">
        <?= icon('phone-call', 22) ?>
        <span>
          <span class="call-now-label">Call our AI right now</span>
          <span class="call-now-number"><?= e(DEMO_PHONE_DISPLAY) ?></span>
        </span>
      </a>

      <div class="btn-row">
        <a href="/signup" class="btn btn-primary btn-lg">Start free <?= icon('arrow-right', 18) ?></a>
        <a href="#hear-call" class="btn btn-white btn-lg"><?= icon('play-circle', 18) ?> Hear a real call</a>
      </div>

      <ul class="checks-inline">
        <?php foreach ([TRIAL_DAYS . '-day free trial', 'No credit card', 'Cancel anytime', 'Live in 3 minutes'] as $t): ?>
        <li><?= icon('check', 15, 'c-green') ?> <?= e($t) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div>
      <div id="hear-call" class="card card-lg audio-card">
        <div class="card-bar bar-blue">
          <span class="live-dot"></span><span class="mono">REAL BOTNIRA CALL</span>
          <span class="mono push-right">listen</span>
        </div>
        <div class="card-body">
          <h2 class="h3">Hear it before we tell you about it.</h2>
          <p class="muted small">A real recording of BotNira handling a live call — natural voice, no robotic script-reading, books the appointment on its own.</p>
          <audio controls preload="none" class="audio">
            <source src="/assets/audio/botnira-call.m4a" type="audio/mp4">
            Your browser does not support audio playback.
          </audio>
          <div class="note-row">
            <?= icon('phone-forwarded', 18, 'c-blue') ?>
            <span>Prefer to talk? Tap the yellow number to call BotNira yourself — it answers in under a second.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================= REASSURANCE ========================= -->
<section class="section-b band-yellow">
  <div class="container reassure">
    <div class="reassure-title"><span class="icon-box icon-box-black"><?= icon('shield-check', 20) ?></span> It never guesses.</div>
    <p>When BotNira isn't sure, it <strong>transfers the call to you</strong> or <strong>takes a message</strong> — your customers are never left with a wrong answer. You stay in control of every conversation.</p>
  </div>
</section>

<!-- ========================== TRY LIVE ========================= -->
<section id="try" class="section-b section bg-blue dots-light">
  <div class="container">
    <div class="narrow-3">
      <div class="pill pill-yellow"><?= icon('play-circle', 14) ?> Try it right now — no signup</div>
      <h2 class="display-lg">Talk to BotNira<br><em class="c-yellow">before you buy it.</em></h2>
      <p class="lead lead-light">Pick a channel below and have a real conversation with a BotNira trained on <strong>The DigiSparrow</strong> — ask about pricing, book a demo, speak in Hindi or Spanish. This is the same agent your own customers will talk to.</p>
    </div>
    <div class="grid grid-3 mt-10">
      <a href="tel:<?= e(DEMO_PHONE) ?>" class="card card-hover try-card">
        <div class="try-top"><span class="icon-box icon-box-blue icon-box-lg"><?= icon('phone-call', 22) ?></span><span class="chip-black">Call us</span></div>
        <div class="eyebrow-grey">Phone &amp; SMS</div>
        <div class="h3"><?= e(DEMO_PHONE_DISPLAY) ?></div>
        <p class="small muted">Dial this number. BotNira answers in under a second, speaks naturally, can be interrupted, and transcribes the call into your Inbox.</p>
        <span class="link-arrow">Tap to call <?= icon('arrow-right', 14) ?></span>
      </a>
      <a href="<?= e(wa_link(DEMO_WA, DEMO_WA_TEXT)) ?>" target="_blank" rel="noopener" class="card card-hover try-card">
        <div class="try-top"><span class="icon-box icon-box-green icon-box-lg"><?= icon('message-circle', 22) ?></span><span class="chip-black">WhatsApp</span></div>
        <div class="eyebrow-grey">WhatsApp</div>
        <div class="h3"><?= e(DEMO_WA_DISPLAY) ?></div>
        <p class="small muted">Opens WhatsApp with BotNira as the recipient. Ask anything — hours, pricing, book a demo — it replies instantly in your language.</p>
        <span class="link-arrow">Open WhatsApp <?= icon('arrow-right', 14) ?></span>
      </a>
      <a href="#contact" class="card card-hover try-card">
        <div class="try-top"><span class="icon-box icon-box-yellow icon-box-lg"><?= icon('message-square', 22) ?></span><span class="chip-black">Message</span></div>
        <div class="eyebrow-grey">Talk to our team</div>
        <div class="h3">Ask for a live demo</div>
        <p class="small muted">Tell us about your business and we'll set up a BotNira demo trained on your own services, hours and pricing.</p>
        <span class="link-arrow">Send a message <?= icon('arrow-right', 14) ?></span>
      </a>
    </div>
    <div class="glass-note mt-10"><?= icon('sparkles', 14, 'c-yellow') ?> Every channel is the SAME trained agent. Book on the phone, confirm on WhatsApp — it's all one brain.</div>
  </div>
</section>

<!-- ======================= INDUSTRY TILES ====================== -->
<section class="section-b section-sm">
  <div class="container">
    <div class="eyebrow">See it for your business</div>
    <h2 class="display-md">See how BotNira works for your industry.</h2>
    <div class="grid grid-4 grid-2-sm mt-8">
      <?php foreach (['salon' => 'Salons & Spas', 'dental' => 'Clinics & Dental', 'auto-repair' => 'Repair & Auto shops', 'education' => 'Tutoring & Schools'] as $slug => $label): ?>
      <a href="/use-case/<?= e($slug) ?>" class="card card-shadow card-hover tile">
        <span class="icon-box icon-box-blue icon-box-lg"><?= icon($USE_CASES[$slug]['icon'], 22) ?></span>
        <div class="h4 mt-4"><?= e($label) ?></div>
        <span class="link-arrow small-caps mt-3">See example <?= icon('arrow-right', 12) ?></span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========================== CHANNELS ========================= -->
<section id="channels" class="section-b section">
  <div class="container">
    <div class="section-head">
      <div>
        <div class="eyebrow">Omnichannel AI Receptionist</div>
        <h2 class="display-lg">One AI. Every channel.</h2>
      </div>
      <p class="section-head-text">A unified inbox that handles every conversation — <strong>AI phone calling</strong>, WhatsApp, email, SMS, web chat — all powered by the same trained brain.</p>
    </div>
    <div class="channel-strip">
      <?php foreach ([['phone', 'Voice Calls', 'Prepaid minutes'], ['message-circle', 'WhatsApp', 'Inbox + replies'], ['mail', 'Email', 'Auto-reply'], ['message-square', 'SMS & Chat', 'Web widget']] as [$ic, $label, $sub]): ?>
      <div class="channel">
        <?= icon($ic, 32) ?>
        <div class="h4 mt-6"><?= e($label) ?></div>
        <div class="mono small op-70"><?= e($sub) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ======================== BUILT FOR ========================== -->
<section class="section-b section bg-black">
  <div class="container center">
    <div class="pill pill-ghost"><?= icon('building', 12) ?> Early access · Ontario, Canada</div>
    <h2 class="display-lg mt-5">Built for the <span class="c-yellow">local service businesses</span> that live and die by the phone.</h2>
    <p class="mono small op-60 narrow-2 mt-3">Salons, dental clinics, plumbers, restaurants, real-estate teams, schools, mechanics and home-services crews — the businesses BotNira is built for.</p>
  </div>
  <div class="marquee" aria-hidden="true">
    <div class="marquee-track">
      <?php $inds = ['Salons', 'Dental clinics', 'Auto repair', 'Real estate', 'Restaurants', 'Tutoring', 'Plumbers', 'Physiotherapy', 'Immigration consultants', 'Spas', 'HVAC', 'Law firms', 'Driving schools', 'Vet clinics'];
      for ($r = 0; $r < 2; $r++): foreach ($inds as $i): ?>
      <span class="marquee-item"><?= e($i) ?></span><span class="marquee-dot">●</span>
      <?php endforeach; endfor; ?>
    </div>
  </div>
  <div class="container">
    <div class="grid grid-4 grid-2-sm mt-10">
      <?php foreach ([['24/7', 'Always answering'], ['3-min', 'To go live'], ['95+', 'Languages'], ['Ontario', 'Proudly local']] as [$k, $l]): ?>
      <div class="stat-dark"><div class="stat-dark-k"><?= e($k) ?></div><div class="stat-dark-l"><?= e($l) ?></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========================== FEATURES ========================= -->
<section id="features" class="section-b section bg-muted">
  <div class="container">
    <h2 class="display-lg narrow-3">Your staff, minus the overhead.</h2>
    <div class="grid grid-3 mt-12">
      <?php foreach ([
        ['bot', 'Trained on your info only', 'Feed it your business description and FAQs. BotNira stays strictly within your information.'],
        ['bar-chart', 'Analytics that matter', 'Conversations, resolution rate, channel mix, hourly activity. See what customers actually ask.'],
        ['languages', 'Speaks every language', "BotNira detects the customer's language and replies fluently in 95+ languages. Train once, serve everyone."],
        ['shield-check', 'Human-in-the-loop', 'Jump into any conversation and take over when the bot needs a hand.'],
        ['zap', 'Ships in minutes', 'Paste your business info, pick a tone, and your assistant is live.'],
        ['sparkles', 'Best-in-class AI brain', 'Tuned with a strict grounding prompt so BotNira only answers with on-brand info from your business profile.'],
      ] as [$ic, $t, $b]): ?>
      <div class="card card-shadow card-hover pad-6">
        <?= icon($ic, 28) ?>
        <div class="h4 mt-4"><?= e($t) ?></div>
        <p class="small muted mt-2"><?= e($b) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========================== USE CASES ======================== -->
<section id="usecases" class="section-b section">
  <div class="container">
    <div class="section-head">
      <div>
        <div class="eyebrow">Use cases</div>
        <h2 class="display-lg">Where BotNira shows up for you.</h2>
      </div>
      <p class="section-head-text">From dental clinics to plumbing crews to online stores — wherever a customer expects a reply, BotNira is already replying.</p>
    </div>
    <div class="grid grid-3">
      <?php foreach ([
        ['calendar', 'Books appointments', 'Collects name, phone and preferred time across chat, WhatsApp and voice — the booking lands in your calendar and a confirmation goes back instantly.', null],
        ['headphones', 'Handles customer support', 'Answers FAQs, troubleshoots common issues, and escalates to a human only when it actually needs one.', null],
        ['users', 'Works as a support executive', 'Takes the ticket, captures the issue, classifies it, and keeps the customer informed — 24/7, no shift roster.', null],
        ['shopping-bag', 'Tells visitors what you offer', 'Embedded on your website, it explains your services, shares pricing and links to bookings — turning browsers into leads.', null],
        ['stethoscope', 'Runs a clinic front desk', 'Patient intake, appointment scheduling, insurance questions, refill requests — all captured and logged.', 'healthcare-clinic'],
        ['scissors', 'Powers salons, spas & beauty bars', 'Books haircuts, facials and waxing. Remembers stylist preferences, handles reschedules, sends reminders.', 'salon'],
        ['wrench', 'Dispatches service & trade businesses', 'For plumbers, electricians, HVAC: captures job details, address and urgency, and routes to the right technician.', 'home-services'],
        ['briefcase', 'Qualifies leads for sales teams', 'Asks the right discovery questions, scores leads, and pushes hot ones to your team.', 'real-estate'],
        ['graduation-cap', 'Answers queries for schools & coaching', "Course details, fees, admissions and class timings — in every parent's language.", 'education'],
        ['package-check', 'Order tracking & e-commerce support', "Where's-my-order, returns and sizing questions — resolved instantly so your team handles only the tricky stuff.", null],
      ] as $i => [$ic, $t, $b, $slug]):
        $tag = $slug ? 'a' : 'div'; ?>
      <<?= $tag ?> class="card card-shadow card-hover pad-6"<?= $slug ? ' href="/use-case/' . e($slug) . '"' : '' ?>>
        <div class="uc-head"><span class="icon-box icon-box-blue"><?= icon($ic, 18) ?></span><div class="h5"><?= e($t) ?></div></div>
        <p class="small muted mt-3"><?= e($b) ?></p>
        <?php if ($slug): ?><span class="link-arrow small-caps mt-4">Learn more <?= icon('arrow-right', 12) ?></span><?php endif; ?>
      </<?= $tag ?>>
      <?php endforeach; ?>
    </div>
    <div class="tag-cloud-wrap">
      <div class="footer-label dark">Industry-specific guides</div>
      <div class="tag-cloud">
        <?php foreach ($USE_CASES as $slug => $u): ?>
        <a href="/use-case/<?= e($slug) ?>" class="tag-link">AI for <?= e($u['industry']) ?> →</a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ======================== LANGUAGES ========================== -->
<section id="language" class="section-b section-lg bg-blue dots-light">
  <div class="container lang-grid">
    <div>
      <div class="pill pill-white"><?= icon('languages', 14) ?> Multi-language, built in</div>
      <h2 class="display-xl mt-5">One BotNira.<br><em class="c-yellow">Every language.</em></h2>
      <p class="lead lead-light">Train your bot once in your own language. BotNira detects what the customer is writing or speaking — English, Spanish, Hindi, Arabic, Chinese, French and 90+ others — and replies fluently in the same language. No translation plugins, no per-language retraining, no extra fees.</p>
      <div class="grid grid-3 mini-grid mt-8">
        <?php foreach ([['Auto-detect', 'Per-message language switch'], ['Voice too', "Calls in caller's language"], ['No retrain', 'Train once, serve all']] as [$t, $s]): ?>
        <div class="glass-box"><div class="h5"><?= e($t) ?></div><div class="mono tiny op-80"><?= e($s) ?></div></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="card card-lg pad-6 c-ink">
      <div class="eyebrow-grey">A few of the 95+ languages</div>
      <div class="lang-chips">
        <?php foreach ($LANGUAGES as $l): ?><span class="lang-chip"><?= e($l) ?></span><?php endforeach; ?>
        <span class="lang-chip lang-more">+ 75 more</span>
      </div>
      <div class="example-box"><strong>Example:</strong> Your bot is trained in English. A customer messages in हिन्दी — BotNira replies in हिन्दी. The next message arrives in Español — BotNira switches to Español mid-conversation. Zero setup.</div>
    </div>
  </div>
</section>

<!-- ========================== HOW =============================== -->
<section id="how" class="section-b section">
  <div class="container">
    <h2 class="display-lg">Three steps to a 24/7 AI receptionist.</h2>
    <div class="grid grid-3 mt-10">
      <?php foreach ([
        ['01', 'Sign up your business', 'Create an account. Each business gets a fully isolated workspace with its own AI.'],
        ['02', 'Train your AI receptionist', 'Paste your business description and FAQs. Pick a tone and a voice. Done in 5 minutes.'],
        ['03', 'Plug in calling & channels', 'Get an AI calling number, add the web widget, connect WhatsApp, Email and SMS — all in one inbox.'],
      ] as [$n, $t, $b]): ?>
      <div class="card card-shadow pad-6">
        <div class="mono c-blue bold"><?= e($n) ?></div>
        <div class="h3 mt-2"><?= e($t) ?></div>
        <p class="small muted mt-2"><?= e($b) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ======================= DATA SECURITY ======================= -->
<section id="data" class="section-b section bg-muted">
  <div class="container">
    <div class="narrow-3">
      <div class="eyebrow">Your data</div>
      <h2 class="display-lg">You're letting AI talk to your customers. Here's where your data goes.</h2>
      <p class="lead">Short answer: it stays yours. Every business has an isolated workspace, data is encrypted in transit, and it is never used to train AI models.</p>
    </div>
    <div class="grid grid-4 grid-2-md mt-10">
      <?php foreach ([
        ['lock', 'Encrypted in transit', 'Every message and call is secured with TLS encryption.'],
        ['map-pin', 'Canadian company', 'BotNira is built and operated from Ontario, Canada.'],
        ['database', 'Never used to train AI', 'We do not train AI models on your data. Your conversations stay yours.'],
        ['shield-check', 'PIPEDA & GDPR aligned', 'Built to align with Canadian PIPEDA and EU GDPR privacy standards.'],
      ] as [$ic, $t, $b]): ?>
      <div class="card card-shadow pad-6">
        <span class="icon-box icon-box-black"><?= icon($ic, 18) ?></span>
        <div class="h5 mt-4"><?= e($t) ?></div>
        <p class="small muted mt-2"><?= e($b) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="mono small muted mt-6">Full details in our <a href="/privacy" class="u bold">Privacy Policy</a>.</p>
  </div>
</section>

<!-- ========================= RESULTS ============================ -->
<section id="results" class="section-b section">
  <div class="container">
    <div class="narrow-3">
      <div class="eyebrow">What changes</div>
      <h2 class="display-lg">Before BotNira vs. after.</h2>
      <p class="lead">What a typical month looks like for service businesses once every call and message gets answered.</p>
    </div>
    <div class="grid grid-4 grid-2-md mt-10">
      <?php foreach ($RESULTS as $r): ?>
      <article class="card result-card">
        <div class="result-top">
          <span class="icon-box icon-box-blue"><?= icon($r['icon'], 18) ?></span>
          <span class="badge-soft"><?= e($r['industry']) ?></span>
        </div>
        <?php if (!empty($r['real'])): ?>
          <p class="result-quote">“<?= e($r['quote']) ?>”</p>
          <div class="result-who"><strong><?= e($r['name']) ?></strong><br><span class="muted small"><?= e($r['business']) ?></span></div>
        <?php else: ?>
          <p class="result-story"><?= e($r['story']) ?></p>
        <?php endif; ?>
        <div class="ba">
          <div class="ba-col ba-before">
            <div class="ba-label">Before</div>
            <?php foreach ($r['before'] as [$l, $v]): ?><div class="ba-v"><?= e($v) ?></div><div class="ba-l"><?= e($l) ?></div><?php endforeach; ?>
          </div>
          <div class="ba-col ba-after">
            <div class="ba-label"><?= icon('trending-up', 11) ?> After</div>
            <?php foreach ($r['after'] as [$l, $v]): ?><div class="ba-v"><?= e($v) ?></div><div class="ba-l"><?= e($l) ?></div><?php endforeach; ?>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <p class="tiny muted mt-6">Illustrative scenarios based on common front-desk workloads. Results vary by business.</p>
  </div>
</section>

<!-- ========================= FOUNDER ============================ -->
<section class="section-b section">
  <div class="container founder-grid">
    <img src="/assets/img/ceo.jpg" alt="Kamaljeet Singh Sidhu, Founder & CEO of BotNira" class="img-card" loading="lazy" width="1200" height="800">
    <div>
      <div class="eyebrow">The human behind the AI</div>
      <h2 class="display-lg">Built by someone who watched the phone ring out.</h2>
      <p class="lead">"I built BotNira after watching small businesses — including people in my own circle — lose customers every week to calls nobody could answer in time. BotNira is the front desk I wish they'd had: it picks up every time, and hands off to a human the moment it should."</p>
      <div class="h4 mt-5">Kamaljeet Singh Sidhu</div>
      <div class="small bold c-blue">Founder &amp; CEO, BotNira</div>
      <div class="small muted inline-icon mt-1"><?= icon('map-pin', 14) ?> Hamilton, Ontario, Canada</div>
      <div class="btn-row">
        <a href="<?= e(wa_link(TEAM_WA)) ?>" target="_blank" rel="noopener" class="btn btn-primary">Book a 15-min call <?= icon('arrow-right', 16) ?></a>
        <a href="/team" class="btn btn-white">Read our story</a>
      </div>
    </div>
  </div>
</section>

<!-- ======================= RISK REVERSAL ======================= -->
<section class="section-b bg-black">
  <div class="container risk">
    <?php foreach ([TRIAL_DAYS . '-day free trial', 'No credit card required', 'Cancel anytime', 'Live in 3 minutes'] as $t): ?>
    <div class="risk-item"><?= icon('check', 18, 'c-yellow') ?> <?= e($t) ?></div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ========================== PRICING ========================== -->
<section id="pricing" class="section-b section">
  <div class="container">
    <div class="section-head">
      <div>
        <div class="eyebrow">Pricing</div>
        <h2 class="display-lg">Simple monthly plans.</h2>
        <p class="small muted italic mt-2">If BotNira saves just ONE customer a month, it pays for itself.</p>
      </div>
      <p class="section-head-text">Every plan renews monthly. <strong><?= TRIAL_DAYS ?>-day free trial</strong> — no card required to start. Cancel anytime.</p>
    </div>
    <div class="grid grid-4 grid-2-md pricing">
      <?php foreach ($PLANS as $p): ?>
      <div class="card card-shadow plan<?= !empty($p['featured']) ? ' plan-featured' : '' ?>">
        <?php if (!empty($p['sales'])): ?><div class="sales-badge"><?= icon('sparkles', 11) ?> Sales Assistant Included</div><?php endif; ?>
        <?php if (!empty($p['featured'])): ?><div class="chip-blue">Most popular</div><?php endif; ?>
        <div class="h2"><?= e($p['name']) ?></div>
        <div class="small muted"><?= e($p['tagline']) ?></div>
        <div class="price"><span class="price-n">$<?= (int) $p['price'] ?></span><span class="mono tiny muted">/mo USD</span></div>
        <div class="mono tiny muted">+ <?= TAX_LABEL ?> · $<?= number_format($p['price'] * (1 + TAX_RATE), 2) ?>/mo total</div>
        <ul class="plan-list">
          <?php if ($p['minutes'] > 0): ?>
          <li><?= icon('check', 14, 'c-green') ?> <span><strong><?= number_format($p['minutes']) ?></strong> voice minutes/mo</span></li>
          <?php else: ?>
          <li class="op-50"><?= icon('lock', 13) ?> <span>No voice/SMS (chat-only)</span></li>
          <?php endif; ?>
          <li><?= icon('check', 14, 'c-green') ?> <span><strong><?= number_format($p['messages']) ?></strong> AI messages/mo</span></li>
          <li><?= icon('check', 14, 'c-green') ?> <span><?= e($p['channels']) ?></span></li>
          <li><?= icon('check', 14, 'c-green') ?> <span>Live agent override (inbox)</span></li>
          <li><?= icon('check', 14, 'c-green') ?> <span>Hard stop at zero — no bill shocks</span></li>
          <li><?= icon('check', 14, 'c-green') ?> <span>Top-up packs never expire</span></li>
          <?php if (!empty($p['sales'])): ?>
          <li class="c-blue bold"><?= icon('sparkles', 14) ?> <span>AI Sales Assistant — outbound campaigns</span></li>
          <?php endif; ?>
        </ul>
        <a href="/signup?plan=<?= e($p['id']) ?>" class="btn btn-block <?= !empty($p['featured']) ? 'btn-primary' : 'btn-white' ?>">Start <?= TRIAL_DAYS ?>-day free trial</a>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="center mono small muted mt-10">Need more minutes? Grab a <strong>one-time top-up</strong> ($125 to $5,499) from your billing page. Top-ups never expire.</p>
    <div class="tax-note">All prices in USD. <strong><?= TAX_LABEL ?></strong> (Canadian Harmonized Sales Tax) is added to every plan and top-up at checkout.</div>
  </div>
</section>

<!-- ============================ FAQ ============================= -->
<section id="faq" class="section-b section bg-muted">
  <div class="container container-4xl">
    <div class="eyebrow">FAQ</div>
    <h2 class="display-lg">Frequently asked questions.</h2>
    <p class="lead">Everything you need to know about AI receptionists, pricing, data safety and multi-channel support.</p>
    <div class="faq mt-10">
      <?php foreach ($FAQS as $f): ?>
      <details>
        <summary><span><?= e($f['q']) ?></span><span class="faq-plus" aria-hidden="true">+</span></summary>
        <div class="faq-a"><?= e($f['a']) ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========================== CONTACT ========================== -->
<section id="contact" class="section-b section bg-soft">
  <div class="container">
    <div class="eyebrow">Get in touch</div>
    <h2 class="display-lg">Talk to a human at BotNira.</h2>
    <p class="lead">Have a question, want a custom demo, or wondering if BotNira fits your business? Reach us directly — or leave your details and our team will follow up within one business day.</p>

    <div class="contact-grid mt-10">
      <div class="card card-shadow pad-7 contact-card">
        <div>
          <div class="eyebrow-grey">Team contact</div>
          <h3 class="h3">Reach us directly</h3>
        </div>
        <a href="<?= e(wa_link(TEAM_WA)) ?>" target="_blank" rel="noopener" class="contact-row contact-wa">
          <span class="icon-box icon-box-green icon-box-lg"><?= icon('message-square', 20) ?></span>
          <span><span class="eyebrow-grey">WhatsApp</span><span class="h5 block"><?= e(TEAM_WA_DISPLAY) ?></span><span class="tiny muted">Fastest — usually replies within minutes</span></span>
        </a>
        <a href="mailto:<?= e(TEAM_EMAIL) ?>" class="contact-row">
          <span class="icon-box icon-box-blue icon-box-lg"><?= icon('mail', 20) ?></span>
          <span><span class="eyebrow-grey">Email</span><span class="h5 block break"><?= e(TEAM_EMAIL) ?></span><span class="tiny muted">Partnerships, demos &amp; detailed questions</span></span>
        </a>
        <p class="mono tiny muted mt-auto">Hours: Mon–Sat 9am–7pm (ET).</p>
      </div>

      <form class="card card-shadow pad-7 form" method="post" action="/api/contact.php" data-ajax-form>
        <div>
          <div class="eyebrow-grey">Send us a message</div>
          <h3 class="h3">Tell us about your business</h3>
        </div>
        <div class="form-msg form-ok" role="status" <?= $sent ? '' : 'hidden' ?>>✓ Thanks! We got your message — we'll be in touch within one business day.</div>
        <div class="form-msg form-err" role="alert" <?= $formError ? '' : 'hidden' ?>><?= e($formError ?: '') ?></div>
        <div class="form-row">
          <label><span class="sr-only">Your name</span><input name="name" required maxlength="120" placeholder="Your name *" autocomplete="name"></label>
          <label><span class="sr-only">Business name</span><input name="business_name" maxlength="160" placeholder="Business name" autocomplete="organization"></label>
        </div>
        <div class="form-row">
          <label><span class="sr-only">Email</span><input name="email" type="email" required maxlength="160" placeholder="Email address *" autocomplete="email"></label>
          <label><span class="sr-only">Mobile number</span><input name="phone" type="tel" maxlength="40" placeholder="Mobile number" autocomplete="tel" class="mono"></label>
        </div>
        <label><span class="sr-only">Message</span><textarea name="message" rows="5" required maxlength="4000" placeholder="What would you like BotNira to handle — reception, bookings, after-hours, lead capture… *"></textarea></label>
        <input type="text" name="website" tabindex="-1" autocomplete="off" class="hp" aria-hidden="true">
        <input type="hidden" name="ts" value="<?= time() ?>">
        <button type="submit" class="btn btn-primary">Send message →</button>
      </form>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
