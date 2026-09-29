<!-- ====== HERO ====== -->
<section class="psychology-hero">
    <div class="psychology-hero-content">
        <span class="hero-label">Crime Vault • Criminal Psychology</span>
        <h1>The Psychology of Crime</h1>

        <p class="hero-description">
            Crime is rarely the product of a single decision. It develops through a complex interaction of biology, personality, childhood experiences,
            social environments, mental health, opportunity and countless life events. Criminal psychology seeks to understand these influences,
            helping investigators, researchers and clinicians study behaviour without excusing it.
        </p>
    </div>
</section>

<!-- ====== QUICK NAVIGATION ====== -->
<section class="psychology-navigation">
    <a href="{{ route('psychology.introduction') }}" class="{{ request()->routeIs('psychology.introduction') ? 'active' : '' }}">➤ Introduction</a>
    <a href="{{ route('psychology.fundamentals') }}" class="{{ request()->routeIs('psychology.fundamentals') ? 'active' : '' }}">➤ Fundamentals</a>
    <a href="{{ route('psychology.personality') }}" class="{{ request()->routeIs('psychology.personality') ? 'active' : '' }}">➤ Personality</a>
    <a href="{{ route('psychology.profiling') }}" class="{{ request()->routeIs('psychology.profiling') ? 'active' : '' }}">➤ Profiling</a>
    <a href="{{ route('psychology.crimeScenes') }}" class="{{ request()->routeIs('psychology.crimeScenes') ? 'active' : '' }}">➤ Crime Scenes</a>
    <a href="{{ route('psychology.investigativePsychology') }}" class="{{ request()->routeIs('psychology.investigativePsychology') ? 'active' : '' }}">➤ Investigative Psychology</a>
    <a href="{{ route('psychology.victimology') }}" class="{{ request()->routeIs('psychology.victimology') ? 'active' : '' }}">➤ Victimology</a>
    <a href="{{ route('psychology.experiments') }}" class="{{ request()->routeIs('psychology.experiments') ? 'active' : '' }}">➤ Experiments</a>
    <a href="{{ route('psychology.myths') }}" class="{{ request()->routeIs('psychology.myths') ? 'active' : '' }}">➤ Myths</a>
    <a href="{{ route('psychology.resources') }}" class="{{ request()->routeIs('psychology.resources') ? 'active' : '' }}">➤ Resources</a>
    <a href="{{ route('psychology.facts') }}" class="{{ request()->routeIs('psychology.facts') ? 'active' : '' }}">➤ Facts</a>
    <a href="{{ route('psychology.faq') }}" class="{{ request()->routeIs('psychology.faq') ? 'active' : '' }}">➤ FAQ</a>
</section>