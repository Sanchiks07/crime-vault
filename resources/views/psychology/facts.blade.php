<x-layout>
    <div class="psychology-page">
        <!-- Background Effects -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>
        
        <div class="psychology-container">
            <!-- ====== QUICK NAVIGATION ====== -->
            <section class="psychology-navigation">
                <a href="{{ route('psychology.introduction') }}">➤ Introduction</a>
                <a href="{{ route('psychology.fundimentals') }}">➤ Fundimentals</a>
                <a href="{{ route('psychology.personality') }}">➤ Personality</a>
                <a href="{{ route('psychology.profiling') }}">➤ Profiling</a>
                <a href="{{ route('psychology.crimeScenes') }}">➤ Crime Scenes</a>
                <a href="{{ route('psychology.investigativePsychology') }}">➤ Investigative Psychology</a>
                <a href="{{ route('psychology.victimology') }}">➤ Victimology</a>
                <a href="{{ route('psychology.experiments') }}">➤ Experiments</a>
                <a href="{{ route('psychology.myths') }}">➤ Myths</a>
                <a href="{{ route('psychology.resources') }}">➤ Resources</a>
                <a href="{{ route('psychology.facts') }}" class="{{ request()->routeIs('psychology.facts') ? 'active' : '' }}">➤ Facts</a>
                <a href="{{ route('psychology.faq') }}">➤ FAQ</a>
            </section>

            <!-- ====== FACT CARDS ====== -->
            <section class="psychology-section">
                <div class="section-heading">
                    <span class="section-tag">Important Facts</span>
                    <h2>Understanding Risk Factors</h2>
                </div>

                <div class="psychology-grid fact-grid">
                    <article class="fact-card">
                        <span class="fact-icon">⚠</span>
                        <h3>Risk Factor</h3>

                        <p>
                            A risk factor increases the statistical likelihood of a certain
                            outcome but does not guarantee that outcome will occur.
                        </p>
                    </article>

                    <article class="fact-card">
                        <span class="fact-icon">🛡</span>
                        <h3>Protective Factor</h3>

                        <p>
                            Positive relationships, education, therapy, community support and
                            stable environments reduce the likelihood of violent behaviour.
                        </p>
                    </article>

                    <article class="fact-card">
                        <span class="fact-icon">🧩</span>
                        <h3>Multiple Causes</h3>

                        <p>
                            Crime almost never has a single explanation. Biological,
                            psychological and environmental influences continuously interact
                            throughout life.
                        </p>
                    </article>

                    <article class="fact-card">
                        <span class="fact-icon">⚖</span>
                        <h3>Responsibility</h3>

                        <p>
                            Understanding why behaviour develops should never be confused with
                            excusing criminal actions. Accountability remains an essential
                            principle of the justice system.
                        </p>
                    </article>
                </div>
            </section>

            <!-- ====== DID YOU KNOW ====== -->
            <section class="psychology-section">
                <div class="section-heading">
                    <span class="section-tag">Quick Facts</span>
                    <h2>Did You Know?</h2>
                </div>

                <div class="psychology-grid facts-grid">
                    <article class="fact-highlight">
                        <h3>Empathy Is Complex</h3>

                        <p>
                            Empathy consists of multiple components. A person may understand
                            another individual's emotions (cognitive empathy) while lacking
                            emotional concern (affective empathy). These are related but
                            distinct psychological processes.
                        </p>
                    </article>

                    <article class="fact-highlight">
                        <h3>Criminal Behaviour Changes</h3>

                        <p>
                            Many offenders alter their methods over time. Increased
                            confidence, experience, changing circumstances and forensic
                            awareness often influence how crimes are committed.
                        </p>
                    </article>

                    <article class="fact-highlight">
                        <h3>Most Violence Is Not Serial</h3>

                        <p>
                            Serial homicide represents an extremely small proportion of all
                            violent crime. It receives disproportionate public attention due
                            to its rarity and media coverage.
                        </p>
                    </article>

                    <article class="fact-highlight">
                        <h3>Psychology Evolves</h3>

                        <p>
                            Criminal psychology is continually updated as new research emerges.
                            Ideas once considered established may later be refined or replaced
                            by stronger scientific evidence.
                        </p>
                    </article>
                </div>
            </section>
        </div>
    </div>
</x-layout>