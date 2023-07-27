<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\RoomAttr;
use App\Http\Resources\HotelsResource;



class AddRoomController extends Controller
{


    public function index()
    {
        $attrs = HotelAttr::with('terms')->get();
        #dd($attrs);
        return view('hotels.add-hotel',compact('attrs'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'hotel_name' => 'required',
            'hotel_price' => 'required',
            'hotel_location' => 'required',
            'image' => 'nullable',
            'description'   =>  'required',
            'terms' =>  'nullable',
            'banner'    =>  'required',
        ]);
        $terms = '';
        $images = '';
        #dd($request->image);
        foreach ($request->terms as $term)
        {
            if($terms != '')
            {
                $terms = $terms.',';
            }
            $terms = $terms.$term;
        }
        foreach($request->file('image') as $pic)
        {
            if($images != '')
            {
                $images = $images.',';
            }
            $image_name = time().rand(1,100).'.'.$pic->getClientOriginalExtension();
            $images = $images.$image_name;
            $pic->move(public_path('assets/hotel-photos'), $image_name);
        }
        $banner = time().rand(1,100).'.'.$request->file('banner')->getClientOriginalExtension();
        $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);
        $hotel = Hotel::create([
            'name'  =>  $request->hotel_name,
            'location'  =>  $request->hotel_location,
            'price' =>  $request->hotel_price,
            'banner'    =>  $banner,
            'images'    =>  $images,
            'terms'     =>  $terms,
            'description'   =>  $request->description,
            'creation_date' =>  date('Y-m-d'),
        ]);
        return redirect()->back()->with('success','Hotel Added Successfully');
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
