<?php

namespace App\CMS\Sections;

use App\CMS\Inputs\TextareaInput;
use App\CMS\Inputs\TextInput;
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
			'hero' => new TextInput($this->getName(), 'hero'),
			'description' => new TextareaInput($this->getName(), 'description')
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