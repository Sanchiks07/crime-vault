<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnsolvedCasesController;
use App\Http\Controllers\SerialKillersController;
use App\Http\Controllers\PsychologyController;
use App\Http\Controllers\ResourcesController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cases/unsolved-cases', [UnsolvedCasesController::class, 'index'])->name('cases.unsolved.index');
Route::get('/cases/unsolved-cases/{unsolved_case}', [UnsolvedCasesController::class, 'show'])->name('cases.unsolved.show');

Route::get('/cases/serial-killers', [SerialKillersController::class, 'index'])->name('cases.killers.index');
Route::get('/cases/serial-killers/{serial_killer}', [SerialKillersController::class, 'show'])->name('cases.killers.show');

Route::get('/psychology', [PsychologyController::class, 'index'])->name('psychology.index');

Route::get('/resources', [ResourcesController::class, 'index'])->name('resources.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
