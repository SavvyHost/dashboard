<?php

namespace App\CMS\Sections;

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
			'question' => [
				'tag' => 'input',
				'close-tag' => false,
				'type' => 'text'
			
			],
			'answer' => [
				'tag' => 'textarea',
				'close-tag' => true,
				'type' => 'text',
			]
		];
	}
	
	public function getParameters(): array
	{
		return array_keys($this->getInputs());
	}
	
	public function getContent( Section $section ): array
	{
		return $section->data;
	}
	
	public function isIterable(): bool
	{
		return true;
	}
}