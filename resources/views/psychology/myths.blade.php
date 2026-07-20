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
                <a href="{{ route('psychology.myths') }}" class="{{ request()->routeIs('psychology.myths') ? 'active' : '' }}">➤ Myhts</a>
                <a href="{{ route('psychology.resources') }}">➤ Resources</a>
                <a href="{{ route('psychology.facts') }}">➤ Facts</a>
                <a href="{{ route('psychology.faq') }}">➤ FAQ</a>
            </section>
        
            <!-- ====== MYTHS & FACTS ====== -->
            <section class="psychology-section" id="myths">
                <div class="section-heading">
                    <span class="section-tag">Common Misconceptions</span>
                    <h2>Popular Psychology Myths</h2>

                    <p class="psychology-card" style="margin-top:35px">
                        Crime dramas have introduced countless psychological misconceptions.
                        Some are entertaining.
                        Others can seriously distort public understanding of criminal psychology.
                        Turn each exhibit card over to discover what modern research actually says.
                    </p>
                </div>

                <div class="myth-grid">
                    <!-- Card 1 -->
                    <article class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <span class="card-label myth-label">Myth</span>
                                <h3>All psychopaths become serial killers.</h3>
                                <div class="flip-icon">↻</div>
                            </div>

                            <div class="flip-card-back">
                                <span class="card-label fact-label">Fact</span>
                                <h3>Psychopathy does not equal murder.</h3>

                                <p>
                                    Most people displaying psychopathic traits never commit violent crimes.
                                    Many function within society, hold careers, and never become offenders.
                                    Violence depends on many interacting biological, psychological, and environmental factors.
                                </p>
                            </div>
                        </div>
                    </article>

                    <!-- Card 2 -->
                    <article class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <span class="card-label myth-label">Myth</span>
                                <h3>Mental illness causes violent crime.</h3>
                                <div class="flip-icon">↻</div>
                            </div>

                            <div class="flip-card-back">
                                <span class="card-label fact-label">Fact</span>
                                <h3>Most people with mental illness are not violent.</h3>

                                <p>
                                    Research consistently shows that the overwhelming majority of individuals
                                    living with mental illnesses never commit violent crimes.
                                    They are statistically more likely to become victims than offenders.
                                </p>
                            </div>
                        </div>
                    </article>

                    <!-- Card 3 -->
                    <article class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <span class="card-label myth-label">Myth</span>
                                <h3>Profilers can identify a killer instantly.</h3>
                                <div class="flip-icon">↻</div>
                            </div>

                            <div class="flip-card-back">
                                <span class="card-label fact-label">Fact</span>
                                <h3>Profiling is an investigative tool.</h3>

                                <p>
                                    Behavioral profiling helps investigators prioritize leads and generate hypotheses.
                                    It cannot reveal an offender's identity or replace physical evidence.
                                </p>
                            </div>
                        </div>
                    </article>

                    <!-- Card 4 -->
                    <article class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <span class="card-label myth-label">Myth</span>
                                <h3>You can always tell when someone is lying.</h3>
                                <div class="flip-icon">↻</div>
                            </div>

                            <div class="flip-card-back">
                                <span class="card-label fact-label">Fact</span>
                                <h3>There is no universal sign of deception.</h3>

                                <p>
                                    Behaviors like avoiding eye contact, fidgeting,
                                    or nervousness are not reliable indicators of lying.
                                    Investigators rely on evidence and patterns, not isolated gestures.
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </section>       
        </div>
    </div>
</x-layout>