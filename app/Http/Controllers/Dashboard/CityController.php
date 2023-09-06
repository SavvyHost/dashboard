<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CityController extends Controller
{
    use APITrait;

    public function index()
    {
        $cities = City::all();
        return $this->sendSuccess('All Cities.', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'country_id' => 'exists:apps_countries,id',
        ]);
        $city = City::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
        ]);
        return $this->sendSuccess('City is created successfully.', compact('city'), 201);
    }

    public function show($id)
    {
        try {
            $city = City::where('id', $id)->firstorFail();
            return $this->sendSuccess('City Found', compact('city'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('City Not Found', [], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $city = City::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('City not Found', []);
        }
        $request->validate([
            'name' => 'required|string|max:200',
            'country_id' => 'exists:apps_countries,id',
        ]);
        $city->update([
            'name' => $request->name,
            'country_id' => $request->country_id,
        ]);
        $city->save();
        return $this->sendSuccess('City Saved', compact('city'));
    }

    public function destroy($id)
    {
        try {
            $city = City::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('City not Found', []);
        }
        $city->delete();
        return $this->sendSuccess('City Deleted', []);
    }
}