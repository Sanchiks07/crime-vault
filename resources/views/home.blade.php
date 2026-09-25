<script>
    window.featuredCases = @json($featuredCases);
</script>

<x-layout>
    <div class="page home-page">
        <!-- Background effect -->
        <div class="psychology-background" aria-hidden="true">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="page-container home-layout">
            <section class="home-hero" aria-labelledby="home-title">
                <!-- hero -->
                <div class="home-hero-copy">
                    <span class="home-eyebrow"><span class="home-status-dot"></span> An archive of real cases</span>
                    <h1 id="home-title">Every case leaves <em>a trace.</em></h1>
                    <p>Explore the stories, patterns, and unanswered questions behind the headlines. Follow the evidence. Remember the people.</p>
                    <div class="home-hero-actions">
                        <a href="{{ route('cases.killers.index') }}" class="home-primary-action">Enter the archive <span aria-hidden="true">↗</span></a>
                        <a href="{{ route('caseEvents') }}" class="home-secondary-action">Explore the map <span aria-hidden="true">→</span></a>
                    </div>
                </div>

                <!-- featured case -->
                <div class="home-featured-card" aria-label="Rotating featured case">
                    <div class="home-featured-topline"><span>From the archive</span><span class="home-live-marker">Featured case</span></div>
                    <div class="home-featured-content" id="featured-case" aria-live="off">
                        <p class="home-featured-type" id="fc-type"></p>
                        <h2 id="fc-title"></h2>
                        <p class="home-featured-description" id="fc-description"></p>
                        <a id="fc-link" href="#" class="home-featured-link">Open case file <span aria-hidden="true">↗</span></a>
                    </div>
                    <div class="home-featured-footer"><span>Selected case file</span><span>Rotates every 10 seconds</span></div>
                </div>
            </section>

            <!-- explore -->
            <section class="home-explore" aria-labelledby="home-explore-heading">
                <div class="home-section-heading">
                    <div><span class="home-section-kicker">Choose your path</span><h2 id="home-explore-heading">Inside the vault</h2></div>
                    <p>Start with a case, follow a question, or meet the lives behind the record.</p>
                </div>
                <div class="home-grid">
                    <a href="{{ route('cases.killers.index') }}" class="home-card home-card-wide"><span class="home-card-number">01 / CASE FILES</span><div><h3>Serial Killers</h3><p>Profiles, patterns, and the history behind each case.</p></div><span class="home-card-arrow" aria-hidden="true">↗</span></a>
                    <a href="{{ route('cases.unsolved.index') }}" class="home-card home-card-wide"><span class="home-card-number">02 / OPEN QUESTIONS</span><div><h3>Unsolved Cases</h3><p>Investigations where answers remain out of reach.</p></div><span class="home-card-arrow" aria-hidden="true">↗</span></a>
                    <a href="{{ route('victims') }}" class="home-card"><span class="home-card-number">03 / PEOPLE</span><div><h3>Victims</h3><p>The lives behind the headlines.</p></div><span class="home-card-arrow" aria-hidden="true">↗</span></a>
                    <a href="{{ route('psychology.introduction') }}" class="home-card"><span class="home-card-number">04 / UNDERSTANDING</span><div><h3>Psychology</h3><p>Explore behavior, investigation, and the myths around both.</p></div><span class="home-card-arrow" aria-hidden="true">↗</span></a>
                    <a href="{{ route('caseEvents') }}" class="home-card"><span class="home-card-number">05 / PLACES & TIME</span><div><h3>Explore</h3><p>Follow case events across the map.</p></div><span class="home-card-arrow" aria-hidden="true">↗</span></a>
                    <a href="{{ route('resources') }}" class="home-card"><span class="home-card-number">06 / RESEARCH</span><div><h3>Resources</h3><p>Further reading and tools for a deeper look.</p></div><span class="home-card-arrow" aria-hidden="true">↗</span></a>
                </div>
            </section>

            <!-- purpose -->
            <section class="home-purpose" aria-labelledby="home-purpose-heading">
                <span class="home-section-kicker">The purpose</span>
                <h2 id="home-purpose-heading">More than a headline.</h2>
                <p>
                    Crime Vault documents cases with care and context. Every number represents a person; 
                    every unanswered question deserves to be approached with curiosity and respect.
                </p>
                <a href="{{ route('victims') }}">Remember the people <span aria-hidden="true">→</span></a>
            </section>
        </div>
    </div>
</x-layout>
