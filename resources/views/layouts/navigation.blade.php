<nav x-data="{ open: false }" class="bg-bg border-b border-primary">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Left Side -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-text" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        Home
                    </x-nav-link>
                    <!-- Cases Dropdown -->
                    <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                        @php
                            $casesActive = request()->routeIs('cases.*');
                        @endphp

                        <button  @mouseover="open = true" class="inline-flex items-center text-sm font-medium h-full {{ $casesActive ? 'text-text border-b-2 border-accent' : 'text-white/60' }} hover:text-accent">
                            Cases
                            <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition class="absolute w-48 bg-[#1D1616] border border-[#8E1616] rounded shadow-lg z-50">
                            <x-nav-link :href="route('cases.unsolved.index')" :active="request()->routeIs('cases.unsolved.index')" class="block px-4 py-2">
                                Unsolved Cases
                            </x-nav-link>

                            <x-nav-link :href="route('cases.killers.index')" :active="request()->routeIs('cases.killers.index')" class="block px-4 py-2">
                                Serial Killers
                            </x-nav-link>
                        </div>
                    </div>
                    <x-nav-link :href="route('psychology.index')" :active="request()->routeIs('psychology.index')">
                        Psychology
                    </x-nav-link>
                    <x-nav-link :href="route('resources.index')" :active="request()->routeIs('resources.index')">
                        Resources
                    </x-nav-link>
                </div>
            </div>

            <!-- Desktop Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-text/70 bg-bg hover:text-accent focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <div class="space-x-4">
                        <!-- <a href="{{ route('login') }}" class="text-sm text-text/70 hover:text-accent">
                            Login
                        </a> -->
                        <button onclick="toggleTheme()" class="bg-primary text-text px-3 py-2 rounded">
                            Switch Mood
                        </button>
                    </div>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-text/60 hover:text-accent hover:bg-primery focus:outline-none focus:bg-primery focus:text-accent transition duration-150 ease-in-out">
                    
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        
        <!-- Mobile Nav Links -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                Home
            </x-responsive-nav-link>
            <!-- Mobile Cases Dropdown -->
            <div class="relative">
                <input type="checkbox" id="mobile-cases-toggle" class="hidden peer" />
                <label for="mobile-cases-toggle" class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium text-text/70 hover:text-accent cursor-pointer">
                    Cases
                    <svg class="h-4 w-4 transition-transform peer-checked:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </label>

                <div class="hidden pl-4 space-y-1 peer-checked:block">
                    <x-responsive-nav-link :href="route('cases.unsolved.index')" :active="request()->routeIs('cases.unsolved.index')">
                        Unsolved Cases
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('cases.killers.index')" :active="request()->routeIs('cases.killers.index')">
                        Serial Killers
                    </x-responsive-nav-link>
                </div>
            </div>
            <x-responsive-nav-link :href="route('psychology.index')" :active="request()->routeIs('psychology.index')">
                Psychology
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('resources.index')" :active="request()->routeIs('resources.index')">
                Resources
            </x-responsive-nav-link>
        </div>

        <!-- Mobile Auth Section -->
        <div class="pt-4 pb-1 border-t border-primary">

            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-text">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="font-medium text-sm text-text/70">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        Profile
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth

            @guest
                <div class="mt-3 space-y-1 px-4">
                    <!-- <x-responsive-nav-link :href="route('login')">
                        Login
                    </x-responsive-nav-link> -->
                    <button onclick="toggleTheme()" class="bg-primary text-text px-3 py-2 rounded">
                        Switch Mood
                    </button>
                </div>
            @endguest
        </div>
    </div>
</nav>