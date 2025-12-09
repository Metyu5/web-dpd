<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// === ROUTE UNTUK ADMIN ===

// Halaman form login admin
Route::get('/admin', function () {
    return view('admin.welcome');
})->name('admin.login');

// Proses login
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.process');

// Group Route untuk Admin yang sudah terautentikasi (gunakan middleware di produksi)
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Rute utama (Full Page Load)
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('dashboard');

    // --- ROUTE HANYA KONTEN (DIGUNAKAN OLEH AJAX/FETCH UNTUK SPA) ---
    
    // 1. Konten Dashboard
    Route::get('/dashboard/content', function () {
        return view('admin.dashboard-content');
    })->name('dashboard.content');
    
    // 2. Tampilan/Index Data Berita (Link di sidebar)
    Route::get('/data-berita', function () {
        return view('admin.dashboard'); 
    })->name('berita.index');
    
    // 2. Konten Data Berita
    Route::get('/data-berita/content', function () {
        return view('admin.data-berita-content');
    })->name('berita.content');

    // 3. Tampilan/Index Data Admin (Link di sidebar)
    Route::get('/data-admin', function () {
        return view('admin.dashboard'); 
    })->name('data-admin.index'); // <-- PERBAIKAN: Nama route sekarang lebih konsisten
    
    // 3. Konten Data Admin
    Route::get('/data-admin/content', function () {
        return view('admin.data-admin-content');
    })->name('data-admin.content'); // <-- PERBAIKAN: Nama route sekarang lebih konsisten

    // 4. Tampilan/Index Manajemen Berita (Link di sidebar)
    Route::get('/manajemen-berita', function () {
        return view('admin.dashboard'); 
    })->name('manajemen.index');
    
    // 4. Konten Manajemen Berita
    Route::get('/manajemen-berita/content', function () {
        return view('admin.manajemen-berita-content');
    })->name('manajemen.content');
});