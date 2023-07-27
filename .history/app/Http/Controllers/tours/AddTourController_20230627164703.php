<?php

namespace App\Http\Controllers\tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourCategory;
use App\Models\TourAttr;
use App\Models\TourType;
use App\Http\Resources\ToursResource;




class AddTourController extends Controller
{



    public function index()
    {
        $attrs = TourAttr::with('terms')->get();
        $categories = TourCategory::all();
        $types = TourType::all();
        return view('tours.add-tour',compact('categories','attrs','types'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'tour_title' => 'required',
            'category'  =>  'required',
            'tour_location' =>  'required',
            'tour_duration' =>  'required',
            'tour_price'    =>  'required',
            'tour_sale_price'   =>  'nullable',
            'tour_date' =>  'required',
            'type' =>  'required',
            'terms' =>  'nullable',
            'banner'    =>  'nullable',
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

        $locations = $request->input('locations', []);
        $latitudes = $request->input('latitudes', []);
        $longitudes = $request->input('longitudes', []);

        // $images = '';

        // if ($request->hasFile('image')) {
        //     $pics = $request->file('image');

        //     foreach ($pics as $pic) {
        //         if ($images != '') {
        //             $images = $images . ',';
        //         }

        //         $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
        //         $images = $images . $image_name;
        //         $pic->move(public_path('assets/hotel-photos'), $image_name);
        //     }
        // }

        // // $banner = time().rand(1,100).'.'.$request->file('banner')->getClientOriginalExtension();
        // // $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);

        // $banner = '';

        // if ($request->hasFile('banner')) {
        //     $bannerFile = $request->file('banner');
        //     $banner = time() . rand(1, 100) . '.' . $bannerFile->getClientOriginalExtension();
        //     $bannerFile->move(public_path('assets/hotel-photos'), $banner);
        // }


        $images = '';
    if($request->file('image')){
        foreach ($request->file('image') as $pic) {
            if ($images != '') {
                $images = $images . ',';
            }
            $image_name = time() . rand(1, 100) . '.' . $pic->getClientOriginalExtension();
            $images = $images . $image_name;
            $pic->move(public_path('assets/hotel-photos'), $image_name);
        }}
        if($request->file('banner')){
        $banner = time() . rand(1, 100) . '.' . $request->file('banner')->getClientOriginalExtension();
        $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);}


// Rest of your code

        $tour = Tour::create([
            'title' =>  $request->tour_title,
            'category_id'   =>  $request->category,
            'duration'  =>  $request->tour_duration,
            'min_people'    =>  $request->min_people,
            'max_people'    =>  $request->max_people,
            'location'  =>  $request->tour_location,
            'price' =>  $request->tour_price,
            'sale_price'    =>  $request->tour_sale_price,
            'tour_date' =>  $request->tour_date,
            'type' =>  $request->type,
            // 'longitude' =>  $request->longitude,
            // 'latitude' =>  $request->latitude,
            'banner'    =>  $request->file('banner'),
            'images'    =>  $images,
            'terms'     =>  $terms,
            'description'     =>  $request->description,
            'created_at'    =>  date('Y-m-d'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);
        return redirect()->back()->with('success','Tour Added Successfully');

    }



















    public function save_api(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|exists:tour_category,id',
            'duration' => 'required',
            'location' => 'required',
            'tour_date' => 'required|date',
            'min_people' => 'required',
            'max_people' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'price' => 'required',
            'sale_price' => 'nullable',
        ]);
        $tour = Tour::create([
            'title' =>  $request->title,
            'category_id'   =>  $request->category,
            'location'  =>  $request->location,
            'duration'  =>  $request->duration,
            'min_people'    =>  $request->min_people,
            'max_people'    =>  $request->max_people,
            'price' =>  $request->price,
            'sale_price'    =>  $request->sale_price,
            'tour_date' =>  $request->tour_date,
            'longitude' =>  $request->longitude,
            'latitude' =>  $request->latitude,
            'created_at'    =>  date('Y-m-d'),
        ]);
        $craeted= new ToursResource($tour);
        return response()->json(['data'=>$craeted,'error'=>''],200);
    }
}
