<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hotel;


class DashboardController extends Controller
{
    public function index()
    {
        $users_count = User::where('role_id',2)->get()->count();
        $hotels_count = Hotel::all()->count();
        $recent_hotels = Hotel::orderBy('id', 'desc')->take(5)->get();
        $recent_users = User::orderBy('id', 'desc')->take(5)->get();
        return view('index',compact('users_count','recent_users','hotels_count','recent_hotels'));
    }
}
