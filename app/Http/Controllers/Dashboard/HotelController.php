<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Zone;
use App\Models\Hotel;
use App\Models\Currency;
use App\Models\Supplier;
use App\Models\HotelImage;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\HotelCategory;
use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Dashboard\ZoneResource;
use App\Http\Resources\Dashboard\HotelResource;
use App\Http\Resources\Dashboard\CurrencyResource;
use App\Http\Resources\Dashboard\SupplierResource;
use App\Http\Resources\Dashboard\DestinationResource;
use App\Http\Resources\Dashboard\HotelCategoryResource;
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
        $currencies = CurrencyResource::collection(Currency::all());
        $cities = City::all();
        return $this->sendSuccess('Create hotel page.', compact('currencies', 'cities'));
    }

    public function store(StoreHotelRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'city_id' => 'exists:cities,id',
            'currency_id' => 'exists:currencies,id',
        ]);
        try {
            $hotel = new Hotel();

            $hotel->name = $request->get('name');
            $hotel->description = $request->get('description');
            $hotel->star_rate = $request->get('star_rate');;
            $hotel->currency_id = $request->get('currency_id');
            $hotel->lat = $request->get('lat');
            $hotel->lng = $request->get('lng');
            $hotel->city_id = $request->get('city_id');

            if ($request->hasFile('banner')) {
                $hotel->banner = uploadImage($request->file('banner'), 'hotels-banners');
            }
            $hotel->save();

            $images = $request->file('images', []);

            foreach ($images as $image) {
                $img = new HotelImage();
                $img->image = uploadImage($image, 'hotels-images');
                $img->hotel_id = $hotel->id;
                $img->save();
            }

            $hotel = new HotelResource($hotel);
            return $this->sendSuccess('Hotel Saved', compact('hotel'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }

    public function show($hotel)
    {
        try {
            $hotel = Hotel::findOrFail($hotel);
            $hotel = new HotelResource($hotel);
            return $this->sendSuccess('Hotel Found', compact('hotel'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Hotel Not Found', $e->getMessage());
        }
    }

    public function edit($hotel)
    {
        try {
            $hotel = Hotel::findOrFail($hotel);
            $hotel = new HotelResource($hotel);
            $currencies = CurrencyResource::collection(Currency::all());
            $cities = City::all();

            return $this->sendSuccess('Edit Hotel Page.', compact('hotel', 'currencies', 'cities'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Hotel Not Found', 404);
        }
    }

    public function update(UpdateHotelRequest $request, $hotel)
    {

        // try {
        //     $request->validate([
        //         'name' => 'required|string|max:200',
        //         'city_id' => 'exists:cities,id',
        //         'currency_id' => 'exists:currencies,id',
        //     ]);

        //     $hotel = Hotel::findOrFail($hotel);
        //     $hotel->update([
        //         'name' => $request->name,
        //         'description' => $request->description,
        //         'star_rate' => $request->star_rate,
        //         'currency_id' => $request->currency_id,
        //         'lat' => $request->lat,
        //         'star_rate' => $request->star_rate,
        //         'city_id' => $request->city_id,
        //         'lng' => $request->lng,
        //     ]);
        //     // $hotel->name = $request->get('name');
        //     // $hotel->description = $request->get('description');
        //     // $hotel->star_rate = $request->get('star_rate');;
        //     // $hotel->currency_id = $request->get('currency_id');
        //     // $hotel->lat = $request->get('lat');
        //     // $hotel->lng = $request->get('lng');
        //     // $hotel->city_id = $request->get('city_id');

        //     if ($request->hasFile('banner')) {
        //         $hotel->banner = uploadImage($request->file('banner'), 'hotels-banners');
        //     }
        //     $hotel->save();

        //     $images = $request->get('images', []);
        //     foreach ($images as $image) {
        //         $img = new HotelImage();
        //         $img->image = uploadImage($image, 'hotels-images');
        //         $img->hotel_id = $hotel->id;
        //     }

        //     $hotel = new HotelResource($hotel);
        //     return $this->sendSuccess('Hotel Updated', compact('hotel'));
        // } catch (ModelNotFoundException $e) {
        //     return $this->sendError('Error Found', $e->getMessage(), 404);
        // }
        return "hi";
    }

    public function destroy($hotel)
    {
        try {
            $hotel = Hotel::findOrFail($hotel);
            $hotel->delete();
            return $this->sendSuccess('Hotel Deleted', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Hotel Not Found', 404);
        }
    }

    public function terms(Request $request, $hotel)
    {
        try {
            $hotel = Hotel::findOrFail($hotel);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Hotel Not Found', 404);
        }

        $validator = Validator::make($request->all(), [
            'terms' => 'array',
            'terms.*' => 'exists:hotel_terms,id'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error Found', $validator->errors());
        }

        $hotel->hotel_terms()->sync($request->get('terms'));

        $hotel = new HotelResource($hotel);

        return $this->sendSuccess('Terms Updated', compact('hotel'));
    }
}