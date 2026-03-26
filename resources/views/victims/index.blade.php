<x-guest-layout>
    <div class="py-16 bg-bg text-text relative overflow-hidden min-h-screen">
        <!-- Background Glow -->
        <div class="absolute inset-0 opacity-20 blur-3xl pointer-events-none">
            <div class="w-[500px] h-[500px] bg-primary rounded-full absolute top-[-100px] left-[-100px]"></div>
            <div class="w-[400px] h-[400px] bg-accent rounded-full absolute bottom-[-120px] right-[-80px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold mb-2">Victims</h1>
            </div>

            <!-- Work-in-Progress Card -->
            <div class="mt-4 bg-surface/80 backdrop-blur border border-primary/30 rounded-2xl shadow-2xl overflow-hidden p-8 text-center transition hover:shadow-[0_0_40px_rgba(142,22,22,0.3)]">
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-semibold text-text mb-2">To be continued...</h2>
                        <p class="text-text/70 leading-relaxed max-w-md mx-auto">
                            Some pages don't appear finished. They're just waiting for the right information to arrive.
                        </p>
                    </div>

                    <div class="pt-6 border-t border-primary/30 max-w-xs mx-auto">
                        <p class="text-xs text-text/50">Nothing is broken. It's just not done yet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>