# BotNira — website (PHP, Hostinger-ready)

The marketing site for **botnira.com**, rebuilt as plain PHP so it runs on any
Hostinger shared-hosting plan. No Node, no build step, no database.

## What's inside

| Path | What it is |
|---|---|
| `index.php` | Homepage (hero, try-live, channels, features, use cases, languages, pricing, FAQ, contact) |
| `use-case.php` | Industry pages → `/use-case/salon`, `/use-case/dental`, … |
| `solution.php` | Search landing pages → `/ai-sales-agent`, `/24-7-ai-receptionist`, … |
| `team.php`, `referrals.php`, `blog.php`, `privacy.php`, `terms.php` | Other pages |
| `login.php`, `signup.php` | Placeholders until the new app/backend is ready |
| `404.php` | Not-found page |
| `api/contact.php` | Contact / free-trial form handler (emails you + saves a CSV backup) |
| `includes/config.php` | **Phone numbers, emails, analytics IDs — edit here** |
| `includes/data.php` | **Plans, prices, FAQs, use-case and landing-page text — edit here** |
| `includes/header.php`, `footer.php` | Shared `<head>`, menu and footer |
| `assets/` | CSS, JS, images, the demo call recording |
| `.htaccess` | Clean URLs, HTTPS redirect, caching, security headers |
| `router.php` | Local testing only (`php -S localhost:8000 router.php`) |

## Deploy to Hostinger

1. hPanel → **Websites → botnira.com → File Manager** → open `public_html`.
2. Delete (or move to a backup folder) whatever the old site left there.
3. Upload the contents of this folder (or `botnira-site.zip`, then **Extract**) so that
   `index.php` and `.htaccess` sit directly inside `public_html` (not in a sub-folder).
4. hPanel → **Advanced → PHP Configuration**: choose PHP **8.1 or newer**.
5. hPanel → **Security → SSL**: make sure the free SSL is installed (the site forces HTTPS).
6. hPanel → **Emails**: create the mailbox `no-reply@botnira.com` (used as the "From" address
   for contact-form emails — see `CONTACT_FROM` in `includes/config.php`).
7. Open https://botnira.com and send yourself a test message from the contact form.

Or deploy from GitHub: hPanel → **Advanced → Git** → repository
`https://github.com/PeenuKamal/botnira.com.git`, branch `main`, directory empty (=`public_html`).
Click **Deploy** after each push, or set up the auto-deploy webhook it shows you.

## Contact-form submissions

Each submission is emailed to `CONTACT_TO` and also appended to
`storage/inquiries.csv` (blocked from the web). Download that file from File
Manager any time as a backup of every lead.

## Run locally

```
php -S localhost:8000 router.php
```
then open http://localhost:8000
