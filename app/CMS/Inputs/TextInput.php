<?php

namespace App\CMS\Inputs;

class TextInput extends HtmlInput
{
	public function __construct(string $section , string $name) {
		parent::__construct();
		$this->attributes['type'] = 'text';
		$this->attributes['name'] = $section . "[" .$name . "]";
		$this->attributes['id'] = $section . "_" .$name . "_id";
	}
	
	public function getTagName(): string
	{
		return 'input';
	}
	
	public function isVoidElement(): bool
	{
		return true;
	}
}