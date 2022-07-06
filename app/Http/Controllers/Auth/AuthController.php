<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('welcome', ['type' => 'login']);
    }

    public function registerView()
    {
        return view('welcome', ['type' => 'register']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials, true)) {
            return response()->json([
                'login' => true,
                'errors' => null
            ], 200);
        } else {
            return response()->json([
                'login' => false,
                'errors' => 'Email or Password are Incorrect'
            ],422);
        }
    }

    public function register(Request $request)
    {
        $user = new User($request->all());
        $user->remember_token = Str::random(80);
        $user->save();

        return response()->json([
            'saved' => true,
        ],200);
    }
}
