<?php

namespace App\Http\Controllers\rooms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Meal;
use App\Models\RoomAttr;
use App\Models\RoomSup;
use App\Models\RoomType;
use App\Http\Resources\RoomsResource;
use App\Models\Currency;




class AddRoomController extends Controller
{








    public function index3()
    {
    $attrs = RoomAttr::with('terms')->all();
    $types = RoomType::get();

    return view('hotels\hotel-rooms-add', compact('attrs','types'));
    }








    public function index2()
    {
    $attrs = RoomAttr::with('terms')->get();
            // dd($attrs);

    return Response()->json(['done'=>$attrs]);
    }


//

    public function addmore($id)
    {    $attrs = RoomAttr::with('terms')->get();
        $types = RoomType::get();
        $sups = RoomSup::get();
        $meals = Meal::get();
        $currencies = Currency::get();
        $hotel = Hotel::get($id);
        // $hotel = $room->hotels;

        return view('hotels.hotel-rooms-add',compact('attrs','types','id','meals','sups','currencies','hotel'));
    }





    public function save(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'description' => 'required',
            'terms' => 'nullable|array',
            'terms.*' => 'nullable',
            'sups' => 'nullable|array',
            'sups.*' => 'nullable',
            'meals' => 'nullable|array',
            'meals.*' => 'nullable',
            'type.*' => 'nullable',
            'banner' => 'required',
            'has_meal' => 'nullable',
            'free_meal' => 'nullable',
            'meal_price' => 'nullable|numeric',
            'prices' => 'nullable|array',
            'prices.*' => 'nullable|numeric',
        ]);

        $terms = implode(',', $request->input('terms', []));
        $sups = implode(',', $request->input('sups', []));
        // $meals = implode(',', $request->input('meal_id', []));
        $mealIds = $request->input('meal_id', []);
        $meals = is_array($mealIds) ? implode(',', $mealIds) : '';


        $hasMeal = $request->has('has_meal') ? true : false;
        $mealPrice = $request->input('meal_price');

        $images = [];
        foreach ($request->file('image') as $pic) {
            $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('assets/hotel-photos'), $image_name);
            $images[] = $image_name;
        }

        $banner = time() . rand(1, 100) . '.' . $request->file('banner')->getClientOriginalExtension();
        $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);

        $room = Room::create([
            'name' => $request->input('name'),
            'hotel_id' => $id,
            'max_adult' => $request->input('max_adult'),
            'max_child' => $request->input('max_child'),
            'has_meal' => $hasMeal,
            'free_meal' => $request->input('free_meal'),
            'banner' => $banner,
            'price' => $request->input('price'),
            'currency' => $request->input('currency'),
            'images' => implode(',', $images),
            'terms' => $terms,
            'sups' => $sups,
            'meal_price' => $mealPrice,
            'meal_type' => $meals,
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'creation_date' => now(),
        ]);



        return redirect()->back()->with('success', 'Room Added Successfully');
    }







    // public function currencies_type()
    // {
    //     $currencies = Currency::all();

    //     return view('hotels.hotel-rooms-add', ['currencies' => $currencies]);
    // }









    public function index_api()
    {
        $attrs = HotelAttr::with('terms')->get();
        #dd($attrs);
        return response()->json(['data'=>$attrs,'error'=>''],200);

    }






public function save_api(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required',
        'location' => 'required|string|max:255',
        'image' => 'nullable',
        'description' => 'required|string',
        'terms' => 'nullable',
        'banner' => 'required',
    ]);

    $terms = '';
    if (is_array($request->terms)) {
        $terms = implode(',', $request->terms);
    }

    $images = '';
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $pic) {
            if ($images != '') {
                $images = $images . ',';
            }
            $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
            $images = $images . $image_name;
            $pic->move(public_path('assets/hotel-photos'), $image_name);
        }
    }

    $banner = time() . rand(1, 100) . '.' . $request->file('banner')->getClientOriginalExtension();
    $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);

    $hotel = Hotel::create([
        'name' => $request->name,
        'location' => $request->location,
        'price' => $request->price,
        'banner' => $banner,
        'images' => $images,
        'terms' => $terms,
        'description' => $request->description,
        'creation_date' => date('Y-m-d'),
    ]);

    $created = new HotelsResource($hotel);
    return response()->json(['data' => $created, 'error' => '', 'message' => 'Hotel Added Successfully'], 200);
}



}
