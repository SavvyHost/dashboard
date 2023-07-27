<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class AdminsController extends Controller
{
    public function index()
    {
        $admins =UserResource::collection( User::where('role_id',1)->get());
        return response()->json(['data'=>$users,'error'=>''],200);    }
}
