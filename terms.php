<?php
require_once __DIR__ . '/includes/config.php';
$page = [
    'title' => 'Terms of Service — BotNira',
    'description' => 'The terms that govern your use of BotNira, the AI receptionist platform operated by The Digi Sparrow.',
    'path' => '/terms',
    'nav' => 'simple',
];
require __DIR__ . '/includes/header.php';
const TERMS_UPDATED = '2026-11-21';
?>
<article class="container container-3xl legal">
  <div class="eyebrow">Legal</div>
  <h1>Terms of Service</h1>
  <p class="mono small muted">Last updated: <?= TERMS_UPDATED ?></p>

  <p class="mt-8">These Terms of Service ("Terms") govern your access to and use of BotNira (the "Service"), operated by <strong>The Digi Sparrow</strong> ("BotNira", "we", "our"). By creating an account or using the Service you agree to these Terms. If you do not agree, do not use BotNira.</p>

  <h2><span>1.</span>The service</h2>
  <p>BotNira is an AI receptionist platform. Businesses ("Vendors") configure a branded AI assistant using their own business information and connect it to channels such as web chat, WhatsApp, SMS, email and voice calls. The AI answers inbound customer messages and books appointments on the Vendor's behalf.</p>

  <h2><span>2.</span>Eligibility and account</h2>
  <ul>
    <li>You must be at least 18 years old and legally able to enter into a contract.</li>
    <li>You must provide accurate sign-up information and keep your credentials secure.</li>
    <li>You are responsible for all activity on your workspace, including team members you invite.</li>
    <li>One account per business; sharing accounts is not permitted.</li>
  </ul>

  <h2><span>3.</span>Acceptable use</h2>
  <p>You agree <strong>not</strong> to use BotNira to:</p>
  <ul>
    <li>Send unsolicited marketing ("spam") over WhatsApp, SMS, email or voice.</li>
    <li>Impersonate any person or entity, including other businesses.</li>
    <li>Collect, store or sell another person's personal data without their consent.</li>
    <li>Violate Meta's <a href="https://www.whatsapp.com/legal/business-policy" target="_blank" rel="noopener">WhatsApp Commerce &amp; Business Policies</a>, including promotion of prohibited goods or services.</li>
    <li>Deceive customers into believing they are talking to a human when the reply is AI-generated (we recommend disclosing this in your bot's greeting).</li>
    <li>Harass, threaten or harm any individual.</li>
    <li>Use the Service in connection with unlawful activity of any kind.</li>
    <li>Attempt to reverse-engineer, scrape or overwhelm the Service.</li>
  </ul>
  <p>We may suspend or terminate any account that violates these rules, with or without notice. We also comply with valid legal requests and Meta's enforcement actions.</p>

  <h2><span>4.</span>Channels &amp; third-party services</h2>
  <p>Some channels require you to authorise BotNira with a third-party provider (for example Meta WhatsApp or a payment processor). You agree to follow those providers' terms when using them through BotNira. If a provider suspends your access for policy violations, BotNira's ability to deliver that channel pauses until it is reinstated.</p>

  <h2><span>5.</span>Content ownership and licence</h2>
  <ul>
    <li>You keep ownership of all content you create on BotNira — business descriptions, FAQs, message history, appointments and recordings.</li>
    <li>You grant BotNira a limited, worldwide licence to process that content solely to operate the Service on your behalf.</li>
    <li>You confirm you have the rights to all content you upload and the right to respond to customers messaging you on BotNira-managed channels.</li>
  </ul>

  <h2><span>6.</span>Pricing, billing and refunds</h2>
  <ul>
    <li>Plans are billed monthly in advance. Prices are shown in USD; 13% HST is added at checkout.</li>
    <li>Plans stop at their included limits; extra usage is bought as one-time top-up packs.</li>
    <li>You can cancel at any time from your settings; you remain responsible for charges already incurred.</li>
    <li>We do not offer prorated refunds for partial months, unless required by law.</li>
    <li>We may update pricing with 30 days' notice by email to your registered address.</li>
  </ul>

  <h2><span>7.</span>AI output — no warranty of accuracy</h2>
  <p>BotNira uses large language models to generate replies. While we ground responses in the Vendor's business description and FAQs, AI output may still contain errors. You are responsible for the accuracy of the business information you provide and for monitoring your bot's conversations. BotNira is not liable for decisions your customers make based on AI-generated replies.</p>

  <h2><span>8.</span>Availability</h2>
  <p>We aim for 99.5% monthly uptime but do not guarantee uninterrupted service. Planned maintenance will be announced in advance. BotNira is provided "as is" without warranties of any kind, express or implied, including fitness for a particular purpose.</p>

  <h2><span>9.</span>Limitation of liability</h2>
  <p>To the maximum extent permitted by law, BotNira's total liability in connection with the Service is limited to the fees you paid us in the 12 months before the claim. We are not liable for indirect, incidental, consequential, special or punitive damages, including loss of profits, revenue, data or business opportunities.</p>

  <h2><span>10.</span>Termination</h2>
  <p>Either party may end these Terms at any time. On termination your access stops and we delete your data within 30 days (except records we must keep by law).</p>

  <h2><span>11.</span>Changes to these terms</h2>
  <p>We may update these Terms. Material changes will be emailed to active Vendors at least 30 days before they take effect. Continued use after that date means you accept them.</p>

  <h2><span>12.</span>Governing law</h2>
  <p>These Terms are governed by the laws of the Province of Ontario, Canada, without regard to conflict-of-law rules. Any dispute will be resolved in the courts of Ontario.</p>

  <h2><span>13.</span>Contact</h2>
  <p>Questions: <strong>hello@thedigisparrow.com</strong><br>Legal notices: <strong>legal@thedigisparrow.com</strong></p>
</article>
<?php require __DIR__ . '/includes/footer.php'; ?>
