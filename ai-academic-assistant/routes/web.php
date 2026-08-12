<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrammarCheckController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProfileController;

// Public route (login na bhi ho to dikh sakta hai)
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Sirf logged-in users ke liye
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/grammar-check', [GrammarCheckController::class, 'index']);
    Route::post('/grammar-check', [GrammarCheckController::class, 'check']);

    Route::get('/summarizer', [SummaryController::class, 'index']);
    Route::post('/summarizer', [SummaryController::class, 'summarize']);

    Route::get('/slides', [SlideController::class, 'index']);
    Route::post('/slides', [SlideController::class, 'generate']);
    Route::get('/slides/download/{id}', [SlideController::class, 'download']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';