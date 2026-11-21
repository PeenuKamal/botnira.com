<?php
/**
 * BotNira — site-wide settings.
 * Edit the values here and they update everywhere on the site.
 */

if (!defined('BOTNIRA')) { define('BOTNIRA', true); }

// ---------------------------------------------------------------------------
// Site
// ---------------------------------------------------------------------------
const SITE_NAME   = 'BotNira';
const SITE_URL    = 'https://botnira.com';          // no trailing slash
const SITE_TAGLINE = 'AI Receptionist & AI Calling Software';

// Where the dashboard lives once the backend is rebuilt.
// Login / Sign-up pages use this; leave empty while the app is offline.
const APP_URL = '';

// ---------------------------------------------------------------------------
// Contact details
// ---------------------------------------------------------------------------
// AI demo phone line (Twilio number that BotNira answers)
const DEMO_PHONE         = '+12897784594';
const DEMO_PHONE_DISPLAY = '+1 (289) 778-4594';

// AI demo WhatsApp number (the bot itself)
const DEMO_WA         = '15554380584';
const DEMO_WA_DISPLAY = '+1 555-438-0584';
const DEMO_WA_TEXT    = 'Hi BotNira — how can you work for me?';

// Human team WhatsApp + email
const TEAM_WA         = '15485773855';
const TEAM_WA_DISPLAY = '+1 (548) 577 3855';
const TEAM_EMAIL      = 'kamal@botnira.com';
const SUPPORT_EMAIL   = 'support@botnira.com';

// Contact form: inquiries are emailed here
const CONTACT_TO = 'kamal@botnira.com';
// "From" address for form emails — must be a mailbox on your own domain
// (create it in Hostinger → Emails) or messages may land in spam.
const CONTACT_FROM = 'no-reply@botnira.com';

// ---------------------------------------------------------------------------
// Social
// ---------------------------------------------------------------------------
const SOCIAL = [
    'instagram' => 'https://www.instagram.com/botnira/',
    'facebook'  => 'https://www.facebook.com/people/BotNira-All-in-One-AI-Assistant/61588783825013/',
    'linkedin'  => 'https://www.linkedin.com/company/115494270/',
];

// ---------------------------------------------------------------------------
// Analytics (leave a value empty to switch that tracker off)
// ---------------------------------------------------------------------------
const GA4_ID          = 'G-QFFD17C9F7';
const GOOGLE_ADS_ID   = 'AW-18233892578';
const META_PIXEL_IDS  = ['2819935811699050', '1486120406893357'];
const CLARITY_ID      = 'x381r3gmyr';
const GOOGLE_SITE_VERIFICATION = 'google0ccafe5ed72c4ac8';

// ---------------------------------------------------------------------------
// Helpers
// ---------------------------------------------------------------------------

/** HTML-escape a value for output. */
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Link to a page on this site, e.g. url('/privacy'). */
function url(string $path = '/'): string
{
    return $path === '' ? '/' : $path;
}

/** Absolute URL, used for canonical / Open Graph tags. */
function abs_url(string $path = '/'): string
{
    return SITE_URL . $path;
}

/** Cache-busted asset URL, e.g. asset('css/style.css'). */
function asset(string $path): string
{
    $file = __DIR__ . '/../assets/' . $path;
    $v = is_file($file) ? filemtime($file) : '1';
    return '/assets/' . $path . '?v=' . $v;
}

function wa_link(string $number, string $text = ''): string
{
    return 'https://wa.me/' . $number . ($text !== '' ? '?text=' . rawurlencode($text) : '');
}
