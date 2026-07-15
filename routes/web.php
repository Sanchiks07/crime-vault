<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnsolvedCaseController;
use App\Http\Controllers\SerialKillerController;
use App\Http\Controllers\VictimController;
use App\Http\Controllers\PsychologyController;
use App\Http\Controllers\ResourceController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleWare('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleWare('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleWare('auth');

// Unsolved cases
Route::get('/cases/unsolved-cases', [UnsolvedCaseController::class, 'index'])->name('cases.unsolved.index');
Route::get('/cases/unsolved-cases/{unsolved_case}', [UnsolvedCaseController::class, 'show'])->name('cases.unsolved.show')->middleWare('auth');

// Serial killers
Route::get('/cases/serial-killers', [SerialKillerController::class, 'index'])->name('cases.killers.index');
Route::get('/cases/serial-killers/{serial_killer}', [SerialKillerController::class, 'show'])->name('cases.killers.show')->middleWare('auth');

// Victims
Route::get('/cases/victims', [VictimController::class, 'index'])->name('victims');

// Psychology
Route::get('/psychology', [PsychologyController::class, 'index'])->name('psychology');

// Resources
Route::get('/resources', [ResourceController::class, 'index'])->name('resources');