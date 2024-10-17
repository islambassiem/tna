<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.add');
Route::get('/courses', [DashboardController::class, 'courses'])->middleware(['auth', 'verified'])->name('courses');
Route::get('/attachments', [DashboardController::class, 'attachments'])->middleware(['auth', 'verified'])->name('attachments');
Route::get('/download/{path}', [DashboardController::class, 'download'])->middleware(['auth', 'verified'])->name('download');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
