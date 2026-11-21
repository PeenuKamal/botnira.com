<?php
/**
 * BotNira — site content.
 * All text that repeats across pages lives here. Edit once, it updates everywhere.
 */

// ---------------------------------------------------------------------------
// Pricing plans (USD / month)
// ---------------------------------------------------------------------------
const TAX_RATE  = 0.13;   // 13% HST
const TAX_LABEL = '13% HST';
const TRIAL_DAYS = 5;

$PLANS = [
    ['id' => 'basic',   'name' => 'Basic',   'price' => 29,  'minutes' => 0,    'messages' => 1000,  'tagline' => 'Web + chat-only starter',            'channels' => 'WhatsApp · Web · Email'],
    ['id' => 'starter', 'name' => 'Starter', 'price' => 49,  'minutes' => 100,  'messages' => 2000,  'tagline' => 'Solo & side-hustle receptionists',   'channels' => 'Voice · WhatsApp · Web · Email · SMS'],
    ['id' => 'growth',  'name' => 'Growth',  'price' => 149, 'minutes' => 500,  'messages' => 8000,  'tagline' => 'Most businesses pick this',          'channels' => 'Voice · WhatsApp · Web · Email · SMS', 'featured' => true, 'sales' => true],
    ['id' => 'pro',     'name' => 'Pro',     'price' => 399, 'minutes' => 1500, 'messages' => 25000, 'tagline' => 'Clinics, agencies, multi-location',  'channels' => 'Voice · WhatsApp · Web · Email · SMS', 'sales' => true],
];

// ---------------------------------------------------------------------------
// Homepage FAQ
// ---------------------------------------------------------------------------
$FAQS = [
    ['q' => 'What is an AI receptionist and how does it work?',
     'a' => "An AI receptionist is a virtual front-desk agent that answers customer phone calls, WhatsApp messages, SMS, emails and website chats on your behalf, 24/7. BotNira is trained on your business description and FAQs, so it answers only with your information. It can book appointments, capture leads, and hand off to a human when needed."],
    ['q' => 'Can BotNira answer phone calls instead of a real receptionist?',
     'a' => "Yes. BotNira connects to a business phone number and answers inbound calls in a natural voice, handles customer inquiries, and books appointments. Voice calling uses prepaid minutes included in every plan, with auto-pause when you hit your limit so you never get a surprise bill."],
    ['q' => 'How does BotNira integrate with WhatsApp Business?',
     'a' => "We use the official Meta WhatsApp Cloud API via Embedded Signup. In about 90 seconds you connect your WhatsApp Business number, and BotNira wires up the webhook and goes live. Your conversations appear in a unified Inbox alongside web chat and SMS."],
    ['q' => 'How much does BotNira cost per month?',
     'a' => "Four monthly plans in USD: Basic \$29 (1,000 AI messages, WhatsApp + Web + Email only), Starter \$49 (100 voice min + 2,000 AI messages), Growth \$149 (500 min + 8,000 messages) and Pro \$399 (1,500 min + 25,000 messages). Starter and above include every channel. Top-up packs start at \$125 and never expire. Every new business gets a 5-day free trial with no credit card required."],
    ['q' => 'Is my customer data safe with BotNira?',
     'a' => "Yes. Each business lives in its own isolated workspace and customer data never crosses between businesses. Messages are encrypted in transit, stored with role-based access, and only the minimum data needed to generate a reply is shared with our AI engine. See our Privacy Policy for full details."],
    ['q' => 'Can I try BotNira for free before I pay?',
     'a' => "Absolutely. Every new sign-up gets a 5-day free trial on the Web Widget and WhatsApp channel — up to 100 AI messages, no credit card required. Voice, Email and SMS unlock when you subscribe to a paid plan."],
    ['q' => 'How does BotNira compare to traditional call-center software?',
     'a' => "Traditional call centers charge per agent (\$200–\$500 per seat per month) and only cover phone calls. BotNira is one AI that covers phone, WhatsApp, email, SMS and web chat at a flat monthly rate, with no per-seat pricing. It handles one call or many at the same time without hiring more staff."],
    ['q' => 'Does BotNira work for multi-location businesses and agencies?',
     'a' => "Yes. A single admin can onboard and manage many businesses, each with its own isolated workspace, bot training, phone number and analytics. Agencies use BotNira to resell AI receptionist services to their own clients."],
    ['q' => 'What languages does BotNira support?',
     'a' => "BotNira speaks every major world language — English, Spanish, French, German, Portuguese, Italian, Hindi, Punjabi, Arabic, Chinese, Japanese and 90+ others. Train it once in your own language and it replies in whatever language your customer writes in."],
    ['q' => 'Can a human take over a conversation if the AI can\'t help?',
     'a' => "Yes. Every conversation on every channel lands in a unified Inbox. Your team can jump in at any time, type a reply, and it goes back to the customer on the same channel."],
];

// ---------------------------------------------------------------------------
// Languages shown on the homepage
// ---------------------------------------------------------------------------
$LANGUAGES = ['English', 'Español', 'Français', 'Deutsch', 'Italiano', 'Português', 'हिन्दी', 'ਪੰਜਾਬੀ', 'العربية', '中文',
              '日本語', '한국어', 'Русский', 'Türkçe', 'Nederlands', 'Polski', 'فارسی', 'ไทย', 'Tiếng Việt', 'Tagalog'];

