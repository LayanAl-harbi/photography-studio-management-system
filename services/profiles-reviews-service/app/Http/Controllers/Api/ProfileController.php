<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class ProfileController extends Controller
{
    // Display user profile
    public function show(Request $request, $id)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'message' => 'Login required.'
            ], 401);
        }

        $authUrl = config('services.auth_service.url');

        if (!$authUrl) {
            return response()->json([
                'message' => 'Authentication service is not configured.'
            ], 503);
        }

        try {
            $response = Http::withToken($token)
                ->timeout(5)
                ->get(rtrim($authUrl, '/') . '/api/user');

        } catch (ConnectionException $e) {
            return response()->json([
                'message' => 'Authentication service unavailable.'
            ], 503);
        }

        if (!$response->successful()) {
            return response()->json([
                'message' => 'Authentication failed.'
            ], $response->status() === 401 ? 401 : 503);
        }

        $user = $response->json();

        if (!is_array($user) || !isset($user['id'])) {
            return response()->json([
                'message' => 'Invalid authentication response.'
            ], 503);
        }

        // Only the owner can view private profile details
        if ((int) $user['id'] !== (int) $id) {
            return response()->json([
                'message' => 'You cannot view another user profile.'
            ], 403);
        }

        $profile = UserProfile::where('user_id', $id)->first();

        return response()->json([
            'user' => [
                'id' => $user['id'],
                'name' => $user['name'] ?? null,
                'email' => $user['email'] ?? null,
                'role' => $user['role'] ?? null,
            ],
            'profile' => $profile
        ]);
    }

    // Update user profile
    public function update(Request $request, $id)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'message' => 'Login required.'
            ], 401);
        }

        $authUrl = config('services.auth_service.url');

        if (!$authUrl) {
            return response()->json([
                'message' => 'Authentication service is not configured.'
            ], 503);
        }

        try {
            $response = Http::withToken($token)
                ->timeout(5)
                ->get(rtrim($authUrl, '/') . '/api/user');

        } catch (ConnectionException $e) {
            return response()->json([
                'message' => 'Authentication service unavailable.'
            ], 503);
        }

        if (!$response->successful()) {
            return response()->json([
                'message' => 'Authentication failed.'
            ], $response->status() === 401 ? 401 : 503);
        }

        $user = $response->json();

        if (!is_array($user) || !isset($user['id'])) {
            return response()->json([
                'message' => 'Invalid authentication response.'
            ], 503);
        }

        // Only the owner can update their profile
        if ((int) $user['id'] !== (int) $id) {
            return response()->json([
                'message' => 'You cannot update another user profile.'
            ], 403);
        }

        $data = $request->validate([
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_image' => 'nullable|string|max:255',
        ]);

        $profile = UserProfile::updateOrCreate(
            ['user_id' => $user['id']],
            $data
        );

        return response()->json([
            'message' => 'Profile updated successfully.',
            'profile' => $profile
        ]);
    }

    // Display photographer profile and reviews
    public function photographerProfile(Request $request, $id)
    {
        $authUrl = config('services.auth_service.url');

        if (!$authUrl) {
            return response()->json([
                'message' => 'Authentication service is not configured.'
            ], 503);
        }

        $token = $request->bearerToken();

        try {
            $http = Http::timeout(5);

            if ($token) {
                $http = $http->withToken($token);
            }

            $response = $http->get(
                rtrim($authUrl, '/') . '/api/users/' . $id
            );

        } catch (ConnectionException $e) {
            return response()->json([
                'message' => 'Authentication service unavailable.'
            ], 503);
        }

        if (!$response->successful()) {
            return response()->json([
                'message' => 'Photographer could not be verified.'
            ], $response->status() === 404 ? 404 : 503);
        }

        $user = $response->json('user') ?? $response->json();

        if (!is_array($user) || !isset($user['id'], $user['role'])) {
            return response()->json([
                'message' => 'Invalid photographer response.'
            ], 503);
        }

        if (
            (int) $user['id'] !== (int) $id ||
            $user['role'] !== 'photographer'
        ) {
            return response()->json([
                'message' => 'This user is not a photographer.'
            ], 404);
        }

        $profile = UserProfile::where('user_id', $id)->first();

        $reviews = Review::where('photographer_id', $id)
            ->latest()
            ->get();

        return response()->json([
            'photographer' => [
                'id' => $user['id'],
                'name' => $user['name'] ?? null,
                'role' => $user['role'],
                'profile_image' => $profile?->profile_image,
            ],
            'average_rating' => $reviews->avg('rating'),
            'reviews' => $reviews
        ]);
    }
}
