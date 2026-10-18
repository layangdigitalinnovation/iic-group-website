@extends('layouts.app')

@section('title', $company['name'] . ' — ' . $company['legal'])

@section('content')

{{-- ===== Header ===== --}}
<header class="site-header" id="top">
    <div class="container header-inner">
        <a href="#top" class="brand" aria-label="{{ $company['name'] }}">
            <div class="brand-logo-wrap">
                <img src="{{ asset('images/logo/logo-iic.png') }}" alt="{{ $company['name'] }}" class="brand-logo" width="81" height="40">
            </div>
        </a>
        <button class="nav-toggle" aria-label="Menu" aria-expanded="false" data-nav-toggle>
            <span></span><span></span><span></span>
        </button>
        <nav class="nav" data-nav>
            <a href="#about">About</a>
            <a href="#portfolio">Portfolio</a>
            <a href="#ecosystem">Ecosystem</a>
            <a href="#governance">Governance</a>
            <a href="#forms">Forms</a>
            <a href="#event">Event</a>
            <a href="#contact" class="btn btn-gold btn-sm">Contact</a>
        </nav>
    </div>
</header>

<main>

{{-- ===== Hero ===== --}}
<section class="hero">
    <div class="container hero-inner">
        <p class="eyebrow">Indonesia · Saudi Arabia</p>
        <h1>{{ $company['legal'] }}</h1>
        <p class="hero-sub">Connecting Business. Building Opportunities. Creating Growth.</p>
        <p class="hero-lead">The premier business integrator and integrated service ecosystem bridging Indonesia and the Kingdom of Saudi Arabia.</p>
        <div class="hero-actions">
            <a href="#portfolio" class="btn btn-gold">Explore our portfolio</a>
            <a href="#contact" class="btn btn-outline">Partner with us</a>
        </div>
        <p class="hero-tag" lang="ar" dir="rtl">ليشهدوا منافع لهم</p>
        <p class="hero-tag-en">{{ $company['tagline'] }}</p>
    </div>
</section>

{{-- ===== About / Philosophy ===== --}}
<section class="section" id="about">
    <div class="container">
        <header class="section-head center">
            <p class="eyebrow dark">Vision & Corporate Philosophy</p>
            <h2>A trusted gateway to Saudi Arabia for entrepreneurs from every nation</h2>
        </header>

        <blockquote class="quote">
            <p lang="ar" dir="rtl">ليشهدوا منافع لهم</p>
            <footer>“That they may witness benefits for themselves.” <span>— Qur’an, Al-Hajj 22:28</span></footer>
        </blockquote>

        <div class="grid grid-3">
            @foreach ($pillars as $pillar)
                <article class="card arch">
                    <h3>{{ $pillar['title'] }}</h3>
                    <p class="ar" lang="ar" dir="rtl">{{ $pillar['arabic'] }}</p>
                    <p>{{ $pillar['text'] }}</p>
                </article>
            @endforeach
        </div>
        <p class="closing">Prioritizing the welfare of the Ummah and shared prosperity for all.</p>
    </div>
</section>

{{-- ===== Cross-border challenge ===== --}}
<section class="section section-navy">
    <div class="container">
        <header class="section-head center">
            <p class="eyebrow">The Cross-Border Challenge</p>
            <h2>A good product is no longer enough</h2>
        </header>

        <div class="bridge">
            <div class="bridge-side">
                <h3>{{ $challenge['origin']['title'] }}</h3>
                <ul class="chips">
                    @foreach ($challenge['origin']['items'] as $item)<li>{{ $item }}</li>@endforeach
                </ul>
            </div>
            <div class="bridge-mid">
                <p>To cross the divide, businesses require</p>
                <ul>
                    @foreach ($challenge['needs'] as $need)<li>{{ $need }}</li>@endforeach
                </ul>
                <strong>IIC bridges the two sides, connecting the right capabilities with the right opportunities.</strong>
            </div>
            <div class="bridge-side">
                <h3>{{ $challenge['destination']['title'] }}</h3>
                <ul class="chips">
                    @foreach ($challenge['destination']['items'] as $item)<li>{{ $item }}</li>@endforeach
                </ul>
            </div>
        </div>

        <h3 class="subhead">The Value Chain Bridge</h3>
        <p class="muted-light center-text">No single company performs every function. IIC brings diverse capabilities together into one structured, executable business initiative.</p>
        <ol class="chain">
            @foreach ($chain as $i => $step)
                <li><span>{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>{{ $step }}</li>
            @endforeach
        </ol>
    </div>
</section>

{{-- ===== Portfolio ===== --}}
<section class="section" id="portfolio">
    <div class="container">
        <header class="section-head center">
            <p class="eyebrow dark">Corporate Structure</p>
            <h2>One corporate umbrella. Specialized business units.</h2>
            <p class="lead">Legal Umbrella · Principle of Justice · Limitless Shared Benefit</p>
        </header>

        <div class="grid grid-5 portfolio-grid">
            @foreach ($units as $u)
                <a href="#{{ $u['id'] }}" class="card unit-card">
                    <span class="sector">{{ $u['sector'] }}</span>
                    <h3>{{ $u['short'] ?? $u['name'] }}</h3>
                    <span class="more">Learn more →</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== Unit details ===== --}}
