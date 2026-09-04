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
use App\Http\Controllers\FavouriteController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleWare('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleWare('guest');
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleWare('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store')->middleWare('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleWare('auth');

// Unsolved cases
Route::get('/cases/unsolved-cases', [UnsolvedCaseController::class, 'index'])->name('cases.unsolved.index');
Route::get('/cases/unsolved-cases/{unsolved_case}', [UnsolvedCaseController::class, 'show'])->name('cases.unsolved.show');

// Serial killers
Route::get('/cases/serial-killers', [SerialKillerController::class, 'index'])->name('cases.killers.index');
Route::get('/cases/serial-killers/{serial_killer}', [SerialKillerController::class, 'show'])->name('cases.killers.show');

// Victims
Route::get('/cases/victims', [VictimController::class, 'index'])->name('victims');

// Psychology
Route::get('/psychology/psychology', [PsychologyController::class, 'introduction'])->name('psychology.introduction');
Route::get('/psychology/fundamentals', [PsychologyController::class, 'fundamentals'])->name('psychology.fundamentals');
Route::get('/psychology/personality', [PsychologyController::class, 'personality'])->name('psychology.personality');
Route::get('/psychology/profiling', [PsychologyController::class, 'profiling'])->name('psychology.profiling');
Route::get('/psychology/crime-scenes', [PsychologyController::class, 'crimeScenes'])->name('psychology.crimeScenes');
Route::get('/psychology/investigative-psychology', [PsychologyController::class, 'investigativePsychology'])->name('psychology.investigativePsychology');
Route::get('/psychology/victimology', [PsychologyController::class, 'victimology'])->name('psychology.victimology');
Route::get('/psychology/experiments', [PsychologyController::class, 'experiments'])->name('psychology.experiments');
Route::get('/psychology/myths', [PsychologyController::class, 'myths'])->name('psychology.myths');
Route::get('/psychology/resources', [PsychologyController::class, 'resources'])->name('psychology.resources');
Route::get('/psychology/facts', [PsychologyController::class, 'facts'])->name('psychology.facts');
Route::get('/psychology/faq', [PsychologyController::class, 'faq'])->name('psychology.faq');

// Resources
Route::get('/resources', [ResourceController::class, 'index'])->name('resources');

// Favourites
Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites')->middleWare('auth');
Route::post('/favourites/{type}/{id}', [FavouriteController::class, 'toggle'])->name('favourites.toggle')->middleWare('auth');