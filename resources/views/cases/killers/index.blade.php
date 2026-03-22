<x-guest-layout>
    <div class="py-12 bg-bg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 text-text">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($serial_killers as $serial_killer)
                            <a href="{{ route('cases.killers.show', $serial_killer) }}" class="block group">
                                <div class="border border-primary rounded-lg p-4 shadow-sm bg-surface group-hover:shadow-lg group-hover:border-accent transition">
                                    <img src="{{ $serial_killer->image ? asset('images/' . $serial_killer->image) : asset('images/default-image.png') }}" alt="{{ $serial_killer->nickname }}" class="h-50 w-full object-cover rounded-md mb-4" />
                                    <h2 class="text-xl font-semibold text-text group-hover:text-accent transition">{{ $serial_killer->nickname }}</h2>
                                    <p class="text-sm text-text/70">Real name: {{ $serial_killer->name }}</p>
                                    <p class="text-sm text-text/70">Age: {{ $serial_killer->age }}</p>
                                    <p class="text-sm text-text/70">Country: {{ $serial_killer->country }}</p>
                                </div>
                            </a>
                        @empty
                            <p class="text-text/60">No serial killer data available.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>