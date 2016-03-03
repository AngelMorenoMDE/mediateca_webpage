<?php

require_once speed . iu . controls . control;

class TextAreaField extends Control
{

	public function __construct($name, $value=null)
	{
		$this->name($name);
		$this->value($value);
		$this->process();
	}
	
	
	private function process()
	{
		
		if (array_key_exists($this->name(), $_POST))
		{
			$this->value($_POST[$this->name()]);
		}
		
	}
	
	public function render()
	{
		return self::TEXTAREA($this->name(), $this->value());
	}
	
}

?>