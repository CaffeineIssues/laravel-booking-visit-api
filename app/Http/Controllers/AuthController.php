<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Example for generating a token

class AuthController extends Controller
{
    //
    public function login()
    {
        $token = Str::random(60); // Example token generation
        return response()->json(['token' => $token]);
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
