<section class="section-b bg-black">
  <div class="container channels-band">
    <?php foreach ([['globe', 'Web Widget'], ['message-circle', 'WhatsApp'], ['phone', 'Voice calls'], ['message-square', 'SMS · US/CA'], ['mail', 'Email']] as [$ic, $l]): ?>
    <div><?= icon($ic, 20) ?><span><?= e($l) ?></span></div>
    <?php endforeach; ?>
  </div>
</section>
