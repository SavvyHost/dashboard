<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;



class AdduserController extends Controller
{
    public function show()
    {
        $countries = Country::all();
        $roles = Role::all();
        return view ('users.add-user',compact('countries','roles'));
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
            'role'      =>  'required',


            'name' => 'required|string|between:2,100',
            'username' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email,' . $user_id,
            'phone' => 'required|string|min:1|max:30',
            'bio' => 'nullable|string',
            'country' => 'required|string|between:1,10',
            'gender' => 'required|string|max:100',
        ]);
        $user = User::update([
            'name'      => $request->name,
            'username'  =>  $request->username,
            'email'     =>  $request->email,
            'phone'     =>  $request->phone,
            'password'  =>  Hash::make($request->password),
            'bio'       =>  $request->bio,
            'country'   =>  $request->country,
            'gender'    =>  $request->gender,
            'role_id'   =>  $request->role,
            'created_at'=>  date('Y-m-d'),
        ]);
        $craeted= new UserResource($user);
        return response()->json(['data'=>$craeted,'error'=>''],200);
    }
}
