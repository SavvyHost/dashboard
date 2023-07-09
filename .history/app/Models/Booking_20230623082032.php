<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
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
       'type',
       'Object_id',
       'title',
       'order_date',
       'status',
       'customer',
       'payment_method',
       'end_date',
       'start_date',
       'price',
       'total',
       'invoice_id',
   ];

   public function customer_details()
   {
    return $this->hasOne(User::class,'id','customer');
   }


   public function room()
{
    return $this->hasMany(Room::class, 'id', 'Object_id');
}


}
