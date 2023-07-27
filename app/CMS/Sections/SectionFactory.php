<?php

namespace App\CMS\Sections;

class SectionFactory
{
	public function getSection( $section ): ISection {
		$name = strtolower($section);
		switch ($name) {
			case "text":
				return new TextSection();
				
			case 'faq':
				return new FAQSection();
				
			case 'hero':
				return new HeroSection();
				
			case 'about_us':
				return new AboutUsSection();
				
			case 'contact_us':
				return new ContactUsSection();
		}
	}
	
}