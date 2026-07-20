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
                <a href="{{ route('psychology.crimeScenes') }}">➤ Crime Scenes</a>
                <a href="{{ route('psychology.victimology') }}">➤ Victimology</a>
                <a href="{{ route('psychology.experiments') }}">➤ Experiments</a>
                <a href="{{ route('psychology.myths') }}">➤ Myhts</a>
                <a href="{{ route('psychology.resources') }}">➤ Resources</a>
                <a href="{{ route('psychology.facts') }}">➤ Facts</a>
                <a href="{{ route('psychology.faq') }}">➤ FAQ</a>
            </section>

            <!-- ====== PSYCHOLOGY IN INTERVIEWS ====== -->
            <section class="psychology-section" id="interviews">
                <div class="section-heading">
                    <span class="section-tag">Interview Techniques</span>
                    <h2>The Psychology of Interviews</h2>

                    <p class="psychology-card" style="margin-top:35px">
                        Investigative interviews are conversations designed to gather reliable information,
                        not performances intended to force confessions.
                    </p>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-card">
                        <h3>Building Rapport</h3>

                        <p>
                            Establishing trust often encourages more complete,
                            accurate,
                            and detailed accounts than aggressive questioning.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Open Questions</h3>

                        <p>
                            Investigators frequently begin with broad,
                            open-ended questions that allow individuals
                            to describe events in their own words.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Active Listening</h3>

                        <p>
                            Listening carefully is often more valuable than asking dozens of rapid questions.
                            Small inconsistencies may emerge naturally over time.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Memory Retrieval</h3>

                        <p>
                            People rarely remember events like video recordings.
                            Memory is reconstructed, influenced by stress, attention, emotion, and time.
                        </p>
                    </article>
                </div>
            </section>

            <!-- ====== PSYCHOLOGY & MEMORY ====== -->
            <section class="psychology-section" id="memory">
                <div class="section-heading">
                    <span class="section-tag">Memory & Recall</span>
                    <h2>The Psychology of Memory</h2>

                    <p class="psychology-card" style="margin-top:35px">
                        Memory feels permanent, almost like a recording waiting to be replayed.
                        Modern psychology tells a different story.
                        Human memory is reconstructed each time we remember an event,
                        meaning it can become stronger, weaker, or even unintentionally altered.
                    </p>
                </div>

                <div class="museum-panel"  style="margin-bottom:35px">
                    <h3>Memory Is Reconstruction</h3><br>

                    <p>
                        Instead of storing exact copies of experiences,
                        the brain pieces together fragments of sights,
                        sounds, emotions, expectations, and previous knowledge.
                        Each recollection is a reconstruction rather than a replay.
                    </p>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-card">
                        <h3>Stress</h3>

                        <p>
                            High levels of stress may sharpen memory for central events
                            while reducing recall of surrounding details.
                            People often remember the threat itself more clearly than everything around it.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Time</h3>

                        <p>
                            Memories naturally fade.
                            Gaps are often filled unconsciously with assumptions,
                            making confidence a poor indicator of accuracy.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Discussion</h3>

                        <p>
                            Conversations with others can unintentionally reshape memories.
                            Details suggested by friends, family,
                            or media reports may become incorporated into personal recollections.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Repeated Recall</h3>

                        <p>
                            Every time a memory is retrieved,
                            it becomes temporarily flexible before being stored again.
                            This process allows learning, but also creates opportunities for distortion.
                        </p>
                    </article>
                </div>
            </section>

            <!-- ======= Body Language ======= -->
            <section class="psychology-section" id="body-language">
                <div class="section-heading">
                    <span class="section-tag">Nonverbal Communication</span>
                    <h2>Body Language: Myths vs Facts</h2>

                    <p class="psychology-card" style="margin-top:35px">
                        Television often suggests that deception can be detected through a single gesture.
                        Real behavioral science paints a much more complicated picture.
                    </p>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-card myth-card">
                        <h3>Myth</h3>
                        <p>"People who avoid eye contact are lying."</p>

                        <hr style="margin:20px 0">

                        <h3>Reality</h3>
                        <p>
                            Eye contact varies greatly between cultures,
                            personalities, anxiety levels, and neurodiversity.
                            Avoiding eye contact alone is not evidence of deception.
                        </p>
                    </article>

                    <article class="psychology-card myth-card">
                        <h3>Myth</h3>
                        <p>"Crossed arms mean someone is hiding something."</p>

                        <hr style="margin:20px 0">

                        <h3>Reality</h3>
                        <p>
                            People cross their arms because they are cold,
                            tired, comfortable, thinking, or simply standing naturally.
                        </p>
                    </article>

                    <article class="psychology-card myth-card">
                        <h3>Myth</h3>
                        <p>"Fidgeting proves guilt."</p>

                        <hr style="margin:20px 0">

                        <h3>Reality</h3>
                        <p>
                            Stress affects innocent and guilty people alike.
                            Anxiety is not a reliable indicator of deception.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>What Professionals Actually Observe</h3>

                        <ul class="museum-list">
                            <li>Behavioral changes from an individual's baseline.</li>
                            <li>Consistency between speech and evidence.</li>
                            <li>Context surrounding the interaction.</li>
                            <li>Patterns instead of isolated gestures.</li>
                            <li>Multiple sources of corroborating evidence.</li>
                        </ul>
                    </article>
                </div>
            </section>

            <!-- ====== Decision Making ====== -->
            <section class="psychology-section" id="decision-making">
                <div class="section-heading">
                    <span class="section-tag">>Decision Making</span>
                    <h2>Decision Making Under Pressure</h2>

                    <p class="psychology-card" style="margin-top:35px">
                        Whether someone is a witness, investigator, first responder, or ordinary citizen,
                        pressure changes the way decisions are made.
                        The brain often shifts from careful analysis to rapid survival-oriented thinking.
                    </p>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-card">
                        <h3>Fight, Flight or Freeze</h3>

                        <p>
                            During threatening situations,
                            automatic survival responses can override deliberate reasoning.
                            These reactions evolved to increase survival,
                            not to improve later recall.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Limited Attention</h3>

                        <p>
                            Under stress, attention narrows.
                            People may focus intensely on one element of a situation
                            while overlooking equally important information nearby.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Time Distortion</h3>

                        <p>
                            Many people report that frightening experiences seem unusually fast
                            or unusually slow.
                            Perception of time is influenced by emotional intensity.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Mental Shortcuts</h3>

                        <p>
                            When decisions must be made quickly, the brain relies heavily on heuristics.
                            These shortcuts are efficient, but they also increase the risk of bias and error.
                        </p>
                    </article>
                </div>
            </section>

            <!-- ====== COGNITIVE BIASES ======== -->
            <section class="psychology-section" id="biases">
                <div class="section-heading">
                    <span class="section-tag">Cognitive Psychology</span>
                    <h2>Cognitive Biases</h2>

                    <p class="psychology-card" style="margin-top:35px">
                        The human brain is remarkably efficient...
                        and remarkably unreliable.
                        Investigators, witnesses, jurors, journalists, and ordinary citizens
                        all rely on mental shortcuts that can quietly distort reality.
                    </p>
                </div>

                <div class="psychology-grid">
                    <article class="psychology-card">
                        <h3>Confirmation Bias</h3>

                        <p>
                            Once we develop a theory, we naturally notice information that supports it
                            while overlooking evidence that contradicts it.
                        </p>

                        <div class="museum-note">
                            <strong>Museum Note</strong>

                            <p>
                                Entire investigations have followed the wrong suspect because investigators
                                unintentionally interpreted every clue through a single assumption.
                            </p>
                        </div>
                    </article>

                    <article class="psychology-card">
                        <h3>Availability Bias</h3>

                        <p>
                            Events that are dramatic, emotional, or frequently shown in the media
                            feel much more common than they actually are.
                        </p>

                        <p>
                            This explains why many people overestimate the frequency
                            of rare crimes.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Anchoring</h3>

                        <p>
                            The first piece of information we hear often becomes an unconscious reference point,
                            influencing later decisions even when new evidence appears.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Hindsight Bias</h3>

                        <p>
                            After learning an outcome,
                            people often believe they "knew it all along,"
                            making past events seem more predictable than they really were.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Halo Effect</h3>

                        <p>
                            Attractive, confident, or respected individuals are often perceived as more honest,
                            despite no evidence supporting that assumption.
                        </p>
                    </article>

                    <article class="psychology-card">
                        <h3>Implicit Bias</h3>

                        <p>
                            Automatic associations developed through life experiences can influence judgment
                            without conscious awareness.
                        </p>

                        <p>Modern investigative training actively addresses these hidden influences.</p>
                    </article>
                </div>
            </section>
        </div>
    </div>
</x-layout>