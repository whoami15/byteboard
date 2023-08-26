<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [\App\Http\Controllers\Topic\TopicController::class, 'index'])
    ->name('home');

Route::get('topics', [\App\Http\Controllers\Topic\TopicController::class, 'index'])
    ->name('topics.index');
Route::get('topics/{topic}/{slug}', [\App\Http\Controllers\Topic\TopicController::class, 'show'])
    ->name('topics.show');
Route::post('topics/{topic}/{slug}/vote', \App\Http\Controllers\Topic\VoteTopicController::class)
    ->name('topics.vote');

Route::middleware(Authenticate::class)->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
