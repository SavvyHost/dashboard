<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
	
	protected $casts = [
		'data' => 'json',
	];
	
	public function page() {
		return $this->belongsTo(Page::class);
	}
	
	public function template() {
		return $this->belongsTo(Template::class);
	}
	
	public function getBodyAttribute() {
		$template_body = $this->template->body;
		$template_parameters = $this->template->parameters;
		$values = json_decode( $this->values );
		
		foreach( json_decode( $template_parameters) as $parameter) {
			$template_body = str_replace($parameter, $values->$parameter, $template_body);
		}
		
		return json_decode( $template_body );
	}
}
