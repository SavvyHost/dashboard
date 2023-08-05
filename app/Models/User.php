<?php

namespace App\Models;

use App\Models\Booking;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
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
        'name',
        'username',
        'status',
        'avatar',
        'email',
        'phone',
        'password',
        'gender',
        'country_id',
        'bio',
        'role_id',
        'created_at',
        'updated_at',
        'type',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function Role()
    {
        return $this->role_id;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer', 'id');
    }
}
