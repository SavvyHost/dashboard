<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;



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
}
