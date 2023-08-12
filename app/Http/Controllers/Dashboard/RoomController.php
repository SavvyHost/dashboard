<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Resources\Dashboard\HotelResource;
use App\Http\Resources\Dashboard\RoomResource;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomImage;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoomController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $rooms = RoomResource::collection( Room::all() );
        return $this->sendSuccess('Rooms Found', compact('rooms'));
    }
    
    public function create()
    {
        $hotels = HotelResource::collection(Hotel::all());
        return $this->sendSuccess('Rooms Found', compact('hotels'));
    }
    
    public function store( StoreRoomRequest $request )
    {
        try {
            $room = new Room();
            
            $room->code = $request->get('code');
            $room->name = $request->get('name');
            $room->state = $request->get('state');
            $room->hotel_id = $request->get('hotel_id');
            
            $room->save();
            
            $images = $request->get('images', []);
            
            foreach ( $images as $image ) {
                $img = new RoomImage();
                $img->image = uploadImage($image, 'rooms-images');
                $img->room_id = $room->id;
            }
            
            $room = new RoomResource($room);
            return $this->sendSuccess('Room Saved', compact('room'));
        } catch ( Exception $e ) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }
    
    public function show( $room )
    {
        try {
            $room = Room::findOrFail($room);
            $room = new RoomResource($room);
            return $this->sendSuccess('Room Found', compact('room'));
        } catch ( ModelNotFoundException $e ) {
            return $this->sendError('Room Not Found', $e->getMessage());
        }
    }
    
    public function edit( $room )
    {
        try {
            $room = Room::findOrFail( $room );
            $room = new RoomResource( $room );
            
            $hotels = HotelResource::collection( Hotel::all() );
            
            return $this->sendSuccess('Room Found', compact('room', 'hotels'));
        } catch ( ModelNotFoundException $e ) {
            return $this->sendError('Room Not Found', 404);
        }
    }
    
    public function update( UpdateRoomRequest $request, $room )
    {
        try {
            $room = Room::findOrFail($room);
            
            $room->code = $request->get('code');
            $room->name = $request->get('name');
            $room->state = $request->get('state');
            $room->hotel_id = $request->get('hotel_id');
            
            $room->save();
            
            $images = $request->get('images', []);
            
            foreach ( $images as $image ) {
                $img = new RoomImage();
                $img->image = uploadImage($image, 'rooms-images');
                $img->room_id = $room->id;
            }
            
            $room = new RoomResource($room);
            return $this->sendSuccess('Room Updated', compact('room'));
        } catch ( Exception $e ) {
            return $this->sendError('Error Found', $e->getMessage());
        }
    }
    
    public function destroy( $room )
    {
        try {
            $room = Room::findOrFail($room);
            $room->delete();
            return $this->sendSuccess('Room Deleted', []);
        } catch ( ModelNotFoundException $e ) {
            return $this->sendError('Room Not Found', 404);
        }
    }
}

