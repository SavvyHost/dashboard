<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'decription',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
