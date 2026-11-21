<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/data.php';

$page = [
    'title' => 'About BotNira — The Team Behind the AI Receptionist',
    'description' => 'Meet the founder and the engineering team behind BotNira — the AI receptionist that answers every call, chat and message 24/7 so businesses never miss a customer.',
    'path' => '/team',
    'body_class' => 'bg-cream',
];
require __DIR__ . '/includes/header.php';

$story = [
    ['graduation-cap', 'It started with a question, not a business plan',
     'Kamaljeet Singh Sidhu earned his B.Tech at Conestoga College in Brantford, Ontario. Away from home, he kept noticing the same thing everywhere he looked — small businesses losing customers not because they were bad at their work, but because nobody picked up the phone. A missed call was a missed livelihood. That quiet frustration became the thread running through everything he built next.'],
    ['globe', 'ImmiPRO — earning trust in a trust-starved industry',
     'His first venture, ImmiPRO, took on one of the hardest markets to win: immigration. Families stake their futures on the advice they receive, so credibility is everything. By being relentlessly transparent and putting client outcomes first, ImmiPRO grew into a name people recommend to their own families across India, Canada and the UK.'],
    ['building', 'The DigiSparrow — turning trust into technology',
     'Next came The DigiSparrow, a technology company now 135 team members strong, shipping AI and cloud applications for businesses around the world. Here Kamaljeet went from founder to builder of teams — engineers, designers and problem-solvers who can take a rough idea on Monday and put a working product in a customer\'s hands by Friday.'],
    ['sparkles', 'BotNira — the idea that had been waiting all along',
     'Everything converged into one product. The empathy for small businesses from his student days, the trust-first playbook from ImmiPRO, and the engineering muscle of The DigiSparrow became BotNira: an AI receptionist that answers every call, chat and message — 24/7 — so no customer is ever met with silence again.'],
    ['rocket', "Where we're headed",
     "For clients, BotNira means never losing another lead to a missed call. For partners and investors, it's a founder who has already built trusted brands across continents, backed by a 135-person engineering organisation. We're not chasing a trend. We're building the front desk that never sleeps."],
];
?>

<section class="section-b" style="background:#fff">
  <div class="container sub-hero" style="align-items:center">
    <div>
      <div class="pill pill-yellow"><?= icon('users', 14) ?> Our story</div>
      <h1 class="mt-5">The people behind the front desk that never sleeps</h1>
      <p class="lead">BotNira was built by founders and engineers who watched small businesses lose customers to a ringing phone — and decided to end it for good.</p>
      <div class="btn-row">
        <a href="/signup" class="btn btn-primary btn-sm">Start free trial <?= icon('arrow-right', 16) ?></a>
        <a href="#leadership" class="btn btn-white btn-sm">Meet the CEO</a>
      </div>
    </div>
    <div class="team-hero-img">
      <img src="/assets/img/team.jpg" alt="The BotNira team at their office" class="img-card" width="1400" height="933">
      <div class="team-badge"><strong>135+</strong><span>team members</span></div>
    </div>
  </div>
</section>

<section id="leadership" class="section">
  <div class="container ceo-grid">
    <div class="ceo-aside">
      <img src="/assets/img/ceo.jpg" alt="Kamaljeet Singh Sidhu, CEO of BotNira" class="img-card" loading="lazy" width="1200" height="800">
      <div class="card card-shadow pad-6 mt-4">
        <div class="h4">Kamaljeet Singh Sidhu</div>
        <div class="small bold c-blue">Founder &amp; CEO, BotNira</div>
        <p class="mono tiny op-70 mt-2">B.Tech, Conestoga College · Founder of ImmiPRO &amp; The DigiSparrow</p>
      </div>
    </div>
    <div>
      <div class="pill" style="box-shadow:var(--shadow);margin-bottom:0">Leadership</div>
      <h2 class="display-md mt-4">From a missed call to a mission</h2>
      <ol class="story">
        <?php foreach ($story as $i => [$ic, $t, $b]): ?>
        <li>
          <span class="icon-box icon-box-blue icon-box-lg" style="box-shadow:var(--shadow)"><?= icon($ic, 18) ?></span>
          <div>
            <div class="story-head"><span class="story-num">0<?= $i + 1 ?></span><h3 class="h4"><?= e($t) ?></h3></div>
            <p><?= e($b) ?></p>
          </div>
        </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
</section>

<section class="section" style="background:#fff;border-top:var(--line)">
  <div class="container">
    <div class="narrow-3">
      <div class="pill pill-yellow"><?= icon('users', 14) ?> The team</div>
      <h2 class="display-md mt-4">One team, obsessed with never missing a customer</h2>
      <p class="lead">Behind BotNira is a tight-knit crew from The DigiSparrow — 135 engineers, designers, product thinkers and support specialists across India, Canada and the UK. We test every feature against one question: would this have saved a real business a real customer? If not, it doesn't ship.</p>
    </div>
    <div class="grid grid-3 mt-10">
      <?php foreach ([
        ['users', 'Customer-obsessed', 'Every feature starts with a real business losing a real customer. We fix that first.'],
        ['sparkles', 'Ship fast, ship right', 'A 135-strong team that moves like a startup and delivers like an enterprise.'],
        ['globe', 'Built across borders', 'India, Canada and the UK — global from day one, local where it counts.'],
      ] as [$ic, $t, $b]): ?>
      <div class="card card-shadow card-hover pad-6 bg-cream">
        <span class="icon-box icon-box-black"><?= icon($ic, 18) ?></span>
        <h3 class="h4 mt-4"><?= e($t) ?></h3>
        <p class="small op-80 mt-2"><?= e($b) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="stats-row mt-12">
      <?php foreach ([['135+', 'Team members'], ['3', 'Countries'], ['2', 'Brands built'], ['24/7', 'Always answering']] as [$n, $l]): ?>
      <div><strong><?= e($n) ?></strong><span><?= e($l) ?></span></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section bg-blue cta-band" style="border-top:var(--line)">
  <div class="container container-4xl">
    <h2 class="display-md">Want the same team answering your phones?</h2>
    <p class="lead lead-light">Put BotNira at your front desk and never miss another customer — on calls, WhatsApp, SMS or email.</p>
    <div class="btn-row" style="justify-content:center">
      <a href="/signup" class="btn btn-yellow">Start free trial <?= icon('arrow-right', 16) ?></a>
      <a href="/#contact" class="btn btn-white">Talk to us</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
