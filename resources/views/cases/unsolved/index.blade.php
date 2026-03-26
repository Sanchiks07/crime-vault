<x-guest-layout>
    <div class="py-16 bg-bg text-text relative overflow-hidden min-h-screen">
        <!-- Background Glow -->
        <div class="absolute inset-0 opacity-20 blur-3xl pointer-events-none">
            <div class="w-[500px] h-[500px] bg-primary rounded-full absolute top-[-100px] left-[-100px]"></div>
            <div class="w-[400px] h-[400px] bg-accent rounded-full absolute bottom-[-120px] right-[-80px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Title -->
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-bold tracking-tight mb-2">Unsolved Cases</h1>
                <p class="text-text/60">Explore cold cases, mysteries, and unresolved investigations.</p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($unsolved_cases as $unsolved_case)
                    <a href="{{ route('cases.unsolved.show', $unsolved_case) }}" class="group block">
                        <div class="relative bg-surface/80 backdrop-blur border border-primary/30 rounded-2xl overflow-hidden shadow-md hover:shadow-[0_0_30px_rgba(142,22,22,0.25)] hover:border-accent/50 transition duration-300">
                            <!-- Image -->
                            <div class="relative overflow-hidden bg-bg flex items-center justify-center">
                                <img src="{{ $unsolved_case->image ? asset('images/' . $unsolved_case->image) : asset('images/default-image.png') }}" 
                                     alt="{{ $unsolved_case->name }}"
                                     class="w-full h-[430px] object-cover object-center transition duration-500 group-hover:scale-110"
                                />
                                <!-- Gradient overlay for depth -->
                                <div class="absolute inset-0 bg-gradient-to-t from-bg/80 via-transparent to-transparent opacity-80"></div>
                            </div>

                            <!-- Content -->
                            <div class="p-5 space-y-1">
                                <h2 class="text-xl font-semibold group-hover:text-accent transition">{{ $unsolved_case->name }}</h2>
                                <p class="text-sm text-text/60">Country: {{ $unsolved_case->country }}</p>
                            </div>

                            <!-- Bottom accent line -->
                            <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-accent group-hover:w-full transition-all duration-300"></div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16">
                        <p class="text-text/50 text-lg">No unsolved case data available.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-guest-layout>