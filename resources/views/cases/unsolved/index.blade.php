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
                <h1>Unsolved Cases</h1>
                <p>Explore cold cases, mysteries, and unresolved investigations.</p>
            </div>

            <form method="GET" action="{{ route('cases.unsolved.index') }}" class="archive-filters">
                <div class="filter-group">
                    <label for="search">Search</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Search by case name...">
                </div>

                <div class="filter-group">
                    <label for="country">Country</label>
                    <select id="country" name="country">
                        <option value="">All countries</option>

                        @foreach ($countries as $country)
                            <option value="{{ $country }}" {{ request('country') === $country ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group">
                    <label for="victims">Victims</label>
                    <select id="victims" name="victims">
                        <option value="">Any amount</option>
                        <option value="1" {{ request('victims') === '1' ? 'selected' : '' }}>
                            1
                        </option>
                        <option value="2-5" {{ request('victims') === '2-5' ? 'selected' : '' }}>
                            2-5
                        </option>
                        <option value="6-plus" {{ request('victims') === '6-plus' ? 'selected' : '' }}>
                            6+
                        </option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="suspects">Suspects</label>
                    <select id="suspects" name="suspects">
                        <option value="">Any amount</option>
                        <option value="0" {{ request('suspects') === '0' ? 'selected' : '' }}>
                            0
                        </option>
                        <option value="1-3" {{ request('suspects') === '1-3' ? 'selected' : '' }}>
                            1-3
                        </option>
                        <option value="4-plus" {{ request('suspects') === '4-plus' ? 'selected' : '' }}>
                            4+
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

                    <a href="{{ route('cases.unsolved.index') }}" class="filter-clear">
                        Clear filters
                    </a>
                </div>
            </form>

            <div class="archive-grid">
                @forelse ($unsolved_cases as $unsolved_case)
                    <!-- checks if this unsolved case is already in the users favourites -->
                    @php
                        $isFavourite = $favouriteUnsolvedIds->contains($unsolved_case->id);
                    @endphp

                    <article class="archive-card">
                        @auth
                            <form action="{{ route('favourites.toggle', ['type' => 'unsolved-case', 'id' => $unsolved_case->id]) }}" method="POST" class="favourite-form">
                                @csrf

                                <button type="submit" class="favourite-button {{ $isFavourite ? 'active' : '' }}" title="{{ $isFavourite ? 'Remove from favourites' : 'Add to favourites' }}">
                                    {{ $isFavourite ? '♥' : '♡' }}
                                </button>
                            </form>
                        @endauth

                        <a href="{{ route('cases.unsolved.show', $unsolved_case) }}" class="archive-card-link">
                            <div class="archive-image-wrapper">
                                <img
                                    src="{{ $unsolved_case->image ? asset('images/unsolved/' . $unsolved_case->image) : asset('images/default-image.png') }}"
                                    alt="{{ $unsolved_case->name }}" class="archive-image"
                                >

                                <div class="archive-image-overlay"></div>
                            </div>

                            <div class="archive-content">
                                <h2>{{ $unsolved_case->name }}</h2>

                                <p>Country: {{ $unsolved_case->country }}</p>
                            </div>

                            <div class="archive-accent-line"></div>
                        </a>
                    </article>
                @empty
                    <div class="archive-empty">
                        @if ( request()->filled('search') || request()->filled('country') || request()->filled('victims') || request()->filled('suspects'))
                            <p>No unsolved cases match the selected filters.</p>

                            <a href="{{ route('cases.unsolved.index') }}" class="filter-clear">
                                Clear filters
                            </a>
                        @else
                            <p>No unsolved case data available.</p>
                        @endif
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>