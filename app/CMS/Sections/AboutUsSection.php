<?php

namespace App\CMS\Sections;

use App\CMS\Inputs\TextInput;
use App\Models\PageSection;
use App\Models\Section;

class AboutUsSection implements ISection
{
	
	public function getName(): string
	{
		return 'about_us';
	}
	
	public function getInputs(): array
	{
		return [
			'title' => new TextInput($this->getName() , 'title'),
//			'text' => new Textarea('text')
		];
	}
	
	public function getParameters(): array
	{
		return array_keys($this->getInputs());
	}
	
	public function getContent( PageSection $section ): array
	{
		return [
			'title' => $section->data['title'],
			'text' => $section->data['text']
		];
	}
	
	public function isIterable(): bool
	{
		return false;
	}
}