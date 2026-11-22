<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Models\Review;

class ProfilePageController extends Controller
{
    // Display user profile page
    public function show($id)
    {
        $profile = UserProfile::where('user_id', $id)->first();

        return view('profiles.show', compact('profile', 'id'));
    }

    // Display photographer profile page
    public function photographer($id)
    {
        $profile = UserProfile::where('user_id', $id)->first();

        $reviews = Review::where('photographer_id', $id)
            ->latest()
            ->get();

        $averageRating = $reviews->avg('rating');

        return view('profiles.photographer', compact(
            'profile',
            'reviews',
            'averageRating',
            'id'
        ));
    }
}
