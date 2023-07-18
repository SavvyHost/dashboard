<?php

namespace App\CMS\Sections;

use App\Models\PageSection;
use App\Models\Section;

class HeroSection implements ISection
{
	
	public function getName(): string
	{
		return 'hero';
	}
	
	public function getInputs(): array
	{
		return [
			'hero' => [
				'tag' => 'textarea',
				'close-tag' => true,
				'type' => ''
			],
			'description' => [
				'tag' => 'input',
				'close-tag' => false,
				'type' => 'text'
			]
		];

	}
	
	public function getParameters(): array
	{
		return array_keys( $this->getInputs() );
	}
	
	public function getContent( PageSection $section ): array
	{
		return [
			'hero' => $section->data['hero'],
			'description' => $section->data['description']
		];
	}
	
	public function isIterable(): bool
	{
		return false;
	}
}