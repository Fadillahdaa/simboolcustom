<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/administrator', [AdministratorController::class, 'showLoginForm'])->name('administrator.login');
Route::post('/administrator', [AdministratorController::class, 'login'])->name('administrator.login.submit');
Route::post('/administrator/logout', [AdministratorController::class, 'logout'])->name('administrator.logout');


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
