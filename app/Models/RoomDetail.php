<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{
    use HasFactory;
    
    public function room() {
        return $this->belongsTo(Room::class);
    }
    
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
