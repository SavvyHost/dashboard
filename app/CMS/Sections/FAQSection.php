<?php

namespace App\CMS\Sections;

use App\CMS\Inputs\TextareaInput;
use App\CMS\Inputs\TextInput;
use App\Models\PageSection;
use App\Models\Section;

class FAQSection implements ISection
{
	
	public function getName(): string
	{
		return 'faq';
	}
	
	public function getInputs(): array
	{
		return [
			'question' => new TextInput($this->getName(), 'question'),
			'answer' => new TextareaInput($this->getName(), 'answer')
		];
	}
	
	public function getParameters(): array
	{
		return array_keys($this->getInputs());
	}
	
	public function getContent( PageSection $section ): array
	{
		return $section->data;
	}
	
	public function isIterable(): bool
	{
		return true;
	}
}