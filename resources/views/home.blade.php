<script>
    window.featuredCases = @json($featuredCases);
</script>

<x-guest-layout>
    <div class="py-12 bg-bg text-text">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <!-- Header -->
            <div class="bg-surface border border-primary shadow-sm sm:rounded-lg p-8 text-center">
                <h1 class="text-4xl font-bold mb-3 text-text">Crime Vault</h1>
                <p class="text-white/80 max-w-2xl mx-auto">
                    A digital archive of humanity's darkest stories. Explore serial killers, unsolved mysteries, and the psychology behind them.
                </p>
            </div>

            <!-- About -->
            <div class="bg-surface border border-primary shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-3 text-text">About the Project</h2>
                <p class="text-white/80 leading-relaxed">
                    Crime Vault is a structured database of real criminal cases, built with a focus on clarity, accuracy, and respect.
                    It allows users to explore patterns, understand criminal behavior, and examine both solved and unsolved investigations.
                </p>
            </div>

            <!-- Explore -->
            <div>
                <h2 class="text-2xl font-semibold mb-6 text-text">Explore the Archive</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-surface border border-primary shadow-sm rounded-lg p-5">
                        <h3 class="text-lg font-semibold mb-2 text-text">Serial Killers</h3>
                        <p class="text-sm text-white/70">Detailed profiles, timelines, and victim data. Study patterns and methods.</p>
                    </div>

                    <div class="bg-surface border border-primary shadow-sm rounded-lg p-5">
                        <h3 class="text-lg font-semibold mb-2 text-text">Unsolved Cases</h3>
                        <p class="text-sm text-white/70">Cold cases and mysteries that remain unanswered. Evidence, suspects, and theories.</p>
                    </div>

                    <div class="bg-surface border border-primary shadow-sm rounded-lg p-5">
                        <h3 class="text-lg font-semibold mb-2 text-text">Criminal Psychology</h3>
                        <p class="text-sm text-white/70">Dive into motives, behavioral patterns, and psychological analysis.</p>
                    </div>

                    <div class="bg-surface border border-primary shadow-sm rounded-lg p-5">
                        <h3 class="text-lg font-semibold mb-2 text-text">Victims</h3>
                        <p class="text-sm text-white/70">A dedicated space for those affected - focusing on their lives and stories.</p>
                    </div>

                    <div class="bg-surface border border-primary shadow-sm rounded-lg p-5 sm:col-span-2 lg:col-span-1">
                        <h3 class="text-lg font-semibold mb-2 text-text">Resources</h3>
                        <p class="text-sm text-white/70">Research materials, references, and tools for deeper exploration.</p>
                    </div>
                </div>
            </div>

            <!-- Purpose + Featured -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-surface border border-primary shadow-sm rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-3 text-text">Why This Exists</h2>
                    <p class="text-white/80 leading-relaxed">
                        This project exists to document, not to sensationalize. Behind every case are real people, real lives, and real consequences.
                    </p>
                </div>

                <div class="bg-surface border border-primary shadow-sm rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4 text-text">Featured Case</h2>

                    <div id="featured-case">
                        <h3 id="fc-title" class="text-lg font-bold text-text"></h3>
                        <p id="fc-type" class="text-sm text-white/60 mb-2"></p>
                        <p id="fc-description" class="text-white/80 mb-3"></p>

                        <a id="fc-link" href="#" class="text-accent hover:text-primary transition">View Case</a>
                    </div>
                </div>
            </div>

            <div class="bg-surface border border-primary shadow-sm rounded-lg p-8 text-center">
                <h2 class="text-2xl font-semibold mb-3 text-text">Start Exploring</h2>
                <p class="text-white/80 mb-4">Choose a path and begin digging into the archive.</p>

                <div class="flex justify-center gap-6">
                    <a href="/cases/serial-killers" class="px-6 py-2 border border-primary rounded text-text hover:bg-primary hover:text-bg transition">
                        Serial Killers
                    </a>
                    <a href="/cases/unsolved-cases" class="px-6 py-2 border border-primary rounded text-text hover:bg-primary hover:text-bg transition">
                        Unsolved Cases
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>