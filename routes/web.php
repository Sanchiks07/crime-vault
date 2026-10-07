<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnsolvedCaseController;
use App\Http\Controllers\SerialKillerController;
use App\Http\Controllers\VictimController;
use App\Http\Controllers\PsychologyController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\AdminDiscussionController;
use App\Http\Controllers\CaseEventController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleWare('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleWare('guest');
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleWare('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store')->middleWare('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleWare('auth');

// verify email
Route::get('/email/verify', function (Request $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('home');
    }
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home')->with('status', 'email-verified');
})->middleware(['auth', 'signed'])->name('verification.verify');

// resend
Route::post('/email/verification-notification', function (Request $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('home');
    }
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


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

// Discussions
Route::post('/discussions/{type}/{id}', [DiscussionController::class, 'store'])->name('discussions.store')->middleware('auth');
Route::patch('/discussions/{discussion}', [DiscussionController::class, 'update'])->name('discussions.update')->middleware('auth');
Route::delete('/discussions/{discussion}', [DiscussionController::class, 'destroy'])->name('discussions.destroy')->middleware('auth');
// Admin discussions
Route::get('/admin/discussions', [AdminDiscussionController::class, 'index'])->name('admin.discussions')->middleware(['auth', AdminMiddleware::class]);

// Interactive timeline / map
Route::get('/explore', [CaseEventController::class, 'index']) ->name('caseEvents');