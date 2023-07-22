<?php

namespace App\CMS\Inputs;

abstract class HtmlInput
{
	protected array $attributes;
	private string $content;
	
	public function __construct() {
		$this->attributes['class'] = 'form-input';
		$this->content = '';
	}
	
	abstract public function getTagName(): string;
	
	abstract public function isVoidElement(): bool;
	
	public function getHtmlText($value = ""): string {
		$this->attributes['value'] = $value;
		if($this->isVoidElement()) {
			return $this->getVoidElementText();
		} else {
			return $this->getContainerElementText();
		}
	}
	
	private function getVoidElementText(): string {
		return "<" . $this->getTagName() . " " . $this->getAttributesText() . ">";
	}
	
	private function getContainerElementText(): string {
		return "<" . $this->getTagName() . " " . $this->getAttributesText() . ">" . $this->getContent() . "</" . $this->getTagName() . ">";
	}
	
	private function getContent() {
		return $this->content;
	}
	
	protected function setContent(string $content) {
		$this->content = $content;
	}
	
	private function getAttributesText(): string {
		$text = "";
		
		foreach ($this->getAttributes() as $key => $value) {
			$text .= $key . "=\"" . $value . "\" ";
		}
		
		return $text;
	}
	
	public function setAttributes(array $attributes) {
		$this->attributes = $attributes;
	}
	
	public function getAttributes(): array {
		return $this->attributes;
	}
}