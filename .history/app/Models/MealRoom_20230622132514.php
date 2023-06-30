<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealRoom extends Model
{
    protected $table = 'meal_room';
    public $timestamps = false;

    protected $fillable = [
        'room_id',
        'meal_id',
        // Add any additional columns if needed
    ];
}
