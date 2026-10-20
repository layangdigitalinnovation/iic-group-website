<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Seluruh konten website diambil dari booklet company profile IIC Group.
     * Ubah teks di sini tanpa perlu menyentuh file Blade.
     */
    public function index(): View
    {
        return view('home', [
            'company' => [
                'name' => 'IIC Group',
                'legal' => 'Ibraahim Ibaadurrahmaan Corporation',
                'arabic' => 'شركة ابراهيم عباد الرحمن',
                'tagline' => 'To Witness the benefit for them',
                'email' => 'holding@iic-corp.com',
            ],

            'video' => [
                'src' => 'video/iicgroup.mp4',
                'poster' => 'images/video-poster.jpg',
                'badge' => 'Official Corporate Profile',
                'title' => 'IIC Group: Connecting Indonesia & Saudi Arabia',
                'arabic_tagline' => 'ليشهدوا منافع لهم',
                'tagline_en' => 'To Witness the Benefit for Them',
                'summary' => 'Discover how Ibraahim Ibaadurrahmaan Corporation builds strategic cross-border partnerships, compliant business frameworks, and integrated services bridging Indonesian enterprise with the Kingdom of Saudi Arabia.',
                'chapters' => [
                    ['time' => '00:00', 'seconds' => 0, 'label' => 'Vision & Identity', 'desc' => 'The founding mission of IIC Group'],
                    ['time' => '00:34', 'seconds' => 34, 'label' => 'Cross-Border Technology & Services', 'desc' => 'Real-time passport verification & systems'],
                    ['time' => '01:30', 'seconds' => 90, 'label' => '5 Business Units Ecosystem', 'desc' => 'Fintech, travel marketplace, F&B & pilgrim logistics'],
                    ['time' => '03:15', 'seconds' => 195, 'label' => 'Legal Umbrella & Saudi Market', 'desc' => 'Lawful structuring, licensing & local execution'],
                    ['time' => '04:30', 'seconds' => 270, 'label' => 'Shared Prosperity for the Ummah', 'desc' => 'Enduring social and economic value'],
                ],
                'highlights' => [
                    [
                        'num' => '01',
                        'title' => 'The Legal Umbrella',
                        'text' => 'Direct access and lawful corporate structures for enterprises entering the Saudi Arabian market.',
                    ],
                    [
                        'num' => '02',
                        'title' => 'Integrated Ecosystem',
                        'text' => 'Bridging finance, mobility, hospitality, and smart pilgrim management across 5 business units.',
                    ],
                    [
                        'num' => '03',
                        'title' => 'B2B Value Chain Bridge',
                        'text' => 'Connecting verified Indonesian capabilities with vetted Saudi public and private market opportunities.',
                    ],
                    [
                        'num' => '04',
                        'title' => 'Principle of Justice & Amanah',
                        'text' => 'Governance rooted in ethical dealing, Sharia awareness, and mutual trust.',
                    ],
                ],
            ],

            'pillars' => [
                [
                    'title' => 'The Legal Umbrella',
                    'arabic' => 'ظلال: المظلة القانونية',
                    'text' => 'A trusted platform for entrepreneurs and enterprises from every country entering Saudi Arabia. We support business setup, regulatory compliance and sustainable growth through lawful structures and qualified partners.',
                ],
                [
                    'title' => 'The Principle of Justice',
                    'arabic' => 'عدل: مبدأ العدل',
                    'text' => 'Fairness, integrity and accountability guide every decision. We protect rights, honor commitments and balance the interests of partners, investors, employees and the communities we serve.',
                ],
                [
                    'title' => 'Virtuous Enterprise & Shared Benefit',
                    'arabic' => 'فاضل: الشركة الفاضلة والمنفعة المشتركة',
                    'text' => 'We pursue shared prosperity through ethical business and lasting social value. The welfare of the Ummah is our priority, with benefits extended to society and all stakeholders.',
                ],
            ],

            'challenge' => [
                'origin' => ['title' => 'The Origin: Indonesian Companies', 'items' => ['Products', 'Services', 'Businesses', 'Investors', 'Capabilities']],
                'destination' => ['title' => 'The Destination: The Saudi Market', 'items' => ['Business Opportunities', 'Partnerships', 'Projects', 'Local Operations']],
                'needs' => ['Market Access', 'Strategic Partnerships', 'Financial Infrastructure', 'Local Capabilities', 'Governance', 'Execution'],
            ],

            'chain' => [
                'Business Opportunity', 'Market Access', 'Strategic Partnership', 'Financial & Business Infrastructure',
                'Project Management', 'Local Operations', 'Execution', 'Growth',
            ],

            'units' => [
                [
                    'id' => 'idrp',
                    'name' => 'IDRP',
                    'sector' => 'Financial Infrastructure',
                    'headline' => 'Bringing Rupiah into the Digital Economy',
                    'summary' => 'A Rupiah-based digital asset designed for digital transactions, B2B settlements and cross-border ecosystems, built around transparency, security and regulatory compliance.',
                    'points' => [
                        'Rupiah-based digital asset representing Rupiah value digitally',
                        'Purpose-built for digital transactions and cross-border ecosystems',
                        'Designed around transparency, security and regulatory compliance',
                    ],
                    'note' => 'IDRP is an exploratory partnership track with appropriately licensed financial institutions. It is not an issued currency, an active payment licence or a promise of digital Rupiah conversion.',
                    'link' => ['label' => 'idrp.io', 'url' => 'https://idrp.io'],
                    'contact' => ['name' => 'Nabila Amara', 'phone' => '+62 812-2699-8873'],
                ],
                [
                    'id' => 'caritempat',
                    'name' => 'CariTempat',
                    'sector' => 'Digital Marketplace Ecosystem',
                    'headline' => 'One Platform for Travel & Business Services',
                    'summary' => 'CariTempat connects customers and verified business partners through one integrated platform for searching, comparing, booking and paying for travel, hospitality, dining, events, worship and other services.',
                    'points' => [
                        'Customers search, compare, book, pay and review',
                        'Partners manage listings, prices, availability, orders, teams and payouts',
                        'Supporting ecosystem: Tania AI, loyalty, partner score, advertising, multi-merchant',
                    ],
                    'note' => 'Functionalities, payment routes and customer safeguards are confirmed against the live platform and its applicable terms.',
                    'link' => ['label' => 'caritempat.co.id', 'url' => 'https://caritempat.co.id'],
                    'contact' => ['name' => 'Nusaibah', 'phone' => '+62 813 8883 6915'],
                ],
                [
                    'id' => 'sman',
                    'name' => 'Syarikah Makan Al-Na\'im',
                    'short' => 'SMAN',
                    'sector' => 'Food & Hospitality',
                    'headline' => 'Saudi-Based Food Operations with Indonesian Roots',
                    'summary' => 'A Saudi-based, Indonesian-owned food and hospitality business supporting Indonesian restaurant concepts, catering services and F&B businesses entering the Saudi market.',
                    'points' => [
                        'Market entry: feasibility and strategy for F&B brands',
                        'Business development: commercial opportunities and tender access',
                        'Strategic partnerships with local stakeholders, suppliers and sponsors',
                        'Local execution: on-the-ground coordination and operations',
                    ],
                    'note' => 'Group-catering partnerships are aligned with verified kitchen capacity, local approvals, supplier readiness and mutually agreed service levels.',
                    'link' => ['label' => 'smanksa.com', 'url' => 'https://smanksa.com'],
                    'contact' => ['name' => 'Sandi Hasyono', 'phone' => '+62 812-8003-5369'],
                ],
                [
                    'id' => 'saair',
                    'name' => 'SAA\'IR',
                    'sector' => 'Hajj & Umrah Services',
                    'headline' => 'Your Journey. Our Responsibility.',
                    'summary' => 'Muassasah Syaair Thoyibah is a Saudi-based operational platform shaped around the needs of Indonesian Hajj and Umrah travel agencies, from visas to transportation and accommodation.',
                    'points' => [
                        'Umrah & Ziyarah visa processing and travel support',
                        'Premium transportation for pilgrims and travel groups',
                        'Makkah & Madinah hotel and accommodation solutions',
                        'Business coordination and operational support for travel agencies',
                    ],
                    'note' => 'Any specific service, booking or visa-related facilitation remains subject to the relevant operator\'s licence, availability and contractual terms.',
                    'link' => null,
                    'contact' => ['name' => 'Muhammad Revis', 'phone' => '+62 851-5523-3000'],
                ],
                [
                    'id' => 'hums',
                    'name' => 'HUMS',
                    'sector' => 'Smart Pilgrim Management System',
                    'headline' => 'Smarter Tracking. Safer Journeys.',
                    'summary' => 'An RFID- and location-enabled management concept for monitoring, identification and coordination of pilgrims, luggage and travel documents across the Hajj and Umrah journey.',
                    'points' => [
                        'RFID-based identification and data collection',
                        'Real-time tracking through RFID and GPS integration',
                        'Smart luggage monitoring to reduce lost or swapped belongings',
                        'Document tracking and operational coordination',
                    ],
                    'note' => 'A technology concept subject to pilot validation, with agreed pilot scope, access rights, security safeguards and stakeholder approvals.',
                    'link' => null,
                    'contact' => ['name' => 'Audy Pratama', 'phone' => '+62 812-8596-0126'],
                ],
            ],

            'ecosystem' => [
                ['title' => 'Discover', 'text' => 'An Indonesian agency or F&B brand finds opportunities through CariTempat.'],
                ['title' => 'Fund', 'text' => 'Cross-border payments and settlement are explored with licensed partners through IDRP infrastructure.'],
                ['title' => 'Execute', 'text' => 'Local execution on the ground through SAA\'IR and SMAN offices in Saudi Arabia.'],
            ],

            'framework' => [
                ['Screen', 'Identify the counterpart, opportunity and preliminary risk indicators.'],
                ['Assess', 'Review feasibility, business authority, regulatory requirements and operational capability.'],
                ['Structure', 'Define commercial arrangements, contractual responsibilities and approval pathways.'],
                ['Implement', 'Coordinate execution through capable and authorised parties.'],
                ['Monitor', 'Review service delivery, report issues, and manage escalation and follow-up.'],
            ],

            'values' => [
                ['Strong Leadership', 'Responsible governance and a long-term commitment to meaningful partnerships.'],
                ['Professional Team', 'Experienced people, disciplined processes and measurable delivery.'],
                ['Legal, Business & Sharia Approach', 'Careful legal judgment, prudent structuring and a Sharia-conscious approach.'],
                ['Amanah, Humble & Care', 'Nusantara cultural wisdom: trust, humility and genuine care for people.'],
            ],

            'screening' => [
                ['Integrity & Anti-Bribery', 'Ethical conduct, fair dealing and opposition to bribery and corruption.'],
                ['AML/CFT Risk Awareness', 'Risk-based attention to money-laundering and terrorism-financing concerns.'],
                ['Authority & Beneficial Ownership', 'Verification of counterparty identity, authorised representatives and ownership.'],
                ['Data Protection & Service Quality', 'Lawful data processing, confidentiality and appropriate service standards.'],
            ],

            'event' => [
                'name' => 'Hajj Conference & Exhibition 2026',
                'detail' => '6th Edition · Jeddah Superdome · 8–11 November 2026',
            ],

            'forms' => [
                [
                    'id' => 'kurasi-mitra',
                    'title' => 'Partner Curation Form',
                    'subtitle' => 'Business Opportunities & Licensing in Saudi Arabia',
                    'category' => 'Non Export-Import',
                    'badge' => 'Non Export-Import',
                    'desc' => 'Official curation intake for prospective partners, non export-import enterprises, and organizations seeking commercial ventures and legal licensing in the Kingdom of Saudi Arabia.',
                    'url' => 'https://forms.gle/KfoCsZWK9NvGZqX8A',
                    'qr_svg' => 'images/qr/qr-kurasi-mitra.svg',
                    'qr_png' => 'images/qr/qr-kurasi-mitra.png',
                ],
                [
                    'id' => 'assessment-ekspansi',
                    'title' => 'Business Expansion Assessment',
                    'subtitle' => 'Market Readiness & Export to Saudi Arabia',
                    'category' => 'Exporters Only',
                    'badge' => 'Exporters Only',
                    'desc' => 'Comprehensive readiness assessment for Indonesian manufacturers and exporters evaluating product standards, regulatory compliance, and supply chain readiness for Saudi Arabia.',
                    'url' => 'https://forms.gle/KBV4LPWXmjnAmiTd7',
                    'qr_svg' => 'images/qr/qr-assessment-ekspansi.svg',
                    'qr_png' => 'images/qr/qr-assessment-ekspansi.png',
                ],
            ],

            'offices' => [
                'Gedung Smesco Indonesia, Lantai 16 Zone B, Jalan Gatot Subroto No. Kav. 94 Pancoran, Jakarta Selatan, DKI Jakarta',
                'Perkantoran Casamora BB2, Jl. Sirsak, RT.2/RW.4, Jagakarsa, Kec. Jagakarsa, Kota Jakarta Selatan, DKI Jakarta',
            ],
        ]);
    }
}
