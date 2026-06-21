<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// ====================================
// AUTH ROUTES
// ====================================

// tampilkan halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// proses login
Route::post('/login', [AuthController::class, 'login'])->name('proses_login');

// logout (POST wajib)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ====================================
// DASHBOARD
// ====================================

// harus login
Route::middleware('auth')->group(function () {

    // dashboard
    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');

    // ====================================
    // PRODUK CRUD
    // ====================================
    Route::resource('product', ProductController::class);

    // ====================================
    // USER CRUD (hanya admin bisa akses)
    // ====================================
    Route::middleware('admin')->group(function () {
        Route::resource('user', UserController::class);
    });

});