<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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