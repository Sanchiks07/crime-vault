<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($serial_killers as $serial_killer)
                            <a href="{{ route('cases.killers.show', $serial_killer) }}" class="block group">
                                <div class="border rounded-lg p-4 shadow-sm bg-white group-hover:shadow-lg transition">
                                    <img src="{{ $serial_killer->image ? asset('images/' . $serial_killer->image) : asset('images/default-image.png') }}" alt="{{ $serial_killer->nickname }}" class="h-50 w-full object-cover rounded-md mb-4" />
                                    <h2 class="text-xl font-semibold">{{ $serial_killer->nickname }}</h2>
                                    <p class="text-sm text-gray-600">Real name: {{ $serial_killer->name }}</p>
                                    <p class="text-sm text-gray-600">Age: {{ $serial_killer->age }}</p>
                                    <p class="text-sm text-gray-600">Country: {{ $serial_killer->country }}</p>
                                </div>
                            </a>
                        @empty
                            <p>No serial killer data available.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>