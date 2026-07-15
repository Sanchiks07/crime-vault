<x-layout>
<div class="page">
    <div class="background-glow">
        <div class="glow glow-left"></div>
        <div class="glow glow-right"></div>
    </div>

    <div class="page-container">
        <a href="{{ route('cases.unsolved.index') }}" class="details-back">
            ← Back to all unsolved cases
        </a>

        <div class="details-card">
            <!-- Header -->
            <div class="details-header">
                <h1>{{ $unsolved_case->name }}</h1>

                <p>{{ $unsolved_case->country }}</p>
            </div>

            @php
                $victims = is_string($unsolved_case->count)
                    ? json_decode($unsolved_case->count, true)
                    : $unsolved_case->count;

                $suspects = is_string($unsolved_case->suspects)
                    ? json_decode($unsolved_case->suspects, true)
                    : $unsolved_case->suspects;

                $victims = $victims ?? [];
                $suspects = $suspects ?? [];
            @endphp

            <!-- Main Content -->
            <div class="details-grid">
                <!-- Image -->
                <div class="details-image">
                    <img
                        src="{{ $unsolved_case->image ? asset('images/' . $unsolved_case->image) : asset('images/default-image.png') }}"
                        alt="{{ $unsolved_case->name }}"
                    >
                </div>

                <!-- Right Side -->
                <div class="details-content">
                    <!-- Description -->
                    <section class="content-panel">
                        <h2>Description</h2>
                        
                        <p class="details-description">
                            {{ $unsolved_case->description ?? 'No description available.' }}
                        </p>
                    </section>

                    <!-- Overview -->
                    <section class="content-panel">
                        <h2 style="margin-bottom:1rem">Overview</h2>

                        <div class="details-stats">
                            <div class="details-stat details-killed">
                                <p>Total Victims</p>

                                <span>
                                    {{ is_array($victims) ? count($victims) : 'N/A' }}
                                </span>
                            </div>

                            <div class="details-stat details-suspects">
                                <p>Suspects Listed</p>

                                <span>
                                    {{ is_array($suspects) ? count($suspects) : 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Bottom Lists -->
            <div class="details-lists">
                <!-- Victims -->
                <section class="details-list">
                    <h2>Victims</h2>

                    @if(!empty($victims))
                        <ul>
                            @foreach($victims as $victim)
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

                <!-- Suspects -->
                <section class="details-list">
                    <h2>Suspects</h2>

                    @if(!empty($suspects))
                        <ul>
                            @foreach($suspects as $suspect)
                                <li class="details-list-item details-suspects-item">
                                    <span class="details-name">
                                        {{ $suspect['name'] ?? 'Unknown' }}
                                    </span>

                                    <span class="details-age">
                                        (Age: {{ $suspect['age'] ?? 'N/A' }})
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