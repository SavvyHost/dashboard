<?php

namespace App\Http\Controllers\hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelAttr;


class AddHotelController extends Controller
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
            'name' => 'required|string|max:255',
            'price' => 'required',
            'location' => 'required|string|max:255',
            'image' => 'nullable',
            'description'   =>  'required|string',
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
        $created = new HotelsResource($hotel);
        return response()->json(['data' => $created, 'error' => '', 'message' => 'Hotel Added Successfully'], 200);
    }
    public function saveold(Request $request)
    {
        $request->validate([
            'hotel_name' => 'required|string|max:255',
            'hotel_price' => 'required',
            'hotel_location' => 'required|string|max:255',
            'image' => 'nullable',
            'description'   =>  'required|string',
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



    public function save2(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'location' => 'required',
        'image' => 'nullable',
        'description' => 'required',
        'terms' => 'nullable',
        'banner' => 'required',
    ]);

    $terms = implode(',', $request->terms);

    $images = [];
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $pic) {
            $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('assets/hotel-photos'), $image_name);
            $images[] = $image_name;
        }
    }

    $banner = time() . rand(1, 100) . '.' . $request->file('banner')->getClientOriginalExtension();
    $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);

    $hotel = Hotel::create([
        'name' => $request->hotel_name,
        'location' => $request->hotel_location,
        'price' => $request->hotel_price,
        'banner' => $banner,
        'images' => implode(',', $images),
        'terms' => $terms,
        'description' => $request->description,
        'creation_date' => now(),
    ]);

    $craeted= new HotelsResource($hotel);
    return response()->json(['data'=>$craeted,'error'=>'','message'=>'Hotel Added Successfully'],200);
}


public function save3(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'location' => 'required',
        'image' => 'nullable',
        'description' => 'required',
        'terms' => 'nullable',
        'banner' => 'required',
    ]);

    $terms = '';
    if (!empty($request->terms)) {
        $terms = implode(',', $request->terms);
    }

    $images = [];
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $pic) {
            $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
            $pic->move(public_path('assets/hotel-photos'), $image_name);
            $images[] = $image_name;
        }
    }

    $banner = time() . rand(1, 100) . '.' . $request->file('banner')->getClientOriginalExtension();
    $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);

    $hotel = Hotel::create([
        'name' => $request->name,
        'location' => $request->location,
        'price' => $request->price,
        'banner' => $banner,
        'images' => implode(',', $images),
        'terms' => $terms,
        'description' => $request->description,
        'creation_date' => now(),
    ]);

    $created = new HotelsResource($hotel);
    return response()->json(['data' => $created, 'error' => '', 'message' => 'Hotel Added Successfully'], 200);
}



}
