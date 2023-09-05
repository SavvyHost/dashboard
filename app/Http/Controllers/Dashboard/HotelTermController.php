<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelTermRequest;
use App\Http\Requests\UpdateHotelTermRequest;
use App\Http\Resources\HotelAttributeResource;
use App\Http\Resources\HotelTermResource;
use App\Models\HotelAttribute;
use App\Models\HotelTerm;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HotelTermController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $hotelTerms = HotelTermResource::collection( HotelTerm::all() );
        
        return $this->sendSuccess('Terms Found', compact('hotelTerms'));
    }

    public function create()
    {
        $hotelAttributes = HotelAttributeResource::collection(HotelAttribute::all());
        return $this->sendSuccess('Attributes Found', compact('hotelAttributes'));
    }

    public function store(StoreHotelTermRequest $request)
    {
        $hotelTerm = new HotelTerm();
        
        $hotelTerm->name = $request->get('name');
        $hotelTerm->image = uploadImage($request->file('image'), 'hotel-terms');
        $hotelTerm->hotel_attribute_id = $request->get('hotel_attribute_id');
        
        $hotelTerm->save();
        
        $hotelTerm = new HotelTermResource( $hotelTerm );
    
        return $this->sendSuccess('Term Created', compact('hotelTerm'), 201);
    }
    

    public function edit($hotelTerm)
    {
        try {
            $hotelTerm = new HotelTermResource( HotelTerm::findorFail( $hotelTerm ) );
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Term not Found', []);
        }
        
        return $this->sendSuccess('Term Found', compact('hotelTerm'));
    }

    public function update(UpdateHotelTermRequest $request, $hotelTerm)
    {
        try {
            $hotelTerm = new HotelTermResource( HotelTerm::findorFail( $hotelTerm ) );
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Term not Found', []);
        }
    
        $hotelTerm->name = $request->get('name');
        if ($request->file('image')) {
            $hotelTerm->image = uploadImage($request->file('image'), 'hotel-terms');
        }
        $hotelTerm->hotel_attribute_id = $request->get('hotel_attribute_id');
    
        $hotelTerm->save();
    
        $hotelTerm = new HotelTermResource( $hotelTerm );
    
        return $this->sendSuccess('Term Created', compact('hotelTerm'), 201);
    }

    public function destroy( $hotelTerm )
    {
        try {
            $hotelTerm = HotelTerm::findorFail( $hotelTerm );
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Term not Found', []);
        }
        
        $hotelTerm->delete();
        return $this->sendSuccess('Term Deleted', []);
    
    }
}
