<x-guest-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('cases.killers.index') }}" class="text-sm text-blue-600 hover:underline">
                ← Back to all serial killers
            </a>

            <div class="mt-4 bg-white shadow-lg rounded-xl overflow-hidden">
                <!-- Header -->
                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $serial_killer->nickname }}</h1>
                    <p class="text-sm text-gray-500 mt-1">{{ $serial_killer->name }} • {{ $serial_killer->age }} • {{ $serial_killer->country }}</p>
                </div>

                <!-- Main Content -->
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Image -->
                    <div>
                        <img src="{{ $serial_killer->image ? asset('images/' . $serial_killer->image) : asset('images/default-image.png') }}" alt="{{ $serial_killer->nickname }}" class="w-full h-72 object-cover rounded-lg shadow" />
                    </div>

                    <!-- Description + Stats -->
                    <div class="md:col-span-2 space-y-6">
                        <!-- Description -->
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Description</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $serial_killer->description ?? 'No description available.' }}</p>
                        </div>

                        <!-- Victim Summary -->
                        <div class="bg-gray-50 p-4 rounded-lg border">
                            <h2 class="text-lg font-semibold mb-3">Victim Overview</h2>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-500">Claimed Killed</p>
                                    <p class="font-semibold">{{ $serial_killer->victim_count['killed']['claimed'] ?? 'N/A' }}</p>
                                </div>

                                <div>
                                    <p class="text-gray-500">Confirmed Killed</p>
                                    <p class="font-semibold">{{ $serial_killer->victim_count['killed']['confirmed'] ?? 'N/A' }}</p>
                                </div>

                                <div>
                                    <p class="text-gray-500">Wounded</p>
                                    <p class="font-semibold">{{ $serial_killer->victim_count['wounded'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $victimData = $serial_killer->victimRecord->count ?? null;

                    if (is_string($victimData)) {
                        $victimData = json_decode($victimData, true);
                    }

                    $killedVictims = $victimData['killed'] ?? [];
                    $woundedVictims = $victimData['wounded'] ?? [];
                @endphp

                <!-- Victims Section -->
                <div class="p-6 border-t border-gray-200 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Killed -->
                    <div>
                        <h2 class="text-lg font-semibold mb-3">Killed Victims</h2>

                        @if(count($killedVictims))
                            <ul class="space-y-2">
                                @foreach ($killedVictims as $victim)
                                    <li class="p-3 bg-red-50 rounded border border-red-100">
                                        <span class="font-medium text-gray-900">
                                            {{ $victim['name'] ?? 'Unknown' }}
                                        </span>
                                        <span class="text-gray-600">
                                            (Age: {{ $victim['age'] ?? 'N/A' }})
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No data available.</p>
                        @endif
                    </div>

                    <!-- Wounded -->
                    <div>
                        <h2 class="text-lg font-semibold mb-3">Wounded Victims</h2>

                        @if(count($woundedVictims))
                            <ul class="space-y-2">
                                @foreach ($woundedVictims as $victim)
                                    <li class="p-3 bg-yellow-50 rounded border border-yellow-100">
                                        <span class="font-medium text-gray-900">
                                            {{ $victim['name'] ?? 'Unknown' }}
                                        </span>
                                        <span class="text-gray-600">
                                            (Age: {{ $victim['age'] ?? 'N/A' }})
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No data available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>