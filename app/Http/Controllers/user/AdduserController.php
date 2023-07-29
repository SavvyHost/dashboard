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
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;




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
        ]);
        $user = User::create([
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
        return redirect()->route('users.show')->with('success','User Added Successfully');
    }

















    public function save_api(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email'     =>  'required|unique:users',
            'phone'     =>  'required',
            'password'  =>  'required',
            'bio'       =>  'nullable',
            'country'   =>  'required',
            'gender'    =>  'required',
            'role'      =>  'required',



        ]);
        $user = User::create([
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
