<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewPageController;

// Redirect home page to reviews
Route::get('/', function () {
    return redirect('/reviews');
});

// Display all reviews
Route::get('/reviews', [
    ReviewPageController::class,
    'index'
]);

// Open the original Add Review form
Route::get('/reviews/create', function () {
    return redirect('/reviews#write-review');
});
