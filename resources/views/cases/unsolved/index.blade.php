<x-layout>
<div class="page">
    <div class="background-glow">
        <div class="glow glow-left"></div>
        <div class="glow glow-right"></div>
    </div>

    <div class="page-container">
        <div class="page-header">
            <h1>Unsolved Cases</h1>

            <p>Explore cold cases, mysteries, and unresolved investigations.</p>
        </div>

        <div class="archive-grid">
            @forelse ($unsolved_cases as $unsolved_case)
                <a href="{{ route('cases.unsolved.show', $unsolved_case) }}" class="archive-card-link">
                    <article class="archive-card">
                        <div class="archive-image-wrapper">
                            <img
                                src="{{ $unsolved_case->image ? asset('images/' . $unsolved_case->image) : asset('images/default-image.png') }}"
                                alt="{{ $unsolved_case->name }}" class="archive-image"
                            >

                            <div class="archive-image-overlay"></div>
                        </div>

                        <div class="archive-content">
                            <h2>{{ $unsolved_case->name }}</h2>

                            <p>Country: {{ $unsolved_case->country }}</p>
                        </div>

                        <div class="archive-accent-line"></div>
                    </article>
                </a>
            @empty
                <div class="archive-empty">
                    <p>No unsolved case data available.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
</x-layout>