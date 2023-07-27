<?php

namespace App\Models;
use Carbon\Carbon;

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
       'payment_status',
       'customer',
       'payment_method',
       'end_date',
       'start_date',
       'price',
       'currency_id',
       'total',
       'invoice_id',
       'confirm_id',
   ];

   public function customer_details()
   {
    return $this->hasOne(User::class,'id','customer');
   }


//    public function room()
// {
//     return $this->hasOne(Room::class, 'id', 'Object_id');
// }
public function room()
{
    return $this->belongsTo(Room::class, 'Object_id', 'id');
}





public function getNightsAttribute()
{
    $startDate = Carbon::parse($this->start_date);
    $endDate = Carbon::parse($this->end_date);

    return $startDate->diffInDays($endDate);
}



}