// ---------------------------------------------------------------------------
// Example results (homepage). These are illustrative scenarios, not reviews.
// When you have real, consent-backed customer stories, add 'name',
// 'business' and 'quote' keys and set 'real' => true — the card layout
// switches to a testimonial automatically.
// ---------------------------------------------------------------------------
$RESULTS = [
    ['industry' => 'Auto repair shop', 'icon' => 'wrench',
     'story' => 'Mechanics are under a car when the phone rings. BotNira picks up, captures the vehicle and the problem, and books a bay.',
     'before' => [['Missed calls', '35–40 / week'], ['Lost booking requests', '15+ / month']],
     'after'  => [['Calls answered', 'Every call'], ['Booked automatically', 'Day or night']]],
    ['industry' => 'Dental clinic', 'icon' => 'stethoscope',
     'story' => 'Front-desk staff spend hours on repeat questions. BotNira handles bookings, cancellations and FAQs so staff focus on patients.',
     'before' => [['Daily calls', '~55'], ['Phone time', '4+ hrs / day']],
     'after'  => [['Reply time', 'Seconds'], ['Staff phone time', 'Cut sharply']]],
    ['industry' => 'Driving school', 'icon' => 'graduation-cap',
     'story' => 'Students and parents message after office hours. BotNira answers instantly and books trial lessons straight into the calendar.',
     'before' => [['Missed enquiries', '~25 / week'], ['Follow-ups', 'Manual, daily']],
     'after'  => [['Leads captured', 'All of them'], ['Trial lessons', 'Self-booked']]],
    ['industry' => 'Healthcare clinic', 'icon' => 'calendar',
     'story' => 'After-hours calls used to go to voicemail. BotNira answers, triages routine vs urgent, and books the next open slot.',
     'before' => [['After-hours calls missed', '30+ / month'], ['Booking delay', '1–2 days']],
     'after'  => [['Availability', '24/7'], ['Admin work', 'Much lighter']]],
];

