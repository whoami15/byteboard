<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [\App\Http\Controllers\TopicController::class, 'index'])
    ->name('home');

Route::get('topics', [\App\Http\Controllers\TopicController::class, 'index'])
    ->name('topics.index');
Route::get('topics/{topic}/{slug}', [\App\Http\Controllers\TopicController::class, 'show'])
    ->name('topics.show');

Route::middleware(Authenticate::class)->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
