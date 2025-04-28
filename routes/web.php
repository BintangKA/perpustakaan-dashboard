<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\RoleMiddleware;

// Halaman Welcome (Public)
Route::get('/', [DashboardController::class, 'welcome']);

// Halaman dashboard utama
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Group route untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard per role
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
        ->middleware(RoleMiddleware::class . ':admin')
        ->name('dashboard.admin');

    Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])
        ->middleware(RoleMiddleware::class . ':petugas')
        ->name('dashboard.petugas');

    Route::get('/dashboard/anggota', [DashboardController::class, 'anggota'])
        ->middleware(RoleMiddleware::class . ':anggota')
        ->name('dashboard.anggota');

    Route::get('/histori', [BorrowingController::class, 'history'])->name('borrowings.history')->middleware('auth');



    // Hanya admin & petugas yang bisa akses fitur manajemen
    Route::middleware([RoleMiddleware::class . ':admin,petugas'])->group(function () {
        Route::resource('/users', UserController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/books', BookController::class);
        Route::resource('/borrowings', BorrowingController::class);
        Route::resource('/reports', ReportController::class);
    });
    
});

require __DIR__ . '/auth.php';
