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


    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ], 200);}

    // public function logout(Request $request)
    // {
    //     $user = $request->user();
    //     $user->tokens()->delete();

    //     return response()->json([
    //         'message' => 'Logout successful',
    //     ], 200);
    // }






    // public function logout(Request $request)
    // {
    //     $user = $request->user(); // Retrieve the authenticated user

    //     $user->tokens()->delete(); // Revoke all the user's tokens

    //     Auth::logout(); // Log out the user

    //     return response()->json([
    //         'message' => 'Logout successful',
    //     ], 200);
    // }


}
