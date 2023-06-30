<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TourLocation extends Model
{
    protected $table = 'tour_locations';

    protected $fillable = [
        'tour_id',
        'location',
        'latitude',
        'longitude',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
