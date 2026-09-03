@php
    // On the homepage, nav links are same-page anchors handled by the smooth
    // scroller. Anywhere else, they need the leading "/" so the browser
    // navigates home first, then jumps to the section.
    $home = $home ?? true;
    $prefix = $home ? '' : '/';
@endphp

<header class="nav">
    <a href="{{ route('home') }}" class="nav-mark" aria-label="{{ $cv['name'] }} — home">
        <span class="dot"></span> {{ $cv['initials'] }}
    </a>

    <nav>
        <ul class="nav-links">
            <li><a href="{{ $prefix }}#about">About</a></li>
            <li><a href="{{ $prefix }}#skills">Skills</a></li>
            <li><a href="{{ $prefix }}#experience">Experience</a></li>
            <li><a href="{{ $prefix }}#security">Security</a></li>
            <li><a href="{{ $prefix }}#projects">Projects</a></li>
            <li><a href="{{ $prefix }}#contact">Contact</a></li>
        </ul>
    </nav>

    <a href="{{ asset($cv['resume']) }}" class="nav-cta" target="_blank" rel="noopener" data-magnetic>
        Résumé ↗
    </a>

    <button class="nav-burger" aria-label="Toggle menu">
        <span></span><span></span><span></span>
    </button>
</header>

<div class="mobile-menu" id="mobile-menu">
    <a href="{{ $prefix }}#about">About</a>
    <a href="{{ $prefix }}#skills">Skills</a>
    <a href="{{ $prefix }}#experience">Experience</a>
    <a href="{{ $prefix }}#security">Security</a>
    <a href="{{ $prefix }}#projects">Projects</a>
    <a href="{{ $prefix }}#contact">Contact</a>
</div>
