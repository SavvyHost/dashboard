<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Http\Resources\Dashboard\CountryResource;
use App\Http\Resources\Dashboard\SupplierResource;
use App\Models\Country;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SupplierController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $suppliers = SupplierResource::collection( Supplier::all() );
        return $this->sendSuccess('Suppliers Found', compact('suppliers'));
    }
    
    public function create()
    {
        $countries = CountryResource::collection( Country::all() );
        
        return $this->sendSuccess('', compact('countries'));
    
    }
    
    public function store(StoreSupplierRequest $request)
    {
        try {
            $supplier = new Supplier();
            
            $supplier->name = $request->get('name');
            $supplier->country_id = $request->get('country_id');
            $supplier->address = $request->get('address');
            $supplier->phone = $request->get('phone');
            $supplier->email = $request->get('email');
            
            $supplier->save();
            
            $supplier = new SupplierResource( $supplier );
            return $this->sendSuccess('Supplier Saved', compact('supplier'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }
    
    public function show($supplier)
    {
        try {
            $supplier = Supplier::findOrFail( $supplier );
            $supplier = new SupplierResource( $supplier );
            return $this->sendSuccess('Supplier Found', compact('supplier'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Supplier Not Found', $e->getMessage());
        }
    }
    
    public function edit($supplier)
    {
        try {
            $supplier = Supplier::findOrFail( $supplier );
            $supplier = new SupplierResource( $supplier );
            $countries = CountryResource::collection( Country::all() );
            return $this->sendSuccess('Supplier Found', compact('supplier', 'countries'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Supplier Not Found', $e->getMessage(), 404);
        }
    }
    
    public function update(UpdateSupplierRequest $request, $supplier)
    {
        try {
            $supplier = Supplier::findOrFail( $supplier );
            
            $supplier->name = $request->get('name');
            $supplier->country_id = $request->get('country_id');
            $supplier->address = $request->get('address');
            $supplier->phone = $request->get('phone');
            $supplier->email = $request->get('email');
            
            $supplier->save();
            
            $supplier = new SupplierResource( $supplier );
            return $this->sendSuccess('Supplier Updated', compact('supplier'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
    
    public function destroy($supplier)
    {
        try {
            $supplier = Supplier::findOrFail( $supplier );
            $supplier->delete();
            return $this->sendSuccess('Supplier Deleted', []);
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
}
