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



class AddRoomController extends Controller
{

    // public function index($id)
    // {
    //     $as = RoomAttr::with('terms')->get();
    //     #dd($attrs);
    //     return view('hotels\hotel-rooms-add',compact('as','id'));
    // }

//
    // public function index($id)
    // {
        // $attrs = RoomAttr::with('terms')->get();
        // return view('hotels.hotel-rooms-add', ['attrs' => $attrs, 'id' => $id]);
    // }
//







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
        return view('hotels.hotel-rooms-add',compact('attrs','types','id','meals','sups'));
    }




    public function save1(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'description' => 'required',
            'terms' => 'nullable|array',
            'terms.*' => 'nullable', // If terms is an array, each item is nullable
            'sups' => 'nullable|array',
            'sups.*' => 'nullable', // If terms is an array, each item is nullable
            'meals' => 'nullable|array',
            'meals.*' => 'nullable', // If terms is an array, each item is nullable
            'type.*' => 'nullable', // If terms is an array, each item is nullable
            'banner' => 'required',
            'has_meal' => '',
            'free_meal' => '',
            'prices' => 'nullable|array', // Add the validation for the 'prices' attribute
            'prices.*' => 'nullable|numeric', // If prices is an array, each item should be numeric
        ]);

        $terms = '';
        $sups = '';
        $meals = '';
        $images = '';

        if ($request->has('terms')) {
            foreach ($request->terms as $term) {
                if ($terms != '') {
                    $terms = $terms . ',';
                }
                $terms = $terms . $term;
            }
        }
        if ($request->has('sups')) {
            foreach ($request->sups as $sup) {
                if ($sups != '') {
                    $sups = $sup . ',';
                }
                $sups = $sups . $sup;
            }
        }
        if ($request->has('meals')) {
            foreach ($request->meals as $meal) {
                if ($meals != '') {
                    $meals = $meal . ',';
                }
                $meals = $meals . $meal;
            }
        }


        foreach ($request->file('image') as $pic) {
            if ($images != '') {
                $images = $images . ',';
            }
            $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
            $images = $images . $image_name;
            $pic->move(public_path('assets/hotel-photos'), $image_name);
        }

        $banner = time() . rand(1, 100) . '.' . $request->file('banner')->getClientOriginalExtension();
        $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);

        $room = Room::create([
            'name' => $request->name,
            'hotel_id' => $id,
            'max_adult' => $request->max_adult,
            'max_child' => $request->max_child,
            // 'has_meal' => $request->has_meal,
            // 'free_meal' => $request->free_meal,

            'has_meal' => $request->has_meal,
            'free_meal' => $request->free_meal,
            'meal_type' => $request->free_meal ? $meals : null,
            'meal_price' => $request->free_meal ? null : $request->meal_price,

            'prices' => $request->prices, // Store the prices as an array
            'banner' => $banner,
            'images' => $images,
            'terms' => $terms,
            'sups' => $sups,
            'meal_type' => $meals,
            'type' => $request->type,
            'description' => $request->description,
            'creation_date' => date('Y-m-d'),
        ]);

        return redirect()->back()->with('success', 'Hotel Added Successfully');
    }



    public function save2(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'description' => 'required',
            'terms' => 'nullable|array',
            'terms.*' => 'nullable', // If terms is an array, each item is nullable
            'sups' => 'nullable|array',
            'sups.*' => 'nullable', // If sups is an array, each item is nullable
            'meals' => 'nullable|array',
            'meals.*' => 'nullable', // If meals is an array, each item is nullable
            'type.*' => 'nullable', // If type is an array, each item is nullable
            'banner' => 'required',
            'has_meal' => 'nullable',
            'free_meal' => 'nullable',
            // 'meal_id' => 'required_if:free_meal,1', // Added validation for meal_id if free_meal is selected
            // 'meal_price' => 'required_if:free_meal,0', // Added validation for meal_price if free_meal is not selected
            'meal_price' => 'nullable', // Added validation for meal_price if free_meal is not selected
            'prices' => 'nullable|array', // Add the validation for the 'prices' attribute
            'prices.*' => 'nullable|numeric', // If prices is an array, each item should be numeric
        ]);

        $terms = '';
        $sups = '';
        $meals = '';
        $images = '';
        $hasMeal = $request->has('has_meal') ? true : false;

        if ($request->has('terms')) {
            $terms = implode(',', $request->terms);
        }

        if ($request->has('sups')) {
            $sups = implode(',', $request->sups);
        }

        if ($request->has('meals')) {
            $meals = implode(',', $request->meals);
        }
        if ($request->has('meal_price')) {
            $mealPrice = $request->input('meal_price');
        } else {
            $mealPrice = null; // or set a default value if necessary
        }

        // foreach ($request->file('image') as $pic) {
        //     $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
        //     $pic->move(public_path('assets/hotel-photos'), $image_name);
        //     $images[] = $image_name;
        // }
          foreach ($request->file('image') as $pic) {
            if ($images != '') {
                $images = $images . ',';
            }
            $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
            $images = $images . $image_name;
            $pic->move(public_path('assets/hotel-photos'), $image_name);
        }

        $banner = time() . rand(1, 100) . '.' . $request->file('banner')->getClientOriginalExtension();
        $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);

        $roomData = [
            'name' => $request->name,
            'hotel_id' => $id,
            'max_adult' => $request->max_adult,
            'max_child' => $request->max_child,
            'has_meal' => $hasMeal ,
            'free_meal' => $request->free_meal,

            'banner' => $banner,
            'price' => $request->price, // Store the prices as an array
            'images' =>  $images,
            'terms' => $terms,
            'sups' => $sups,
            'meal_price' => $mealPrice,
            'meal_type' => $meals,
            'type' => $request->type,
            'description' => $request->description,
            'creation_date' => date('Y-m-d'),
        ];

        $room = Room::create($roomData);

        return redirect()->back()->with('success', 'Room Added Successfully');
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
            'images' => implode(',', $images),
            'terms' => $terms,
            'sups' => $sups,
            // 'meal_price' => 0,
            'meal_price' => $mealPrice,
            'meal_type' => $meals,
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'creation_date' => now(),
            // 'creation_date' => date('Y-m-d'),
        ]);

        // $room = Room::create($roomData);

        return redirect()->back()->with('success', 'Room Added Successfully');
    }


















    public function index_api()
    {
        $attrs = HotelAttr::with('terms')->get();
        #dd($attrs);
        return response()->json(['data'=>$attrs,'error'=>''],200);

        // return view('hotels.add-hotel',compact('attrs'));
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
