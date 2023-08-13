<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomDetailRequest;
use App\Http\Requests\UpdateRoomDetailRequest;
use App\Http\Resources\Dashboard\HotelResource;
use App\Http\Resources\Dashboard\RoomDetailResource;
use App\Http\Resources\Dashboard\RoomResource;
use App\Http\Resources\Dashboard\SupplierResource;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomDetail;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoomDetailController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $room_details = RoomDetailResource::collection( RoomDetail::all() );
        return $this->sendSuccess('Room Details Found', compact('room_details'));
    }
    
    public function create()
    {
        $rooms = RoomResource::collection( Room::all() );
        $hotels = HotelResource::collection( Hotel::all() );
        $suppliers = SupplierResource::collection( Supplier::all() );
        return $this->sendSuccess('Room Details Found', compact('rooms', 'hotels', 'suppliers'));
    }
    
    public function store(StoreRoomDetailRequest $request)
    {
        try {
            $room_detail = new RoomDetail();
            
            $room_detail->net = $request->get('net');
            $room_detail->cancellation_policy = $request->get('cancellation_policy');
            $room_detail->room_id = $request->get('room_id');
            $room_detail->hotel_id = $request->get('hotel_id');
            $room_detail->supplier_id = $request->get('supplier_id');
            $room_detail->rooms = $request->get('rooms');
            
            $room_detail->save();
            
            $room_detail = new RoomDetailResource($room_detail);
            return $this->sendSuccess('Room Detail Saved', compact('room_detail'));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }
    
    public function show($room_detail)
    {
        try {
            $room_detail = RoomDetail::findOrFail($room_detail);
            $room_detail = new RoomDetailResource($room_detail);
            return $this->sendSuccess('Room Detail Found', compact('room_detail'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Room Detail Not Found', $e->getMessage());
        }
    }
    
    public function edit($room_detail)
    {
        try {
            $room_detail = RoomDetail::findOrFail($room_detail);
    
            $rooms = RoomResource::collection( Room::all() );
            $hotels = HotelResource::collection( Hotel::all() );
            $suppliers = SupplierResource::collection( Supplier::all() );
            
            return $this->sendSuccess('Room Detail Found', compact('room_detail', 'rooms', 'hotels', 'suppliers'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Room Detail Not Found', 404);
        }
    }
    
    public function update(UpdateRoomDetailRequest $request, $room_detail)
    {
        try {
            $room_detail = RoomDetail::findOrFail($room_detail);
            
            $room_detail->net = $request->get('net');
            $room_detail->cancellation_policy = $request->get('cancellation_policy');
            $room_detail->room_id = $request->get('room_id');
            $room_detail->hotel_id = $request->get('hotel_id');
            $room_detail->supplier_id = $request->get('supplier_id');
            $room_detail->rooms = $request->get('rooms');
            
            $room_detail->save();
            
            return $this->sendSuccess('Room Detail Updated', new RoomDetailResource($room_detail));
        } catch (\Exception $e) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }
    
    public function destroy($room_detail)
    {
        try {
            $room_detail = RoomDetail::findOrFail($room_detail);
            $room_detail->delete();
            return $this->sendSuccess('Room Detail Deleted', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError('Room Detail Not Found', 404);
        }
    }
}

