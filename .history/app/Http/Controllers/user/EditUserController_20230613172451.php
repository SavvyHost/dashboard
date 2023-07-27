<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Http\Resources\UserResource;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;




class EditUserController extends Controller
{


    public function index($user_id)
    {
        $user = User::find($user_id);
        $countries = Country::all();
        return view('users.edit-user',compact('user','countries'));
    }
    public function save($user_id,Request $request)
    {
        $user = User::find($user_id);
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email'     =>  'required',
            'phone'     =>  'required',
            'bio'       =>  'nullable',
            'country'   =>  'required',
            'gender'    =>  'required',
        ]);
        $user->name = $request->name;
        $user->username =   $request->username;
        $user->email    =   $request->email;
        $user->phone    =   $request->phone;
        $user->country  =   $request->country;
        $user->gender   =   $request->gender;
        $user->role_id  =   $request->role;
        $user->bio      =   $request->bio;
        $user->updated_at   =   date('Y-m-d');
        $user->save();
        return redirect()->back()->with('success','User Edited Successfully');
    }



















    public function index($user_id)
    {
        $user = User::find($user_id);
        $countries = Country::all();
        return view('users.edit-user',compact('user','countries'));
    }
    public function update_api( Request $request, $user_id)
    {
        $user = User::find($user_id);

        $request->validate([
            'name' => 'string|between:2,100',
            'username' => 'string|between:2,100',
            'email' => [
                'string',
                'email',
                'max:100',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'string|min:1|max:30',
            'bio' => 'nullable',
            'country' => 'string|between:1,10',
            'gender' => 'max:100',
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



        $updatedUser = $user;

        return response()->json(['data' => $updatedUser, 'error' => ''], 200);
    }
}
