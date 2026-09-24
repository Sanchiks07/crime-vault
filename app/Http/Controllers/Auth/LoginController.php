<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index() {
        $previous = url()->previous();

        if (!session()->has('url.intended') && !str_contains($previous, '/login') && !str_contains($previous, '/register')) {
            session(['url.intended' => $previous]);
        }

        return view('auth.login');
    }
    
    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $key = Str::lower($credentials['email']) . '|' . $request->ip();

        // user is already locked out
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->with('login_lockout_seconds', $seconds)
                ->withInput($request->only('email'));
        }

        // successful login
        if (Auth::attempt($credentials)) {
            RateLimiter::clear($key);

            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        // failed login
        RateLimiter::hit($key, 60);

        // check whether this failed attempt caused the lockout
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->with('login_lockout_seconds', $seconds)
                ->withInput($request->only('email'));
        }

        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('email');
    }

    public function destroy(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}