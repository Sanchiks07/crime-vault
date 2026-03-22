<x-guest-layout>
    <div class="py-12 bg-bg min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('cases.killers.index') }}" class="text-sm text-accent hover:underline">
                ← Back to all serial killers
            </a>

            <div class="mt-4 bg-surface shadow-lg rounded-xl overflow-hidden border border-primary">
                <!-- Header -->
                <div class="p-6 border-b border-primary">
                    <h1 class="text-3xl font-bold text-text">{{ $serial_killer->nickname }}</h1>
                    <p class="text-sm text-text/70 mt-1">{{ $serial_killer->name }} • {{ $serial_killer->age }} • {{ $serial_killer->country }}</p>
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
                            <h2 class="text-lg font-semibold text-text mb-5">Description</h2>
                            <p class="text-text/80 leading-relaxed whitespace-pre-line">{{ $serial_killer->description ?? 'No description available.' }}</p>
                        </div>

                        <!-- Victim Summary -->
                        <div class="bg-bg p-4 rounded-lg border border-primary">
                            <h2 class="text-lg font-semibold mb-3 text-text">Victim Overview</h2>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                <div>
                                    <p class="text-text/60">Claimed Killed</p>
                                    <p class="font-semibold text-text">{{ $serial_killer->victim_count['killed']['claimed'] ?? 'N/A' }}</p>
                                </div>

                                <div>
                                    <p class="text-text/60">Confirmed Killed</p>
                                    <p class="font-semibold text-text">{{ $serial_killer->victim_count['killed']['confirmed'] ?? 'N/A' }}</p>
                                </div>

                                <div>
                                    <p class="text-text/60">Wounded</p>
                                    <p class="font-semibold text-text">{{ $serial_killer->victim_count['wounded'] ?? 'N/A' }}</p>
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
                <div class="p-6 border-t border-primary grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Killed -->
                    <div>
                        <h2 class="text-lg font-semibold mb-3 text-text">Killed Victims</h2>

                        @if(count($killedVictims))
                            <ul class="space-y-2">
                                @foreach ($killedVictims as $victim)
                                    <li class="p-3 bg-victimKilled/10 rounded border border-victimKilled">
                                        <span class="font-medium text-text">
                                            {{ $victim['name'] ?? 'Unknown' }}
                                        </span>
                                        <span class="text-text/70">
                                            (Age: {{ $victim['age'] ?? 'N/A' }})
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-text/60">No data available.</p>
                        @endif
                    </div>

                    <!-- Wounded -->
                    <div>
                        <h2 class="text-lg font-semibold mb-3 text-text">Wounded Victims</h2>

                        @if(count($woundedVictims))
                            <ul class="space-y-2">
                                @foreach ($woundedVictims as $victim)
                                    <li class="p-3 bg-suspectWounded/10 rounded border border-suspectWounded">
                                        <span class="font-medium text-text">
                                            {{ $victim['name'] ?? 'Unknown' }}
                                        </span>
                                        <span class="text-text/70">
                                            (Age: {{ $victim['age'] ?? 'N/A' }})
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-text/60">No data available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>