<x-layout>
    <div class="explore-page">
        <!-- Background Effects  -->
        <div class="explore-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="explore-container">
            <!-- ===== HERO =====  -->
            <section class="explore-hero">
                <div class="explore-hero-content">
                    <span class="hero-label">Crime Vault • Interactive Archive</span>
                    <h1>Explore the Archive</h1>
                    <p class="hero-description">
                        Trace documented cases through time and place.
                        Explore key events, locations, and developments across the Crime Vault archive.
                    </p>
                </div>
            </section>

            <!-- ===== VIEW SWITCHER =====  -->
            <div class="explore-view-switcher">
                <button type="button" class="explore-view-btn active" data-view="timeline">
                    Timeline
                </button>

                <button type="button" class="explore-view-btn" data-view="map">
                    Map
                </button>
            </div>

            <!-- ===== FILTERS =====  -->
            <section class="explore-filters">
                <button type="button" class="explore-filter-btn active" data-filter="all">
                    All Cases
                </button>

                <button type="button" class="explore-filter-btn" data-filter="serial-killer">
                    Serial Killers
                </button>

                <button type="button" class="explore-filter-btn" data-filter="unsolved-case">
                    Unsolved Cases
                </button>

                <select id="event-type-filter">
                    <option value="all">All Event Types</option>
                    <option value="murder">Murder</option>
                    <option value="attack">Attack</option>
                    <option value="disappearance">Disappearance</option>
                    <option value="discovery">Discovery</option>
                    <option value="arrest">Arrest</option>
                    <option value="investigation">Investigation</option>
                </select>
            </section>

            <!-- ===== TIMELINE =====  -->
            <section class="timeline-view" id="timeline-view">
                <div class="timeline">
                    @php
                        $currentYear = null;
                    @endphp

                    @forelse ($events as $event)
                        @php
                            $year = $event->event_date->format('Y');

                            $caseType = $event->eventable instanceof \App\Models\SerialKiller
                                ? 'serial-killer'
                                : 'unsolved-case';

                            $caseName = $event->eventable instanceof \App\Models\SerialKiller
                                ? ($event->eventable->nickname ?: $event->eventable->name)
                                : $event->eventable->name;
                        @endphp

                        @if ($currentYear !== $year)
                            <div class="timeline-year">
                                <span>{{ $year }}</span>
                            </div>

                            @php
                                $currentYear = $year;
                            @endphp
                        @endif

                        <article class="timeline-event" data-case-type="{{ $caseType }}" data-event-type="{{ $event->event_type }}">
                            <div class="timeline-marker"></div>

                            <div class="timeline-event-card">
                                <div class="timeline-event-meta">
                                    <span class="timeline-date">
                                        {{ $event->event_date->format('M d') }}
                                    </span>

                                    <span class="timeline-event-type">
                                        {{ ucfirst($event->event_type) }}
                                    </span>
                                </div>

                                <h2>{{ $event->title }}</h2>
                                <p class="timeline-case-name">{{ $caseName }}</p>

                                @if ($event->location)
                                    <p class="timeline-location">{{ $event->location }}</p>
                                @endif

                                @if ($event->description)
                                    <p class="timeline-description">{{ $event->description }}</p>
                                @endif
                            </div>
                        </article>
                    @empty
                        <div class="timeline-empty">
                            <p>No timeline events are currently available.</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <!-- ===== MAP ===== -->
            @php
                $mapEvents = $events
                    ->filter(fn ($event) => $event->latitude && $event->longitude)
                    ->map(function ($event) {
                        return [
                            'title' => $event->title,
                            'event_type' => $event->event_type,
                            'date' => $event->event_date->format('M d, Y'),
                            'location' => $event->location,
                            'latitude' => $event->latitude,
                            'longitude' => $event->longitude,

                            'case_type' => $event->eventable instanceof \App\Models\SerialKiller
                                ? 'serial-killer'
                                : 'unsolved-case',

                            'case_name' => $event->eventable instanceof \App\Models\SerialKiller
                                ? ($event->eventable->nickname ?: $event->eventable->name)
                                : $event->eventable->name,
                        ];
                    })
                    ->values();
            @endphp

            <section class="map-view" id="map-view" hidden>
                <div id="case-map" data-events="{{ $mapEvents->toJson(JSON_HEX_APOS | JSON_HEX_QUOT) }}"></div>
            </section>
        </div>
    </div>
</x-layout>