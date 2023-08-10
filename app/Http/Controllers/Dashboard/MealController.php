<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Http\Resources\Dashboard\MealResource;
use App\Models\Meal;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MealController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $meals = MealResource::collection(Meal::all(['code', 'name']));
        return $this->sendSuccess('Meals Found', compact('meals'));
    }
    
    public function create()
    {
    
    }
    
    public function store(StoreMealRequest $request)
    {
        try {
            $meal = new Meal();
            
            $meal->code = $request->get('code');
            $meal->name = $request->get('name');
            
            $meal->save();
            
            $meal = new MealResource( $meal );
            return $this->sendSuccess('Meal Saved', compact('meal'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), $e->getCode());
        }
    }
    
    public function show($meal)
    {
        try {
            $meal = Meal::findOrFail( $meal );
            $meal = new MealResource( $meal );
            return $this->sendSuccess('Meal Found', compact('meal'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Meal Not Found', $e->getMessage());
        }
    }
    
    public function edit($meal)
    {
        try {
            $meal = Meal::findOrFail( $meal );
            $meal = new MealResource( $meal );
            return $this->sendSuccess('Meal Found', compact('meal'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Meal Not Found', $e->getMessage(), 404);
        }
    }
    
    public function update(UpdateMealRequest $request, $meal)
    {
        try {
            $meal = Meal::findOrFail( $meal );
            
            $meal->code = $request->get('code');
            $meal->name = $request->get('name');
            
            $meal->save();
            
            $meal = new MealResource( $meal );
            return $this->sendSuccess('Meal Updated', compact('meal'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
    
    public function destroy($meal)
    {
        try {
            $meal = Meal::findOrFail( $meal );
            $meal->delete();
            return $this->sendSuccess('Meal Deleted', []);
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage(), 404);
        }
    }
}
