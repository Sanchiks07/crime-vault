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
                <a href="{{ route('psychology.resources') }}" class="{{ request()->routeIs('psychology.resources') ? 'active' : '' }}">➤ Resources</a>
                <a href="{{ route('psychology.facts') }}">➤ Facts</a>
                <a href="{{ route('psychology.faq') }}">➤ FAQ</a>
            </section>

            <!-- ======= LEARN MORE ======= -->
            <section id="resources" class="psychology-section">
                <div class="section-heading">
                    <span class="section-tag">Continue Learning</span>
                    <h2>Books, Podcasts & Research</h2>
                </div>

                <div class="psychology-card">
                    <p style="margin-bottom:15px">
                        Understanding criminal psychology requires more than documentaries and
                        headlines. The resources below include respected books, university
                        research, professional organisations and educational media that
                        provide evidence-based perspectives on forensic psychology,
                        neuroscience, criminology and behavioural science.
                    </p>

                    <p>
                        The collections below are intended as a starting point. Crime Vault
                        will continue expanding this library with recommended books, academic
                        papers, podcasts, documentaries and trusted organisations as new
                        content is added.
                    </p>
                </div>

                <div class="resource-preview-grid">
                    <article class="resource-preview">
                        <div class="resource-icon">📚</div>
                        <h3>Books</h3>

                        <p>
                            Influential works by psychologists, criminologists, behavioural
                            scientists and former FBI profilers.
                        </p>

                    </article>

                    <article class="resource-preview">
                        <div class="resource-icon">🎙️</div>
                        <h3>Podcasts</h3>

                        <p>
                            Educational discussions featuring researchers, clinicians,
                            investigators and psychology experts.
                        </p>
                    </article>

                    <article class="resource-preview">
                        <div class="resource-icon">🎥</div>
                        <h3>Videos & Documentaries</h3>

                        <p>
                            Carefully selected educational material focusing on psychology,
                            criminology and behavioural science.
                        </p>
                    </article>

                    <article class="resource-preview">
                        <div class="resource-icon">📄</div>
                        <h3>Research Papers</h3>

                        <p>
                            Academic publications exploring psychopathy, personality,
                            neuroscience, aggression and criminal behaviour.
                        </p>
                    </article>
                </div>
            </section>

            <!-- ===================================== -->
            <!-- Recommended Reading -->
            <!-- ===================================== -->
            <section class="psychology-section" id="reading">
                <div class="section-heading">
                    <span class="section-tag">Museum Library</span>
                    <h2>Continue Your Exploration</h2>

                    <p>
                        Every exhibit is only the beginning.
                        Criminal psychology is a constantly evolving discipline shaped by new research,
                        improved investigative methods, and a growing understanding of human behavior.
                        The books below are widely respected introductions for readers who want to learn
                        beyond documentaries and television dramas.
                    </p>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-card">
                        <h3>Thinking, Fast and Slow</h3>
                        <p class="card-subtitle">Decision Making & Cognitive Biases</p>

                        <p>
                            A landmark exploration of how people think, why intuition is powerful,
                            and how unconscious biases influence judgment and decision making.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>The Anatomy of Motive</h3>
                        <p class="card-subtitle">Behavioral Investigation</p>

                        <p>
                            Explores investigative reasoning, behavioral evidence,
                            and the importance of understanding motivation without relying on myths.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Influence</h3>
                        <p class="card-subtitle">Social Psychology</p>

                        <p>
                            Examines why people comply, how persuasion works,
                            and the psychological principles that influence everyday behavior.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>The Lucifer Effect</h3>
                        <p class="card-subtitle">Situational Psychology</p>

                        <p>
                            Investigates how environments, authority,
                            and social pressures can influence otherwise ordinary people.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>The Gift of Fear</h3>
                        <p class="card-subtitle">Human Behaviour</p>

                        <p>
                            Discusses intuition, threat recognition,
                            and the psychology behind personal safety and risk assessment.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Academic Journals</h3>
                        <p class="card-subtitle">Current Research</p>

                        <p>
                            Reading peer-reviewed research offers a clearer picture than sensationalized
                            headlines or fictional portrayals.
                            Scientific understanding changes as new evidence emerges.
                        </p>
                    </article>
                </div>
            </section>

            <!-- ===================================== -->
            <!-- Research Tools -->
            <!-- ===================================== -->
            <section class="psychology-section" id="research-tools">
                <div class="section-heading">
                    <span class="section-tag">Museum Exhibit XVII</span>
                    <h2>How Criminal Psychology Is Studied</h2>

                    <p>
                        Modern criminal psychology relies on evidence gathered through many different
                        research methods.
                        No single technique provides all the answers.
                    </p>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-card">
                        <h3>Case Studies</h3>

                        <p>
                            Detailed examinations of individual investigations provide insight into
                            unusual behaviors,
                            investigative strategies,
                            and psychological patterns.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Experiments</h3>

                        <p>
                            Controlled studies help researchers understand memory,
                            attention, decision making, perception, and social influence.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Statistical Analysis</h3>

                        <p>
                            Large datasets reveal trends that individual cases cannot.
                            Patterns emerge only when thousands of observations are examined together.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Behavioral Interviews</h3>

                        <p>
                            Interviews with offenders, victims, investigators,
                            and witnesses contribute valuable perspectives,
                            although they must always be interpreted carefully.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Forensic Science</h3>

                        <p>
                            DNA, fingerprints, digital evidence, toxicology,
                            and pathology frequently provide the objective evidence
                            needed to evaluate psychological theories.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Interdisciplinary Collaboration</h3>

                        <p>
                            Criminal psychology works alongside neuroscience,
                            medicine, sociology, criminology, law,
                            and forensic science to better understand human behavior.
                        </p>
                    </article>
                </div>
            </section>
        </div>
    </div>
</x-layout>