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
                                <div class="victim-case-header">
                                    <div class="victim-case-title">
                                        <span class="section-tag">
                                            Case {{ $loop->iteration }}
                                        </span>

                                        <h2>Lives Connected to This Case</h2>

                                        <p>
                                            Associated with the
                                            <strong>
                                                {{ $case->killer->name ?? $case->killer->nickname ?? 'Unknown' }}
                                            </strong>
                                            case
                                        </p>

                                        <div class="victim-slider-controls">
                                            <button type="button" class="victim-slider-button victim-prev" aria-label="Previous case">
                                                ←
                                            </button>

                                            <span class="victim-slide-count">
                                                {{ $loop->iteration }} / {{ $victims->count() }}
                                            </span>

                                            <button type="button" class="victim-slider-button victim-next" aria-label="Next case">
                                                →
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="victim-remembrance-summary">
                                    @php
                                        $killedCount = count($case->count['killed'] ?? []);
                                        $woundedCount = count($case->count['wounded'] ?? []);
                                        $documentedCount = $killedCount + $woundedCount;
                                    @endphp

                                    <div class="victim-remembrance-stats">
                                        <span>
                                            <strong>{{ $documentedCount }}</strong>
                                            documented {{ $documentedCount === 1 ? 'person' : 'people' }}
                                        </span>

                                        <span>
                                            •
                                        </span>

                                        <span>
                                            <strong>{{ $killedCount }}</strong>
                                            {{ $killedCount === 1 ? 'life lost' : 'lives lost' }}
                                        </span>

                                        @if($woundedCount > 0)
                                            <span>
                                                •
                                            </span>
                                            
                                            <span>
                                                <strong>{{ $woundedCount }}</strong>
                                                {{ $woundedCount === 1 ? 'survivor' : 'survivors' }}
                                            </span>
                                        @endif
                                    </div>

                                    <p>
                                        The people below are presented as individuals first.
                                        Their connection to this case is only one part of their story.
                                    </p>
                                </div>

                                <div class="victim-grid">
                                    <!-- Killed -->
                                    @foreach($case->count['killed'] as $victim)
                                        <article class="victim-card victim-card-detailed">
                                            <div class="victim-profile-image">
                                                @if(!empty($victim['image']))
                                                    <img src="{{ asset($victim['image']) }}" alt="Photograph of {{ $victim['name'] ?? 'victim' }}">
                                                @else
                                                    <div class="victim-image-placeholder">
                                                        Photo unavailable
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="victim-info">
                                                <div class="victim-profile-header">
                                                    <div>
                                                        <span class="victim-profile-label">
                                                            Remembering
                                                        </span>

                                                        <h3>{{ $victim['name'] ?? 'Unknown' }}</h3>
                                                    </div>

                                                    @if(!empty($victim['age']))
                                                        <span class="victim-age">
                                                            Age {{ $victim['age'] }}
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="victim-profile-details">
                                                    @if(!empty($victim['birth_date']) || !empty($victim['death_date']))
                                                        <p>
                                                            <strong>Life:</strong>
                                                            {{ $victim['birth_date'] ?? '?' }} - {{ $victim['death_date'] ?? '?' }}
                                                        </p>
                                                    @endif

                                                    @if(!empty($victim['occupation']) && $victim['occupation'] !== 'Unknown')
                                                        <p>
                                                            <strong>Occupation:</strong>
                                                            {{ $victim['occupation'] }}
                                                        </p>
                                                    @endif

                                                    @if(!empty($victim['education']))
                                                        <p>
                                                            <strong>Education:</strong>
                                                            {{ $victim['education'] }}
                                                        </p>
                                                    @endif

                                                    @if(!empty($victim['location']))
                                                        <p>
                                                            <strong>Location:</strong>
                                                            {{ $victim['location'] }}
                                                        </p>
                                                    @endif

                                                </div>

                                                @if(!empty($victim['about']))
                                                    <div class="victim-profile-section">
                                                        <h4>Their Life</h4>
                                                        <p>{{ $victim['about'] }}</p>
                                                    </div>
                                                @endif

                                                @if(!empty($victim['interests']))
                                                    <div class="victim-profile-section">
                                                        <h4>Interests</h4>

                                                        <div class="victim-interest-list">
                                                            @foreach($victim['interests'] as $interest)
                                                                <span>{{ $interest }}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif

                                                @if(!empty($victim['aspirations']))
                                                    <div class="victim-profile-section">
                                                        <h4>Aspirations</h4>
                                                        <p>{{ $victim['aspirations'] }}</p>
                                                    </div>
                                                @endif

                                                @if(!empty($victim['case_connection']))
                                                    <div class="victim-case-connection">
                                                        <h4>Connection to the Case</h4>

                                                        @if(!empty($victim['case_date']))
                                                            <span class="victim-case-date">
                                                                {{ $victim['case_date'] }}
                                                            </span>
                                                        @endif

                                                        <p>{{ $victim['case_connection'] }}</p>
                                                    </div>
                                                @endif

                                                @if(!empty($victim['legacy']))
                                                    <div class="victim-profile-section victim-legacy">
                                                        <h4>Legacy & Remembrance</h4>
                                                        <p>{{ $victim['legacy'] }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </article>
                                    @endforeach

                                    <!-- Survivors -->
                                    @foreach($case->count['wounded'] ?? [] as $victim)
                                        <article class="victim-card victim-card-detailed victim-card-survivor">

                                            <div class="victim-profile-image">
                                                @if(!empty($victim['image']))
                                                    <img
                                                        src="{{ asset($victim['image']) }}"
                                                        alt="Photograph of {{ $victim['name'] ?? 'victim' }}"
                                                    >
                                                @else
                                                    <div class="victim-image-placeholder">
                                                        Photo unavailable
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="victim-info">

                                                <div class="victim-profile-header">
                                                    <div>
                                                        <span class="victim-profile-label">
                                                            Survivor
                                                        </span>

                                                        <h3>{{ $victim['name'] ?? 'Unknown' }}</h3>
                                                    </div>

                                                    @if(!empty($victim['age']))
                                                        <span class="victim-age">
                                                            Age {{ $victim['age'] }}
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="victim-profile-details">

                                                    @if(!empty($victim['birth_date']) || !empty($victim['death_date']))
                                                        <p>
                                                            <strong>Life:</strong>

                                                            {{ $victim['birth_date'] ?? '?' }}
                                                            –
                                                            {{ $victim['death_date'] ?? '?' }}
                                                        </p>
                                                    @endif

                                                    @if(!empty($victim['occupation']) && $victim['occupation'] !== 'Unknown')
                                                        <p>
                                                            <strong>Occupation:</strong>
                                                            {{ $victim['occupation'] }}
                                                        </p>
                                                    @endif

                                                    @if(!empty($victim['education']))
                                                        <p>
                                                            <strong>Education:</strong>
                                                            {{ $victim['education'] }}
                                                        </p>
                                                    @endif

                                                    @if(!empty($victim['location']))
                                                        <p>
                                                            <strong>Location:</strong>
                                                            {{ $victim['location'] }}
                                                        </p>
                                                    @endif

                                                </div>

                                                @if(!empty($victim['about']))
                                                    <div class="victim-profile-section">
                                                        <h4>Their Life</h4>
                                                        <p>{{ $victim['about'] }}</p>
                                                    </div>
                                                @endif

                                                @if(!empty($victim['interests']))
                                                    <div class="victim-profile-section">
                                                        <h4>Interests</h4>

                                                        <div class="victim-interest-list">
                                                            @foreach($victim['interests'] as $interest)
                                                                <span>{{ $interest }}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif

                                                @if(!empty($victim['aspirations']))
                                                    <div class="victim-profile-section">
                                                        <h4>Aspirations</h4>
                                                        <p>{{ $victim['aspirations'] }}</p>
                                                    </div>
                                                @endif

                                                @if(!empty($victim['case_connection']))
                                                    <div class="victim-case-connection">
                                                        <h4>Connection to the Case</h4>

                                                        @if(!empty($victim['case_date']))
                                                            <span class="victim-case-date">
                                                                {{ $victim['case_date'] }}
                                                            </span>
                                                        @endif

                                                        <p>{{ $victim['case_connection'] }}</p>
                                                    </div>
                                                @endif

                                                @if(!empty($victim['legacy']))
                                                    <div class="victim-profile-section victim-legacy">
                                                        <h4>Legacy & Remembrance</h4>
                                                        <p>{{ $victim['legacy'] }}</p>
                                                    </div>
                                                @endif

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