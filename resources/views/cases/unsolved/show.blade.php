<x-guest-layout>
    <div class="py-16 bg-bg text-text relative overflow-hidden min-h-screen">
        <!-- Background Glow -->
        <div class="absolute inset-0 opacity-20 blur-3xl pointer-events-none">
            <div class="w-[500px] h-[500px] bg-primary rounded-full absolute top-[-100px] left-[-100px]"></div>
            <div class="w-[400px] h-[400px] bg-accent rounded-full absolute bottom-[-120px] right-[-80px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Back Link -->
            <a href="{{ route('cases.unsolved.index') }}" class="text-sm text-accent hover:underline mb-4 inline-block">
                ← Back to all unsolved cases
            </a>

            <!-- Card -->
            <div class="mt-4 bg-surface/80 backdrop-blur shadow-2xl rounded-2xl overflow-hidden border border-primary/30 transition hover:shadow-[0_0_40px_rgba(142,22,22,0.3)]">
                <!-- Header -->
                <div class="p-6 border-b border-primary/30 text-center md:text-left">
                    <h1 class="text-4xl font-bold text-text mb-1">{{ $unsolved_case->name }}</h1>
                    <p class="text-text/60 text-sm md:text-base">{{ $unsolved_case->country }}</p>
                </div>

                <!-- Main Content -->
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Image -->
                    <div class="rounded-lg overflow-hidden">
                        <img src="{{ $unsolved_case->image ? asset('images/' . $unsolved_case->image) : asset('images/default-image.png') }}" 
                             alt="{{ $unsolved_case->name }}" 
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
                            <p class="text-text/80 leading-relaxed whitespace-pre-line">{{ $unsolved_case->description ?? 'No description available.' }}</p>
                        </div>

                        <!-- Victims + Suspects Summary -->
                        <div class="p-6 bg-surface/70 backdrop-blur border border-primary/30 rounded-xl shadow-md hover:shadow-lg transition">
                            <h2 class="text-2xl font-semibold text-text mb-4">Overview</h2>

                            @php
                                $victims = is_string($unsolved_case->count)
                                    ? json_decode($unsolved_case->count, true)
                                    : $unsolved_case->count;
                                $suspects = is_string($unsolved_case->suspects)
                                    ? json_decode($unsolved_case->suspects, true)
                                    : $unsolved_case->suspects;
                                $victims = $victims ?? [];
                                $suspects = $suspects ?? [];
                            @endphp

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm">
                                <div class="text-center p-4 bg-victimKilled/10 rounded-lg border border-victimKilled">
                                    <p class="text-text/60">Total Victims</p>
                                    <p class="font-semibold text-text">{{ is_array($victims) ? count($victims) : 'N/A' }}</p>
                                </div>
                                <div class="text-center p-4 bg-suspectWounded/10 rounded-lg border border-suspectWounded">
                                    <p class="text-text/60">Suspects Listed</p>
                                    <p class="font-semibold text-text">{{ is_array($suspects) ? count($suspects) : 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Victims + Suspects Section -->
                <div class="p-6 border-t border-primary/30 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Victims -->
                    <div class="space-y-3">
                        <h2 class="text-2xl font-semibold text-text mb-4">Victims</h2>
                        @if(!empty($victims))
                            <ul class="space-y-2">
                                @foreach($victims as $victim)
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

                    <!-- Suspects -->
                    <div class="space-y-3">
                        <h2 class="text-2xl font-semibold text-text mb-4">Suspects</h2>
                        @if(!empty($suspects))
                            <ul class="space-y-2">
                                @foreach($suspects as $suspect)
                                    <li class="p-4 bg-suspectWounded/20 rounded-lg border border-suspectWounded shadow-sm hover:shadow-md transition">
                                        <span class="font-medium text-text">{{ $suspect['name'] ?? 'Unknown' }}</span>
                                        <span class="text-text/70">(Age: {{ $suspect['age'] ?? 'N/A' }})</span>
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