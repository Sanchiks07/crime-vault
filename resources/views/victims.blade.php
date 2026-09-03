<x-layout>
    <div class="page">
        <!-- Background Effect -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="page-container">
            <!-- ====== HERO ====== -->
            <div class="page-header">
                <h1>Victims</h1>
                <p>
                    Behind every criminal case was a real person with dreams, ambitions,
                    loved ones, and a life that mattered. This page remembers those
                    individuals while exploring the role victims play in criminal
                    investigations.
                </p>
            </div>

            <!-- ====== WHY REMEMBER VICTIMS ====== -->
            <section class="page-section">
                <span class="section-tag">Remembering Lives</span>

                <div class="page-card">
                    <h2>More Than a Name</h2>

                    <p>
                        True crime often focuses on offenders, investigations, and courtroom
                        proceedings. Yet every case begins with a victim whose life was
                        forever changed. Understanding who these individuals were helps
                        restore the human side of criminal history and reminds us that every
                        statistic represents a real person.
                    </p>

                    <p>
                        Crime Vault aims to present victims with dignity and respect,
                        highlighting their lives rather than defining them solely by the
                        crimes committed against them.
                    </p>
                </div>
            </section>

            <!-- ====== VICTIMOLOGY ====== -->
            <section class="page-section">
                <span class="section-tag">Victimology</span>

                <div class="page-card">
                    <h2>Why Victims Matter in Investigations</h2>

                    <p>
                        Victimology is the study of victims, their backgrounds, lifestyles,
                        relationships, and circumstances surrounding a crime. Investigators
                        examine this information to better understand timelines, identify
                        suspects, uncover motives, and reconstruct events.
                    </p>

                    <div class="info-grid">
                        <div class="info-card">
                            <h3>Relationships</h3>
                            <p>Who knew the victim and what connections may have existed?</p>
                        </div>

                        <div class="info-card">
                            <h3>Daily Routine</h3>
                            <p>Where did they usually go and what patterns existed?</p>
                        </div>

                        <div class="info-card">
                            <h3>Last Known Events</h3>
                            <p>What happened before the victim disappeared or was attacked?</p>
                        </div>

                        <div class="info-card">
                            <h3>Evidence</h3>
                            <p>Personal belongings, digital records, and witness accounts often provide vital clues.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ====== FEATURED VICTIMS ====== -->
            <section class="page-section">
                <span class="section-tag">Victims</span>

                <div class="page-card">
                    <h2>Remembering the Victims</h2>

                    <p>
                        Every victim has a story beyond the case itself. Their profiles
                        provide a respectful overview of who they were, the circumstances
                        surrounding their case, and the lasting impact left on families,
                        communities, and criminal investigations.
                    </p>
                    
                    <div class="victim-slider">
                        @foreach($victims as $case)
                            <div class="victim-slide">
                                <div class="killer-header">
                                    <span class="section-tag">Case {{ $loop->iteration }}</span>

                                    <h2>{{ $case->killer->name ?? $case->killer->nickname }}</h2>

                                    <p>Confirmed Victims & Survivors</p>
                                </div>

                                <div class="victim-grid">
                                    <!-- Killed -->
                                    @foreach($case->count['killed'] as $victim)
                                        <article class="victim-card">
                                            <div class="victim-image-placeholder">
                                                Photo
                                            </div>

                                            <div class="victim-info">
                                                <h3>{{ $victim['name'] ?? 'Unknown' }}</h3>

                                                <ul>
                                                    <li><strong>Age:</strong> {{ $victim['age'] ?? 'Unknown' }}</li>
                                                    <li><strong>Occupation:</strong> {{ $victim['occupation'] ?? 'Unknown' }}</li>
                                                    <li><strong>Location:</strong> {{ $victim['location'] ?? 'Unknown' }}</li>
                                                    <li><strong>Status:</strong> Deceased</li>
                                                </ul>

                                                <p>{{ $victim['summary'] ?? 'No additional information is currently available.' }}</p>
                                            </div>
                                        </article>
                                    @endforeach

                                    <!-- Survivors -->
                                    @foreach($case->count['wounded'] ?? [] as $victim)
                                        <article class="victim-card">
                                            <div class="victim-image-placeholder">
                                                Photo
                                            </div>

                                            <div class="victim-info">
                                                <h3>{{ $victim['name'] ?? 'Unknown' }}</h3>

                                                <ul>
                                                    <li><strong>Age:</strong> {{ $victim['age'] ?? 'Unknown' }}</li>
                                                    <li><strong>Occupation:</strong> {{ $victim['occupation'] ?? 'Unknown' }}</li>
                                                    <li><strong>Location:</strong> {{ $victim['location'] ?? 'Unknown' }}</li>
                                                    <li><strong>Status:</strong> Survivor</li>
                                                </ul>

                                                <p>{{ $victim['summary'] ?? 'No additional information is currently available.' }}</p>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- ====== QUICK FACTS ====== -->
            <section class="page-section">
                <span class="section-tag">Quick Facts</span>

                <div class="facts-grid">
                    <div class="fact-card">
                        <h3>Victim ≠ Evidence</h3>
                        <p>
                            Every piece of evidence represents a real person whose life
                            extended far beyond a criminal investigation.
                        </p>
                    </div>

                    <div class="fact-card">
                        <h3>Victimology Solves Cases</h3>
                        <p>
                            Understanding a victim's routine and relationships frequently
                            helps investigators identify suspects.
                        </p>
                    </div>

                    <div class="fact-card">
                        <h3>Families Continue Living</h3>
                        <p>
                            The effects of violent crime often continue for decades through
                            grief, advocacy, and remembrance.
                        </p>
                    </div>

                    <div class="fact-card">
                        <h3>Every Story Matters</h3>
                        <p>
                            Crime history is incomplete without acknowledging the lives of
                            those who were harmed.
                        </p>
                    </div>

                </div>
            </section>

            <!-- ====== QUOTE ====== -->
            <section class="page-section">
                <div class="quote-card">
                    <blockquote>
                        "A person's life should never be remembered only by the crime committed against them."
                    </blockquote>
                </div>
            </section>
        </div>
    </div>
</x-layout>