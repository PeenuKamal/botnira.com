<?php
/** Site footer + scripts. Include at the bottom of every page. */
require_once __DIR__ . '/data.php';
$footerMode = $page['footer'] ?? 'full';
?>
</main>
<?php if ($footerMode !== 'none'): ?>
<footer class="footer">
  <div class="container footer-grid">
    <div>
      <a href="/" class="brand brand-dark"><img src="/assets/img/botnira-mark.png" width="32" height="32" alt=""><span>BotNira</span></a>
      <p class="footer-about">AI receptionist &amp; AI calling software for every business. Voice, WhatsApp, SMS, email and chat — answered 24/7.</p>
      <div class="footer-label">Follow us</div>
      <div class="social">
        <a href="<?= e(SOCIAL['instagram']) ?>" target="_blank" rel="me noopener" aria-label="BotNira on Instagram"><?= icon('instagram', 16) ?></a>
        <a href="<?= e(SOCIAL['facebook']) ?>" target="_blank" rel="me noopener" aria-label="BotNira on Facebook"><?= icon('facebook', 16) ?></a>
        <a href="<?= e(SOCIAL['linkedin']) ?>" target="_blank" rel="me noopener" aria-label="BotNira on LinkedIn"><?= icon('linkedin', 16) ?></a>
      </div>
    </div>
    <div>
      <div class="footer-label">Use cases</div>
      <ul>
        <?php foreach (array_slice($USE_CASES, 0, 6, true) as $slug => $u): ?>
        <li><a href="/use-case/<?= e($slug) ?>">AI for <?= e($u['industry']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div>
      <div class="footer-label">Product</div>
      <ul>
        <li><a href="/#features">Features</a></li>
        <li><a href="/#channels">Channels</a></li>
        <li><a href="/#pricing">Pricing</a></li>
        <li><a href="/referrals">Referrals · earn 15%</a></li>
        <li><a href="/24-7-ai-receptionist">24/7 AI Receptionist</a></li>
        <li><a href="/whatsapp-ai-assistant">WhatsApp AI Assistant</a></li>
        <li><a href="/ai-sales-agent">AI Sales Agent</a></li>
        <li><a href="/ai-appointment-booking-software">AI Appointment Booking</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-label">Company</div>
      <ul>
        <li><a href="/team">Our team</a></li>
        <li><a href="/blog">Blog</a></li>
        <li><a href="/#faq">FAQ</a></li>
        <li><a href="/#contact">Contact</a></li>
        <li><a href="/login">Log in</a></li>
        <li><a href="/signup">Start free trial</a></li>
        <li><a href="/privacy">Privacy</a></li>
        <li><a href="/terms">Terms</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container footer-bottom-inner">
      <span>© <?= date('Y') ?> BotNira · AI Receptionist &amp; AI Calling Software · All rights reserved by THE DIGISPARROW, Hamilton, ON, Canada.</span>
      <span>Built for front desks that sleep.</span>
    </div>
  </div>
</footer>
<?php endif; ?>
<script src="<?= asset('js/main.js') ?>" defer></script>
</body>
</html>
