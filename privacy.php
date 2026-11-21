<?php
require_once __DIR__ . '/includes/config.php';
$page = [
    'title' => 'Privacy Policy — BotNira',
    'description' => 'How BotNira collects, uses, stores and protects business and customer data, including WhatsApp and Google Calendar data.',
    'path' => '/privacy',
    'nav' => 'simple',
];
require __DIR__ . '/includes/header.php';
const PRIVACY_UPDATED = '2026-11-21';
?>
<article class="container container-3xl legal">
  <div class="eyebrow">Legal</div>
  <h1>Privacy Policy</h1>
  <p class="mono small muted">Last updated: <?= PRIVACY_UPDATED ?></p>

  <p class="mt-8">BotNira ("we", "our", "us", operated by <strong>The Digi Sparrow</strong>) provides an AI-powered receptionist platform that lets businesses ("Vendors") answer customer inquiries and book appointments across channels including web chat, WhatsApp, SMS and email, and integrates with third-party tools such as Google Calendar. This Privacy Policy explains what information we collect, how we use it, and the choices you have.</p>

  <h2><span>1.</span>Who is covered by this policy</h2>
  <ul>
    <li><strong>Vendors</strong> — businesses who sign up for a BotNira workspace.</li>
    <li><strong>End users</strong> — individuals who chat, call, message or email a Vendor whose front desk runs on BotNira.</li>
  </ul>
  <p>Vendors are the <em>Data Controllers</em> of their End users' conversations. BotNira acts as the <em>Data Processor</em> on their behalf.</p>

  <h2><span>2.</span>Information we collect</h2>
  <p><strong>From Vendors at sign-up and while using the service</strong></p>
  <ul>
    <li>Full name, business name, work email, hashed password</li>
    <li>Business description, FAQs and tone settings entered into the bot settings</li>
    <li>Channel credentials you connect (WhatsApp Business Account IDs, phone number IDs, access tokens issued by Meta)</li>
    <li>Billing information processed by our payment provider (we never store card numbers)</li>
  </ul>
  <p><strong>From End users (customers who contact your business)</strong></p>
  <ul>
    <li>Their name and phone number or email when provided (including WhatsApp profile name)</li>
    <li>The text of each message they exchange with BotNira</li>
    <li>Basic metadata: channel, timestamps, message delivery status</li>
  </ul>
  <p><strong>From visitors to botnira.com</strong></p>
  <ul>
    <li>Details you submit through our contact form (name, business, email, phone, message)</li>
    <li>Standard server logs (IP address, user agent, pages requested)</li>
    <li>Analytics and advertising cookies (Google Analytics, Meta Pixel, Microsoft Clarity) used to measure and improve our marketing</li>
  </ul>

  <h2><span>3.</span>How we use the information</h2>
  <ul>
    <li><strong>Deliver the service</strong> — route messages to and from the Vendor's trained bot, show conversations in the Inbox, schedule appointments.</li>
    <li><strong>Ground the Vendor's bot</strong> — we send the Vendor's business description and FAQs (never End-user data from other Vendors) to our AI provider as context.</li>
    <li><strong>Billing &amp; usage metering</strong> — count messages, minutes and appointments for the Vendor's plan.</li>
    <li><strong>Security &amp; abuse prevention</strong> — rate-limit, detect fraud and audit access.</li>
    <li><strong>Respond to inquiries</strong> — reply to messages sent through our contact form.</li>
  </ul>
  <p>We do <strong>not</strong> sell End-user data. We do not use End-user data to train general-purpose AI models.</p>

  <h2><span>4.</span>Third-party processors</h2>
  <p>To run BotNira we share the minimum necessary data with:</p>
  <ul>
    <li><strong>Meta Platforms Inc.</strong> — WhatsApp Business Cloud API (receiving and sending messages).</li>
    <li><strong>Our AI provider</strong> — to generate replies (we send the Vendor's business info and the current conversation only).</li>
    <li><strong>Telephony and email providers</strong> — to place and receive calls, SMS and email.</li>
    <li><strong>Hosting and database providers</strong> — to store data securely.</li>
    <li><strong>Payment processor</strong> — to process payments (we never see full card numbers).</li>
  </ul>
  <p>Each processor is contractually bound to handle data only on our instructions and in line with applicable data-protection laws.</p>

  <h2><span>5.</span>WhatsApp data (required disclosure)</h2>
  <p>When a Vendor connects their WhatsApp number to BotNira through Meta's Embedded Signup, we receive the WhatsApp Business Account ID, Phone Number ID and an access token scoped to that Vendor's account.</p>
  <ul>
    <li>We use these tokens <strong>only</strong> to send and receive messages on behalf of the Vendor.</li>
    <li>Message content is stored in our database for the Vendor to view in their Inbox.</li>
    <li>We do not share WhatsApp message content with any third party other than the AI provider listed above, and only to generate an immediate reply.</li>
    <li>A Vendor can disconnect WhatsApp at any time from <em>Channels → WhatsApp → Disconnect</em>; tokens are revoked and no further messages flow through BotNira.</li>
  </ul>

  <h2><span>6.</span>Google user data (Google Calendar integration)</h2>
  <p>If a Vendor chooses to connect their Google Calendar, BotNira requests access to that Vendor's Google Account through Google's OAuth 2.0 consent screen. This section explains how BotNira accesses, uses, stores and shares Google user data, in line with the <a href="https://developers.google.com/terms/api-services-user-data-policy" target="_blank" rel="noopener">Google API Services User Data Policy</a>.</p>
  <p><strong>Scopes we request and why</strong></p>
  <ul>
    <li><code>.../auth/calendar</code> — to read the Vendor's busy/free times and existing events (so the AI receptionist never double-books) and to create, update and delete appointment events that BotNira books on the Vendor's behalf.</li>
    <li><code>.../auth/userinfo.email</code> and <code>openid</code> — to identify which Google Account was connected and show that email in the Vendor's dashboard.</li>
  </ul>
  <p><strong>How we access it</strong> — only after the Vendor explicitly grants consent on Google's screen, and only for that Vendor's own Google Account. End users who book appointments never connect their Google accounts.</p>
  <p><strong>How we use it</strong> — to calculate real-time availability, to create and manage events for appointments booked through BotNira, and to display the connected account's email.</p>
  <p><strong>How we store it</strong> — OAuth tokens are stored in our secured backend database, encrypted in transit and at rest, never exposed to client-side code and never accessible to any other Vendor.</p>
  <p><strong>How we share it</strong> — we do <strong>not</strong> sell, rent or transfer Google user data to third parties, and we do <strong>not</strong> use it to develop, improve or train generalised AI/ML models.</p>
  <p><strong>Limited Use.</strong> BotNira's use and transfer of information received from Google APIs adheres to the <a href="https://developers.google.com/terms/api-services-user-data-policy#additional_requirements_for_specific_api_scopes" target="_blank" rel="noopener">Google API Services User Data Policy</a>, including the Limited Use requirements.</p>
  <p><strong>Revoking access &amp; deletion</strong> — a Vendor can disconnect Google Calendar at any time, which deletes the stored tokens. Access can also be revoked at <a href="https://myaccount.google.com/permissions" target="_blank" rel="noopener">myaccount.google.com/permissions</a>. On disconnection or workspace deletion, stored Google tokens and cached calendar data are permanently deleted within 30 days.</p>

  <h2><span>7.</span>How long we keep data</h2>
  <ul>
    <li><strong>Conversations &amp; transcripts</strong>: kept while the Vendor's workspace is active. Vendors can delete individual conversations at any time.</li>
    <li><strong>Billing records</strong>: 7 years (legal requirement).</li>
    <li>When a Vendor deletes their workspace, all associated conversations, messages, appointments and integration tokens are permanently deleted within 30 days.</li>
  </ul>

  <h2><span>8.</span>Your rights</h2>
  <p>Depending on where you live (GDPR, PIPEDA, CCPA), you have the right to:</p>
  <ul>
    <li>Access a copy of your data</li>
    <li>Correct inaccurate data</li>
    <li>Request deletion</li>
    <li>Object to processing or withdraw consent</li>
    <li>Port your data to another provider</li>
  </ul>
  <p>End users should direct requests to the Vendor they interacted with (the Data Controller). Vendors can email us directly — see below — and we respond within 30 days.</p>

  <h2><span>9.</span>Security</h2>
  <p>We encrypt data in transit (TLS 1.2+) and at rest. Access tokens are stored only in our backend, never in client-side code. Production access is restricted to a small number of authorised engineers and logged.</p>

  <h2><span>10.</span>International transfers</h2>
  <p>BotNira is operated from Canada. Data may be transferred to and processed in the United States and the European Union by our sub-processors, each under appropriate safeguards such as Standard Contractual Clauses.</p>

  <h2><span>11.</span>Children</h2>
  <p>BotNira is not directed at children under 16 and we do not knowingly collect their data.</p>

  <h2><span>12.</span>Changes to this policy</h2>
  <p>If we materially change this policy we'll notify active Vendors by email 30 days before the change takes effect.</p>

  <h2><span>13.</span>Contact us</h2>
  <p>Data protection queries: <strong>privacy@thedigisparrow.com</strong><br>Mailing: The Digi Sparrow, Ontario, Canada</p>

  <div class="legal-foot">This Privacy Policy is written to comply with Meta Platforms' WhatsApp Business API terms (see the <a href="https://www.whatsapp.com/legal/business-policy" target="_blank" rel="noopener">WhatsApp Business Policy</a>) and applicable data-protection laws including GDPR and PIPEDA.</div>
</article>
<?php require __DIR__ . '/includes/footer.php'; ?>
