<x-layout>
    <div class="page">
        <!-- Background Effect -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="page-container">
            <a href="{{ route('cases.killers.index') }}" class="details-back">
                ← Back to all serial killers
            </a>

            <div class="details-card">
                <!-- Header -->
                <div class="details-header">
                    <h1>{{ $serial_killer->nickname }}</h1>

                    @php
                        $ages = is_string($serial_killer->ages)
                            ? json_decode($serial_killer->ages, true)
                            : $serial_killer->ages;

                        $ageText = collect($ages ?? [])
                            ->pluck('age')
                            ->filter(fn ($age) => !is_null($age))
                            ->implode(' / ');

                        $ageText = $ageText ?: 'Unknown';
                    @endphp

                    <p>
                        {{ $serial_killer->name ?? 'Unknown' }}
                        •
                        {{ $ageText }}
                        •
                        {{ $serial_killer->country }}
                    </p>

                </div>

                <!-- Main Content -->
                <div class="details-grid">
                    <!-- Image -->
                    <div class="details-image">
                        <img
                            src="{{ $serial_killer->image ? asset('images/killers/' . $serial_killer->image) : asset('images/default-image.png') }}"
                            alt="{{ $serial_killer->nickname }}"
                        >
                    </div>

                    <!-- Right Side -->
                    <div class="details-content">
                        <!-- Description -->
                        <section class="content-panel">
                            <h2>Description</h2>

                            <p class="details-description">
                                {{ $serial_killer->description ?? 'No description available.' }}
                            </p>
                        </section>

                        <!-- Overview -->
                        <section class="content-panel">
                            <h2 style="margin-bottom:1rem">Victim Overview</h2>

                            <div class="details-stats">
                                <div class="details-stat details-killed">
                                    <p>Claimed Killed</p>

                                    <span>
                                        {{ $serial_killer->victim_count['killed']['claimed'] ?? 'N/A' }}
                                    </span>
                                </div>

                                <div class="details-stat details-killed-confirmed">
                                    <p>Confirmed Killed</p>

                                    <span>
                                        {{ $serial_killer->victim_count['killed']['confirmed'] ?? 'N/A' }}
                                    </span>
                                </div>

                                <div class="details-stat details-wounded">
                                    <p>Wounded</p>

                                    <span>
                                        {{ $serial_killer->victim_count['wounded'] ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                @php
                    $victimData = $serial_killer->victimRecord->count ?? null;

                    if (is_string($victimData)) {
                        $victimData = json_decode($victimData, true);
                    }

                    $killedVictims = $victimData['killed'] ?? [];
                    $woundedVictims = $victimData['wounded'] ?? [];
                @endphp

                <!-- Bottom Lists -->
                <div class="details-lists">
                    <!-- Killed Victims -->
                    <section class="details-list">
                        <h2>Killed Victims</h2>

                        @if(count($killedVictims))
                            <ul>
                                @foreach ($killedVictims as $victim)
                                    <li class="details-list-item details-killed-item">
                                        <span class="details-name">
                                            {{ $victim['name'] ?? 'Unknown' }}
                                        </span>

                                        <span class="details-age">
                                            (Age: {{ $victim['age'] ?? 'N/A' }})
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="details-empty">No data available.</p>
                        @endif
                    </section>

                    <!-- Wounded Victims -->
                    <section class="details-list">
                        <h2>Wounded Victims</h2>
                        
                        @if(count($woundedVictims))
                            <ul>
                                @foreach ($woundedVictims as $victim)
                                    <li class="details-list-item details-wounded-item">
                                        <span class="details-name">
                                            {{ $victim['name'] ?? 'Unknown' }}
                                        </span>

                                        <span class="details-age">
                                            (Age: {{ $victim['age'] ?? 'N/A' }})
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="details-empty">No data available.</p>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-layout>