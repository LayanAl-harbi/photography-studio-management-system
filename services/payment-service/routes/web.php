<?php

use Illuminate\Support\Facades\Route;

// Page 1: Studio Booking Cart
Route::get('/', function () {
    return view('cart');
});

// Page 2: Payment & Instant Camera Receipt
Route::get('/payment', function () {
    return view('payment');
});


Route::view('/dashboard', 'dashboard');