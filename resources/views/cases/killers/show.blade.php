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
                                    $victimData = $serial_killer->victimRecord->count ?? null;

                                    if (is_string($victimData)) {
                                        $victimData = json_decode($victimData, true);
                                    }

                                    function formatVictims($group) {
                                        if (!$group) return [];

                                        $victims = [];

                                        foreach ($group as $key => $value) {
                                            if (str_starts_with($key, 'name_')) {
                                                $index = (int) str_replace('name_', '', $key);
                                                $victims[$index]['name'] = $value;
                                            }

                                            if (str_starts_with($key, 'age_')) {
                                                $index = (int) str_replace('age_', '', $key);
                                                $victims[$index]['age'] = $value;
                                            }
                                        }

                                        ksort($victims);

                                        return $victims;
                                    }

                                    $killedVictims = formatVictims($victimData['killed'] ?? []);
                                    $woundedVictims = formatVictims($victimData['wounded'] ?? []);
                                @endphp

                                <!-- victim count overall -->
                                <div class="space-y-2">
                                    <h2 class="text-lg font-semibold">Victim counts</h2>
                                    <p>Claimed: {{ $serial_killer->victim_count['killed']['claimed'] ?? 'N/A' }}</p>
                                    <p>Confirmed: {{ $serial_killer->victim_count['killed']['confirmed'] ?? 'N/A' }}</p>
                                    <p>Wounded: {{ $serial_killer->victim_count['wounded'] ?? 'N/A' }}</p>
                                </div>

                                <!-- victim's names and ages -->
                                <div class="mt-6">
                                    <h2 class="text-lg font-semibold mb-2">Killed Victims</h2>

                                    @if(count($killedVictims))
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($killedVictims as $victim)
                                                <li>
                                                    {{ $victim['name'] ?? 'N/A' }} (Age: {{ $victim['age'] ?? 'N/A' }})
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No data</p>
                                    @endif
                                </div>

                                <div class="mt-6">
                                    <h2 class="text-lg font-semibold mb-2">Wounded Victims</h2>
                                    
                                    @if(count($woundedVictims))
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($woundedVictims as $victim)
                                                <li>
                                                    {{ $victim['name'] ?? 'Unknown' }} (Age: {{ $victim['age'] ?? 'N/A' }})
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No data</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>