<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// ==== GEBRUIKERS MIDDLEWARE ====
// ==== GEBRUIKERS MIDDLEWARE ====
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profiel bewerken
    Route::get('/profiel/bewerken', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiel', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiel', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ...

// ==== PUBLIEK PROFIEL  ====
Route::get('/profiel/{user:username}', [ProfileController::class, 'show'])
    ->name('profile.show');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// ==== NIEUWS (PUBLIEK) ====
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// ==== CONTACT ====
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

// ==== NIEUWS (ADMIN) ====
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class)->names('admin.news');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->names('admin.users');
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class)->names('admin.faqs');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->names('admin.categories');
    Route::resource('contact', \App\Http\Controllers\Admin\ContactController::class)
        ->only(['index', 'show', 'destroy'])
        ->names('admin.contact')
        ->parameters(['contact' => 'contact_message']);
});

require __DIR__ . '/auth.php';