// ---------------------------------------------------------------------------
// Industry use-case pages  →  /use-case/{slug}
// ---------------------------------------------------------------------------
$USE_CASES = [
    'salon' => [
        'icon' => 'scissors', 'industry' => 'Salon & Spa', 'noun' => 'salon',
        'seo' => [
            'title' => 'AI Receptionist for Salons & Spas | BotNira — Books Haircuts & Facials 24/7',
            'description' => 'BotNira is an AI receptionist built for hair salons, beauty bars and spas. Books appointments via chat, WhatsApp and phone, handles cancellations, sends reminders.',
            'keywords' => 'ai receptionist for salon, salon booking ai, ai chatbot for hair salon, spa appointment ai, beauty salon virtual receptionist, after hours salon booking',
        ],
        'eyebrow' => 'For Salons, Spas & Beauty Bars',
        'h1' => "Your salon's AI receptionist — books appointments while you cut hair.",
        'sub' => "BotNira answers every call, WhatsApp and DM the moment it lands. Books haircuts, facials, waxing and colour appointments — even when you're with a client. Sends reminders, handles cancellations, remembers stylist preferences.",
        'stat' => ['kpi' => 'After 6pm', 'label' => 'is when many salon bookings are requested — when nobody is at the front desk.'],
        'why' => [
            ['Stop missing after-hours bookings', "Beauty bookings pile up in the evening and on weekends. If your phone goes to voicemail, the customer books with the salon down the street. BotNira picks up every time, day or night."],
            ['Never double-book a stylist', "BotNira checks your live calendar before confirming. If Maria is busy at 2pm Saturday, it offers Priya at 2:15 instead. Customers leave with a real time slot, not a 'we'll call you back'."],
            ['Reschedule without drama', "Cancellations and changes are handled automatically. The freed slot opens up, and BotNira can fill it from your waitlist."],
            ['Memory for repeat clients', "BotNira remembers that Sarah always books Tuesday with Anna for highlights — and offers her usual appointment in two messages."],
        ],
        'workflow' => [
            "Customer texts your salon's WhatsApp or opens the chat on your site",
            'BotNira asks for service, preferred date and stylist — in their language',
            'Checks your live calendar and offers the closest matching slot',
            'Confirms, sends reminders 24h + 2h before, and adds it to your dashboard',
        ],
        'faqs' => [
            ['Will BotNira replace my front-desk staff?', 'No. BotNira handles routine bookings and questions, freeing your front desk to focus on in-person clients and upsells. Staff can take over any conversation in one click.'],
            ['Does it work for multi-location salons?', 'Yes. BotNira can route customers to the nearest branch by city or postal code, and each branch keeps its own calendar.'],
            ['Can it sell gift cards and packages?', 'Yes. Add your packages to your business profile once and BotNira mentions them when relevant — for example when a customer asks about pricing for several services.'],
            ['What languages does it speak?', 'Every major language — including Spanish, Portuguese, French, Hindi, Punjabi, Arabic, Mandarin and 90+ others. Customers get answers in whatever language they wrote in.'],
        ],
    ],
    'dental' => [
        'icon' => 'stethoscope', 'industry' => 'Dental Clinic', 'noun' => 'dental clinic',
        'seo' => [
            'title' => 'AI Receptionist for Dental Clinics | BotNira — Patient Intake & Booking 24/7',
            'description' => 'BotNira is AI for dental practices. Books cleanings, triages emergencies, captures insurance info and sends reminders — across phone, WhatsApp and web chat.',
            'keywords' => 'ai receptionist for dental clinic, dental appointment ai, dental chatbot, dentist virtual receptionist, dental practice automation, after hours dental booking',
        ],
        'eyebrow' => 'For Dental Clinics',
        'h1' => 'An AI receptionist for your dental practice — never miss a new patient.',
        'sub' => 'BotNira answers every call and message. Books cleanings, root canals and emergency consultations. Captures insurance details, runs intake, and books before the patient picks another clinic.',
        'stat' => ['kpi' => '1 call', 'label' => 'missed can mean one patient lost — along with years of cleanings and treatment.'],
        'why' => [
            ['Capture every emergency call', "Dental emergencies don't wait for office hours. BotNira triages — broken tooth gets a same-day slot, a routine cleaning gets the next available — and books accordingly."],
            ['Insurance intake on autopilot', 'BotNira asks for insurance provider, member ID and policy details upfront. Your front desk starts with a complete file, not a half-filled form.'],
            ['Fewer no-shows', 'Automatic reminders 48h, 24h and 2h before the appointment. Patients confirm or reschedule with one tap — no phone tag.'],
            ['Keeps patient data safe', 'Conversations are encrypted in transit and stored in a workspace isolated to your clinic. Patient data is never used to train AI models.'],
        ],
        'workflow' => [
            'Patient calls or texts your clinic',
            'BotNira identifies the reason for the visit and asks for insurance info',
            'Books the right slot from your calendar — cleaning or emergency',
            'Sends reminders, accepts reschedules, hands the file to your team',
        ],
        'faqs' => [
            ['Is BotNira HIPAA compliant?', 'BotNira follows HIPAA-aligned practices: encryption in transit and at rest, workspace isolation, role-based access, and no use of patient conversations for AI training. For a signed BAA, contact our team.'],
            ['Can it handle several dentists in one clinic?', 'Yes. Each dentist has their own calendar, and BotNira routes patients to the right one based on procedure or preference.'],
            ['What about patient-records integration?', 'BotNira pushes booking and intake data into your dashboard. Direct integrations with Dentrix, OpenDental and Eaglesoft are on our roadmap — talk to us if you need one.'],
            ['Does it call patients back?', 'If a call comes in after hours and the patient asks for a callback, your team gets a notification and the full transcript the next morning.'],
        ],
    ],
    'auto-repair' => [
        'icon' => 'wrench', 'industry' => 'Auto Repair & Trades', 'noun' => 'auto repair shop',
        'seo' => [
            'title' => 'AI Receptionist for Auto Repair Shops & Mechanics | BotNira',
            'description' => 'BotNira books service appointments for auto repair shops, mechanics and tire centres. Handles quotes, dispatches mobile technicians and captures vehicle info — 24/7.',
            'keywords' => 'ai receptionist for auto repair, mechanic chatbot, auto shop booking ai, tire center virtual receptionist, mobile mechanic dispatch ai, after hours auto repair booking',
        ],
        'eyebrow' => 'For Auto Repair, Mechanics & Trades',
        'h1' => 'Stop losing service jobs to voicemail — BotNira books them while you wrench.',
        'sub' => 'Hands greasy? Phone ringing? BotNira picks up every call and WhatsApp. Captures make, model, year and the issue, then books a service slot. Dispatches mobile mechanics and quotes simple jobs instantly.',
        'stat' => ['kpi' => 'First', 'label' => 'shop to pick up usually wins the job when a car breaks down.'],
        'why' => [
            ['Capture the customer in the moment', 'When a car breaks down, the first shop that answers wins the job. BotNira always answers.'],
            ['Quote simple jobs in seconds', 'Oil change, tire rotation, brake pads — BotNira knows your standard prices and quotes instantly. The customer books on the spot.'],
            ['Triage emergency vs routine', 'Stranded or overheating gets an expedited slot. A routine service gets the next available. The queue keeps moving.'],
            ['Vehicle info upfront', 'Make, model, year, VIN, mileage and the symptoms — collected before the customer arrives, so your bay starts on the diagnosis.'],
        ],
        'workflow' => [
            'Customer calls or messages with a problem',
            'BotNira asks for vehicle details and symptoms',
            "Quotes if it's a standard job, or schedules a diagnostic",
            'Books a bay and sends the address and arrival window',
        ],
        'faqs' => [
            ['Will it put off customers who want a real person?', "No. BotNira sounds natural and says upfront that it's an AI. Customers can ask for a human anytime — you get the live transcript and can take over instantly."],
            ['Can it dispatch mobile mechanics?', 'Yes. It captures the location, books a 30-minute arrival window, and notifies your nearest available technician.'],
            ['Does it handle parts pricing?', "Add your service catalogue once and BotNira quotes from it. For complex jobs it says a technician will call back with a quote."],
            ['Can it run several shop locations?', 'Yes — it routes by postal code or city to your nearest shop.'],
        ],
    ],
    'real-estate' => [
        'icon' => 'building', 'industry' => 'Real Estate', 'noun' => 'real estate team',
        'seo' => [
            'title' => 'AI Receptionist for Real Estate Agents & Brokerages | BotNira',
            'description' => 'BotNira qualifies leads, books property tours, answers listing questions and captures buyer preferences — across web chat, WhatsApp, voice and SMS. Built for realtors.',
            'keywords' => 'ai receptionist for real estate, realtor chatbot, real estate lead qualification ai, property tour booking ai, buyer agent virtual assistant, after hours realtor',
        ],
        'eyebrow' => 'For Realtors & Brokerages',
        'h1' => "Qualify leads & book property tours while you're showing other listings.",
        'sub' => 'BotNira replies to every web-form lead in seconds — well before they call another agent. Qualifies budget, area, timeline and financing readiness, then books tours straight into your calendar.',
        'stat' => ['kpi' => '5 min', 'label' => 'is the window that matters — leads contacted fast are far more likely to convert.'],
        'why' => [
            ['Beat the 5-minute rule', 'Leads contacted within minutes convert far better than leads called back the next day. BotNira responds in seconds, every time.'],
            ['Qualify before you waste a tour', 'BotNira asks about budget, area, timeline and pre-approval, so you only show up for serious buyers.'],
            ['Book tours that show', 'Reminders and live calendar checks mean fewer double-bookings and no-shows.'],
            ["Speak every buyer's language", 'Fluent replies in Spanish, Mandarin, Punjabi and 90+ more — useful when your buyers prefer their own language.'],
        ],
        'workflow' => [
            'Lead fills your contact form, calls, or sends a WhatsApp',
            'BotNira qualifies — budget, area, timeline, financing',
            'Books a property tour from your live calendar',
            'Sends listing details, sends reminders, hands you a hot lead',
        ],
        'faqs' => [
            ['Can BotNira pull MLS listings?', 'Today it answers from the listings you add to your business profile. MLS integration is on the roadmap — talk to us if you need it.'],
            ['Does it integrate with my CRM?', 'Every qualified lead is saved as a structured record (name, phone, email, budget, timeline, area) you can export. Native CRM integrations are on the roadmap.'],
            ['Can I take over a hot conversation?', 'Yes. The unified inbox lets you jump in mid-chat any time.'],
            ['Will it call leads back?', 'BotNira focuses on inbound conversations. Outbound calling is available on Growth and Pro plans through the Sales Assistant.'],
        ],
    ],
    'restaurant' => [
        'icon' => 'shopping-bag', 'industry' => 'Restaurant', 'noun' => 'restaurant',
        'seo' => [
            'title' => 'AI Receptionist for Restaurants — Reservations & Menu Q&A | BotNira',
            'description' => 'BotNira takes reservations, answers menu and dietary questions, and handles takeout orders and special requests — across phone, WhatsApp and your website.',
            'keywords' => 'ai receptionist for restaurants, restaurant chatbot, reservation ai, takeout ordering ai, menu questions chatbot, restaurant phone automation',
        ],
        'eyebrow' => 'For Restaurants & Cafés',
        'h1' => 'Reservations, menu questions, takeout — all handled while you cook.',
        'sub' => 'BotNira answers every reservation call and DM. Knows your menu, allergens, hours, parking and specials. Books tables and takes simple takeout orders.',
        'stat' => ['kpi' => 'Peak hours', 'label' => 'are exactly when reservation calls go unanswered — your team is busy serving.'],
        'why' => [
            ['Reservations land during service', 'Friday 7pm — your host is seating tables, not answering phones. BotNira handles every call and locks in the booking.'],
            ['Menu and dietary expert on call', "What's gluten-free? Is the soup vegan? Does the curry have nuts? BotNira knows your menu and answers honestly."],
            ['Takes simple takeout orders', 'Pickup orders, time slots and special instructions — captured in your dashboard for the kitchen.'],
            ['Multi-language for busy cities', 'Tourists asking in Spanish, families asking in Mandarin about Sunday brunch — handled in their language.'],
        ],
        'workflow' => [
            'Customer calls, sends a WhatsApp, or uses your website chat',
            'BotNira handles reservations, menu questions, hours and dress code',
            'Books a table or takes a takeout order',
            'Confirms with the customer and drops it into your dashboard',
        ],
        'faqs' => [
            ['Does it integrate with OpenTable or Resy?', 'Native integrations are on the roadmap. Today, reservations land in your BotNira dashboard for your team to confirm.'],
            ['Can it handle large group bookings?', 'Yes — groups above the size you set are flagged for manager approval and you are notified instantly.'],
            ["What if we're not taking takeout tonight?", 'Switch takeout off in your settings. BotNira tells customers politely and offers a reservation instead.'],
            ['Can it handle delivery zones and prices?', 'Set your delivery radius and minimum order, and BotNira quotes accordingly.'],
        ],
    ],
    'education' => [
        'icon' => 'graduation-cap', 'industry' => 'Education & Coaching', 'noun' => 'school or coaching centre',
        'seo' => [
            'title' => 'AI Receptionist for Schools, Coaching Centres & Tutors | BotNira',
            'description' => 'BotNira answers admissions queries, handles fee questions, books trial classes and replies to parents in their language — for schools, tutoring centres and online coaching.',
            'keywords' => 'ai receptionist for school, coaching center chatbot, admissions ai assistant, tutor booking ai, online education virtual receptionist, school helpdesk automation',
        ],
        'eyebrow' => 'For Schools, Tuition & Coaching',
        'h1' => 'Admissions, course details, fees — answered for every parent in their language.',
        'sub' => 'Most parents won\'t fill in a form — they want a quick chat. BotNira answers every WhatsApp, call and web message: course details, fees, schedules and free trial slots.',
        'stat' => ['kpi' => 'WhatsApp', 'label' => 'is where many parents start their admissions questions — so that is where BotNira answers.'],
        'why' => [
            ['Catch the parent in the WhatsApp moment', 'If you reply tomorrow morning, the parent may already have enrolled elsewhere. BotNira replies in seconds.'],
            ['Speak to every family', 'Spanish, Punjabi, Mandarin, Arabic, Tagalog — every parent gets answers in their language.'],
            ['Book trial classes that convert', "Trial bookings come in around the clock. BotNira books them into your trainer's calendar with the student's grade and topic."],
            ['Suggest the right course', "BotNira asks the student's grade and goals, then suggests the right course — IELTS prep vs spoken English, Math 8 vs Math 9."],
        ],
        'workflow' => [
            'Parent sends a WhatsApp or fills in your website form',
            'BotNira asks student name, grade, course interest and language',
            'Suggests the right course and fee, books a trial class',
            'Sends a welcome pack — class link, prep notes, your address',
        ],
        'faqs' => [
            ['Can it handle batch and class scheduling?', "Yes. Add your batches once and BotNira knows what's open, what's full, and what starts next month."],
            ['Does it speak Indian regional languages?', 'Yes — Hindi, Punjabi, Tamil, Telugu, Bengali, Marathi, Gujarati, Malayalam, Kannada and many more.'],
            ['Can it apply discounts?', "Set rules like 'sibling 10% off' or an early-bird deadline, and BotNira applies them."],
            ['Will it work for online-only coaching?', 'Yes. Web widget, WhatsApp and email — the channels online coaching already lives on.'],
        ],
    ],
    'home-services' => [
        'icon' => 'briefcase', 'industry' => 'Home Services', 'noun' => 'home services business',
        'seo' => [
            'title' => 'AI Receptionist for Plumbers, Electricians & HVAC | BotNira',
            'description' => 'BotNira dispatches plumbers, electricians, HVAC technicians and cleaners — captures the job, address and urgency, books the right tech and quotes simple visits 24/7.',
            'keywords' => 'ai receptionist for plumber, electrician chatbot, hvac dispatch ai, home services booking ai, cleaning service virtual receptionist, after hours emergency plumber',
        ],
        'eyebrow' => 'For Plumbers, Electricians, HVAC & Cleaners',
        'h1' => 'Dispatch your crew without picking up the phone.',
        'sub' => "Customers don't wait when their basement floods. BotNira picks up every call, captures the job, urgency and address, and dispatches your nearest available tech. Emergencies go to the top of the queue.",
        'stat' => ['kpi' => '2am', 'label' => "is when the burst pipe happens. Every missed after-hours call is a job someone else gets."],
        'why' => [
            ['Capture emergencies as they happen', 'Burst pipe at 2am? BotNira books the job, captures the address and gives a 30-minute arrival window — even while you sleep.'],
            ['Right tech, right job', 'Electrical, plumbing or HVAC — BotNira routes by skill to the right person on your team.'],
            ['Quote routine visits instantly', 'Drain cleaning, faucet replacement, AC tune-up — quoted from your service list and booked on the spot.'],
            ['Fewer wasted trips', "Confirmation, a 24h reminder and a 'tech is on the way' message mean customers are home when you arrive."],
        ],
        'workflow' => [
            'Customer calls or texts with a service need',
            'BotNira asks job type, urgency and address',
            'Books the nearest available technician',
            'Sends the arrival window and technician name',
        ],
        'faqs' => [
            ['Can BotNira route by postal code?', 'Yes. Set your service zones and BotNira dispatches the closest tech.'],
            ['What about emergency vs routine pricing?', 'Set after-hours, weekend and holiday rates in your profile. BotNira quotes accordingly and is upfront about it.'],
            ['Does it integrate with ServiceTitan or Jobber?', 'On the roadmap. Today, jobs land in your BotNira dashboard for your dispatcher to move into your existing tool.'],
            ["Can it answer 'how much does X cost'?", 'Yes — add your standard pricing once and BotNira quotes consistently.'],
        ],
    ],
    'healthcare-clinic' => [
        'icon' => 'calendar', 'industry' => 'Healthcare Clinic', 'noun' => 'healthcare clinic',
        'seo' => [
            'title' => 'AI Receptionist for Healthcare Clinics & Doctors | BotNira',
            'description' => 'BotNira books patient appointments, handles insurance questions, runs intake and triages — for family doctors, specialists, physiotherapy, mental-health and walk-in clinics.',
            'keywords' => 'ai receptionist for doctor, healthcare chatbot, patient booking ai, clinic virtual receptionist, physiotherapy booking ai, walk in clinic automation',
        ],
        'eyebrow' => 'For Healthcare Clinics & Specialists',
        'h1' => 'An AI front desk that understands every patient, in every language.',
        'sub' => 'Family doctors, specialists, walk-in clinics, physiotherapy and mental-health practices — BotNira books appointments, handles intake, answers insurance and refill questions, and routes urgent cases to a human.',
        'stat' => ['kpi' => 'On hold', 'label' => 'is where patients give up and search for another clinic. BotNira answers in seconds.'],
        'why' => [
            ['End the hold-music problem', 'Patients calling busy clinics often wait on hold and hang up. BotNira answers in seconds, every time.'],
            ['Intake before they walk in', 'Insurance details, symptoms and medication list — captured before the appointment, so doctors get a head start.'],
            ['Triage urgent vs routine', 'Chest pain: BotNira tells the patient to call 911 immediately and flags your team. Cold symptoms: a routine slot.'],
            ['Multi-language for diverse practices', 'A patient bringing a parent who only speaks Mandarin? BotNira handles the whole conversation in their language.'],
        ],
        'workflow' => [
            'Patient calls or messages your clinic',
            'BotNira identifies the issue and insurance',
            'Books the right slot — urgent, routine or specialist',
            'Pre-fills intake, sends prep instructions and reminders',
        ],
        'faqs' => [
            ['Is this safe for medical conversations?', 'BotNira is set up never to give diagnoses or medical advice. It triages and books — medical guidance stays with your clinicians. Conversations are encrypted, isolated to your clinic, and never used for AI training.'],
            ['Can it handle prescription refill requests?', 'Yes. It captures the medication, dosage and last refill date, and routes the request to your team for review.'],
            ['What about cancellations and rescheduling?', 'Patients reschedule with one tap. The freed slot goes back into your calendar for someone on the waitlist.'],
            ['Does it integrate with EMR systems?', 'Integrations with OSCAR, Accuro and OpenEMR are on our roadmap. Today, BotNira pushes structured intake data to your dashboard.'],
        ],
    ],
];

