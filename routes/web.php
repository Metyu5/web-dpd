<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/api/beranda-data', [BeritaController::class, 'getBerandaData'])
    ->name('api.beranda.data');

Route::get('/profil-content', function () {
    return view('welcome');
})->name('profil.index');

Route::get('/kontak-content', function () {
    return view('kontak-content');
})->name('kontak.index');

Route::get('/visi-misi-content', function () {
    return view('visi-misi-content');
})->name('visi-misi.index');

Route::get('/profil-content/content', function () {
    return view('profil-content');
})->name('profil.content');

Route::get('/berita-utama', function () {
    return view('welcome');
})->name('berita.index');

Route::get('/berita-utama/content', [BeritaController::class, 'content'])
    ->name('berita.content');
Route::get('/berita/{id}', [BeritaController::class, 'getDetail'])
    ->name('berita.getDetail');

Route::get('/admin', function () {
    return view('admin.welcome');
})->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.process');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [BeritaController::class, 'indexDashboard'])
        ->name('dashboard');

    Route::get('/dashboard/content', [BeritaController::class, 'dashboardData'])
        ->name('dashboard.content');

    Route::get('/data-berita', function () {
        return view('admin.dashboard');
    })->name('berita.index');

    Route::get('/data-berita/content', [BeritaController::class, 'index'])
        ->name('berita.content');
        Route::get('/api/data-berita', [BeritaController::class, 'adminApiIndex'])
        ->name('api.berita.index');
        
    Route::get('/api/data-berita', [BeritaController::class, 'adminApiIndex'])
        ->name('api.berita.index');

    Route::post('/data-berita', [BeritaController::class, 'store'])
        ->name('store-berita');
    Route::get('/berita/get/{id}', [BeritaController::class, 'get'])
        ->name('berita.get');
    Route::put('/berita/update/{id}', [BeritaController::class, 'update'])
        ->name('berita.update');
    Route::delete('/berita/delete/{id}', [BeritaController::class, 'destroy'])
        ->name('berita.delete');
    Route::get('/data-admin', function () {
        return view('admin.dashboard');
    })->name('data-admin.index');
    Route::get('/data-admin/content', [AdminController::class, 'index'])
        ->name('data-admin.content');
    Route::post('/data-admin', [AdminController::class, 'store'])
        ->name('store-admin');
    Route::get('/admin/get/{id}', [AdminController::class, 'get'])
        ->name('admin.get');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])
        ->name('admin.update');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.admin.delete');
    Route::get('/manajemen-berita', function () {
        return view('admin.dashboard');
    })->name('manajemen.index');
    Route::get('/manajemen-berita/content', function () {
        return view('admin.manajemen-berita-content');
    })->name('manajemen.content');
});