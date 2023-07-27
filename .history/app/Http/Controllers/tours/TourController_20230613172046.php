<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Http\Resources\ToursResource;

class TourController extends Controller
{
    public function index_api()
    {


            $tours =ToursResource::collection( Tour::all());

            return response()->json(['data'=>$tours,'error'=>''],200);


    }




    public function delete($tour_id)
    {
        $tour = Tour::find($tour_id);

        if (!$tour) {
            return response()->json(['error' => 'tour not found'], 404);
        }

        $tour->delete();

        return response()->json(['message' => 'tour deleted successfully'], 200);
    }









}
