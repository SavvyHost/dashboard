<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelCategoryRequest;
use App\Http\Requests\UpdateHotelCategoryRequest;
use App\Http\Resources\Dashboard\HotelCategoryResource;
use App\Models\HotelCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HotelCategoryController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $hotelCategories = HotelCategoryResource::collection(HotelCategory::all(['code', 'name']));
        return $this->sendSuccess('Hotel Categories Found', compact('hotelCategories'));
    }
    
    public function create()
    {
    
    }
    
    public function store(StoreHotelCategoryRequest $request)
    {
        try {
            $hotel_category = new HotelCategory();
            
            $hotel_category->code = $request->get('code');
            $hotel_category->name = $request->get('name');
            
            $hotel_category->save();
            
            $hotel_category = new HotelCategoryResource( $hotel_category );
            return $this->sendSuccess('Hotel Category Saved', compact('hotel_category'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }
    
    public function show($hotel_category)
    {
        try {
            $hotel_category = HotelCategory::findOrFail( $hotel_category );
            $hotel_category = new HotelCategoryResource( $hotel_category );
            return $this->sendSuccess('Hotel Category Found', compact('hotel_category'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Hotel Category Not Found', $e->getMessage());
        }
    }
    
    public function edit($hotel_category)
    {
        try {
            $hotel_category = HotelCategory::findOrFail( $hotel_category );
            $hotel_category = new HotelCategoryResource( $hotel_category );
            return $this->sendSuccess('Hotel Category Found', compact('hotel_category'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Hotel Category Not Found', $e->getMessage(), 404);
        }
    }
    
    public function update(UpdateHotelCategoryRequest $request, $hotel_category)
    {
        try {
            $hotel_category = HotelCategory::findOrFail( $hotel_category );
            
            $hotel_category->code = $request->get('code');
            $hotel_category->name = $request->get('name');
            
            $hotel_category->save();
            
            $hotel_category = new HotelCategoryResource( $hotel_category );
            return $this->sendSuccess('Hotel Category Updated', compact('hotel_category'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
    
    public function destroy($hotel_category)
    {
        try {
            $hotel_category = HotelCategory::findOrFail( $hotel_category );
            $hotel_category->delete();
            return $this->sendSuccess('Hotel Category Deleted', []);
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
}