@foreach ($units as $i => $u)
<section class="section unit {{ $i % 2 === 0 ? 'section-cream' : '' }}" id="{{ $u['id'] }}">
    <div class="container unit-grid">
        <div class="unit-intro">
            <p class="eyebrow dark">Business Unit {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} · {{ $u['sector'] }}</p>
            <h2>{{ $u['name'] }}</h2>
            <p class="unit-headline">{{ $u['headline'] }}</p>
            <p>{{ $u['summary'] }}</p>
            <div class="unit-links">
                @if ($u['link'])
                    <a class="btn btn-navy btn-sm" href="{{ $u['link']['url'] }}" target="_blank" rel="noopener">{{ $u['link']['label'] }}</a>
                @endif
                <a class="btn btn-outline-dark btn-sm" href="https://wa.me/{{ preg_replace('/\D/', '', $u['contact']['phone']) }}" target="_blank" rel="noopener">
                    Contact {{ $u['contact']['name'] }}
                </a>
            </div>
        </div>
        <div class="unit-body">
            <ul class="ticks">
                @foreach ($u['points'] as $p)<li>{{ $p }}</li>@endforeach
            </ul>
            <p class="note">{{ $u['note'] }}</p>
        </div>
    </div>
</section>
@endforeach

{{-- ===== Ecosystem ===== --}}
<section class="section section-green" id="ecosystem">
    <div class="container">
        <header class="section-head center">
            <p class="eyebrow">The Integrated Ecosystem</p>
            <h2>The bridge to limitless benefit</h2>
            <p class="lead light">Technology, mobility, hospitality and healthcare integrated into one unified value chain. Working together, not in isolation.</p>
        </header>
        <div class="grid grid-3">
            @foreach ($ecosystem as $i => $e)
                <article class="card card-dark">
                    <span class="num">{{ $i + 1 }}</span>
                    <h3>{{ $e['title'] }}</h3>
                    <p>{{ $e['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== Governance ===== --}}
<section class="section" id="governance">
    <div class="container">
        <header class="section-head center">
            <p class="eyebrow dark">Built on Trust</p>
            <h2>Designed for responsible partnerships</h2>
            <p class="lead">Trust · Accountability · Professionalism · Amanah</p>
        </header>

        <div class="grid grid-4">
            @foreach ($values as $v)
                <article class="card"><h3>{{ $v[0] }}</h3><p>{{ $v[1] }}</p></article>
            @endforeach
        </div>

        <h3 class="subhead dark">A five-stage framework for accountable delivery</h3>
        <ol class="steps">
            @foreach ($framework as $i => $f)
                <li><span>{{ $i + 1 }}</span><h4>{{ $f[0] }}</h4><p>{{ $f[1] }}</p></li>
            @endforeach
        </ol>

        <h3 class="subhead dark">Responsible partnerships begin with proper screening</h3>
        <div class="grid grid-4">
            @foreach ($screening as $s)
                <article class="card"><h3>{{ $s[0] }}</h3><p>{{ $s[1] }}</p></article>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== Barcode / QR Code Registration Forms ===== --}}
<section class="section section-cream" id="forms">
    <div class="container">
        <header class="section-head center">
            <p class="eyebrow dark">Partnership & Curation</p>
            <h2>Scan Barcode / QR Code to Apply</h2>
            <p class="lead">Scan the barcode / QR code with your smartphone camera to access the form, or click the direct button to complete your registration online.</p>
        </header>

        <div class="grid grid-2 qr-grid">
            @foreach ($forms as $f)
                <article class="card qr-card">
                    <div class="qr-card-header">
                        <span class="qr-badge {{ $f['id'] === 'assessment-ekspansi' ? 'qr-badge-green' : 'qr-badge-navy' }}">
                            {{ $f['badge'] }}
                        </span>
                        <h3 class="qr-card-title">{{ $f['title'] }}</h3>
                        <p class="qr-card-subtitle">{{ $f['subtitle'] }}</p>
                    </div>

                    <div class="qr-scanner-box">
                        <div class="qr-frame">
                            <span class="corner tl"></span>
                            <span class="corner tr"></span>
                            <span class="corner bl"></span>
                            <span class="corner br"></span>
                            <img src="{{ asset($f['qr_svg']) }}" alt="QR Code {{ $f['title'] }}" width="220" height="220" class="qr-img" loading="lazy">
                        </div>
                        <div class="qr-scan-hint">
                            <svg class="qr-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 7V5a2 2 0 0 1 2-2h2"></path>
                                <path d="M17 3h2a2 2 0 0 1 2 2v2"></path>
                                <path d="M21 17v2a2 2 0 0 1-2 2h-2"></path>
                                <path d="M7 21H5a2 2 0 0 1-2-2v-2"></path>
                                <rect x="7" y="7" width="10" height="10" rx="1"></rect>
                            </svg>
                            <span>Scan with your smartphone camera to open</span>
                        </div>
                    </div>

                    <div class="qr-card-body">
                        <p class="qr-desc">{{ $f['desc'] }}</p>
                        
                        <div class="qr-actions">
                            <a href="{{ $f['url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-sm qr-btn-main">
                                Open Form
                                <svg class="btn-icon" viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                    <polyline points="15 3 21 3 21 9"></polyline>
                                    <line x1="10" y1="14" x2="21" y2="3"></line>
                                </svg>
                            </a>
                            <a href="{{ asset($f['qr_png']) }}" download="{{ $f['id'] }}-qrcode.png" class="btn btn-outline-dark btn-sm">
                                Download Barcode
                            </a>
                            <button type="button" class="btn btn-outline-dark btn-sm btn-copy-link" data-url="{{ $f['url'] }}">
                                Copy Link
                            </button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== Event ===== --}}
