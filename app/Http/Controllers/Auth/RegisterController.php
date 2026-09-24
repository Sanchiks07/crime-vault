<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        $previous = url()->previous();

        if (!session()->has('url.intended') && !str_contains($previous, '/login') && !str_contains($previous, '/register')) {
            session(['url.intended' => $previous]);
        }

        return view('auth.register');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);
        
        $user = User::create($attributes);
        Auth::login($user);

        return redirect()->intended(route('home'));
    }
}