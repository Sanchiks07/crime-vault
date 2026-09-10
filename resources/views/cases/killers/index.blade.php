<x-layout>
    <div class="page">
        <!-- Background Effect -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="page-container">
            <div class="page-header">
                <h1>Serial Killers</h1>
                <p>Documented profiles, patterns, and histories.</p>
            </div>

            <form method="GET" action="{{ route('cases.killers.index') }}" class="archive-filters">
                <div class="filter-group">
                    <label for="search">Search</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Search by name or nickname...">
                </div>

                <div class="filter-group">
                    <label for="country">Country</label>
                    <select id="country" name="country">
                        <option value="">All countries</option>

                        @foreach ($countries as $country)
                            <!-- value = keeps the search text inside the input after the form submits -->
                            <option value="{{ $country }}" {{ request('country') === $country ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group">
                    <label for="victims">Confirmed victims</label>
                    <select id="victims" name="victims">
                        <option value="">Any amount</option>
                        <option value="0-5" {{ request('victims') === '0-5' ? 'selected' : '' }}>
                            0-5
                        </option>
                        <option value="6-10" {{ request('victims') === '6-10' ? 'selected' : '' }}>
                            6-10
                        </option>
                        <option value="11-20" {{ request('victims') === '11-20' ? 'selected' : '' }}>
                            11-20
                        </option>
                        <option value="21-plus" {{ request('victims') === '21-plus' ? 'selected' : '' }}>
                            21+
                        </option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="sort">Sort by</label>
                    <select id="sort" name="sort">
                        <option value="name-asc" {{ request('sort', 'name-asc') === 'name-asc' ? 'selected' : '' }}>
                            Name A-Z
                        </option>
                        <option value="name-desc" {{ request('sort') === 'name-desc' ? 'selected' : '' }}>
                            Name Z-A
                        </option>
                        <option value="victims-asc" {{ request('sort') === 'victims-asc' ? 'selected' : '' }}>
                            Victims: lowest first
                        </option>
                        <option value="victims-desc" {{ request('sort') === 'victims-desc' ? 'selected' : '' }}>
                            Victims: highest first
                        </option>
                    </select>
                </div>

                <div class="filter-actions">
                    <button type="submit" class="filter-submit">
                        Apply filters
                    </button>

                    @if (request()->filled('search') || request()->filled('country') || request()->filled('victims') || request('sort', 'name-asc') !== 'name-asc')
                        <a href="{{ route('cases.killers.index') }}" class="filter-clear">
                            Clear filters
                        </a>
                    @endif
                </div>
            </form>

            <div class="filter-results">
                <p>
                    {{ $serial_killers->count() }}
                    {{ $serial_killers->count() === 1 ? 'case found' : 'cases found' }}
                </p>
            </div>

            <div class="archive-grid">
                @forelse ($serial_killers as $serial_killer)
                    <!-- checks if this serial killer is already in the users favourites. -->
                    @php
                        $isFavourite = $favouriteKillerIds->contains($serial_killer->id);
                    @endphp

                    <article class="archive-card">
                        @auth
                            <form action="{{ route('favourites.toggle', ['type' => 'serial-killer', 'id' => $serial_killer->id]) }}" method="POST" class="favourite-form">
                                @csrf

                                <button type="submit" class="favourite-button {{ $isFavourite ? 'active' : '' }}" title="{{ $isFavourite ? 'Remove from favourites' : 'Add to favourites' }}">
                                    {{ $isFavourite ? '♥' : '♡' }}
                                </button>
                            </form>
                        @endauth

                        <a href="{{ route('cases.killers.show', $serial_killer) }}" class="archive-card-link">
                            <div class="archive-image-wrapper">
                                <img
                                    src="{{ $serial_killer->image ? asset('images/killers/' . $serial_killer->image) : asset('images/default-image.png') }}"
                                    alt="{{ $serial_killer->nickname }}" class="archive-image"
                                >

                                <div class="archive-image-overlay"></div>
                            </div>

                            <div class="archive-content">
                                <h2>{{ $serial_killer->nickname }}</h2>

                                <p>Real name: {{ $serial_killer->name ?? 'Unknown' }}</p>
                                <p>Age: {{ $serial_killer->age_text }}</p>
                                <p>Country: {{ $serial_killer->country }}</p>
                            </div>

                            <div class="archive-accent-line"></div>
                        </a>
                    </article>
                @empty
                    <div class="archive-empty">
                        @if (request()->filled('search') || request()->filled('country') || request()->filled('victims'))
                            <p>No serial killers match the selected filters.</p>
                        @else
                            <p>No serial killer data available.</p>
                        @endif
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>