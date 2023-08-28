<?php

namespace App\Http\Controllers\OAuth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        // Check if the user exists in your application's database
        $existingUser = User::where('email', $user->getEmail())->first();

        if (!$existingUser) {
            // If not, create a new user record
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->save();
        }

        // Generate an API token for the user
        $token = $user->createToken('API Token')->plainTextToken;

        // Return the token as the API response
        return response()->json(['token' => $token]);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        // Check if the user exists in your application's database
        $existingUser = User::where('email', $user->getEmail())->first();

        if (!$existingUser) {
            // If not, create a new user record
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->save();
        }

        // Generate an API token for the user
        $token = $user->createToken('API Token')->plainTextToken;

        // Return the token as the API response
        return response()->json(['token' => $token]);
    }
}
