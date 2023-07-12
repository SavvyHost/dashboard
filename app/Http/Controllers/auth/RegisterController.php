<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function show()
    {
        $countries = Country::all();
        return view('auth.register',compact('countries'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email'     =>  'required',
            'phone'     =>  'required',
            'password'  =>  'required',
            'bio'       =>  'nullable',
            'country'   =>  'required',
            'gender'    =>  'required',
        ]);
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
            'role_id'   =>  2,
            'created_at'=>  date('Y-m-d'),
        ]);
        return redirect()->route('login.show');

    }



    public function register(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'nullable|unique:users,phone',
            'password'  =>  'required',
            'bio' => 'nullable',
            'country'   =>  'nullable',
            'gender'    =>  'nullable',
			'type' => 'required'
        ]);
		
		if ($validator->fails() ) {
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
			'role_id'   =>  2,
            'created_at'=>  date('Y-m-d'),
        ]);
        // return redirect()->route('login.show');
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ], 201);
    }
}
