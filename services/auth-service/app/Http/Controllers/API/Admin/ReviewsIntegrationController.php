<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class ReviewsIntegrationController extends Controller
{
    public function index()
    {
        $reviewsUrl = rtrim((string) config('services.profiles_reviews.url'), '/');

        if ($reviewsUrl === '') {
            return response()->json([
                'message' => 'Reviews service is unavailable.',
            ], 503);
        }

        try {
            $response = Http::acceptJson()
                ->connectTimeout(2)
                ->timeout(5)
                ->get($reviewsUrl . '/api/reviews');
        } catch (ConnectionException $exception) {
            return response()->json([
                'message' => 'Reviews service is unavailable.',
            ], 503);
        }

        if (!$response->successful()) {
            $status = $response->serverError() ? 503 : 502;

            return response()->json([
                'message' => $status === 503
                    ? 'Reviews service is unavailable.'
                    : 'Reviews service returned an unexpected response.',
            ], $status);
        }

        $reviews = $response->json();

        if (
            !is_array($reviews) ||
            !array_is_list($reviews) ||
            array_filter($reviews, fn ($review) => !is_array($review)) !== []
        ) {
            return response()->json([
                'message' => 'Reviews service returned an unexpected response.',
            ], 502);
        }

        return response()->json($reviews);
    }
}
