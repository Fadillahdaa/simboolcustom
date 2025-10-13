<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return redirect()->route('administrator-login');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('administrator-login');
Route::post('/login', [LoginController::class, 'login'])->name('administrator-login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/superadmin/dashboard', function () {
        return view('auth.dashboard'); // bisa pakai view khusus jika ingin berbeda
    })->name('superadmin.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('auth.dashboard'); // bisa pakai view admin khusus
    })->name('admin.dashboard');

    Route::get('/dashboard', function () {
        return view('auth.dashboard'); // bisa pakai view admin khusus
    })->name('dashboard');
});


