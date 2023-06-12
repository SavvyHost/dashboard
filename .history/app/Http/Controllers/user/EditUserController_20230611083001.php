<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Http\Resources\UserResource;



class EditUserController extends Controller
{
    public function index($user_id)
    {
        $user = User::find($user_id);
        $countries = Country::all();
        return view('users.edit-user',compact('user','countries'));
    }
    public function update($user_id, Request $request)
    {
        $user = User::find($user_id);
        $request->validate([
            'name' => '|string|between:2,100',
            'username' => '|string|between:2,100',
            'email' => '|string|email|max:100|unique:users',
            'phone' => '|string|min:1|max:30',
            'bio' => '|nullable|text',
            'country' => '|string|between:1,10',
            'gender' => '|max:100',
        ]);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->country = $request->input('country');
        $user->gender = $request->input('gender');
        $user->role_id = $request->input('role');
        $user->bio = $request->input('bio');
        $user->updated_at = date('Y-m-d');
        $user->save();


       $updated= new UserResource($user);
        return response()->json(['data'=>$updated,'error'=>''],200);
    }
}
