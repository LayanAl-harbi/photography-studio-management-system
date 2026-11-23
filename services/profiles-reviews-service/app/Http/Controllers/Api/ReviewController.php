<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class ReviewController extends Controller
{
    // Display all reviews
    public function index()
    {
        return response()->json(Review::latest()->get());
    }

    // Display one review
    public function show($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'message' => 'Review not found.'
            ], 404);
        }

        return response()->json($review);
    }

    // Display reviews for a photographer
    public function photographerReviews($id)
    {
        $reviews = Review::where('photographer_id', $id)
            ->latest()
            ->get();

        return response()->json($reviews);
    }

    // Add a new review
    public function store(Request $request)
    {
        // Check login token
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'message' => 'Login required.'
            ], 401);
        }

        // Check Auth Service configuration
        $authUrl = config('services.auth_service.url');

        if (!$authUrl) {
            return response()->json([
                'message' => 'Authentication service is not configured.'
            ], 503);
        }

        // Verify user through Auth Service
        try {
            $auth = Http::withToken($token)
                ->timeout(5)
                ->get(rtrim($authUrl, '/') . '/api/user');

        } catch (ConnectionException $e) {
            return response()->json([
                'message' => 'Authentication service unavailable.'
            ], 503);
        }

        if (!$auth->successful()) {
            return response()->json([
                'message' => 'Invalid login token.'
            ], $auth->status() === 401 ? 401 : 503);
        }

        $user = $auth->json();

        if (
            !is_array($user) ||
            !isset($user['id'], $user['role'], $user['is_active'])
        ) {
            return response()->json([
                'message' => 'Invalid authentication response.'
            ], 503);
        }

        // Only active clients can add reviews
        if (
            $user['role'] !== 'client' ||
            !$user['is_active']
        ) {
            return response()->json([
                'message' => 'Only active clients can add reviews.'
            ], 403);
        }

        // Validate review information
        $data = $request->validate([
            'booking_id' => 'required|integer|min:1|unique:reviews,booking_id',
            'photographer_id' => 'required|integer|min:1',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Check Booking Service configuration
        $bookingUrl = config('services.booking_service.url');

        if (!$bookingUrl) {
            return response()->json([
                'message' => 'Booking service is not configured.'
            ], 503);
        }

        // Verify booking through Booking Service
        try {
            $booking = Http::withToken($token)
                ->timeout(5)
                ->get(
                    rtrim($bookingUrl, '/')
                    . '/api/bookings/' . $data['booking_id']
                );

        } catch (ConnectionException $e) {
            return response()->json([
                'message' => 'Booking service unavailable.'
            ], 503);
        }

        if (!$booking->successful()) {
            return response()->json([
                'message' => 'Booking could not be verified.'
            ], 503);
        }

        $bookingData = $booking->json('booking')
            ?? $booking->json();

        if (
            !is_array($bookingData) ||
            !isset(
                $bookingData['status'],
                $bookingData['client_id'],
                $bookingData['photographer_id']
            )
        ) {
            return response()->json([
                'message' => 'Invalid booking response.'
            ], 503);
        }

        // Verify completed booking and ownership
        if (
            $bookingData['status'] !== 'completed' ||
            (int) $bookingData['client_id'] !== (int) $user['id'] ||
            (int) $bookingData['photographer_id'] !==
                (int) $data['photographer_id']
        ) {
            return response()->json([
                'message' => 'Only completed bookings belonging to the client can be reviewed.'
            ], 403);
        }

        // Save review
        $review = Review::create([
            'booking_id' => $data['booking_id'],
            'client_user_id' => $user['id'],
            'photographer_id' => $data['photographer_id'],
            'rating' => $data['rating'],
            'comment' => $data['comment'] ?? null,
        ]);

        return response()->json($review, 201);
    }
}
