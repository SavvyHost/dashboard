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
        $hotel = Hotel::find($hotel_id);

        if (!$hotel) {
            return response()->json(['error' => 'hotel not found'], 404);
        }

        $hotel->delete();

        return response()->json(['message' => 'hotel deleted successfully'], 200);
    }





}

