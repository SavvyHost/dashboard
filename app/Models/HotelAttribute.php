<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelAttribute extends Model
{
    use HasFactory;
    
    public function hotelTerms() {
        return $this->hasMany(HotelTerm::class);
    }
}
