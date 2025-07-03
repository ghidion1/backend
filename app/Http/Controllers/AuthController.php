<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'role' => 'in:admin,employee,user'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role' => $fields['role'] ?? 'user'
        ]);

        $token = $user->createToken('apptoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    // Login
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }

        $token = $user->createToken('apptoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response(['message' => 'Logged out'], 200);
    }
    protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        return route('login'); // poți schimba cu: return null;
    }
}
}
