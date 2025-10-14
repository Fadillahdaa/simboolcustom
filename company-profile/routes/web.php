<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Halaman Depan (Pengunjung)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Login dan Logout
|--------------------------------------------------------------------------
*/
Route::get('/administrator', function () {
    // Jika user sudah login, logout otomatis dulu
    if (Auth::check()) {
        Auth::logout();
    }

    // Panggil tampilan form login dari controller
    return app(LoginController::class)->showLoginForm();
})->name('administrator-login');

Route::post('/administrator', [LoginController::class, 'login'])
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
        if (Auth::user()->role !== 'superadmin') {
            abort(403, 'Akses ditolak');
        }
        return view('auth.dashboard');
    })->name('superadmin.dashboard');

    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }
        return view('auth.admin');
    })->name('admin.dashboard');
});
