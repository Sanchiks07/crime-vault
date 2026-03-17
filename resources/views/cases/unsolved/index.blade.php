<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($unsolved_cases as $unsolved_case)
                            <a href="{{ route('cases.unsolved.show', $unsolved_case) }}" class="block group">
                                <div class="border rounded-lg p-4 shadow-sm bg-white group-hover:shadow-lg transition">
                                    <img src="{{ $unsolved_case->image ? asset('images/' . $unsolved_case->image) : asset('images/default-image.png') }}" alt="{{ $unsolved_case->name }}" class="h-50 w-full object-cover rounded-md mb-4" />
                                    <h2 class="text-xl font-semibold">{{ $unsolved_case->name }}</h2>
                                    <p class="text-sm text-gray-600">Country: {{ $unsolved_case->country }}</p>
                                </div>
                            </a>
                        @empty
                            <p>No unsolved case data available.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>