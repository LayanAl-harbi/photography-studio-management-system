<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewPageController;
use App\Http\Controllers\ProfilePageController;

// Home
Route::get('/', function () {
    return redirect('/reviews');
});

// Reviews page
Route::get('/reviews', [
    ReviewPageController::class,
    'index'
])->name('reviews.index');

// Open the original review form
Route::get('/reviews/create', function () {
    return redirect('/reviews#write-review');
})->name('reviews.create');

// Client Profile
Route::get('/client/profile', [
    ProfilePageController::class,
    'client'
])->name('client.profile');

// Photographer Profile
Route::get('/photographer/profile', [
    ProfilePageController::class,
    'photographer'
])->name('photographer.profile');

// Edit Profile
Route::get('/profile/edit', [
    ProfilePageController::class,
    'edit'
])->name('profile.edit');

// Receive a short-lived handoff code from Auth Service
Route::post('/auth/handoff', [
    \App\Http\Controllers\AuthHandoffController::class,
    'receive'
])->name('auth.handoff');
