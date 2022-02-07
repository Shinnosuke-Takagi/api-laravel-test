<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        return new UserResource($request->user());
    }

    public function register(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users',
        //     'password' => 'required|string|min:8',
        // ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return new AuthResource($user);
    }

    public function login(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
        $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];

        if (!Auth::attempt($credentials)) {
            return response('Invalid login details', 401);
        }

        $user = User::where('email', $request->input('email'))->firstOrFail();

        return new AuthResource($user);
    }

    public function logout(Request $request)
    {
        return $request->user()->tokens()->delete()
            ? response()->status()
            : response('Invalid logout', 400);
    }
}
