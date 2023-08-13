<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{
    use HasFactory;
    
    protected $casts = [
        'cancellation_policy' => 'json',
    ];
    
    public function room() {
        return $this->belongsTo(Room::class);
    }
    
    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
    
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
