<?php

namespace App\Http\Controllers\Dashboard\Hotel;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelAttributeRequest;
use App\Http\Requests\UpdateHotelAttributeRequest;
use App\Http\Resources\HotelAttributeResource;
use App\Http\Resources\HotelTermResource;
use App\Models\HotelAttribute;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HotelAttributeController extends Controller
{
    use APITrait;

    public function index()
    {
        $hotelAttributes = HotelAttributeResource::collection(HotelAttribute::all());
        return $this->sendSuccess('Attributes Found', compact('hotelAttributes'));
    }

    public function store(StoreHotelAttributeRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
        ]);

        $hotelAttribute = HotelAttribute::create([
            'name' => $request->name,
        ]);
        $hotelAttribute = new HotelAttributeResource($hotelAttribute);
        return $this->sendSuccess('Attribute Saved', compact('hotelAttribute'), 201);
    }

    public function show($hotelAttribute)
    {
        try {
            $hotelAttribute = HotelAttribute::findOrFail($hotelAttribute);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Attribute not Found', []);
        }

        $hotelTerms = HotelTermResource::collection($hotelAttribute->hotelTerms);
        $hotelAttribute = new HotelAttributeResource($hotelAttribute);

        return $this->sendSuccess('Attribute Found', compact('hotelAttribute', 'hotelTerms'));
    }

    public function edit($hotelAttribute)
    {
        try {
            $hotelAttribute = HotelAttribute::findOrFail($hotelAttribute);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Attribute not Found', []);
        }

        $hotelAttribute = new HotelAttributeResource($hotelAttribute);
        return $this->sendSuccess('Attribute Found', compact('hotelAttribute'));
    }

    public function update(UpdateHotelAttributeRequest $request, $hotelAttribute)
    {
        try {
            $hotelAttribute = HotelAttribute::findOrFail($hotelAttribute);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Attribute not Found', []);
        }

        $request->validate([
            'name' => 'required|string|max:200',
            'city_id' => 'exists:cities,id',
            'currency_id' => 'exists:currencies,id',
        ]);

        $hotelAttribute->update([
            'name' => $request->name,
        ]);
        $hotelAttribute->save();

        $hotelAttribute = new HotelAttributeResource($hotelAttribute);

        return $this->sendSuccess('Attribute Saved', compact('hotelAttribute'));
    }

    public function destroy($hotelAttribute)
    {
        try {
            $hotelAttribute = HotelAttribute::findOrFail($hotelAttribute);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Attribute not Found', []);
        }
        $hotelAttribute->delete();
        return $this->sendSuccess('Attribute Deleted', []);
    }
}
