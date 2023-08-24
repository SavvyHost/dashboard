<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventEventDomain extends Model
{
    use HasFactory;
    protected $table = 'event_event_domains';
    protected $fillable = ['event_id', 'event_domain_id'];
}