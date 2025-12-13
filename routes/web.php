<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

// =======================================================
// ROUTES UNTUK HALAMAN DEPAN (FRONT END)
// =======================================================

Route::get('/', function () {
    return view('welcome');
});

// Contoh Route SPA Front End (tetap menggunakan master layout 'welcome')
Route::get('/profil-content', function () {
    return view('welcome');
})->name('profil.index');
Route::get('/profil-content/content', function () {
    return view('profil-content');
})->name('profil.content');

Route::get('/berita-utama', function () {
    return view('welcome');
})->name('berita.index');
Route::get('/berita-utama/content', function () {
    return view('berita-content');
})->name('berita.content');


// =======================================================
// ROUTES UNTUK ADMIN
// =======================================================

// Route Login
Route::get('/admin', function () {
    return view('admin.welcome');
})->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.process');


// Grup Route Admin (Membutuhkan autentikasi/middleware jika ada)
Route::prefix('admin')->name('admin.')->group(function () {

    // 1. DASHBOARD
    // PERBAIKAN UTAMA: Memuat view penuh DENGAN data dari Controller.
    Route::get('/dashboard', [BeritaController::class, 'indexDashboard']) // <-- Memanggil BeritaController
        ->name('dashboard');
        
    // Route ini hanya memuat konten AJAX/SPA (tanpa layout)
    Route::get('/dashboard/content', [BeritaController::class, 'dashboardData'])
        ->name('dashboard.content');

    // 2. DATA BERITA
    // Route index me-return master layout (admin.dashboard)
    Route::get('/data-berita', function () {
        return view('admin.dashboard');
    })->name('berita.index');

    // Route content memuat konten utama (melayani AJAX/SPA)
    Route::get('/data-berita/content', [BeritaController::class, 'index'])
        ->name('berita.content');

    // Route untuk CRUD Berita (Store, Get, Update, Delete)
    Route::post('/data-berita', [BeritaController::class, 'store'])
        ->name('store-berita');
    Route::get('/berita/get/{id}', [BeritaController::class, 'get'])
        ->name('berita.get');
    Route::put('/berita/update/{id}', [BeritaController::class, 'update'])
        ->name('berita.update');
    Route::delete('/berita/delete/{id}', [BeritaController::class, 'destroy'])
        ->name('berita.delete');

    // 3. DATA ADMIN
    // Route index me-return master layout (admin.dashboard)
    Route::get('/data-admin', function () {
        return view('admin.dashboard');
    })->name('data-admin.index');

    // Route content memuat konten utama (melayani AJAX/SPA)
    Route::get('/data-admin/content', function () {
        return view('admin.data-admin-content');
    })->name('data-admin.content');
    
    // 4. MANAJEMEN BERITA
    // Route index me-return master layout (admin.dashboard)
    Route::get('/manajemen-berita', function () {
        return view('admin.dashboard');
    })->name('manajemen.index');
    
    // Route content memuat konten utama (melayani AJAX/SPA)
    Route::get('/manajemen-berita/content', function () {
        return view('admin.manajemen-berita-content');
    })->name('manajemen.content');


});