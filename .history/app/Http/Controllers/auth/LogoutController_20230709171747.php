<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }


    // public function logout(Request $request)
    // {
    //     $request->user()->tokens()->delete();

    //     return response()->json([
    //         'message' => 'Logged out successfully.',
    //     ]);
    // }


    public function logout(Request $request)
    {
        $token = $request->session()->get('authToken'); // Retrieve the token from the session

        if ($token) {
            $user = Auth::user();
            $user->tokens()->where('token', hash('sha256', $token))->delete(); // Delete the associated token
        }

        $request->session()->remove('authToken'); // Remove the token from the session

        return response()->json([
            'message' => 'Logged out successfully.',
        ]);
    }
}
