<?php

require_once speed . iu . controls . control;
        
class TextField extends Control
{
	public function __construct($name, $value=null)
	{
		$this->name($name);
		$this->value($value);
		$this->process();
	}	
	
	private function process()
	{		
		if ((array_key_exists($this->name(), $_POST)) && is_null($this->value()))
		{
			$this->value($_POST[$this->name()]);
		}		
	}

	public function render()
	{
		return self::INPUTTEXT($this->name(), $this->value(), $this->name()."_textfield");
	}
		
        
        public function getValue()
        {
            return $this->value();
        }
}

?>