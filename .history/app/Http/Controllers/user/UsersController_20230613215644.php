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
        return view('users.users-list',compact('users'));
    }

    public function my_profile()
    {
        $countries = Country::all();
        return view('users.my-profile',compact('countries'));
    }



    public function destroy1($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }









    public function index_api()
    {

        $users =UserResource::collection( User::where('role_id',2)->get());

        return response()->json(['data'=>$users,'error'=>''],200);

    }



    public function delete_api($user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }




}