// ---------------------------------------------------------------------------
// Search-intent landing pages  →  /{slug}
// ---------------------------------------------------------------------------
$SOLUTIONS = [
    'ai-sales-agent' => [
        'icon' => 'phone-call', 'intent' => 'AI Sales Agent',
        'seo' => [
            'title' => 'AI Sales Agent | BotNira — Books Demos, Qualifies Leads, Sells 24/7',
            'description' => 'BotNira is an AI sales agent that calls and chats with your prospects, qualifies leads and books demos — across phone, WhatsApp, email and web chat.',
            'keywords' => 'ai sales agent, ai sales rep, virtual sales assistant, automated sales calls, ai sdr, ai bdr, ai lead qualification, sales automation software',
        ],
        'eyebrow' => 'AI Sales Agent',
        'h1' => 'An AI sales agent that calls, qualifies and books — 24/7.',
        'sub' => 'BotNira handles outbound calls, replies to every inbound inquiry, qualifies leads against your ideal customer profile and books demos on your calendar. Works across phone, WhatsApp, email and your website chat.',
        'stat' => ['kpi' => '24/7', 'label' => 'follow-up on every lead — weekends, holidays and nights included.'],
        'problem' => ['title' => 'Why human-only sales teams break', 'points' => [
            "Inbound leads that wait more than a few minutes for a reply often move on to a competitor.",
            'SDR turnover is high. You spend more time hiring and onboarding than selling.',
            'Cold calling has low connection rates — and most reps dislike doing it.',
            "Reps can't follow up with hundreds of prospects a week. BotNira can, without burning the relationship.",
        ]],
        'how' => [
            ['Train BotNira on your offer', 'Paste your sales deck, pricing, ideal customer profile and objection-handling notes. BotNira learns your product in minutes.'],
            ['Connect your channels', 'Plug in WhatsApp, your voice number, your inbox and the website widget. Inbound and outbound, all in one place.'],
            ['Run outbound + answer inbound', 'BotNira emails or calls your list with paced sends (5–45 min apart to stay out of spam) and answers every inbound lead in seconds.'],
            ['Hand hot leads to humans', 'Qualified leads land on your calendar with the full conversation transcript. Your reps spend time on demos, not dialing.'],
        ],
        'faqs' => [
            ['Does it sound like a real person on calls?', 'BotNira uses realistic voice models and matches your brand tone. It tells callers it is an AI whenever asked.'],
            ['Can it qualify leads as well as an SDR?', 'For routine qualification — budget, timeline, decision-maker, fit — yes. For nuanced enterprise objections, it hands off to your team with a full transcript.'],
            ['What if a prospect goes off-script?', 'BotNira answers from your knowledge base, asks a clarifying question, or says your team will follow up — and notifies your reps.'],
            ['Will my outreach get marked as spam?', 'Sends are paced with random 5–45 minute delays and include unsubscribe links to stay CASL and CAN-SPAM compliant.'],
        ],
    ],
    'ai-appointment-booking-software' => [
        'icon' => 'calendar', 'intent' => 'AI Appointment Booking',
        'seo' => [
            'title' => 'AI Appointment Booking Software | BotNira — Books, Confirms, Reminds',
            'description' => 'BotNira is AI appointment booking software for clinics, salons, lawyers, consultants and service businesses. Books across phone, WhatsApp, web chat and email, with reminders.',
            'keywords' => 'ai appointment booking software, automated appointment scheduling, ai booking system, online appointment booking ai, scheduling automation, ai scheduling assistant',
        ],
        'eyebrow' => 'AI Appointment Booking',
        'h1' => 'Appointment booking, fully automated by AI.',
        'sub' => "BotNira takes appointment requests by phone, WhatsApp, web chat and email — checks your real calendar, offers the right slot in the customer's language, confirms, and sends reminders. Cancellations get refilled automatically.",
        'stat' => ['kpi' => 'After hours', 'label' => 'is when a large share of booking requests arrive. BotNira books every one.'],
        'problem' => ['title' => 'The hidden cost of manual booking', 'points' => [
            'Every missed call after hours is a customer who may book with a competitor.',
            'Front-desk staff lose hours every day to phone tag, no-shows and re-confirmations.',
            "Static booking links feel cold in WhatsApp — customers want to chat, not click a link.",
            'No-shows quietly eat into revenue. Smart reminders cut them down.',
        ]],
        'how' => [
            ['Connect your calendar', "Google Calendar sync plus a built-in BotNira calendar — your team's availability in one view."],
            ['Customer messages or calls', 'On WhatsApp, web chat, phone, SMS or email — BotNira replies in seconds and asks what service and when.'],
            ['Smart slot suggestion', 'BotNira offers the closest open slot, respecting buffer times, staff routing and service length.'],
            ['Confirm, remind, reschedule', 'Confirmation on the same channel the customer used. 24h and 2h reminders go out automatically. One-tap reschedule.'],
        ],
        'faqs' => [
            ['Does it work without a calendar tool?', "Yes — BotNira has a built-in scheduling engine. If you use Google Calendar, it syncs both ways."],
            ['Can it handle several staff members?', 'Yes. Each person has their own availability, services and pricing, and BotNira routes customers to the right one.'],
            ['What about cancellations?', 'Cancellations free up the slot instantly. With a waitlist enabled, BotNira messages the next person to refill it.'],
            ['Does it send SMS or WhatsApp reminders?', 'Yes — 24h and 2h before, on the channel the customer used to book. You control timing and wording.'],
        ],
    ],
    'ai-chatbot-for-immigration-consultants' => [
        'icon' => 'globe', 'intent' => 'Immigration Consultant AI Chatbot',
        'seo' => [
            'title' => 'AI Chatbot for Immigration Consultants | BotNira — Capture, Qualify, Book Consults',
            'description' => 'BotNira is the AI chatbot for immigration consultants and law firms. Answers visa questions in 90+ languages, pre-qualifies prospects and books consultations 24/7.',
            'keywords' => 'ai chatbot for immigration consultants, immigration law firm chatbot, visa consultant ai, immigration practice automation, multilingual immigration chatbot, rcic chatbot',
        ],
        'eyebrow' => 'For Immigration Consultants, RCICs & Law Firms',
        'h1' => 'An AI chatbot built for immigration consultants.',
        'sub' => 'BotNira pre-qualifies prospects by program (Express Entry, PNP, Study Visa, Family Sponsorship, Work Permit), captures their eligibility profile, books paid consultations and follows up — in 90+ languages.',
        'stat' => ['kpi' => '90+', 'label' => 'languages — prospects who skip English-only forms will happily chat in their own language.'],
        'problem' => ['title' => 'Why immigration practices leak revenue', 'points' => [
            "Prospects abroad often skip English-only contact forms. They want to chat in Punjabi, Hindi, Mandarin, Arabic, Tagalog, Spanish or French.",
            'Routine eligibility questions eat hours of consultant time before any payment is made.',
            'Time-zone gaps mean leads from Asia or the Middle East reach voicemail while you sleep.',
            'Without standard intake, hot prospects fall through the cracks.',
        ]],
        'how' => [
            ['Train on your practice', 'BotNira learns the programs you serve, your fee structure, intake questions and disclaimers.'],
            ['Plug into WhatsApp + your website', 'Most prospects from South Asia, the Middle East and Latin America start on WhatsApp. BotNira speaks their language.'],
            ['Pre-qualify leads', 'Asks for age, education, language test scores, work experience and family status before booking a paid consult.'],
            ['Book paid consultations', 'BotNira sends a payment link, books the slot once paid, and puts the full intake transcript in your dashboard.'],
        ],
        'faqs' => [
            ['Will BotNira give immigration advice?', 'No. It shares general program information and pre-qualifies on objective criteria, and tells prospects that advice must come from a licensed RCIC or lawyer.'],
            ['Which languages does it handle?', '90+ including Punjabi, Hindi, Urdu, Mandarin, Tagalog, Arabic, Farsi, Spanish, Portuguese, French and Russian.'],
            ['Can it collect documents securely?', 'Yes — document uploads land in your encrypted dashboard, isolated to your firm and never used for AI training.'],
            ['How does pricing work for small firms?', 'From $49/month for solo consultants. Most firms use Growth ($149/month) with 500 voice minutes and 8,000 AI messages.'],
        ],
    ],
    'replace-sales-team-with-ai' => [
        'icon' => 'users', 'intent' => 'Replace Sales Team with AI',
        'seo' => [
            'title' => 'Replace Your Sales Team with AI | BotNira — Cut Costs, Lift Revenue',
            'description' => 'Hand routine sales work to an AI that calls, qualifies and books 24/7. BotNira costs less than one SDR and works across phone, WhatsApp, email and chat.',
            'keywords' => 'replace sales team with ai, ai instead of sdr, ai sales automation, cut sales headcount, ai sales rep replacement, save on sdr cost, ai sales agent vs human',
        ],
        'eyebrow' => 'Replace Your Sales Team with AI',
        'h1' => 'Let AI handle the busywork of sales — and watch revenue climb.',
        'sub' => 'BotNira takes on outbound calls, inbound chat, lead qualification, demo booking and follow-ups at a fraction of the cost of new hires. Your best people focus on closing.',
        'stat' => ['kpi' => '$399', 'label' => 'a month for Pro — far less than a single full-time sales hire.'],
        'problem' => ['title' => 'Why sales teams are the highest-cost, highest-churn part of a business', 'points' => [
            'A full-time SDR in North America costs tens of thousands a year fully loaded. BotNira Pro is $399/month.',
            'SDR tenure is short. You spend more time hiring than they spend selling.',
            'Many inbound calls outside business hours go unanswered. BotNira answers all of them.',
            'Cold-call burnout is real. BotNira keeps going at 4pm on a Friday.',
        ]],
        'how' => [
            ['Identify the routine work', 'Most SDR work is repeatable: qualify, ask a few standard questions, book a demo if it fits. BotNira handles that.'],
            ['Plug BotNira into your channels', 'Phone, WhatsApp, email and chat — every prospect touchpoint in one inbox.'],
            ['BotNira runs outbound + inbound', 'Paced outreach to your list, instant replies to web inquiries, qualification, and demos booked on your calendar.'],
            ['Keep humans for closing', 'Senior reps focus on demos and contracts while BotNira does the high-volume work.'],
        ],
        'faqs' => [
            ['Can BotNira really replace an SDR?', 'For top-of-funnel work — qualify, book, follow up — it can. For deep technical discovery and enterprise negotiation, you still want people.'],
            ["What if a prospect doesn't want to talk to AI?", 'BotNira identifies itself when asked and offers to connect a human.'],
            ['How fast can we switch over?', 'Inbound qualification can go live in the first week. Outbound takes a little longer to tune. You can run BotNira alongside your team during the change.'],
            ['What about CRM updates?', 'Every conversation, qualification and booking is logged in your dashboard and can be exported. CRM integrations are on the roadmap.'],
        ],
    ],
    'whatsapp-ai-assistant' => [
        'icon' => 'message-circle', 'intent' => 'WhatsApp AI Assistant',
        'seo' => [
            'title' => 'WhatsApp AI Assistant | BotNira — Business Bot with 24/7 Replies',
            'description' => 'BotNira is a WhatsApp AI assistant for businesses. Official WhatsApp Business API, multi-language replies, lead capture, appointment booking and payment links.',
            'keywords' => 'whatsapp ai assistant, whatsapp business chatbot, whatsapp ai for business, whatsapp api chatbot, whatsapp automated reply, whatsapp customer service ai',
        ],
        'eyebrow' => 'WhatsApp AI Assistant',
        'h1' => 'Your WhatsApp, answered by AI — 24/7.',
        'sub' => "BotNira connects to the official WhatsApp Business API in minutes, replies to every message in your business's voice, books appointments, captures leads and sends payment links — in 90+ languages.",
        'stat' => ['kpi' => '2 billion+', 'label' => 'people use WhatsApp. Your customers are there — be there to answer, even at midnight.'],
        'problem' => ['title' => "Why WhatsApp is the channel you can't ignore", 'points' => [
            'Customers expect a WhatsApp reply within minutes. Your team often can\'t; BotNira can.',
            'WhatsApp messages get read far more often than email.',
            'Most WhatsApp tools need a developer. BotNira connects through Meta\'s Embedded Signup in about 90 seconds.',
            'WhatsApp is global — your replies need to speak your customers\' languages too.',
        ]],
        'how' => [
            ['Connect via Embedded Signup', "Meta's official popup links your WhatsApp Business Account — no SDKs or API keys to manage."],
            ['Train BotNira on your business', 'Paste your services, hours, FAQs and pricing. BotNira replies like a member of your team.'],
            ['Auto-reply with intent', 'Every message gets a smart reply: book a slot, send a quote, capture lead details, or route urgent messages to a person.'],
            ['Send & receive payments', 'BotNira can send checkout links inside the chat and confirm bookings once payment lands.'],
        ],
        'faqs' => [
            ['Do I need the WhatsApp Business app?', 'No — BotNira uses Meta\'s Cloud API, so you keep your business number without needing the mobile app.'],
            ['Can I still reply manually?', 'Yes. The unified inbox lets you take over any conversation in one click.'],
            ['What about templates and the 24-hour rule?', "BotNira respects Meta's 24-hour customer-service window. Outside it, you can send pre-approved templates."],
            ["Is this compliant with Meta's policies?", "Yes — BotNira is built on Meta's official Cloud API."],
        ],
    ],
    '24-7-ai-receptionist' => [
        'icon' => 'headphones', 'intent' => '24/7 AI Receptionist',
        'seo' => [
            'title' => '24/7 AI Receptionist | BotNira — Always-On Front Desk for Every Business',
            'description' => 'BotNira is a 24/7 AI receptionist that answers every call, WhatsApp and email — books appointments, takes messages and qualifies leads. Never miss a customer at 2am.',
            'keywords' => '24/7 ai receptionist, ai receptionist, ai virtual receptionist, after hours receptionist, ai phone answering, automated receptionist, ai answering service',
        ],
        'eyebrow' => '24/7 AI Receptionist',
        'h1' => 'A 24/7 AI receptionist your customers will actually like.',
        'sub' => "Every call, WhatsApp, email and chat — answered the moment it lands, day or night, in the customer's language. Books appointments, captures leads, escalates emergencies to a human, never goes to voicemail.",
        'stat' => ['kpi' => '168 hrs', 'label' => 'a week of coverage — not 40 — from $49 a month.'],
        'problem' => ['title' => 'Missed calls cost more than you think', 'points' => [
            'Many calls to small businesses go unanswered. Each one is a customer who may choose a competitor.',
            'After-hours and weekend calls are usually lost — voicemail is the new "closed" sign.',
            'An answering service costs hundreds a month and reads from a script. BotNira books, qualifies and remembers.',
            'Customers want a conversation, not a phone tree. BotNira talks naturally, in their language.',
        ]],
        'how' => [
            ['Get a number or keep yours', 'BotNira gives you a local phone number, or you forward calls from your existing business number.'],
            ['Train on your business', 'Hours, services, address, pricing and FAQs — BotNira learns your business and tone in minutes.'],
            ['BotNira picks up — every time', 'The call rings, BotNira answers in under a second, understands the request, and books, qualifies or takes a message.'],
            ['See everything in one inbox', 'Every transcript, booking and lead in the unified inbox. Pick up where BotNira left off, anytime.'],
        ],
        'faqs' => [
            ['Will it sound like a real person?', 'BotNira uses realistic real-time voice. It tells callers it is an AI whenever asked.'],
            ['What about emergencies?', "Set emergency triggers (\"chest pain\", \"flooding\") and BotNira escalates to a number you choose, immediately."],
            ['Does it work with my existing number?', 'Yes — forward calls from your business number to BotNira (always, when busy, or when unanswered). Customers keep dialing the same number.'],
            ['How much does it cost compared to a person?', 'Starter is $49/month, Growth $149/month, Pro $399/month — far less than a part-time receptionist or an answering service that cannot book.'],
        ],
    ],
];
