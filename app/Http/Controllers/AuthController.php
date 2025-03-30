<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::user()) {
            return response(['error' => 'User is already logged in'], 403);
        }

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken($request->email);

            return response(['token' => $token->plainTextToken], 200);
        }

        return response(['error' => 'Failed to login'], 401);
    }

    public function logout()
    {
        if (is_null(Auth::user())) {
            return response(['error' => 'User is not logged in'], 403);
        }

        Auth::logout();

        return response(['message' => 'User is logged out'], 200);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::create($data);

        return response(['user' => $user], 200);
    }
}
