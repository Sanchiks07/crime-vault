<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-3xl mx-auto">
                        <a href="{{ route('cases.killers.index') }}" class="text-sm text-blue-600 hover:underline">← Back to all serial killers</a>

                        <div class="flex flex-col md:flex-row gap-6 mt-5">
                            <div class="flex-shrink-0 w-full md:w-64">
                                <img src="{{ $serial_killer->image ? asset('images/' . $serial_killer->image) : asset('images/default-image.png') }}" alt="{{ $serial_killer->nickname }}" class="h-48 md:h-64 w-full object-cover rounded-md" />
                            </div>

                            <div class="flex-1 flex flex-col justify-center">
                                <h1 class="text-2xl font-bold mb-2">{{ $serial_killer->nickname }}</h1>
                                <p class="text-sm text-gray-600">Real name: {{ $serial_killer->name }}</p>
                                <p class="text-sm text-gray-600">Age: {{ $serial_killer->age }}</p>
                                <p class="text-sm text-gray-600 mb-4">Country: {{ $serial_killer->country }}</p>

                                @php
                                    $victims = $serial_killer->victims;

                                    if (is_string($victims)) {
                                        $victims = json_decode($victims, true);
                                    }
                                @endphp

                                <div class="space-y-2">
                                    <h2 class="text-lg font-semibold">Victim counts</h2>
                                    <p>Victims (claimed): {{ $victims['killed']['claimed'] ?? 'N/A' }}</p>
                                    <p>Victims (confirmed): {{ $victims['killed']['confirmed'] ?? 'N/A' }}</p>
                                    <p>Wounded: {{ $victims['wounded'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>