<section class="section section-navy" id="event">
    <div class="container center-text">
        <p class="eyebrow">Upcoming</p>
        <h2>{{ $event['name'] }}</h2>
        <p class="lead light">{{ $event['detail'] }}</p>
        <p class="muted-light">Connecting Indonesia–Saudi capabilities for better pilgrim services: cross-border business integration, hospitality, food operations and technology-enabled coordination.</p>
        <a href="#contact" class="btn btn-gold">Schedule a discovery session</a>
    </div>
</section>

{{-- ===== Contact ===== --}}
<section class="section" id="contact">
    <div class="container">
        <header class="section-head center">
            <p class="eyebrow dark">Contact Us</p>
            <h2>Connect Opportunities. Build Partnerships. Enable Growth.</h2>
            <p class="lead">A business ecosystem built on trust, justice and shared prosperity.</p>
        </header>

        <div class="grid grid-5 contacts">
            @foreach ($units as $u)
                <article class="card">
                    <span class="sector">{{ $u['short'] ?? $u['name'] }}</span>
                    <h3>{{ $u['contact']['name'] }}</h3>
                    <a href="tel:{{ preg_replace('/[^\d+]/', '', $u['contact']['phone']) }}">{{ $u['contact']['phone'] }}</a>
                </article>
            @endforeach
        </div>

        <div class="contact-meta">
            <div>
                <h4>Email</h4>
                <a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a>
                <h4>Websites</h4>
                <p><a href="https://idrp.io" target="_blank" rel="noopener">idrp.io</a> ·
                   <a href="https://caritempat.co.id" target="_blank" rel="noopener">caritempat.co.id</a> ·
                   <a href="https://smanksa.com" target="_blank" rel="noopener">smanksa.com</a></p>
            </div>
            <div>
                <h4>Offices</h4>
                @foreach ($offices as $o)<p>{{ $o }}</p>@endforeach
            </div>
        </div>
    </div>
</section>

</main>

<footer class="site-footer">
    <div class="container footer-inner">
        <div>
            <strong>{{ $company['legal'] }}</strong>
            <span>{{ $company['tagline'] }}</span>
        </div>
        <span>&copy; {{ date('Y') }} IIC Group. All rights reserved.</span>
    </div>
</footer>

@endsection
