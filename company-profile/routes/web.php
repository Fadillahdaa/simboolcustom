<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Halaman Depan (Pengunjung)
|--------------------------------------------------------------------------
| Pengunjung tidak perlu login
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Login dan Logout
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('administrator-login')
    ->middleware('guest'); // supaya user yang sudah login tidak bisa buka login lagi

Route::post('/login', [LoginController::class, 'login'])
    ->name('administrator-login.submit');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard (Hanya untuk user yang sudah login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard Superadmin
    Route::get('/superadmin/dashboard', function () {
        // Hanya bisa diakses oleh superadmin
        if (Auth::user()->role !== 'superadmin') {
            abort(403, 'Akses ditolak');
        }
        return view('auth.superadmin');
    })->name('superadmin.dashboard');

    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        // Hanya bisa diakses oleh admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }
        return view('auth.admin');
    })->name('admin.dashboard');
});
