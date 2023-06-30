<?php

namespace App\Http\Controllers\rooms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;
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
        return view('hotels.hotel-rooms-add',compact('attrs','types','id','sups'));
    }

    // public function indexmore($id)
    // {
        // $hotel = Hotel::with('rooms')->find($id);
        // #dd($terms);
        // return view('hotels.hotel-rooms-add',compact('hotel'));
    // }


    public function save(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'description' => 'required',
            'terms' => 'nullable|array',
            'terms.*' => 'nullable', // If terms is an array, each item is nullable
            'sups' => 'nullable|array',
            'sups.*' => 'nullable', // If terms is an array, each item is nullable
            'types.*' => 'nullable', // If terms is an array, each item is nullable
            'banner' => 'required',
        ]);

        $terms = '';
        $types = '';
        $sups = '';
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
        if ($request->has('types')) {
            foreach ($request->types as $type) {
                if ($types != '') {
                    $types = $types . ',';
                }
                $types = $types . $types;
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
            'price' => $request->price,
            'banner' => $banner,
            'images' => $images,
            'terms' => $terms,
            'types' => $types,
            'type' => 1,
            'description' => $request->description,
            'creation_date' => date('Y-m-d'),
        ]);

        return redirect()->back()->with('success', 'Hotel Added Successfully');
    }


    // public function save(Request $request,$id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'image' => 'nullable',
    //         'description'   =>  'required',
    //         'terms' =>  'nullable',
    //         'banner'    =>  'required',
    //     ]);
    //     $terms = '';
    //     $images = '';
    //     #dd($request->image);
    //     foreach ($request->terms as $term)
    //     {
    //         if($terms != '')
    //         {
    //             $terms = $terms.',';
    //         }
    //         $terms = $terms.$term;
    //     }
    //     foreach($request->file('image') as $pic)
    //     {
    //         if($images != '')
    //         {
    //             $images = $images.',';
    //         }
    //         $image_name = time().rand(1,100).'.'.$pic->getClientOriginalExtension();
    //         $images = $images.$image_name;
    //         $pic->move(public_path('assets/hotel-photos'), $image_name);
    //     }
    //     $banner = time().rand(1,100).'.'.$request->file('banner')->getClientOriginalExtension();
    //     $request->file('banner')->move(public_path('assets/hotel-photos'), $banner);
    //     $room = Room::create([
    //         'name'  =>  $request->name,
    //         'hotel_id'  =>  $id,
    //         'max_adult'  =>  $request->max_adult,
    //         'max_child'  =>  $request->max_child,
    //         'price' =>  $request->price,
    //         'banner'    =>  $banner,
    //         'images'    =>  $images,
    //         'terms'     =>  1,
    //         'type'     =>  1,
    //         'description'   =>  $request->description,
    //         'creation_date' =>  date('Y-m-d'),



    //     ]);
    //     return redirect()->back()->with('success','Hotel Added Successfully');
    // }




















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
