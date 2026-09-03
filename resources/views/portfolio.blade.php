<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $cv['name'] }} — {{ $cv['roles'][0] }}</title>
    <meta name="description" content="{{ Str::limit($cv['summary'], 155) }}">
    <meta name="theme-color" content="#0a0a0c">

    <meta property="og:title" content="{{ $cv['name'] }} — {{ $cv['roles'][0] }}">
    <meta property="og:description" content="{{ Str::limit($cv['summary'], 155) }}">
    <meta property="og:type" content="website">

    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 rx=%2222%22 fill=%22%230a0a0c%22/><text x=%2250%22 y=%2266%22 font-size=%2252%22 font-family=%22Georgia,serif%22 fill=%22%23c8ff4d%22 text-anchor=%22middle%22>{{ $cv['initials'] }}</text></svg>">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="preloader" aria-hidden="true">
        <div class="pl-name">{{ $cv['name'] }}</div>
        <div class="pl-bar"><span></span></div>
    </div>

    <div class="grain" aria-hidden="true"></div>
    <div class="cursor-dot" aria-hidden="true"></div>
    <div class="cursor-ring" aria-hidden="true"></div>

    @include('partials.nav', ['cv' => $cv, 'home' => true])

    <main id="top">

        {{-- ============================= HERO ============================= --}}
        <section class="hero">
            <div class="hero-blob" aria-hidden="true"><span class="b1"></span><span class="b2"></span></div>

            <div class="wrap">
                <div class="hero-eyebrow">
                    <span class="pulse-dot"></span>
                    @if($cv['available'])
                        Available for new opportunities · {{ $cv['location'] }}
                    @else
                        {{ $cv['location'] }}
                    @endif
                </div>

                <h1 class="hero-name">
                    <span class="line"><span>{{ explode(' ', $cv['name'])[0] }}</span></span>
                    <span class="line"><span><em>{{ explode(' ', $cv['name'])[1] ?? '' }}</em></span></span>
                </h1>

                <div class="hero-roles">
                    <span>I build for</span>
                    <span class="role-cycle" data-roles="{{ json_encode($cv['roles']) }}">{{ $cv['roles'][0] }}</span>
                </div>

                <div class="hero-foot">
                    <p class="hero-summary">{{ Str::of($cv['summary'])->limit(220) }}</p>

                    <div class="hero-actions">
                        <a href="#projects" class="btn"><span>View Work</span></a>
                        <a href="#contact" class="btn btn-primary"><span>Get in Touch</span></a>
                    </div>
                </div>
            </div>

            <div class="scroll-cue"><span class="bar"></span> Scroll</div>
        </section>

        <div class="marquee" aria-hidden="true">
            <div class="marquee-track">
                @foreach (array_merge($cv['stack_ticker'], $cv['stack_ticker']) as $item)
                    <span>{{ $item }}</span>
                @endforeach
            </div>
        </div>

        {{-- ============================= ABOUT ============================= --}}
        <section id="about" class="about">
            <div class="wrap">
                <div class="eyebrow" data-reveal>01 — About</div>

                <div class="about-grid" style="margin-top:2rem;">
                    <p class="about-text">
                        @foreach (explode(' ', $cv['summary']) as $word)
                            <span class="fade-word">{{ $word }}</span>
                        @endforeach
                    </p>

                    <div class="stat-grid" data-reveal>
                        @foreach ($cv['stats'] as $stat)
                            <div class="stat-cell">
                                <div class="stat-num" data-counter="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">0{{ $stat['suffix'] }}</div>
                                <div class="stat-label">{{ $stat['label'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================= SKILLS ============================= --}}
        <section id="skills" class="skills">
            <div class="wrap">
                <div class="section-head">
                    <div>
                        <div class="eyebrow" data-reveal>02 — Skills</div>
                        <h2 class="section-title" data-reveal>Tools of the&nbsp;trade.</h2>
                    </div>
                    <p class="section-note" data-reveal>A backend-first stack, sharpened by four years of shipping production systems — and a growing focus on securing them.</p>
                </div>

                <div class="skill-groups" data-reveal-stagger>
                    @foreach ($cv['skills'] as $group)
                        <div class="skill-card" data-reveal-item>
                            <h3>{{ $group['group'] }}</h3>
                            <div class="tag-row">
                                @foreach ($group['items'] as $skill)
                                    <span class="tag">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================= EXPERIENCE ============================= --}}
        <section id="experience" class="experience">
            <div class="wrap">
                <div class="section-head">
                    <div>
                        <div class="eyebrow" data-reveal>03 — Experience</div>
                        <h2 class="section-title" data-reveal>Where I've built.</h2>
                    </div>
                    <p class="section-note" data-reveal>From ERP and payments to a full application-security remediation program.</p>
                </div>

                <div class="timeline">
                    <div class="timeline-line"><div class="timeline-line-fill"></div></div>

                    @foreach ($cv['experience'] as $job)
                        <div class="timeline-item {{ $job['current'] ? 'is-current' : '' }}" data-reveal>
                            <div class="timeline-dot"></div>

                            <div class="timeline-head">
                                <div class="timeline-role">
                                    {{ $job['role'] }} <span class="company">— {{ $job['company'] }}</span>
                                    @if ($job['current'])
                                        <span class="badge-current">Current</span>
                                    @endif
                                </div>
                                <div class="timeline-meta">{{ $job['period'] }} · {{ $job['location'] }}</div>
                            </div>

                            <ul class="timeline-points">
                                @foreach ($job['points'] as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================= SECURITY SPOTLIGHT ============================= --}}
        <section id="security" class="security">
            <div class="wrap">
                <div class="security-top">
                    <div>
                        <div class="eyebrow" data-reveal>04 — Security Spotlight</div>
                        <h2 class="section-title" data-reveal>{{ $cv['security']['title'] }}</h2>
                        <p class="security-desc" data-reveal style="margin-top:1.2rem;">
                            An independent security vendor ran the gray-box penetration test — every finding below is one I triaged and closed as the remediation engineer, not one I introduced.
                        </p>
                        <a href="{{ route('project.show', 'wathiqaty') }}" class="btn" data-reveal style="margin-top:1.6rem;">
                            <span>Read the Full Case Study ↗</span>
                        </a>
                    </div>

                    <div class="security-counters" data-reveal>
                        @foreach ($cv['security']['counters'] as $counter)
                            <div class="security-counter">
                                <div class="num" data-counter="{{ $counter['value'] }}">0</div>
                                <div class="num-label">{{ $counter['label'] }} Fixed</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================= PROJECTS ============================= --}}
        <section id="projects" class="projects">
            <div class="wrap">
                <div class="section-head">
                    <div>
                        <div class="eyebrow" data-reveal>05 — Selected Work</div>
                        <h2 class="section-title" data-reveal>Projects that shipped.</h2>
                    </div>
                    <p class="section-note" data-reveal>Seven systems across insurance, payments, logistics, HR, and the web — built and hardened end to end.</p>
                </div>

                <div class="project-grid">
                    @foreach ($cv['projects'] as $i => $project)
                        <a href="{{ route('project.show', $project['slug']) }}" class="project-card" data-reveal>
                            <span class="glow" aria-hidden="true"></span>
                            <div class="index">{{ sprintf('%02d', $i + 1) }}</div>
                            <h3>{{ $project['name'] }}</h3>
                            <div class="subtitle">{{ $project['subtitle'] }}</div>
                            <p class="project-summary">{{ $project['summary'] }}</p>

                            <div class="tag-row">
                                @foreach (array_slice($project['stack'], 0, 3) as $tech)
                                    <span class="tag">{{ $tech }}</span>
                                @endforeach
                            </div>

                            <span class="project-card-cta">View Case Study <span class="arrow">→</span></span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============================= EDUCATION / CERTS ============================= --}}
        <section id="credentials" class="credentials">
            <div class="wrap">
                <div class="eyebrow" data-reveal>06 — Credentials</div>

                <div class="credentials-grid" style="margin-top:2rem;">
                    <div data-reveal>
                        <h3>Education</h3>
                        @foreach ($cv['education'] as $edu)
                            <div class="credential-item">
                                <div class="name">{{ $edu['degree'] }}</div>
                                <div class="meta">{{ $edu['school'] }} · {{ $edu['location'] }} · {{ $edu['period'] }}</div>
                            </div>
                        @endforeach

                        <h3 style="margin-top:2.5rem;">Languages</h3>
                        @foreach ($cv['languages'] as $lang)
                            <div class="lang-row">
                                <span>{{ $lang['name'] }}</span>
                                <span class="level">{{ $lang['level'] }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div data-reveal>
                        <h3>Certifications</h3>
                        @foreach ($cv['certifications'] as $cert)
                            <div class="credential-item">
                                <div class="name">{{ $cert['name'] }}</div>
                                <div class="meta">{{ $cert['issuer'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- ============================= CONTACT ============================= --}}
        <section id="contact" class="contact">
            <div class="wrap">
                <div class="eyebrow" data-reveal>07 — Contact</div>
                <h2 class="contact-title" data-reveal>Let's build something <em>secure</em>, together.</h2>

                <div class="magnetic-link" data-reveal>
                    <a href="mailto:{{ $cv['email'] }}" data-magnetic>{{ $cv['email'] }}</a>
                </div>

                <div class="contact-meta" data-reveal>
                    <a href="tel:{{ str_replace(' ', '', $cv['phone']) }}">{{ $cv['phone'] }}</a>
                    @foreach ($cv['social'] as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener">{{ $social['label'] }} ↗</a>
                    @endforeach
                    <a href="{{ asset($cv['resume']) }}" target="_blank" rel="noopener">Download Résumé ↗</a>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer', ['cv' => $cv, 'home' => true])

</body>
</html>
