<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = new User();

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];

        // Public registration always creates a Client.
        $user->role = 'client';
        $user->is_active = true;

        $user->save();

        return redirect()->route('login')
            ->with('status', 'Registration successful! You can now log in.');
    }
}
