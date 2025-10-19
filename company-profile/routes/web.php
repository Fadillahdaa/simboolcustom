<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Halaman Depan (Pengunjung)
|--------------------------------------------------------------------------
*/
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'frontendIndex'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/marketplaces', [MarketplaceController::class, 'index'])->name('marketplaces.index');
Route::get('/marketplaces/{marketplace}', [MarketplaceController::class, 'show'])->name('marketplaces.show');
Route::get('/profile', [ProfilController::class, 'index'])->name('profile.index');
Route::get('/profile/{profile}', [ProfilController::class, 'show'])->name('profile.show');


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


    Route::get('/admin/contact', [ContactController::class, 'adminIndex'])->name('admin.contact.index');
    Route::get('/admin/contact/edit', [\App\Http\Controllers\ContactController::class, 'editPage'])
        ->name('admin.contact.editpage');

    // Update data kontak
    Route::post('/admin/contact/update', [\App\Http\Controllers\ContactController::class, 'updatePage'])
        ->name('admin.contact.updatepage');

        // Kelola konten
    Route::resource('/users', UserController::class);
    Route::resource('/profile', \App\Http\Controllers\ProfilController::class);
    Route::resource('/product', \App\Http\Controllers\ProductController::class);
    Route::resource('/marketplace', \App\Http\Controllers\MarketplaceController::class);
    Route::resource('/contact', \App\Http\Controllers\ContactController::class);
    
});


// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::get('/dashboard/profil', [ProfilController::class, 'index'])->name('dashboard.profil');
//     Route::post('/dashboard/profil', [ProfilController::class, 'update'])->name('dashboard.profil.update');
// });



// halaman pengunjung

//Route::get('/', [HomeController::class, 'index']); ada diatas ya
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'frontendIndex'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/marketplaces', [MarketplaceController::class, 'index'])->name('marketplaces.index');
Route::get('/marketplaces/{marketplace}', [MarketplaceController::class, 'show'])->name('marketplaces.show');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{profile}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');




// routes untuk admin mengelola konten homepage
// di bagian middleware(['auth'])->group(...)
Route::get('/admin/home-content/edit', [\App\Http\Controllers\Admin\HomeContentController::class, 'edit'])
    ->name('admin.home-content.edit')
    ->middleware('can:manage-content'); // opsional: gunakan gate/ability atau cek role di middleware

Route::post('/admin/home-content/update', [\App\Http\Controllers\Admin\HomeContentController::class, 'update'])
    ->name('admin.home-content.update')
    ->middleware('can:manage-content');

