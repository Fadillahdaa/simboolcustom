<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome'); // halaman untuk pengunjung
})->name('home');

// route login admin
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('administrator-login');
Route::post('/login', [LoginController::class, 'login'])->name('administrator-login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// route untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/superadmin/dashboard', function () {
        return view('auth.dashboard');
    })->name('superadmin.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('auth.dashboard');
    })->name('admin.dashboard');

    Route::get('/dashboard', function () {
        return view('auth.dashboard');
    })->name('dashboard');
});



