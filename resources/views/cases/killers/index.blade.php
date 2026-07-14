<x-layout>

<div class="page">

    <div class="background-glow">
        <div class="glow glow-left"></div>
        <div class="glow glow-right"></div>
    </div>

    <div class="page-container">

        <div class="page-header">
            <h1>Serial Killers</h1>
            <p>Documented profiles, patterns, and histories.</p>
        </div>

        <div class="archive-grid">

            @forelse ($serial_killers as $serial_killer)

                <a href="{{ route('cases.killers.show', $serial_killer) }}" class="archive-card-link">

                    <article class="archive-card">

                        <div class="archive-image-wrapper">

                            <img
                                src="{{ $serial_killer->image ? asset('images/' . $serial_killer->image) : asset('images/default-image.png') }}"
                                alt="{{ $serial_killer->nickname }}"
                                class="archive-image">

                            <div class="archive-image-overlay"></div>

                        </div>

                        <div class="archive-content">

                            <h2>{{ $serial_killer->nickname }}</h2>

                            <p>Real name: {{ $serial_killer->name }}</p>
                            <p>Age: {{ $serial_killer->age }}</p>
                            <p>Country: {{ $serial_killer->country }}</p>

                        </div>

                        <div class="archive-accent-line"></div>

                    </article>

                </a>

            @empty

                <div class="archive-empty">
                    <p>No serial killer data available.</p>
                </div>

            @endforelse

        </div>

    </div>

</div>

</x-layout>