<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelTerm extends Model
{
    use HasFactory;
    
    public function hotelAttribute() {
        return $this->belongsTo(HotelAttribute::class);
    }
}
