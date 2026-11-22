<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewPageController;
use App\Http\Controllers\ProfilePageController;

// Redirect home page to reviews
Route::get('/', function () {
    return redirect('/reviews');
});

// Display all reviews
Route::get('/reviews', [ReviewPageController::class, 'index']);

// Preview Add Review page
Route::get('/reviews/create', function () {
    return view('reviews.create');
});

// Preview Photographer Profile page
Route::get('/photographers/{id}/profile-preview', [
    ProfilePageController::class,
    'photographer'
]);
