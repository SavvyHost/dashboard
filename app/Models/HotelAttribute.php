<?php

namespace App\Models;

use App\Models\City;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function hotelTerms()
    {
        return $this->hasMany(HotelTerm::class);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }
    public function currency()
    {
        return $this->hasMany(Currency::class);
    }
}