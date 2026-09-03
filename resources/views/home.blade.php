<script>
    window.featuredCases = @json($featuredCases);
</script>

<x-layout>
    <div class="page">
        <!-- Background Effect -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="page-container home-layout">
            <!-- Hero -->
            <section class="home-hero">
                <h1>Crime Vault</h1>

                <p>
                    A digital archive of humanity's darkest stories. 
                    Patterns, motives, and the quiet echoes left behind.
                </p>
            </section>

            <!-- About -->
            <section class="home-about">
                <h2>About the Project</h2>

                <p>
                    Crime Vault documents real criminal cases with structure and clarity.
                    Not spectacle. Not entertainment. Just truth, patterns, and the weight of consequence.
                </p>
            </section>

            <!-- Explore -->
            <section class="home-explore">
                <h2>Explore the Archive</h2>

                <div class="home-grid">
                    <a href="{{ route('cases.killers.index') }}" class="archive-card-link">
                        <div class="home-card">
                            <div class="home-card-overlay"></div>

                            <div class="home-card-content">
                                <h3>Serial Killers</h3>
                                <p>Profiles, timelines, and behavioral patterns.</p>
                            </div>

                            <div class="home-card-line"></div>
                        </div>
                    </a>

                    <a href="{{ route('cases.unsolved.index') }}" class="archive-card-link">
                        <div class="home-card">
                            <div class="home-card-overlay"></div>

                            <div class="home-card-content">
                                <h3>Unsolved Cases</h3>
                                <p>Mysteries frozen in time.</p>
                            </div>

                            <div class="home-card-line"></div>
                        </div>
                    </a>

                    <a href="{{ route('psychology.introduction') }}" class="archive-card-link">
                        <div class="home-card">
                            <div class="home-card-overlay"></div>

                            <div class="home-card-content">
                                <h3>Psychology</h3>
                                <p>Inside the mind behind the crime.</p>
                            </div>

                            <div class="home-card-line"></div>
                        </div>
                    </a>

                    <a href="{{ route('victims') }}" class="archive-card-link">
                        <div class="home-card">
                            <div class="home-card-overlay"></div>

                            <div class="home-card-content">
                                <h3>Victims</h3>
                                <p>The lives behind the headlines.</p>
                            </div>

                            <div class="home-card-line"></div>
                        </div>
                    </a>

                    <a href="{{ route('resources') }}" class="archive-card-link">
                        <div class="home-card">
                            <div class="home-card-overlay"></div>

                            <div class="home-card-content">
                                <h3>Resources</h3>
                                <p>Tools and research materials.</p>
                            </div>

                            <div class="home-card-line"></div>
                        </div>
                    </a>
                </div>
            </section>

            <!-- Purpose + Featured -->
            <section class="home-info-grid">
                <div class="home-purpose-card">
                    <h2>Why This Exists</h2>

                    <p>
                        Not to glorify. Not to entertain.
                        Every entry is a record of consequence, a reminder that behind data are human lives.
                    </p>
                </div>

                <div class="home-featured-card">
                    <h2>Featured Case</h2>

                    <div class="home-featured-content" id="featured-case">
                        <h3 id="fc-title"></h3>

                        <p class="home-featured-type" id="fc-type"></p>
                        <p class="home-featured-description" id="fc-description"></p>

                        <a id="fc-link" href="#" class="home-featured-link">View Case →</a>
                    </div>
                </div>
            </section>

            <!-- CTA -->
            <section class="home-cta">
                <h2>Start Exploring</h2>

                <p>Choose a path. Follow the evidence.</p>

                <div class="home-buttons">
                    <a href="/cases/serial-killers" class="home-button">Serial Killers</a>
                    <a href="/cases/unsolved-cases" class="home-button">Unsolved Cases</a>
                </div>
            </section>
        </div>
    </div>
</x-layout>