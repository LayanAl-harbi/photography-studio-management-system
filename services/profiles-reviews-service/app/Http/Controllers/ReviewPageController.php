<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewPageController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();

        return view('reviews.index', compact('reviews'));
    }
}
