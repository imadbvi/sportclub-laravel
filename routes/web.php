<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;  
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==== GEBRUIKERS MIDDLEWARE ====
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==== ADMIN ROUTES ====
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)
        ->names('admin.users');

    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);
});

// ==== PUBLIEK PROFIEL  ====
Route::get('/users/{user}', [ProfileController::class, 'show'])
    ->name('profile.show');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// ==== NIEUWS ====
Route::resource('news', NewsController::class);

require __DIR__.'/auth.php';
