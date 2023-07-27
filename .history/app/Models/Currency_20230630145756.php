<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';

    protected $primaryKey = 'currency_id';

    public $timestamps = false;

    protected $fillable = [
        'currency_id',
        'currency_name',
    ];
}
