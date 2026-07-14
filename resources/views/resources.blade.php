<x-layout>
<div class="resources-page">
    <div class="background-glow">
        <div class="glow glow-left"></div>
        <div class="glow glow-right"></div>
    </div>

    <div class="resources-container">
        <div class="page-header">
            <h1>Resources</h1>

            <p>
                This page collects the websites, books, videos, and other reference material I used while researching the cases featured on this site.
                If you have any suggestions of what I should add to this collection, feel free to contact me.
            </p>
        </div>

        @php
            $groupedResources = \App\Models\Resource::all()->groupBy('resource_type');
        @endphp

        <div class="resources-grid">
            @foreach ($groupedResources as $sectionTitle => $items)
                <div class="resource-section">
                    <div class="resource-header">
                        <h2>{{ ucfirst($sectionTitle) }}</h2>
                    </div>

                    <div class="resource-list">
                        @foreach ($items as $item)
                            <div class="resource-card">
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