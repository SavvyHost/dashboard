<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Http\Resources\Dashboard\DestinationResource;
use App\Models\Destination;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DestinationController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $destinations = DestinationResource::collection(Destination::all());
        return $this->sendSuccess('Destinations Found', compact('destinations'));
    }
    
    public function create()
    {
    
    }
    
    public function store(StoreDestinationRequest $request)
    {
        try {
            $destination = new Destination();
            
            $destination->code = $request->get('code');
            $destination->name = $request->get('name');
            
            $destination->save();
            
            $destination = new DestinationResource( $destination );
            return $this->sendSuccess('Destination Saved', compact('destination'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }
    
    public function show($destination)
    {
        try {
            $destination = Destination::findOrFail( $destination );
            $destination = new DestinationResource( $destination );
            return $this->sendSuccess('Destination Found', compact('destination'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Destination Not Found', $e->getMessage());
        }
    }
    
    public function edit($destination)
    {
        try {
            $destination = Destination::findOrFail( $destination );
            $destination = new DestinationResource( $destination );
            return $this->sendSuccess('Destination Found', compact('destination'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Destination Not Found', $e->getMessage(), 404);
        }
    }
    
    public function update(UpdateDestinationRequest $request, $destination)
    {
        try {
            $destination = Destination::findOrFail( $destination );
            
            $destination->code = $request->get('code');
            $destination->name = $request->get('name');
            
            $destination->save();
            
            $destination = new DestinationResource( $destination );
            return $this->sendSuccess('Destination Updated', compact('destination'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
    
    public function destroy($destination)
    {
        try {
            $destination = Destination::findOrFail( $destination );
            $destination->delete();
            return $this->sendSuccess('Destination Deleted', []);
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
}
