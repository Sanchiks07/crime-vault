<script>
    window.featuredCases = @json($featuredCases);
</script>

<x-guest-layout>
    <div class="py-16 bg-bg text-text relative overflow-hidden">
        <!-- Background Glow -->
        <div class="absolute inset-0 opacity-20 blur-3xl pointer-events-none">
            <div class="w-[500px] h-[500px] bg-primary rounded-full absolute top-[-100px] left-[-100px]"></div>
            <div class="w-[400px] h-[400px] bg-accent rounded-full absolute bottom-[-120px] right-[-80px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-14">
            <div class="bg-surface/80 backdrop-blur border border-primary/40 shadow-xl rounded-2xl p-10 text-center hover:shadow-[0_0_40px_rgba(142,22,22,0.3)] transition">
                <h1 class="text-5xl font-extrabold mb-4 tracking-tight">
                    Crime Vault
                </h1>
                <p class="text-text/70 max-w-2xl mx-auto text-lg leading-relaxed">
                    A digital archive of humanity's darkest stories. Patterns, motives, and the quiet echoes left behind.
                </p>
            </div>

            <!-- About -->
            <div class="bg-surface/80 backdrop-blur border border-primary/30 shadow-md rounded-2xl p-7 hover:shadow-lg transition">
                <h2 class="text-2xl font-semibold mb-3">About the Project</h2>
                <p class="text-text/70 leading-relaxed">
                    Crime Vault documents real criminal cases with structure and clarity.
                    Not spectacle. Not entertainment. Just truth, patterns, and the weight of consequence.
                </p>
            </div>

            <!-- Explore -->
            <div>
                <h2 class="text-3xl font-semibold mb-8 text-center">Explore the Archive</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Serial Killers -->
                    <div class="group bg-surface/70 border border-primary/20 rounded-xl p-6 relative overflow-hidden hover:border-accent/50 transition">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-gradient-to-br from-accent to-primary transition"></div>
                        <h3 class="text-lg font-semibold mb-2 relative z-10">Serial Killers</h3>
                        <p class="text-sm text-text/60 relative z-10">Profiles, timelines, and behavioral patterns.</p>
                        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-accent group-hover:w-full transition-all duration-300"></div>
                    </div>

                    <!-- Unsolved Cases -->
                    <div class="group bg-surface/70 border border-primary/20 rounded-xl p-6 relative overflow-hidden hover:border-accent/50 transition">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-gradient-to-br from-accent to-primary transition"></div>
                        <h3 class="text-lg font-semibold mb-2 relative z-10">Unsolved Cases</h3>
                        <p class="text-sm text-text/60 relative z-10">Mysteries frozen in time.</p>
                        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-accent group-hover:w-full transition-all duration-300"></div>
                    </div>

                    <!-- Psychology -->
                    <div class="group bg-surface/70 border border-primary/20 rounded-xl p-6 relative overflow-hidden hover:border-accent/50 transition">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-gradient-to-br from-accent to-primary transition"></div>
                        <h3 class="text-lg font-semibold mb-2 relative z-10">Psychology</h3>
                        <p class="text-sm text-text/60 relative z-10">Inside the mind behind the crime.</p>
                        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-accent group-hover:w-full transition-all duration-300"></div>
                    </div>

                    <!-- Victims -->
                    <div class="group bg-surface/70 border border-primary/20 rounded-xl p-6 relative overflow-hidden hover:border-accent/50 transition">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-gradient-to-br from-accent to-primary transition"></div>
                        <h3 class="text-lg font-semibold mb-2 relative z-10">Victims</h3>
                        <p class="text-sm text-text/60 relative z-10">The lives behind the headlines.</p>
                        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-accent group-hover:w-full transition-all duration-300"></div>
                    </div>

                    <!-- Resources -->
                    <div class="group bg-surface/70 border border-primary/20 rounded-xl p-6 relative overflow-hidden hover:border-accent/50 transition">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-gradient-to-br from-accent to-primary transition"></div>
                        <h3 class="text-lg font-semibold mb-2 relative z-10">Resources</h3>
                        <p class="text-sm text-text/60 relative z-10">Tools and research materials.</p>
                        <div class="absolute bottom-0 left-0 h-[2px] w-0 bg-accent group-hover:w-full transition-all duration-300"></div>
                    </div>
                </div>
            </div>

            <!-- Purpose + Featured Cases -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-surface/80 border border-primary/30 rounded-2xl p-6 hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold mb-3">Why This Exists</h2>
                    <p class="text-text/70 leading-relaxed">
                        Not to glorify. Not to entertain.
                        Every entry is a record of consequence, a reminder that behind data are human lives.
                    </p>
                </div>

                <div class="bg-surface/80 border border-accent/30 rounded-2xl p-6 hover:shadow-[0_0_25px_rgba(216,64,64,0.2)] transition">
                    <h2 class="text-xl font-semibold mb-4">Featured Case</h2>

                    <div id="featured-case" class="space-y-2">
                        <h3 id="fc-title" class="text-lg font-bold"></h3>
                        <p id="fc-type" class="text-sm text-text/50"></p>
                        <p id="fc-description" class="text-text/70"></p>

                        <a id="fc-link" href="#" class="inline-block mt-3 text-accent hover:text-primary transition">
                            View Case →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Call to Action (Start Expolring) -->
            <div class="bg-gradient-to-r from-primary/30 to-accent/20 border border-primary/40 rounded-2xl p-10 text-center shadow-xl">
                <h2 class="text-3xl font-semibold mb-4">Start Exploring</h2>
                <p class="text-text/70 mb-6">Choose a path. Follow the evidence.</p>

                <div class="flex justify-center gap-6">
                    <a href="/cases/serial-killers" class="px-6 py-2 rounded-lg border border-primary hover:bg-primary hover:text-text transition shadow-md">
                        Serial Killers
                    </a>

                    <a href="/cases/unsolved-cases" class="px-6 py-2 rounded-lg border border-primary hover:bg-primary hover:text-text transition shadow-md">
                        Unsolved Cases
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>