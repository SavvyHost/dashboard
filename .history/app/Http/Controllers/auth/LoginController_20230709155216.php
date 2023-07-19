<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function show()
    {
        return view ('auth.login');
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

        if(Auth::attempt($credentials))
        {
            $user = Auth::user();

            return redirect()->route('dashboard.show');
    }
    else
    {
        return redirect()->back()->with('error', 'These credentials do not match our records');
    }








}








}