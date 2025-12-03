<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/loginadmin', function () {
    return view('loginadmin.welcome');
});