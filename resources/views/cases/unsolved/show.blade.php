<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-3xl mx-auto">
                        <a href="{{ route('cases.unsolved.index') }}" class="text-sm text-blue-600 hover:underline">← Back to all unsolved cases</a>

                        <div class="flex flex-col md:flex-row gap-6 mt-5">
                            <div class="flex-shrink-0 w-full rounded-lg md:w-64">
                                <img src="{{ $unsolved_case->image ? asset('images/' . $unsolved_case->image) : asset('images/default-image.png') }}" alt="{{ $unsolved_case->name }}" class="h-48 md:h-64 w-full object-cover rounded-md">
                            </div>

                            <div class="flex-1 flex flex-col justify-center">
                                <h1 class="text-2xl font-bold mb-2">{{ $unsolved_case->name }}</h1>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-6">
                                    <p class="text-sm text-gray-600">Country: {{ $unsolved_case->country }}</p>
                                </div>

                                @php
                                    $count = $unsolved_case->count;
                                    $suspects = $unsolved_case->suspects;

                                    if (is_string($count)) {
                                        $count = json_decode($count, true);
                                    }

                                    if (is_string($suspects)) {
                                        $suspects = json_decode($suspects, true);
                                    }

                                    $victimEntries = [];
                                    foreach ($count as $key => $value) {
                                        if (preg_match('/^(name|age)_(\d+)$/', $key, $matches)) {
                                            $index = $matches[2];
                                            $type = $matches[1];
                                            $victimEntries[$index][$type] = $value;
                                        }
                                    }

                                    $suspectEntries = [];
                                    foreach ($suspects as $key => $value) {
                                        if (preg_match('/^(name|age)_(\d+)$/', $key, $matches)) {
                                            $index = $matches[2];
                                            $type = $matches[1];
                                            $suspectEntries[$index][$type] = $value;
                                        }
                                    }
                                @endphp

                                <div class="space-y-4">
                                    <div>
                                        <h2 class="text-lg font-semibold">Victims</h2>

                                        @if (count($victimEntries) > 0)
                                            <ul class="list-disc pl-5 space-y-1">
                                                @foreach ($victimEntries as $entry)
                                                    <li>{{ $entry['name'] ?? 'N/A' }} (Age: {{ $entry['age'] ?? 'N/A' }})</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-sm text-gray-600">No data</p>
                                        @endif
                                    </div>

                                    <div>
                                        <h2 class="text-lg font-semibold">Suspects</h2>

                                        @if (count($suspectEntries) > 0)
                                            <ul class="list-disc pl-5 space-y-1">
                                                @foreach ($suspectEntries as $entry)
                                                    <li>{{ $entry['name'] ?? 'N/A' }} (Age: {{ $entry['age'] ?? 'N/A' }})</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-sm text-gray-600">No data</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>