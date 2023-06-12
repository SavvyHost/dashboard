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
        $hotels = Hotel::all();
        $hotels =HotelsResource::collection( Hotel::all());

        return response()->json(['data'=>$hotels,'error'=>''],200);

    }
}

