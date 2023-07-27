<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Meal;

class Room extends Model
{
    use HasFactory;

   protected $table = 'rooms';
   /**
    * The primary key associated with the table.
    *
    * @var string
    */
//    protected $primaryKey = 'id';
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
       'hotel_id',
       'name',
       'price',
       'max_adult',
       'max_child',
       'creation_date',
       'images',
       'banner',
       'description',
       'terms',
       'type',
       'has_meal',
       'free_meal',
       'meal_type',
       'meal_price',
       'sups',
   ];

   public function exceptions()
   {
        return $this->hasMany(RoomExcep::class,'room_id','id');
   }


   public function hotels()
   {


    return $this->belongsTo(Hotel::class,'hotel_id');

   }

   public function types()
   {
       return $this->hasMany(RoomType::class, 'id', 'type');
   }
//    public function meals()
//    {
//        return $this->belongstoMany(Meal::class, 'id', 'meal_type');
//    }
//    public function meals()
//    {
//        return $this->hasMany(Meal::class, 'id', 'meal_type');
//    }

   public function meals()
   {
       return $this->belongsToMany(Meal::class, 'meal_room', 'room_id', 'meal_id');
   }




   public function bookings()
{
    return $this->hasMany(Booking::class,'Object_id', 'id');
}




}
