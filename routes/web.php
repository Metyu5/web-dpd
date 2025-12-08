<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// halaman form login admin
Route::get('/admin', function () {
    return view('admin.welcome');
})->name('admin.login');

// proses login
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.process');

// dashboard admin setelah login
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
