<x-guest-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('cases.unsolved.index') }}" class="text-sm text-blue-600 hover:underline">
                ← Back to all unsolved cases
            </a>

            <div class="mt-4 bg-white shadow-lg rounded-xl overflow-hidden">
                <!-- Header -->
                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $unsolved_case->name }}</h1>
                    <p class="text-sm text-gray-500 mt-1">{{ $unsolved_case->country }}</p>
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
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Description</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $unsolved_case->description ?? 'No description available.' }}</p>
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
                        <div class="bg-gray-50 p-4 rounded-lg border">
                            <h2 class="text-lg font-semibold mb-3">Victim Overview</h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-500">Total Victims</p>
                                    <p class="font-semibold">{{ is_array($victims) ? count($victims) : 'N/A' }}</p>
                                </div>

                                <div>
                                    <p class="text-gray-500">Suspects Listed</p>
                                    <p class="font-semibold">{{ is_array($suspects) ? count($suspects) : 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Victims + Suspects Section -->
                <div class="p-6 border-t border-gray-200 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Victims -->
                    <div>
                        <h2 class="text-lg font-semibold mb-3">Victims</h2>

                        @if(!empty($victims))
                            <ul class="space-y-2">
                                @foreach($victims as $victim)
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

                    <!-- Suspects -->
                    <div>
                        <h2 class="text-lg font-semibold mb-3">Suspects</h2>

                        @if(!empty($suspects))
                            <ul class="space-y-2">
                                @foreach($suspects as $suspect)
                                    <li class="p-3 bg-yellow-50 rounded border border-yellow-100">
                                        <span class="font-medium text-gray-900">
                                            {{ $suspect['name'] ?? 'Unknown' }}
                                        </span>
                                        <span class="text-gray-600">
                                            (Age: {{ $suspect['age'] ?? 'N/A' }})
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