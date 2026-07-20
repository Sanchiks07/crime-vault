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
                <a href="{{ route('psychology.experiments') }}">➤ Experiments</a>
                <a href="{{ route('psychology.myths') }}">➤ Myhts</a>
                <a href="{{ route('psychology.resources') }}">➤ Resources</a>
                <a href="{{ route('psychology.facts') }}">➤ Facts</a>
                <a href="{{ route('psychology.faq') }}">➤ FAQ</a>
            </section>

            <!-- ====== VICTIMOLOGY ====== -->
            <section class="psychology-section" id="victimology">
                <div class="section-heading">
                    <span class="section-tag">Vicitm Studies</span>
                    <h2>Victimology</h2>

                    <p class="psychology-card" style="margin-top:35px">
                        Victimology studies the experiences of victims, the impact of crime,
                        and the relationship between individuals, offenders, communities, and justice systems.
                    </p>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-card">
                        <h3>More Than Statistics</h3>

                        <p>
                            Every case file represents a real person, real relationships,
                            and lasting consequences that extend far beyond the moment a crime occurs.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Trauma</h3>

                        <p>
                            Trauma can affect memory, concentration, emotional regulation,
                            sleep, decision making, and physical health.
                        </p>

                        <p>These reactions are normal responses to abnormal experiences.</p>
                    </article>

                    <article class="psychology-card">
                        <h3>Secondary Victimization</h3>

                        <p>
                            Victims may experience additional harm through insensitive questioning,
                            media exposure,
                            social stigma,
                            or failures within the justice system.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Recovery</h3>

                        <p>
                            Recovery is not linear.
                            Psychological healing varies between individuals and may continue for years.
                        </p>
                    </article>
                </div>

                <div class="museum-panel">
                    <h3>Why Victimology Matters</h3>

                    <p>
                        Understanding victims improves investigations, strengthens support services, guides prevention efforts,
                        and reminds investigators that every criminal case ultimately involves human lives, not merely evidence.
                    </p>
                </div>
            </section>
        </div>
    </div>
</x-layout>