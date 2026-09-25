<x-layout>
    <div class="page">
        <!-- Background Effect -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="page-container">
            <!-- Page Header -->
            <div class="page-header">
                <h1>Favourites</h1>
                <p>Your saved serial killers and unsolved cases.</p>
            </div>

            <!-- separates favourites into serial killers and unsolved cases based on their model type -->
            @php
                $serialKillers = $favourites->filter(
                    fn ($favourite) => $favourite->favouritable instanceof \App\Models\SerialKiller
                );

                $unsolvedCases = $favourites->filter(
                    fn ($favourite) => $favourite->favouritable instanceof \App\Models\UnsolvedCase
                );
            @endphp


            @if ($favourites->isEmpty())
                <!-- No Favourites -->
                <div class="archive-empty">
                    <h2>No favourites yet</h2>
                    <p>Cases you save will appear here.</p>
                </div>
            @else

                <!-- ========== SERIAL KILLERS ==========-->
                @if ($serialKillers->isNotEmpty())
                    <section class="favourites-section">
                        <div class="favourites-section-header">
                            <h2>Serial Killers</h2>
                            <span>{{ $serialKillers->count() }} saved</span>
                        </div>

                        <div class="archive-grid">
                            @foreach ($serialKillers as $favourite)
                                @php
                                    $serial_killer = $favourite->favouritable;
                                @endphp

                                <article class="archive-card">
                                    <!-- Remove Favourite Button -->
                                    <form action="{{ route('favourites.toggle', ['type' => 'serial-killer', 'id' => $serial_killer->id]) }}" method="POST" class="favourite-form">
                                        @csrf
                                        <button type="submit" class="favourite-button active" title="Remove from favourites">
                                            ♥
                                        </button>
                                    </form>

                                    <!-- Case Link -->
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
                                            <p>Real name:{{ $serial_killer->name ?? 'Unknown' }}</p>
                                            <p>Age: {{ $serial_killer->age_text }}</p>
                                            <p>Country: {{ $serial_killer->country ?? 'Unknown' }}</p>
                                        </div>
                                    </a>

                                    <div class="archive-accent-line"></div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- ========== UNSOLVED CASES ========== -->
                @if ($unsolvedCases->isNotEmpty())
                    <section class="favourites-section">
                        <div class="favourites-section-header">
                            <h2>Unsolved Cases</h2>
                            <span>{{ $unsolvedCases->count() }} saved</span>
                        </div>

                        <div class="archive-grid">
                            @foreach ($unsolvedCases as $favourite)
                                @php
                                    $unsolved_case = $favourite->favouritable;
                                @endphp

                                <article class="archive-card">
                                    <!-- Remove Favourite Button -->
                                    <form action="{{ route('favourites.toggle', ['type' => 'unsolved-case', 'id' => $unsolved_case->id]) }}" method="POST" class="favourite-form">
                                        @csrf
                                        <button type="submit" class="favourite-button active" title="Remove from favourites">
                                            ♥
                                        </button>
                                    </form>

                                    <!-- Case Link -->
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

                                            @if ($unsolved_case->country)
                                                <p>Country: {{ $unsolved_case->country }}</p>
                                            @endif
                                        </div>
                                    </a>

                                    <div class="archive-accent-line"></div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endif
            @endif
        </div>
    </div>
</x-layout>