<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnsolvedCasesController;
use App\Http\Controllers\SerialKillersController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cases/unsolved-cases', [UnsolvedCasesController::class, 'index'])->name('cases.unsolved.index');
Route::get('/cases/serial-killers', [SerialKillersController::class, 'index'])->name('cases.killers.index');

Route::get('/psychology', [PsychologyController::class, 'index'])->name('psychology.index');

Route::get('/resources', [ResourcesController::class, 'index'])->name('resources.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
