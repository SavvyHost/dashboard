<?php

namespace App\Http\Controllers\Dashboard\Hotel;

use Illuminate\Http\Request;
use App\Models\SurroundingsType;
use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SurroundingsTypeController extends Controller
{
    use APITrait;

    public function index()
    {
        $surroundings_types = SurroundingsType::all();
        return $this->sendSuccess('All surroundings types.', compact('surroundings_types'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required',]);

        try {
            $surroundings_type = SurroundingsType::create([
                'name' => $request->name,
            ]);
            return $this->sendSuccess('Category is created successfully', compact('surroundings_type'), 201);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Surroundings Type cann't stored because isn't uniqe.", [], 404);
        }
    }

    public function show($id)
    {
        try {
            $surroundings_type = SurroundingsType::findorFail($id);
            return $this->sendSuccess('Surroundings Type Found', compact('surroundings_type'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Surroundings Type Not Found', [], 404);
        }
    }


    public function update(Request $request, string $id)
    {
        $surroundings_type = SurroundingsType::findOrFail($id);
        $request->validate(['name' => 'required',]);

        $surroundings_type->update([
            'name' => $request->name,
        ]);
        return $this->sendSuccess('Surroundings Type is updated successfully.', compact('surroundings_type'));
    }

    public function destroy($id)
    {
        try {
            $surroundings_type = SurroundingsType::findOrFail($id);
            $surroundings_type->delete();
            return $this->sendSuccess('Surroundings Type deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Surroundings Type cann't deleted, it doesn't exist.", [], 404);
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        $deletedCount = SurroundingsType::whereIn('id', $ids)->delete();
        return $this->sendSuccess('Surroundings Types deleted successfully.', ['deleted_count' => $deletedCount]);
    }
}