<x-layout>
    <div class="auth-container">
        <div class="auth-page">

            <!-- Left decorative section -->
            <div class="auth-image">
                <a href="{{ route('home') }}">← Back to Crime Vault</a>
            </div>

            <!-- Verification section -->
            <div class="auth-form auth-verify">

                <span class="auth-label">Crime Vault • Account Security</span>

                <h1>Verify Your Email</h1>

                <p class="auth-description">
                    Your account has been created successfully. Before continuing,
                    verify your email address using the link we sent to:
                </p>

                <div class="verification-email">
                    {{ Auth::user()->email }}
                </div>

                <p class="auth-description">
                    Check your inbox and follow the verification link to activate
                    your account.
                </p>

                @if (session('status') === 'verification-link-sent')
                    <div class="auth-success">
                        A new verification link has been sent to your email address.
                    </div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit">
                        Resend Verification Email
                    </button>
                </form>

                <p class="verification-help">
                    Didn't receive the email? Check your spam folder or request
                    another verification link.
                </p>

            </div>

        </div>
    </div>
</x-layout>