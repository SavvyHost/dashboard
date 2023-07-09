<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Http\Resources\ToursResource;

class TourController extends Controller
{



    public function index()
    {
        $tours = Tour::with('category')->get();
        return view('tours.tours-list',compact('tours'));
    }







    // public function destroy($id)
    // {
    //     $tour = Tour::find($id);

    //     if (!$tour) {
    //         return redirect()->route('users.show')->with('error', 'Tour not found');
    //     }

    //     $tour->delete();

    //     return redirect()->back()->with('success', 'Tour deleted successfully');
    // }

    public function destroy($id)
{
    $tour = Tour::find($id);

    if (!$tour) {
        return redirect()->route('users.show')->with('error', 'Tour not found');
    }

    // Delete tour locations associated with the tour
    $tour->tourLocations()->delete();

    // Delete the tour
    $tour->delete();

    return redirect()->back()->with('success', 'Tour deleted successfully');
}




    public function index_api()
    {


            $tours =ToursResource::collection( Tour::all());

            return response()->json(['data'=>$tours,'error'=>''],200);


    }




    public function delete_api($tour_id)
    {
        $tour = Tour::find($tour_id);

        if (!$tour) {
            return response()->json(['error' => 'tour not found'], 404);
        }

        $tour->delete();

        return response()->json(['message' => 'tour deleted successfully'], 200);
    }









}
