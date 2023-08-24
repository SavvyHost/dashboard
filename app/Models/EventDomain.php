<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventDomain extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_event_domains');
    }
}