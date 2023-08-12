<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\Dashboard\CurrencyResource;
use App\Http\Resources\Dashboard\DestinationResource;
use App\Http\Resources\Dashboard\HotelCategoryResource;
use App\Http\Resources\Dashboard\HotelResource;
use App\Http\Resources\Dashboard\SupplierResource;
use App\Http\Resources\Dashboard\ZoneResource;
use App\Models\Hotel;
use App\Models\HotelCategory;
use App\Models\Destination;
use App\Models\HotelImage;
use App\Models\Zone;
use App\Models\Currency;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HotelController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $hotels = HotelResource::collection(Hotel::all());
        return $this->sendSuccess('Hotels Found', compact('hotels'));
    }
    
    public function create()
    {
        $hotelCategories = HotelCategoryResource::collection(HotelCategory::all());
        $destinations = DestinationResource::collection(Destination::all());
        $zones = ZoneResource::collection(Zone::all());
        $currencies = CurrencyResource::collection(Currency::all());
        $suppliers = SupplierResource::collection(Supplier::all());
        
        return $this->sendSuccess('Hotels Found', compact('hotelCategories', 'destinations', 'zones', 'currencies', 'suppliers'));
    }
    
    public function store(StoreHotelRequest $request)
    {
        try {
            $hotel = new Hotel();
            
            $hotel->code = $request->get('code');
            $hotel->name = $request->get('name');
            $hotel->hotel_category_id = $request->get('hotel_category_id');
            $hotel->destination_id = $request->get('destination_id');
            $hotel->zone_id = $request->get('zone_id');
            $hotel->currency_id = $request->get('currency_id');
            $hotel->supplier_id = $request->get('supplier_id');
            $hotel->lat = $request->get('lat');
            $hotel->lng = $request->get('lng');
            $hotel->min_rate = $request->get('min_rate');
            $hotel->max_rate = $request->get('max_rate');
            
            if ($request->hasFile('banner')) {
                $hotel->banner = uploadImage($request->file('banner'), 'hotels-banners');
            }
            
            $hotel->save();

            $images = $request->get('images', []);
    
            foreach( $images as $image ) {
                $img = new HotelImage();
                $img->image = uploadImage($image, 'hotels-images');
                $img->hotel_id = $hotel->id;
            }
            
            $hotel = new HotelResource( $hotel );
            return $this->sendSuccess('Hotel Saved', compact('hotel'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }
    
    public function show($hotel)
    {
        try {
            $hotel = Hotel::findOrFail( $hotel );
            $hotel = new HotelResource( $hotel );
            return $this->sendSuccess('Hotel Found', compact('hotel'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Hotel Not Found', $e->getMessage());
        }
    }
    
    public function edit($hotel)
    {
        try {
            $hotel = Hotel::findOrFail( $hotel );
            
            $hotelCategories = HotelCategoryResource::collection(HotelCategory::all());
            $destinations = DestinationResource::collection(Destination::all());
            $zones = ZoneResource::collection(Zone::all());
            $currencies = CurrencyResource::collection(Currency::all());
            $suppliers = SupplierResource::collection(Supplier::all());
            
            return $this->sendSuccess('Hotel Found', compact('hotel', 'hotelCategories', 'destinations', 'zones', 'currencies', 'suppliers'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Hotel Not Found', 404);
        }
    }
    
    public function update(UpdateHotelRequest $request, $hotel)
    {
        try {
            $hotel = Hotel::findOrFail( $hotel );
            
            $hotel->code = $request->get('code');
            $hotel->name = $request->get('name');
            $hotel->hotel_category_id = $request->get('hotel_category_id');
            $hotel->destination_id = $request->get('destination_id');
            $hotel->zone_id = $request->get('zone_id');
            $hotel->currency_id = $request->get('currency_id');
            $hotel->supplier_id = $request->get('supplier_id');
            $hotel->lat = $request->get('lat');
            $hotel->lng = $request->get('lng');
            $hotel->min_rate = $request->get('min_rate');
            $hotel->max_rate = $request->get('max_rate');
    
            if ($request->hasFile('banner')) {
                $hotel->banner = uploadImage($request->file('banner'), 'hotels-banners');
            }
            
            $hotel->save();
    
            $images = $request->get('images', []);
    
            foreach( $images as $image ) {
                $img = new HotelImage();
                $img->image = uploadImage($image, 'hotels-images');
                $img->hotel_id = $hotel->id;
            }
            
            $hotel = new HotelResource( $hotel );
            return $this->sendSuccess('Hotel Updated', compact('hotel'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
    
    public function destroy($hotel)
    {
        try {
            $hotel = Hotel::findOrFail( $hotel );
            $hotel->delete();
            return $this->sendSuccess('Hotel Deleted', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Hotel Not Found', 404);
        }
    }
}
