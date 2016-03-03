<?php
require_once speed . iu . controls . control;


class PasswordTextField extends Control
{
	public function __construct($name, $value)
	{
		$this->name($name);
		$this->value($value);
		$this->process();
	}
	
	public function restore_state()
	{
		if(array_key_exists($this->name(), $_SESSION))
		{
			$this->value($_SESSION[$this->name()]);
		}
	}
	
	public function save_state()
	{
			$_SESSION[$this->name()] = $this->value();

	}
	
	private function process()
	{
		
		if (array_key_exists($this->name(), $_POST))
		{
			$this->value($_POST[$this->name()]);
			$this->save_state();
		}
		
	}
	
	public function clear_cache()
	{
		if (array_key_exists($this->name(), $_SESSION))
		{
			unset($_SESSION[$this->name()]);
		}
	}
	
	public function render()
	{
		return self::INPUTPASSWORD($this->name(), $this->value(), $this->name()."_passfield");
	}
		
}

?>