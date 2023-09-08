<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelPolicyRequest;
use App\Http\Requests\UpdateHotelPolicyRequest;
use App\Http\Resources\Dashboard\HotelPolicyResource;
use App\Models\HotelPolicy;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HotelPolicyController extends Controller
{
    use APITrait;

    public function index()
    {
        $hotelPolicies = HotelPolicyResource::collection(HotelPolicy::all());
        return $this->sendSuccess('Polices Found', compact('hotelPolicies'));
    }

    public function store(StoreHotelPolicyRequest $request)
    {
        $hotelPolicy = new HotelPolicy();

        $hotelPolicy->title = $request->get('title');
        $hotelPolicy->description = $request->get('description');
        $hotelPolicy->icon = uploadImage($request->file('icon'), 'hotel-policies');

        $hotelPolicy->save();

        $hotelPolicy = new HotelPolicyResource($hotelPolicy);

        return $this->sendSuccess('Policy Saved', compact('hotelPolicy'), 201);
    }

    public function show($hotelpolicy)
    {
        try {
            $hotelPolicy = HotelPolicy::findorFail($hotelpolicy);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Policy not Found', []);
        }
        $hotelPolicy = new HotelPolicyResource($hotelPolicy);

        return $this->sendSuccess('Policy Found', compact('hotelPolicy'));
    }

    public function edit($hotelpolicy)
    {
        try {
            $hotelPolicy = HotelPolicy::findorFail($hotelpolicy);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Policy not Found', []);
        }
        $hotelPolicy = new HotelPolicyResource($hotelPolicy);

        return $this->sendSuccess('Policy Found', compact('hotelPolicy'));
    }

    public function update(UpdateHotelPolicyRequest $request, $hotelpolicy)
    {
        try {
            $hotelPolicy = HotelPolicy::findorFail($hotelpolicy);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Policy not Found', []);
        }

        $hotelPolicy->title = $request->get('title');
        $hotelPolicy->description = $request->get('description');
        $hotelPolicy->icon = uploadImage($request->file('icon'), 'hotel-policies');
        $hotelPolicy->save();

        $hotelPolicy = new HotelPolicyResource($hotelPolicy);

        return $this->sendSuccess('Policy Saved', compact('hotelPolicy'));
    }

    public function destroy($hotelpolicy)
    {
        try {
            $hotelPolicy = HotelPolicy::findorFail($hotelpolicy);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Policy not Found', []);
        }

        $hotelPolicy->delete();
        return $this->sendSuccess('Policy Deleted', []);
    }
}