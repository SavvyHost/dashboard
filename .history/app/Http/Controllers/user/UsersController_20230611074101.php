<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Http\Resources\UserResource;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('role_id',2)->get();
        $users =UserResource::make(where('role_id',2)->get());

        return response()->json(['data'=>$users,'error'=>''],200);

    }

    public function my_profile()
    {
        $countries = Country::all();
        return view('users.my-profile',compact('countries'));
    }
}
