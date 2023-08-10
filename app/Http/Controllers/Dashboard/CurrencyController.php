<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Http\Resources\Dashboard\CurrencyResource;
use App\Models\Currency;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CurrencyController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $currencies = CurrencyResource::collection( Currency::all() );
        return $this->sendSuccess('Currencies Found', compact('currencies'));
    }

    public function create()
    {
    
    }

    public function store(StoreCurrencyRequest $request)
    {
        try {
            $currency = new Currency();
            
            $currency->code = $request->get('code');
            $currency->name = $request->get('name');
            
            $currency->save();
            
            $currency = new CurrencyResource( $currency );
            return $this->sendSuccess('Currency Saved', compact('currency'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), $e->getCode());
        }
    }
    
    public function show($currency)
    {
        try {
            $currency = Currency::findorFail( $currency );
            $currency = new CurrencyResource( $currency );
            return $this->sendSuccess('Currency Found', compact('currency'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Currency Not Found', $e->getMessage());
        }
    }

    public function edit($currency)
    {
        try {
            $currency = Currency::findorFail( $currency );
            $currency = new CurrencyResource( $currency );
            return $this->sendSuccess('Currency Found', compact('currency'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Currency Not Found', $e->getMessage(), 404);
        }
    }

    public function update(UpdateCurrencyRequest $request, $currency)
    {
        try {
            $currency = Currency::findorFail( $currency );
    
            $currency->code = $request->get('code');
            $currency->name = $request->get('name');
        
            $currency->save();
        
            $currency = new CurrencyResource( $currency );
            return $this->sendSuccess('Currency Updated', compact('currency'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }

    public function destroy($currency)
    {
        try {
            $currency = Currency::findorFail( $currency );
            $currency->delete();
            return $this->sendSuccess('Currency Deleted', []);
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
}
