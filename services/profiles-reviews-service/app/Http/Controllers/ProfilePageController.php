<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class ProfilePageController extends Controller
{
    private function authenticatedUser(Request $request): array
    {
        $token = $request->session()->get('auth_token');

        if (!$token) {
            abort(401, 'Please log in to access your profile.');
        }

        $authUrl = config('services.auth_service.url');

        if (!$authUrl) {
            abort(503, 'Authentication service is not configured.');
        }

        try {
            $response = Http::withToken($token)
                ->acceptJson()
                ->timeout(5)
                ->get(rtrim($authUrl, '/') . '/api/user');
        } catch (ConnectionException $e) {
            abort(503, 'Authentication service is unavailable.');
        }

        if ($response->status() === 401) {
            $request->session()->forget('auth_token');

            abort(401, 'Your session has expired. Please log in.');
        }

        if (!$response->successful()) {
            abort(503, 'Unable to verify your account.');
        }

        $user = $response->json();

        if (
            !is_array($user) ||
            !isset($user['id'], $user['role']) ||
            !in_array($user['role'], ['client', 'photographer', 'admin'], true)
        ) {
            abort(503, 'Invalid authentication response.');
        }

        if (isset($user['is_active']) && !$user['is_active']) {
            abort(403, 'Your account is inactive.');
        }

        return $user;
    }

    public function client(Request $request)
    {
        $user = $this->authenticatedUser($request);

        if ($user['role'] !== 'client') {
            abort(403, 'This page is for clients only.');
        }

        $id = $user['id'];

        $profile = UserProfile::where('user_id', $id)->first();

        return view('profiles.show', compact('profile', 'id'));
    }

    public function photographer(Request $request)
    {
        $user = $this->authenticatedUser($request);

        if ($user['role'] !== 'photographer') {
            abort(403, 'This page is for photographers only.');
        }

        $id = $user['id'];

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

    public function edit(Request $request)
    {
        $user = $this->authenticatedUser($request);

        if (!in_array($user['role'], ['client', 'photographer'], true)) {
            abort(403, 'Access denied.');
        }

        return view('profiles.edit');
    }
}
