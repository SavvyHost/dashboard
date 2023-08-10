<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo(HotelCategory::class);
    }
    
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    
    public function images() {
        return $this->hasMany(HotelImage::class);
    }
}
