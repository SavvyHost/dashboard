<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
	
	public function sections() {
		return $this->belongsToMany(Section::class)->using(PageSection::class)->withPivot(['id', 'data'])->orderBy('page_section.id');
	}
}
