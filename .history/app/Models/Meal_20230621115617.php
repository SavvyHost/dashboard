<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Room;

class Meal extends Model
{
    use HasFactory;

    protected $table = 'meals';

    protected $fillable = [
        'id',
        'name',
        'description',
    ];


    protected $primaryKey = 'id';


    public function room(){


        return belongsTo(Room::class);

    }






}
