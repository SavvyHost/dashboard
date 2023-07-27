<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class AdminsController extends Controller
{
    public function index_api()
    {
        $admins = UserResource::collection(User::where('role_id', 1)->get());
        return response()->json(['data' => $admins, 'error' => ''], 200);
    }






    public function index()
    {
        $users = User::where('role_id', 1)->get();
        return view('users.users-list', compact('users'));
    }
}
