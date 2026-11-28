<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthHandoffController extends Controller
{
    public function receive(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'size:64', 'regex:/^[A-Za-z0-9]+$/'],
        ]);

        $authUrl = config('services.auth_service.url');

        if (!$authUrl) {
            abort(503, 'Authentication service URL is not configured.');
        }

        $authUrl = rtrim($authUrl, '/');

        try {
            // Auth Service consumes the code once and returns the Sanctum token.
            $redeem = Http::acceptJson()->timeout(5)->post(
                $authUrl . '/api/profile-handoff/redeem',
                ['code' => $validated['code']]
            );

            if (!$redeem->successful()) {
                abort(401, 'The login handoff code is invalid or expired.');
            }

            $handoff = $redeem->json();
            $token = $handoff['token'] ?? null;
            $userId = $handoff['user_id'] ?? null;
            $role = $handoff['role'] ?? null;

            if (!is_string($token) || $token === '' || !$userId ||
                !in_array($role, ['client', 'photographer'], true)) {
                abort(401, 'Invalid login handoff response.');
            }

            // Confirm token validity and role with the Auth Service.
            $verification = Http::withToken($token)
                ->acceptJson()
                ->timeout(5)
                ->get($authUrl . '/api/user');

            if (!$verification->successful()) {
                abort(401, 'The handed-off token could not be verified.');
            }

            $user = $verification->json();
            if (!is_array($user) ||
                (string) ($user['id'] ?? '') !== (string) $userId ||
                ($user['role'] ?? null) !== $role ||
                !($user['is_active'] ?? false)) {
                abort(403, 'The handed-off account is not authorized.');
            }

            // Use the same key that ProfilePageController already expects.
            $request->session()->regenerate();
            $request->session()->put('auth_token', $token);

            return redirect()->route($role === 'client'
                ? 'client.profile'
                : 'photographer.profile');
        } catch (ConnectionException $e) {
            abort(503, 'Authentication service is unavailable.');
        }
    }
}
