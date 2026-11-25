<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');