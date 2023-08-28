<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $validator->errors()

            ], 401);
        }

        #dd($request->bio);
        $user = User::create([
            'name'      => $request->name,
            'username'  =>  $request->username,
            'email'     =>  $request->email,
            'phone'     =>  $request->phone,
            'password'  =>  Hash::make($request->password),
            'bio'       =>  $request->bio,
            'country'   =>  $request->country,
            'gender'    =>  $request->gender,
            'type'    =>  $request->type,
            'role_id'   =>  1,
            'created_at' =>  date('Y-m-d'),
        ]);
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'message' => 'Registration successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $loginField = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'phone';

        $credentials = [
            $loginField => $request->input('login'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 200);
        } else {
            return response()->json([
                'error' => 'These credentials do not match our records',
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ], 200);
    }
}