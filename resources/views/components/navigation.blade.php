@unless (request()->routeIs('login') || request()->routeIs('register'))
<nav class="navbar">
    <div class="navbar-container">
        <!-- Hamburger -->
        <button class="hamburger" onclick="toggleMenu()">
            ☰
        </button>

        <!-- Logo -->
        <a href="{{ route('home') }}" class="home-link">
            <img src="{{ asset('images/vault-logo.png') }}" alt="Crime Vault Logo" style="height:45px; width:auto; display:block">
        </a>

        <!-- Navigation -->
        <div class="navbar-menu" id="navbarMenu">
            <div class="navbar-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ route('cases.killers.index') }}" class="{{ request()->routeIs('cases.killers.*') ? 'active' : '' }}">
                    Serial Killers
                </a>

                <a href="{{ route('cases.unsolved.index') }}" class="{{ request()->routeIs('cases.unsolved.*') ? 'active' : '' }}">
                    Unsolved Cases
                </a>

                <a href="{{ route('victims') }}" class="{{ request()->routeIs('victims') ? 'active' : '' }}">
                    Victims
                </a>

                <a href="{{ route('caseEvents') }}" class="{{ request()->routeIs('caseEvents') ? 'active' : '' }}">
                    Explore
                </a>

                <a href="{{ route('psychology.introduction') }}" class="{{ request()->routeIs('psychology.*') ? 'active' : '' }}">
                    Psychology
                </a>

                <a href="{{ route('resources') }}" class="{{ request()->routeIs('resources') ? 'active' : '' }}">
                    Resources
                </a>

                @auth
                    <a href="{{ route('favourites') }}" class="{{ request()->routeIs('favourites') ? 'active' : '' }}">
                        Favourites
                    </a>

                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.discussions') }}" class="{{ request()->routeIs('admin.discussions') ? 'active' : '' }}">
                            Moderation
                        </a>
                    @endif
                @endauth
            </div>

            @auth
                <div class="navbar-end">
                    <span>Welcome, {{ Auth::user()->name }}!</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>

                    <button onclick="toggleTheme()" class="btn-theme">Switch Mood</button>
                </div>
            @else
                <div class="navbar-actions">
                    <a href="{{ route('login') }}" class="btn-login">Login</a>

                    <button onclick="toggleTheme()" class="btn-theme">Switch Mood</button>
                </div>
            @endauth
        </div>
    </div>
</nav>
@endunless

<script>
function toggleMenu() {
    document.getElementById("navbarMenu").classList.toggle("active");
}
</script>
