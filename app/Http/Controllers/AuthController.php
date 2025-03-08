<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Example for generating a token
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    //
    public function login()
    {

        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }

            // Get the authenticated user.
            $user = auth()->user();

            // (optional) Attach the role to the token.
            $token = JWTAuth::claims(['role' => $user->role])->fromUser($user);

            return response()->json(compact('token'));
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }
        /*
        $token = Str::random(60); // Example token generation
        return response()->json(['token' => $token]);*/
    }
    public function register()
    {
        $token = Str::random(60); // Example token generation
        return response()->json(['token' => $token]);
    }
    public function logout()
    {
        $token = Str::random(60); // Example token generation
        return response()->json(['token' => $token]);
    }
}
