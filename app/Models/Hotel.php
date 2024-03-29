<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'banner',
        'star_rate',
        'youtube_video',
        'latitude',
        'longitude',
        'city_id',
        'currency_id'
    ];
    public function hotel_category()
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

    public function hotel_images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function hotel_terms()
    {
        return $this->belongsToMany(HotelTerm::class);
    }
}