<x-guest-layout>
    <div class="py-12 bg-bg min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface overflow-hidden shadow-sm sm:rounded-lg border border-primary">
                <div class="p-6 text-text">
                    <h1 class="text-3xl font-bold mb-4">Resources</h1>
                    <p class="text-text/70 mb-8">
                        This page collects the websites, books, videos, and other reference material I used while researching the cases featured on this site. 
                        If you have suggestions to add, feel free to contact me.
                    </p>

                    @php
                        $groupedResources = \App\Models\Resource::all()->groupBy('resource_type');
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($groupedResources as $sectionTitle => $items)
                            <div class="border border-primary rounded-lg p-6 shadow-sm bg-accent/10">
                                <h2 class="text-xl font-semibold mb-4 text-text">{{ ucfirst($sectionTitle) }}</h2>

                                <ul class="space-y-4">
                                    @foreach ($items as $item)
                                        <li>
                                            <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="text-accent font-semibold hover:underline">
                                                {{ $item->title }}
                                            </a>
                                            <p class="text-sm text-text/60">{{ $item->description }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>