<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApiProviderRequest;
use App\Http\Requests\UpdateApiProviderRequest;
use App\Http\Resources\Dashboard\ApiProviderResource;
use App\Models\ApiProvider;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiProviderController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $providers = ApiProviderResource::collection( ApiProvider::all() );
        return $this->sendSuccess('Providers Found', compact('providers'));
    }

    public function store(StoreApiProviderRequest $request)
    {
        $apiProvider = new ApiProvider();
        $apiProvider->name = $request->get('name');
        $apiProvider->api_key = $request->get('api_key');
        $apiProvider->secret_key = $request->get('secret_key');
        $apiProvider->save();
        
        $apiProvider = new ApiProviderResource($apiProvider);
        
        return $this->sendSuccess('Provider Created', compact('apiProvider'), 201);
    }

    public function edit($apiprovider)
    {
        try {
            $provider = new ApiProviderResource( ApiProvider::findorFail( $apiprovider ) );
            return $this->sendSuccess('Provider Found', compact('provider'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Provider Not Found', [], 404);
        }
    }

    public function update(UpdateApiProviderRequest $request, $apiprovider)
    {
        try {
            $apiProvider = ApiProvider::findOrFail($apiprovider);
        
            $apiProvider->name = $request->get('name');
            $apiProvider->api_key = $request->get('api_key');
            $apiProvider->secret_key = $request->get('secret_key');
        
            $apiProvider->save();
        
            $apiProvider = new ApiProviderResource($apiProvider);
            return $this->sendSuccess('Api Provider Updated', compact('apiProvider'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }

    public function destroy($apiprovider)
    {
        try {
            $apiprovider = ApiProvider::findOrFail($apiprovider);
            $apiprovider->delete();
            return $this->sendSuccess('Provider deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Provider Not Found.", [], 404);
        }
    }
}
