<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\HousePolicy;
class Hotel extends Model
{
    use HasFactory;

   protected $table = 'hotels';
   /**
    * The primary key associated with the table.
    *
    * @var string
    */
   protected $primaryKey = 'id';
   /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
   public $timestamps = false;
   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'id',
       'name',
       'price',
       'location',
       'creation_date',
       'images',
       'banner',
       'description',
       'terms',
   ];
   public function exceptions()
   {
        return $this->hasMany(HotelExcep::class,'hotel_id','id');
   }

   public function rooms()
   {
        return $this->hasMany(Room::class,'hotel_id','id');
   }
   public function policies()
   {
        return $this->hasMany(HousePolicy::class,'hotel_id','id');
   }






}
