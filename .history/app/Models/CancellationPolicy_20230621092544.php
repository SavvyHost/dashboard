<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancellationPolicy extends Model
{
    use HasFactory;
    protected $table = 'hotel_cancellation';

    protected $fillable = [
        'name',
        'days_before_checkin',
        'refund_percentage',
    ];
}
