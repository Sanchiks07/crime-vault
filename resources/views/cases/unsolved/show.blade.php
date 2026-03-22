<x-guest-layout>
    <div class="py-12 bg-bg min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('cases.unsolved.index') }}" class="text-sm text-accent hover:underline">
                ← Back to all unsolved cases
            </a>

            <div class="mt-4 bg-surface shadow-lg rounded-xl overflow-hidden border border-primary">
                <!-- Header -->
                <div class="p-6 border-b border-primary">
                    <h1 class="text-3xl font-bold text-text">{{ $unsolved_case->name }}</h1>
                    <p class="text-sm text-text/70 mt-1">{{ $unsolved_case->country }}</p>
                </div>

                <!-- Main Content -->
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Image -->
                    <div>
                        <img src="{{ $unsolved_case->image ? asset('images/' . $unsolved_case->image) : asset('images/default-image.png') }}" alt="{{ $unsolved_case->name }}" class="w-full h-72 object-cover rounded-lg shadow" />
                    </div>

                    <!-- Description + Stats -->
                    <div class="md:col-span-2 space-y-6">
                        <!-- Description -->
                        <div>
                            <h2 class="text-lg font-semibold text-text mb-5">Description</h2>
                            <p class="text-text/80 leading-relaxed whitespace-pre-line">{{ $unsolved_case->description ?? 'No description available.' }}</p>
                        </div>

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

                        <!-- Victim Overview -->
                        <div class="bg-bg p-4 rounded-lg border border-primary">
                            <h2 class="text-lg font-semibold mb-3 text-text">Victim Overview</h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-text/60">Total Victims</p>
                                    <p class="font-semibold text-text">{{ is_array($victims) ? count($victims) : 'N/A' }}</p>
                                </div>

                                <div>
                                    <p class="text-text/60">Suspects Listed</p>
                                    <p class="font-semibold text-text">{{ is_array($suspects) ? count($suspects) : 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Victims + Suspects Section -->
                <div class="p-6 border-t border-primary grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Victims -->
                    <div>
                        <h2 class="text-lg font-semibold mb-3 text-text">Victims</h2>

                        @if(!empty($victims))
                            <ul class="space-y-2">
                                @foreach($victims as $victim)
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

                    <!-- Suspects -->
                    <div>
                        <h2 class="text-lg font-semibold mb-3 text-text">Suspects</h2>

                        @if(!empty($suspects))
                            <ul class="space-y-2">
                                @foreach($suspects as $suspect)
                                    <li class="p-3 bg-suspectWounded/10 rounded border border-suspectWounded">
                                        <span class="font-medium text-text">
                                            {{ $suspect['name'] ?? 'Unknown' }}
                                        </span>
                                        <span class="text-text/70">
                                            (Age: {{ $suspect['age'] ?? 'N/A' }})
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