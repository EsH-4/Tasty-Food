<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController; // Pastikan ini mengarah ke GaleriController Anda
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendBeritaController;
use App\Http\Controllers\FrontendGaleriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rute Frontend Website
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [FrontendBeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [FrontendBeritaController::class, 'show'])->name('berita.detail');
Route::get('/galeri', [FrontendGaleriController::class, 'index'])->name('galeri');
Route::get('/kontak', [\App\Http\Controllers\HomeController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [\App\Http\Controllers\HomeController::class, 'storeContact'])->name('kontak.store');
Route::view('/tentang', 'tentang')->name('tentang');

// --- Rute Admin Panel
Route::prefix('admin')->name('admin.')->group(function () {

    // Simple test route without middleware
    Route::get('/test', function () {
        return response()->json(['message' => 'Admin test route working']);
    });

    // Rute Login (Hanya untuk pengguna yang BELUM login)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    });

    // Rute Admin Lainnya (Hanya untuk pengguna yang SUDAH login)
    Route::middleware('auth:admin')->group(function () {

        // Halaman Konfirmasi Logout
        Route::get('/logout', function () {
            return view('admin.logout_confirm');
        })->name('logout.confirm');

        // Proses Logout
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // CRUD Berita
        Route::resource('berita', BeritaController::class);

        // CRUD Galeri (Ini akan memperbaiki error "galeri.index not defined")
        Route::resource('galeri', GaleriController::class);

        // Contact Management - Permanent (no delete functionality)
        Route::resource('contact', \App\Http\Controllers\Admin\ContactController::class)->except(['destroy']);

        // Contact Messages Management
        Route::resource('contact-messages', \App\Http\Controllers\Admin\ContactMessageController::class);

        // Trash Management - Combined view
        Route::resource('trash', \App\Http\Controllers\Admin\TrashController::class)->only(['index']);
        Route::post('trash/restore-berita/{id}', [\App\Http\Controllers\Admin\TrashController::class, 'restoreBerita'])->name('trash.restore-berita');
        Route::post('trash/restore-galeri/{id}', [\App\Http\Controllers\Admin\TrashController::class, 'restoreGaleri'])->name('trash.restore-galeri');
        // Hapus contact restore/delete routes karena kontak permanen
        Route::delete('trash/force-delete-berita/{id}', [\App\Http\Controllers\Admin\TrashController::class, 'forceDeleteBerita'])->name('trash.force-delete-berita');
        Route::delete('trash/force-delete-galeri/{id}', [\App\Http\Controllers\Admin\TrashController::class, 'forceDeleteGaleri'])->name('trash.force-delete-galeri');

        // Separate Trash Pages
        Route::get('trash/berita', [\App\Http\Controllers\Admin\TrashController::class, 'berita'])->name('trash.berita');
        Route::get('trash/galeri', [\App\Http\Controllers\Admin\TrashController::class, 'galeri'])->name('trash.galeri');
    });
});

// --- Settings Routes (for staff management)
Route::prefix('settings')->name('settings.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::resource('staffs', \App\Http\Controllers\StaffController::class);
    });
});
