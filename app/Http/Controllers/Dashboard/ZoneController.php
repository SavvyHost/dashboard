<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreZoneRequest;
use App\Http\Requests\UpdateZoneRequest;
use App\Http\Resources\Dashboard\ZoneResource;
use App\Models\Zone;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ZoneController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $zones = ZoneResource::collection(Zone::all());
        return $this->sendSuccess('Zones Found', compact('zones'));
    }
    
    public function create()
    {
    
    }
    
    public function store(StoreZoneRequest $request)
    {
        try {
            $zone = new Zone();
            
            $zone->code = $request->get('code');
            $zone->name = $request->get('name');
            
            $zone->save();
            
            $zone = new ZoneResource( $zone );
            return $this->sendSuccess('Zone Saved', compact('zone'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }
    
    public function show($zone)
    {
        try {
            $zone = Zone::findOrFail( $zone );
            $zone = new ZoneResource( $zone );
            return $this->sendSuccess('Zone Found', compact('zone'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Zone Not Found', $e->getMessage());
        }
    }
    
    public function edit($zone)
    {
        try {
            $zone = Zone::findOrFail( $zone );
            $zone = new ZoneResource( $zone );
            return $this->sendSuccess('Zone Found', compact('zone'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Zone Not Found', $e->getMessage(), 404);
        }
    }
    
    public function update(UpdateZoneRequest $request, $zone)
    {
        try {
            $zone = Zone::findOrFail( $zone );
            
            $zone->code = $request->get('code');
            $zone->name = $request->get('name');
            
            $zone->save();
            
            $zone = new ZoneResource( $zone );
            return $this->sendSuccess('Zone Updated', compact('zone'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
    
    public function destroy($zone)
    {
        try {
            $zone = Zone::findOrFail( $zone );
            $zone->delete();
            return $this->sendSuccess('Zone Deleted', []);
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
}
