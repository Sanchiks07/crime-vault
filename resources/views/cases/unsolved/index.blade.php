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
                        <p>No unsolved case data available.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>