<x-guest-layout>
    <div class="py-16 bg-bg text-text relative overflow-hidden min-h-screen">
        <!-- Background Glow -->
        <div class="absolute inset-0 opacity-20 blur-3xl pointer-events-none">
            <div class="w-[500px] h-[500px] bg-primary rounded-full absolute top-[-100px] left-[-100px]"></div>
            <div class="w-[400px] h-[400px] bg-accent rounded-full absolute bottom-[-120px] right-[-80px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Back Link -->
            <a href="{{ route('cases.killers.index') }}" class="text-sm text-accent hover:underline mb-4 inline-block">
                ← Back to all serial killers
            </a>

            <!-- Card -->
            <div class="mt-4 bg-surface/80 backdrop-blur shadow-2xl rounded-2xl overflow-hidden border border-primary/30 transition hover:shadow-[0_0_40px_rgba(142,22,22,0.3)]">
                <!-- Header -->
                <div class="p-6 border-b border-primary/30 text-center md:text-left">
                    <h1 class="text-4xl font-bold text-text mb-1">{{ $serial_killer->nickname }}</h1>
                    <p class="text-text/60 text-sm md:text-base">{{ $serial_killer->name }} • {{ $serial_killer->age }} • {{ $serial_killer->country }}</p>
                </div>

                <!-- Main Content -->
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Image -->
                    <div class="rounded-lg overflow-hidden">
                        <img src="{{ $serial_killer->image ? asset('images/' . $serial_killer->image) : asset('images/default-image.png') }}" 
                             alt="{{ $serial_killer->nickname }}" 
                             class="w-full h-[500px] object-cover object-center transition duration-500 hover:scale-105 rounded-lg"
                        />
                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-bg/80 via-transparent to-transparent opacity-80 pointer-events-none"></div>
                    </div>

                    <!-- Description + Stats -->
                    <div class="md:col-span-2 space-y-8 flex flex-col">
                        <!-- Description -->
                        <div class="p-6 bg-surface/70 backdrop-blur border border-primary/30 rounded-xl shadow-md hover:shadow-lg transition">
                            <h2 class="text-2xl font-semibold text-text mb-4">Description</h2>
                            <p class="text-text/80 leading-relaxed whitespace-pre-line">{{ $serial_killer->description ?? 'No description available.' }}</p>
                        </div>

                        <!-- Victim Summary -->
                        <div class="p-6 bg-surface/70 backdrop-blur border border-primary/30 rounded-xl shadow-md hover:shadow-lg transition">
                            <h2 class="text-2xl font-semibold text-text mb-4">Victim Overview</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-sm">
                                <div class="text-center p-4 bg-victimKilled/10 rounded-lg border border-victimKilled">
                                    <p class="text-text/60">Claimed Killed</p>
                                    <p class="font-semibold text-text">{{ $serial_killer->victim_count['killed']['claimed'] ?? 'N/A' }}</p>
                                </div>
                                <div class="text-center p-4 bg-victimKilled/20 rounded-lg border border-victimKilled">
                                    <p class="text-text/60">Confirmed Killed</p>
                                    <p class="font-semibold text-text">{{ $serial_killer->victim_count['killed']['confirmed'] ?? 'N/A' }}</p>
                                </div>
                                <div class="text-center p-4 bg-suspectWounded/10 rounded-lg border border-suspectWounded">
                                    <p class="text-text/60">Wounded</p>
                                    <p class="font-semibold text-text">{{ $serial_killer->victim_count['wounded'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $victimData = $serial_killer->victimRecord->count ?? null;
                    if (is_string($victimData)) { $victimData = json_decode($victimData, true); }
                    $killedVictims = $victimData['killed'] ?? [];
                    $woundedVictims = $victimData['wounded'] ?? [];
                @endphp

                <!-- Victims Section -->
                <div class="p-6 border-t border-primary/30 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Killed -->
                    <div class="space-y-3">
                        <h2 class="text-2xl font-semibold text-text mb-4">Killed Victims</h2>
                        @if(count($killedVictims))
                            <ul class="space-y-2">
                                @foreach ($killedVictims as $victim)
                                    <li class="p-4 bg-victimKilled/20 rounded-lg border border-victimKilled shadow-sm hover:shadow-md transition">
                                        <span class="font-medium text-text">{{ $victim['name'] ?? 'Unknown' }}</span>
                                        <span class="text-text/70">(Age: {{ $victim['age'] ?? 'N/A' }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-text/60">No data available.</p>
                        @endif
                    </div>

                    <!-- Wounded -->
                    <div class="space-y-3">
                        <h2 class="text-2xl font-semibold text-text mb-4">Wounded Victims</h2>
                        @if(count($woundedVictims))
                            <ul class="space-y-2">
                                @foreach ($woundedVictims as $victim)
                                    <li class="p-4 bg-suspectWounded/20 rounded-lg border border-suspectWounded shadow-sm hover:shadow-md transition">
                                        <span class="font-medium text-text">{{ $victim['name'] ?? 'Unknown' }}</span>
                                        <span class="text-text/70">(Age: {{ $victim['age'] ?? 'N/A' }})</span>
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