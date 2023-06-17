<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomAttr;

class RoomTerm extends Model
{
    use HasFactory;
    protected $table = 'room_terms';
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
        'attr_id',
        'name',
    ];


/**
 * Get the user that owns the RoomTerm
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function atts()
{
    return $this->belongsTo(RoomAttr::class, 'foreign_key', 'other_key');
}


}
