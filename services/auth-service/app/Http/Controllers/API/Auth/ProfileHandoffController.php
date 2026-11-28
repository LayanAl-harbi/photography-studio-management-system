<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProfileHandoffController extends Controller
{
    private const CODE_LIFETIME_SECONDS = 60;

    public function issue(Request $request): JsonResponse
    {
        $user = $request->user();
        $token = $request->bearerToken();

        if (!$user || !$token || !$user->isActive()) {
            return response()->json([
                'message' => 'A valid active-user token is required.',
            ], 401);
        }

        if (!in_array($user->role, ['client', 'photographer'], true)) {
            return response()->json([
                'message' => 'Only clients and photographers can continue to a profile.',
            ], 403);
        }

        $code = Str::random(64);
        $key = $this->codeKey($code);

        Cache::put($key, [
            'token' => $token,
            'user_id' => $user->id,
            'role' => $user->role,
        ], now()->addSeconds(self::CODE_LIFETIME_SECONDS));

        return response()->json([
            'code' => $code,
            'expires_in' => self::CODE_LIFETIME_SECONDS,
        ]);
    }

    public function redeem(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'size:64', 'regex:/^[A-Za-z0-9]+$/'],
        ]);

        $key = $this->codeKey($validated['code']);
        $lock = Cache::lock($key . ':redeem-lock', 10);

        if (!$lock->get()) {
            return response()->json([
                'message' => 'This handoff code is already being redeemed.',
            ], 409);
        }

        try {
            $handoff = Cache::get($key);

            if (!$handoff) {
                return response()->json([
                    'message' => 'The handoff code is invalid, expired, or already used.',
                ], 410);
            }

            Cache::forget($key);

            return response()->json([
                'token' => $handoff['token'],
                'user_id' => $handoff['user_id'],
                'role' => $handoff['role'],
            ]);
        } finally {
            $lock->release();
        }
    }

    private function codeKey(string $code): string
    {
        return 'profile-handoff:' . hash('sha256', $code);
    }
}
