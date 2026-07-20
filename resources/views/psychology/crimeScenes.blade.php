<x-layout>
    <div class="psychology-page">
        <!-- ====== BACKGROUND EFFECTS ====== -->
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
                <a href="{{ route('psychology.investigativePsychology') }}">➤ Investigative Psychology</a>
                <a href="{{ route('psychology.victimology') }}">➤ Victimology</a>
                <a href="{{ route('psychology.experiments') }}">➤ Experiments</a>
                <a href="{{ route('psychology.myths') }}">➤ Myhts</a>
                <a href="{{ route('psychology.resources') }}">➤ Resources</a>
                <a href="{{ route('psychology.facts') }}">➤ Facts</a>
                <a href="{{ route('psychology.faq') }}">➤ FAQ</a>
            </section>

            <!-- ====== ORGANIZED & DISORGANIZED CRIME SCENES ====== -->
            <section class="psychology-section" id="organized-disorganized">
                <div class="section-heading">
                    <span class="section-tag">Crime Scene Analysis</span>
                    <h2>Organized and Disorganized Crime Scenes</h2>

                    <p class="psychology-card" style="margin-top:35px">
                        One of the most well-known concepts in criminal profiling is the distinction
                        between organized and disorganized crime scenes.
                        Modern investigators treat these categories as broad tendencies rather than rigid labels.
                    </p>
                </div>

                <div class="comparison-grid">
                    <article class="psychology-card comparison-card">
                        <h3>Organized Characteristics</h3>

                        <ul class="museum-list">
                            <li>Evidence of planning.</li>
                            <li>Controlled interaction with the victim.</li>
                            <li>Attempts to avoid leaving evidence.</li>
                            <li>Preparation before the offense.</li>
                            <li>Escape strategy.</li>
                            <li>Crime scene may appear deliberate.</li>
                        </ul>
                    </article>

                    <article class="psychology-card comparison-card">
                        <h3>Disorganized Characteristics</h3>

                        <ul class="museum-list">
                            <li>Impulsive actions.</li>
                            <li>Chaotic scene.</li>
                            <li>Little planning.</li>
                            <li>Unexpected violence.</li>
                            <li>Greater likelihood of overlooked evidence.</li>
                            <li>Behavior driven by immediate emotion.</li>
                        </ul>
                    </article>
                </div>

                <div class="museum-panel">
                    <h3>An Important Reminder</h3><br>

                    <p>
                        Real investigations rarely fit perfectly into either category.
                        Many offenders display characteristics from both,
                        and behavior can change over time or between offenses.
                    </p>
                </div>
            </section>

            <!-- ====== CRIME SCENE BEHAVIOUR ====== -->
            <section class="psychology-section" id="crime-scene">
                <div class="section-heading">
                    <span class="section-tag">Behavioural Evidence</span>
                    <h2>What a Crime Scene Can Reveal</h2>

                    <p class="psychology-card" style="margin-top:35px">
                        Crime scenes tell stories, but not complete ones.
                        Investigators interpret physical evidence alongside psychology,
                        forensic science, and witness information.
                    </p>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-card">
                        <h3>Level of Planning</h3>

                        <p>
                            Preparation before the offense may indicate experience,
                            patience, familiarity with the environment,
                            or calculated decision making.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Risk Tolerance</h3>

                        <p>
                            Offenders who act in crowded areas, remain at scenes longer,
                            or return afterward may demonstrate very different risk assessments
                            than those who avoid exposure.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Interaction</h3>

                        <p>
                            Communication, threats, deception,
                            or attempts to comfort victims may all contribute
                            to understanding behavioral patterns.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Decision Making</h3>

                        <p>
                            Every action represents a choice.
                            Investigators ask why one decision was made instead of another,
                            searching for consistent patterns rather than isolated events.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Escape Behaviour</h3>

                        <p>
                            Routes taken after an offense, disposal of evidence,
                            transportation, and post-crime behavior
                            may all reveal planning and familiarity with an area.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>What It Cannot Reveal</h3>

                        <p>
                            A crime scene cannot diagnose mental illness,
                            determine motive with certainty,
                            or identify a specific individual on its own.
                        </p>
                    </article>
                </div>
            </section>
        </div>
    </div>
</x-layout>