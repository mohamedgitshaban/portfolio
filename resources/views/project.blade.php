<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $project['name'] }} — {{ $cv['name'] }}</title>
    <meta name="description" content="{{ Str::limit($project['description'], 155) }}">
    <meta name="theme-color" content="#0a0a0c">

    <meta property="og:title" content="{{ $project['name'] }} — {{ $cv['name'] }}">
    <meta property="og:description" content="{{ Str::limit($project['description'], 155) }}">
    <meta property="og:type" content="article">

    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><rect width=%22100%22 height=%22100%22 rx=%2222%22 fill=%22%230a0a0c%22/><text x=%2250%22 y=%2266%22 font-size=%2252%22 font-family=%22Georgia,serif%22 fill=%22%23c8ff4d%22 text-anchor=%22middle%22>{{ $cv['initials'] }}</text></svg>">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="grain" aria-hidden="true"></div>
    <div class="cursor-dot" aria-hidden="true"></div>
    <div class="cursor-ring" aria-hidden="true"></div>

    @include('partials.nav', ['cv' => $cv, 'home' => false])

    <main id="top">
        <article class="project-detail">
            <div class="wrap">
                <a href="{{ route('home') }}#projects" class="back-link" data-reveal>← All Projects</a>

                <div class="project-hero">
                    <div class="eyebrow" data-reveal>Selected Work · {{ sprintf('%02d', $index + 1) }} / {{ count($cv['projects']) }}</div>
                    <h1 class="project-title" data-reveal>{{ $project['name'] }}</h1>
                    <p class="project-subtitle" data-reveal>{{ $project['subtitle'] }}</p>

                    <div class="project-hero-foot" data-reveal>
                        <div class="tag-row">
                            @foreach ($project['stack'] as $tech)
                                <span class="tag">{{ $tech }}</span>
                            @endforeach
                        </div>

                        <div class="project-links">
                            @if (!empty($project['link']))
                                <a href="{{ $project['link'] }}" class="btn btn-primary" target="_blank" rel="noopener" data-magnetic>
                                    <span>Visit Live Project ↗</span>
                                </a>
                            @else
                                <span class="badge-private">Private client project · no public link</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="project-cover" data-reveal aria-hidden="true" style="--cover-hue: {{ ($index * 47) % 360 }}deg;">
                    <div class="project-cover-chrome"><span></span><span></span><span></span></div>
                    <div class="project-cover-mark">{{ Str::of($project['name'])->substr(0, 1) }}</div>
                </div>

                <div class="project-body">
                    <div class="project-body-grid">
                        <div data-reveal>
                            <h2 class="body-heading">Overview</h2>
                            <p class="body-text">{{ $project['description'] }}</p>
                        </div>

                        <div data-reveal>
                            <h2 class="body-heading">Highlights</h2>
                            <ul class="timeline-points">
                                @foreach ($project['points'] as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- ===================== PREVIEW ===================== --}}
                    <h2 class="body-heading" data-reveal style="margin-top:3.5rem;">Preview</h2>

                    @if (!empty($project['screenshots']))
                        <div class="preview-grid" data-reveal-stagger>
                            @foreach ($project['screenshots'] as $shot)
                                <figure class="preview-shot" data-reveal-item>
                                    <img src="{{ asset($shot) }}" alt="{{ $project['name'] }} screenshot" loading="lazy">
                                </figure>
                            @endforeach
                        </div>
                    @else
                        <div class="preview-grid" data-reveal-stagger>
                            @foreach (['Dashboard', 'Workflow', 'Reports'] as $label)
                                <div class="preview-panel" data-reveal-item>
                                    <div class="preview-chrome"><span></span><span></span><span></span></div>
                                    <div class="preview-skeleton">
                                        <div class="sk-row sk-row-wide"></div>
                                        <div class="sk-grid">
                                            <div class="sk-block"></div>
                                            <div class="sk-block"></div>
                                            <div class="sk-block"></div>
                                        </div>
                                        <div class="sk-row"></div>
                                        <div class="sk-row sk-row-short"></div>
                                    </div>
                                    <div class="preview-label">{{ $label }}</div>
                                </div>
                            @endforeach
                        </div>
                        <p class="preview-note">Placeholder preview — real product screens are client-confidential; add public-safe screenshots via <code>config/portfolio.php</code> once available.</p>
                    @endif

                    {{-- ===================== CASE STUDY (Wathiqaty only) ===================== --}}
                    @if ($caseStudy)
                        <div class="case-study" data-reveal>
                            <h2 class="body-heading">Security Remediation Case Study</h2>
                            <p class="body-text">{{ $caseStudy['description'] }}</p>
                            <p class="security-desc" style="margin-top:0.6rem;">
                                An independent security vendor ran the gray-box penetration test — every finding below is one I triaged and closed as the remediation engineer, not one I introduced.
                            </p>

                            <div class="security-counters" style="margin-top:2rem;" data-reveal>
                                @foreach ($caseStudy['counters'] as $counter)
                                    <div class="security-counter">
                                        <div class="num" data-counter="{{ $counter['value'] }}">0</div>
                                        <div class="num-label">{{ $counter['label'] }} Fixed</div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="finding-grid" style="margin-top:2.5rem;" data-reveal-stagger>
                                @foreach ($caseStudy['findings'] as $finding)
                                    <div class="finding-card" data-reveal-item>
                                        <h4>{{ $finding['title'] }}</h4>
                                        <p>{{ $finding['detail'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <nav class="project-pagination" data-reveal>
                    <a href="{{ route('project.show', $previous['slug']) }}" class="pagination-link prev">
                        <span class="pagination-label">← Previous</span>
                        <span class="pagination-name">{{ $previous['name'] }}</span>
                    </a>
                    <a href="{{ route('project.show', $next['slug']) }}" class="pagination-link next">
                        <span class="pagination-label">Next →</span>
                        <span class="pagination-name">{{ $next['name'] }}</span>
                    </a>
                </nav>
            </div>
        </article>
    </main>

    @include('partials.footer', ['cv' => $cv, 'home' => false])

</body>
</html>
