<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PhotographerController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Create a new photographer account
        $photographer = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'photographer',
            'is_active' => true,
        ]);

        // Return the created account
        return response()->json([
            'message' => 'Photographer account created successfully.',
            'photographer' => [
                'id' => $photographer->id,
                'name' => $photographer->name,
                'email' => $photographer->email,
                'role' => $photographer->role,
                'is_active' => $photographer->is_active,
            ],
        ], 201);
    }
    
    public function index(): JsonResponse
    {
        $photographers = User::where('role', 'photographer')
            ->select('id', 'name', 'email', 'is_active', 'created_at')
            ->get();

        return response()->json([
            'photographers' => $photographers,
        ], 200);
    }

    public function updateStatus(Request $request, int $id): JsonResponse
    {
        // Validate the new account status
        $validated = $request->validate([
            'is_active' => ['required', 'boolean'],
        ]);

        // Find the photographer
        $photographer = User::where('role', 'photographer')
            ->findOrFail($id);

        // Update the account status
        $photographer->is_active = $validated['is_active'];
        $photographer->save();

        // If the account is deactivated, revoke all its tokens
        if (!$photographer->is_active) {
            $photographer->tokens()->delete();
        }

        return response()->json([
            'message' => $photographer->is_active
                ? 'Photographer account activated successfully.'
                : 'Photographer account deactivated successfully.',
            'photographer' => [
                'id' => $photographer->id,
                'name' => $photographer->name,
                'email' => $photographer->email,
                'role' => $photographer->role,
                'is_active' => $photographer->is_active,
            ],
        ], 200);
}

}