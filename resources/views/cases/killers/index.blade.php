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

                            <div class="archive-content">
                                <h2>{{ $serial_killer->nickname }}</h2>

                                <p>Real name: {{ $serial_killer->name ?? 'Unknown' }}</p>
                                <p>Age: {{ $ageText }}</p>
                                <p>Country: {{ $serial_killer->country }}</p>
                            </div>

                            <div class="archive-accent-line"></div>
                        </a>
                    </article>
                @empty
                    <div class="archive-empty">
                        <p>No serial killer data available.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>