<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($unsolved_cases as $unsolved_case)
                        @php
                            $victims = $unsolved_case->victims;

                            if (is_string($victims)) {
                                $victims = json_decode($victims, true);
                            }
                        @endphp

                        <div class="mb-6 border-b pb-4">
                            <img src="/images/default-image.png" alt="{{ $unsolved_case->name }}" class="h-48 object-cover rounded-md mb-4" >
                            <h2 class="text-xl font-semibold">{{ $unsolved_case->name }}</h2>
                            <p class="text-sm text-gray-600">Country: {{ $unsolved_case->country }}</p>
                        </div>
                    @empty
                        <p>No serial killer data available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>