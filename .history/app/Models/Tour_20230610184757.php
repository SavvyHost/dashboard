<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tours';
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
       'title',
       'category_id',
       'duration',
       'location',
       'tour_date',
       'min_people',
       'max_people',
       'latitude',
       'longtuide',
       'price',
       'sale_price',
       'created_at',
   ];

   public function category()
   {
    return $this->hasOne(TourCategory::class, 'id', 'category_id');
   }
}
