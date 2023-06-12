<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;


class UsersController extends Controller
{
    public function index()
    {
        $users =UserResource::make($User::where('role_id',2)->get());

        return

    }

    public function my_profile()
    {
        $countries = Country::all();
        return view('users.my-profile',compact('countries'));
    }
}
