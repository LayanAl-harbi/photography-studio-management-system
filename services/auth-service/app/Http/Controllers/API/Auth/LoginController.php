<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        // Validate the login information
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Find the user by email
        $user = User::where('email', $validated['email'])->first();

        // Verify the email and password
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid email or password.',
            ], 401);
        }

        // Check whether the account is active
        if (!$user->isActive()) {
            return response()->json([
                'message' => 'Your account is inactive. Please contact the administrator.',
            ], 403);
        }

        // Generate a Sanctum API token
        $token = $user->createToken('auth-token')->plainTextToken;

        // Return the user information and token
        return response()->json([
            'message' => 'Login successful.',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ],
            'token' => $token,
        ], 200);
    }
}
