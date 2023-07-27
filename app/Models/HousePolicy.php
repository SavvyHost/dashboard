<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousePolicy extends Model
{
    use HasFactory;

    protected $table = 'house_policy';



    protected $fillable = [
        'id',
        'name',
        'description',
        'hotel_id',
    ];



    public function hotels()
    {


     return $this->belongsTo(Hotel::class,'hotel_id');

    }




}
