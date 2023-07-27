<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Http\Resources\HotelsResource;



class HotelsController extends Controller
{
    public function index()
    {
        $hotels =HotelsResource::collection( Hotel::all());

        return response()->json(['data'=>$hotels,'error'=>''],200);

    }





    public function delete($hotel_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }





}

