<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    
    public function hotels() {
        return $this->hasMany(Hotel::class);
    }
    
    public function country() {
        return $this->belongsTo(Country::class);
    }
}
