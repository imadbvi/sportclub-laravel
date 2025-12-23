<?php

use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\Admin\ContactController;
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

    Route::get('/my-messages', [UserMessageController::class, 'index'])->name('user.messages.index');
    Route::get('/my-messages/{message}', [UserMessageController::class, 'show'])->name('user.messages.show');
    Route::post('/my-messages/{message}/reply', [UserMessageController::class, 'reply'])->name('user.messages.reply');
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

// ==== COMMENTS ====
Route::middleware('auth')->group(function () {
    Route::post('/news/{news}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');
});

// ==== NIEUWS (ADMIN) ====
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class)->names('admin.news');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->names('admin.users');
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class)->names('admin.faqs');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->names('admin.categories');
    Route::resource('contact', ContactController::class)
        ->parameters(['contact' => 'contact_message'])
        ->except(['create', 'store', 'edit', 'update'])
        ->names('admin.contact');

    Route::post('contact/{contact_message}/reply', [ContactController::class, 'reply'])->name('admin.contact.reply');
});

require __DIR__ . '/auth.php';
