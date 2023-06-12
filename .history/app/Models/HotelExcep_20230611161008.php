<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\Hotel;

class HotelExcep extends Model
{
    use HasFactory;
    protected $table = 'hotel_exceptions';
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
        'hotel_id',
        'start_date',
        'end_date',
        'new_price',
    ];
    protected $hidden = ['hotel_id'];





    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }





}
