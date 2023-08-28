<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SectionController extends Controller
{
    use APITrait;
    public function index()
    {
        $sections = Section::all();
        return $this->sendSuccess('Sections Found', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required',]);

        $section = Section::create([
            'name' => $request->name,
        ]);
        return $this->sendSuccess('Section is created successfully', compact('section'), 201);
    }
    public function update(Request $request, string $id)
    {
        try {
            $section = Section::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Section Not Exist", [], 404);
        }
        $request->validate(['name' => 'required',]);
        $section->update([
            'name' => $request->name,
        ]);
        return $this->sendSuccess('Section is updated successfully.', compact('section'));
    }

    public function destroy(string $id)
    {
        try {
            $section = Section::findorFail($id);
            $section->delete();
            return $this->sendSuccess('Section deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Section Not Found", [], 404);
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        $deletedCount = Section::whereIn('id', $ids)->delete();
        return $this->sendSuccess('Sections deleted successfully.', ['deleted_count' => $deletedCount]);
    }
}
