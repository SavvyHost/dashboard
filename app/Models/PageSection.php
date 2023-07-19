<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PageSection extends Pivot
{
    use HasFactory;
	
	protected $table = 'page_section';
	
	protected $casts = [
		'data' => 'json',
	];
	
}
