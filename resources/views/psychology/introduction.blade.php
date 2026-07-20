<x-layout>
    <div class="psychology-page">
        <!-- ====== BACKGROUND EFFECTS ====== -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="psychology-container">
            <!-- ====== HERO ====== -->
            <section class="psychology-hero">
                <div class="psychology-hero-content">
                    <span class="hero-label">Crime Vault • Criminal Psychology</span>
                    <h1>The Psychology of Crime</h1>

                    <p class="hero-description">
                        Crime is rarely the product of a single decision. It develops through
                        a complex interaction of biology, personality, childhood experiences,
                        social environments, mental health, opportunity and countless life
                        events. Criminal psychology seeks to understand these influences,
                        helping investigators, researchers and clinicians study behaviour
                        without excusing it.
                    </p>
                </div>
            </section>

            <!-- ====== QUICK NAVIGATION ====== -->
            <section class="psychology-navigation">
                <a href="{{ route('psychology.fundimentals') }}">➤ Fundimentals</a>
                <a href="{{ route('psychology.personality') }}">➤ Personality</a>
                <a href="{{ route('psychology.profiling') }}">➤ Profiling</a>
                <a href="{{ route('psychology.crimeScenes') }}">➤ Crime Scenes</a>
                <a href="{{ route('psychology.investigativePsychology') }}">➤ Investigative Psychology</a>
                <a href="{{ route('psychology.victimology') }}">➤ Victimology</a>
                <a href="{{ route('psychology.experiments') }}">➤ Experiments</a>
                <a href="{{ route('psychology.myths') }}">➤ Myhts</a>
                <a href="{{ route('psychology.resources') }}">➤ Resources</a>
                <a href="{{ route('psychology.facts') }}">➤ Facts</a>
                <a href="{{ route('psychology.faq') }}">➤ FAQ</a>
            </section>

            <!-- ====== INTRODUCTION ====== -->
            <section id="introduction" class="psychology-section">
                <div class="section-heading">
                    <span class="section-tag">Foundations</span>
                    <h2>Understanding the Criminal Mind</h2>
                </div>

                <div class="psychology-card psychology-introduction">
                    <div class="psychology-text">
                        <p>
                            Popular media often portrays violent offenders as monsters,
                            masterminds or mysterious geniuses whose actions cannot be
                            explained. Reality is considerably more complex. Modern criminal
                            psychology does not search for a single cause of violence because
                            no such cause exists.
                        </p>

                        <p>
                            Every individual develops through a unique combination of genetic
                            predispositions, family relationships, education, trauma,
                            neurological development, social influences and personal choices.
                            These factors interact throughout life, creating different patterns
                            of behaviour that may increase or decrease the likelihood of
                            criminal activity.
                        </p>

                        <p>
                            Importantly, psychology is not a tool for predicting whether
                            someone will become a criminal. Most people who experience severe
                            trauma never commit violent crimes, while many offenders come from
                            stable and supportive backgrounds. Criminal behaviour is shaped by
                            probabilities and patterns rather than certainty.
                        </p>
                    </div>

                    <div class="psychology-side-note">
                        <div class="info-box">
                            <h3>Key Principle</h3>

                            <p>
                                Understanding behaviour does not mean justifying behaviour.
                                Criminal psychology aims to explain how violent behaviour
                                develops, improve investigations and support prevention
                                strategies while maintaining accountability for criminal acts.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ====== INFO GRID ====== -->
            <section class="psychology-section">
                <div class="section-heading">
                    <span class="section-tag">Core Concepts</span>
                    <h2>Four Pillars of Criminal Psychology</h2>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-info-card">
                        <div class="card-number">01</div>
                        <h3>Behaviour</h3>

                        <p>
                            Investigators examine actions before, during and after a crime.
                            Patterns of planning, communication, victim selection and attempts
                            to avoid capture often reveal far more than appearances alone.
                        </p>
                    </article>

                    <article class="psychology-info-card">
                        <div class="card-number">02</div>
                        <h3>Environment</h3>

                        <p>
                            Family life, education, poverty, abuse, neglect, peer influence
                            and cultural expectations all contribute to development. These
                            influences may increase risk, but they never determine destiny.
                        </p>
                    </article>

                    <article class="psychology-info-card">
                        <div class="card-number">03</div>
                        <h3>Biology</h3>

                        <p>
                            Genetics, hormones, brain development and neurological conditions
                            can influence emotional regulation, impulse control and decision
                            making, although biology alone cannot explain violent crime.
                        </p>
                    </article>

                    <article class="psychology-info-card">
                        <div class="card-number">04</div>
                        <h3>Decision Making</h3>

                        <p>
                            Even when risk factors are present, individuals continue making choices. 
                            Criminal psychology studies why certain decisions occur,
                            how they escalate over time and how intervention may prevent further violence.
                        </p>
                    </article>
                </div>
            </section>

            <!-- ====== FINAL REFLECTION ====== -->
            <section class="psychology-section psychology-closing">
                <div class="museum-panel">
                    <blockquote>
                        "The most valuable tool in any investigation is not certainty...
                        it is curiosity guided by evidence."
                    </blockquote>
                </div>
            </section>
        </section>
    </div>
</x-layout>