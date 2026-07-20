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
                <a href="{{ route('psychology.myths') }}">➤ Myhts</a>
                <a href="{{ route('psychology.resources') }}">➤ Resources</a>
                <a href="{{ route('psychology.facts') }}">➤ Facts</a>
                <a href="{{ route('psychology.faq') }}">➤ FAQ</a>
            </section>

            <!-- ====== EXPERIMENTS ====== -->
            <section id="experiments" class="psychology-section">
                <div class="section-heading">
                    <span class="section-tag">Psychological Research</span>
                    <h2>Experiments That Changed Psychology</h2>
                </div>

                <div class="psychology-card">
                    <p>
                        Criminal psychology did not develop in isolation. Much of what
                        researchers understand today about authority, aggression, conformity,
                        morality and human behaviour comes from decades of psychological
                        research. While many classic studies would not meet today's ethical
                        standards, they continue to influence modern forensic psychology,
                        policing and criminology.
                    </p>
                </div>

                <div class="experiment-grid">
                    <article class="experiment-card">
                        <div class="experiment-year">1961</div>
                        <h3>Milgram Obedience Experiment</h3>

                        <p>
                            Stanley Milgram investigated how ordinary people respond to
                            authority. Participants believed they were delivering painful
                            electric shocks to another person simply because an authority
                            figure instructed them to continue.
                        </p>

                        <div class="experiment-footer">
                            <span>Focus</span>
                            <p>Obedience to authority.</p>
                        </div>
                    </article>

                    <article class="experiment-card">
                        <div class="experiment-year">1971</div>
                        <h3>Stanford Prison Experiment</h3>

                        <p>
                            Philip Zimbardo's famous prison simulation explored how social
                            roles and environments influence behaviour. Participants quickly
                            adopted abusive and submissive behaviours, leading to the study's
                            early termination.
                        </p>

                        <div class="experiment-footer">
                            <span>Focus</span>
                            <p>Power, authority and social roles.</p>
                        </div>
                    </article>

                    <article class="experiment-card">
                        <div class="experiment-year">1961</div>
                        <h3>Bobo Doll Experiment</h3>

                        <p>
                            Albert Bandura demonstrated that children can learn aggressive
                            behaviours simply by observing others, providing important
                            evidence for Social Learning Theory.
                        </p>

                        <div class="experiment-footer">
                            <span>Focus</span>
                            <p>Observational learning.</p>
                        </div>
                    </article>

                    <article class="experiment-card">
                        <div class="experiment-year">1951</div>
                        <h3>Asch Conformity Experiments</h3>

                        <p>
                            Solomon Asch showed that individuals often conform to an incorrect
                            majority opinion even when the correct answer is obvious,
                            illustrating the powerful influence of social pressure.
                        </p>

                        <div class="experiment-footer">
                            <span>
                                Focus
                            </span>
                            <p>
                                Conformity and group influence.
                            </p>
                        </div>
                    </article>

                    <article class="experiment-card">
                        <div class="experiment-year">1939</div>
                        <h3>Frustration-Aggression Hypothesis</h3>

                        <p>
                            Researchers proposed that blocked goals and persistent frustration
                            may increase aggressive behaviour under certain conditions,
                            although modern psychology recognises this relationship is far
                            more complex than originally believed.
                        </p>

                        <div class="experiment-footer">
                            <span>Focus</span>
                            <p>Aggression and emotional responses.</p>
                        </div>
                    </article>

                    <article class="experiment-card">
                        <div class="experiment-year">Modern</div>
                        <h3>Neuroimaging Research</h3>

                        <p>
                            MRI and fMRI technologies allow researchers to examine how
                            different brain regions communicate during emotional processing,
                            empathy, impulse control and decision making.
                        </p>

                        <div class="experiment-footer">
                            <span>Focus</span>
                            <p>Brain function and behaviour.</p>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </div>
</x-layout>