<?php

namespace App\CMS\Sections;

use App\Models\PageSection;
use App\Models\Section;

interface ISection {
	public function getName(): string;
	public function getInputs(): array;
	public function getParameters(): array;
	public function getContent(PageSection $section): array;
	public function isIterable(): bool;

}