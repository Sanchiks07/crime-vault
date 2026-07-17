<x-layout>
<div class="page">
    <div class="background-glow">
        <div class="glow glow-left"></div>
        <div class="glow glow-right"></div>
    </div>

    <div class="page-container">
        <div class="page-header">
            <h1>Resources</h1>

            <p>
                This page collects the websites, books, videos, and other reference material I used while researching the cases featured on this site.
                If you have any suggestions of what I should add to this collection, feel free to contact me.
            </p><br>

            <small>Resources for psychology ar located in the Psychology page.</small>
        </div>

        @php
            $groupedResources = \App\Models\Resource::all()->groupBy('resource_type');
        @endphp

        <div class="resources-grid">
            @foreach ($groupedResources as $sectionTitle => $items)
                <div class="resources-section">
                    <div class="resources-header">
                        <h2>{{ ucfirst($sectionTitle) }}</h2>
                    </div><br>

                    <div class="resources-list">
                        @foreach ($items as $item)
                            <div class="resources-card">
                                <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer">{{ $item->title }}</a>
                                <p>{{ $item->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</x-layout>