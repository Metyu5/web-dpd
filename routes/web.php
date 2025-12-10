<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
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

Route::get('/admin', function () {
    return view('admin.welcome');
})->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.process');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/dashboard/content', function () {
        return view('admin.dashboard-content');
    })->name('dashboard.content');
    Route::get('/data-berita', function () {
        return view('admin.dashboard');
    })->name('berita.index');
    Route::get('/data-berita/content', function () {
        return view('admin.data-berita-content');
    })->name('berita.content');
    Route::get('/data-admin', function () {
        return view('admin.dashboard');
    })->name('data-admin.index');
    Route::get('/data-admin/content', function () {
        return view('admin.data-admin-content');
    })->name('data-admin.content');
    Route::get('/manajemen-berita', function () {
        return view('admin.dashboard');
    })->name('manajemen.index');
    Route::get('/manajemen-berita/content', function () {
        return view('admin.manajemen-berita-content');
    })->name('manajemen.content');
});
