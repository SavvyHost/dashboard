<?php

namespace App\CMS\Sections;

use App\Models\PageSection;
use App\Models\Section;

class TextSection implements ISection
{
	public function getName(): string
	{
		return 'text';
	}
	
	public function getInputs(): array
	{
		return [
//			'title' => [
//				'tag' => 'input',
//				'close-tag' => false,
//				'type' => 'text'
//
//			],
//			'text' => [
//				'tag' => 'textarea',
//				'close-tag' => true,
//				'type' => 'text',
//			]
		];
	}
	
	public function getContent(PageSection $section): array
	{
		return [
			'title' => $section->data['title'],
			'text' => $section->data['text']
		];
	}
	
	public function getParameters(): array
	{
		return array_keys($this->getInputs());
	}
	
	public function isIterable(): bool
	{
		return false;
	}
}