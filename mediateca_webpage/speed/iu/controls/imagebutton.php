<?php

require_once speed . iu . controls . control;


class ImageButton extends Control
{
	private $image = null;
	
	public function image($image = null)
	{
		if(is_null($image)) return $this->image;
		$this->image = $image;
	}
	
	public function __construct($image, $name, $value)
	{
		$this->image($image);
		$this->name($name);
		$this->value($value);
	}
	
	public function clicked()
	{
		return (array_key_exists($this->name(), $_POST) || 
				(array_key_exists($this->name()."_x", $_POST)));
	}
	
	public function render()
	{
		return self::IMAGEBUTTON($this->image(),$this->name(), $this->value());
	}
}
?>