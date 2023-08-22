<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartRequest;
use App\Http\Requests\UpdatePartRequest;
use App\Http\Resources\Dashboard\PartResource;
use App\Models\Part;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PartController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $parts = PartResource::collection( Part::all() );
        
        return $this->sendSuccess('Parts Found', compact('parts'));
    }

    public function create()
    {
        //
    }

    public function store(StorePartRequest $request)
    {
        $parts = $request->all();
        
        $page = $parts['page'];
        unset($parts['page']);
        
        $result = [];
        foreach ($parts as $name => $content) {
            $part = new Part();
            $part->name = $name;
            $part->content = $content;
            $part->page = $page;
            
            $part->save();
            
            $result[] = $part;
        }
        
        $parts = PartResource::collection($result);
        
        return $this->sendSuccess('Parts Saved', compact('parts'));
    }

    public function show(Request $request, $page)
    {
        $parts = Part::where('page', $page)->get();
        $parts = PartResource::collection($parts);
        
        return $this->sendSuccess('Parts Found', compact('parts'));

    }

    public function edit(Request $request, $page)
    {
        $parts = Part::where('page', $page)->get();
        $parts = PartResource::collection($parts);
    
        return $this->sendSuccess('Parts Found', compact('parts'));
    }

    public function update(UpdatePartRequest $request)
    {
        $parts = $request->all();
        $page = $parts['page'];
        unset($parts['page']);
        $result = [];
        try {
            foreach ( $parts as $name => $content ) {
                $part = Part::where('name', $name)->where('page', $page)->firstorFail();
                $part->content = $content;
                $part->save();
                $result[] = $part;
            }
    
            $parts = PartResource::collection($result);
    
            return $this->sendSuccess('Parts Updated', compact('parts'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Part Not Found', []);
            
        }
    }

    public function destroy(Part $part)
    {
        $part->delete();
    
        return $this->sendSuccess('Part Deleted', []);
    
    }
}
