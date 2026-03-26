<x-guest-layout>
    <div class="py-16 bg-bg text-text relative overflow-hidden min-h-screen">
        <!-- Background Glow -->
        <div class="absolute inset-0 opacity-20 blur-3xl pointer-events-none">
            <div class="w-[500px] h-[500px] bg-primary rounded-full absolute top-[-100px] left-[-100px]"></div>
            <div class="w-[400px] h-[400px] bg-accent rounded-full absolute bottom-[-120px] right-[-80px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold mb-2">Resources</h1>
                <p class="text-text/70 text-lg max-w-5xl mx-auto">
                    This page collects the websites, books, videos, and other reference material I used while researching the cases featured on this site. 
                    If you have any suggestions of what I should add to this collection, feel free to contact me.
                </p>
            </div>

            @php
                $groupedResources = \App\Models\Resource::all()->groupBy('resource_type');
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($groupedResources as $sectionTitle => $items)
                    <div class="bg-surface/80 backdrop-blur border border-primary/30 rounded-2xl shadow-2xl overflow-hidden transition hover:shadow-[0_0_40px_rgba(142,22,22,0.3)]">
                        <div class="p-6 border-b border-primary/30">
                            <h2 class="text-2xl font-semibold text-text mb-4">{{ ucfirst($sectionTitle) }}</h2>
                        </div>
                        <div class="p-6 space-y-6">
                            @foreach ($items as $item)
                                <div class="p-4 bg-accent/10 rounded-xl border border-primary/20 shadow-sm hover:shadow-md transition">
                                    <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="text-accent font-semibold text-lg hover:underline">
                                        {{ $item->title }}
                                    </a>
                                    <p class="text-text/70 mt-2 leading-relaxed">{{ $item->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-guest-layout>