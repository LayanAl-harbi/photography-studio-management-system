<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    // Get all clients and photographers
    public function index(): JsonResponse
    {
        $users = User::whereIn('role', ['client', 'photographer'])
            ->select('id', 'name', 'email', 'role', 'is_active', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'users' => $users
        ], 200);
    }

    public function updateRole(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'role' => ['required', 'in:client,photographer'],
        ]);

        $user = User::findOrFail($id);

        // Prevent changing Admin accounts
        if ($user->role === 'admin') {
            return response()->json([
                'message' => 'Admin roles cannot be changed through this endpoint.',
            ], 403);
        }

        // Update the user's role
        if ($user->role !== $validated['role']) {
            $user->role = $validated['role'];
            $user->save();

            // Revoke all existing tokens
            $user->tokens()->delete();
        }

        return response()->json([
            'message' => 'User role updated successfully.',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'is_active' => $user->is_active,
            ],
        ], 200);
    }

    public function updateStatus(Request $request, int $id): JsonResponse
{
    $validated = $request->validate([
        'is_active' => ['required', 'boolean'],
    ]);

    $user = User::whereIn('role', ['client', 'photographer'])
        ->findOrFail($id);

    $user->is_active = $validated['is_active'];
    $user->save();

    // Revoke tokens when account is deactivated
    if (!$user->is_active) {
        $user->tokens()->delete();
    }

    return response()->json([
        'message' => 'Account status updated successfully.',
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'is_active' => $user->is_active
        ]
    ], 200);
}
}
