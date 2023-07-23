<?php

namespace App\CMS\Inputs;

class TextareaInput extends HtmlInput
{
	public function __construct(string $section , string $name) {
		parent::__construct();
		$this->attributes['name'] = $section . "[" .$name . "]";
		$this->attributes['id'] = $section . "_" .$name . "_id";
	}
	
	public function getTagName(): string
	{
		return 'textarea';
	}
	
	public function isVoidElement(): bool
	{
		return false;
	}
}