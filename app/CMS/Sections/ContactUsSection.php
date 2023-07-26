<?php

namespace App\CMS\Sections;

use App\CMS\Inputs\TextareaInput;
use App\CMS\Inputs\TextInput;
use App\Models\PageSection;

class ContactUsSection implements ISection
{
	
	public function getName(): string
	{
		return 'contact_us';
	}
	
	public function getInputs(): array
	{
		return [
			'title' => new TextInput($this->getName(), 'title'),
			'text' => new TextareaInput($this->getName(), 'text')
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