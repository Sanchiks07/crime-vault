<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>
    
    <div class="auth-container">
        <div class="auth-page">
            <div class="auth-image">
                <a href="{{ route('home') }}">← Back to website</a>
            </div>

            <form action="{{ route('login.store') }}" method="POST" class="auth-form">
                @csrf

                <h1>Login</h1>
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>

                @if ($errors->any())
                    <div class="error-messages">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('login_lockout_seconds'))
                    <div class="login-lockout error-messages" id="login-lockout" data-seconds="{{ session('login_lockout_seconds') }}">
                        Too many login attempts. Please try again in
                        <strong>
                            <span id="login-countdown">
                                {{ session('login_lockout_seconds') }}
                            </span>
                            seconds.
                        </strong>
                    </div>
                @endif

                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</x-layout>