<?php

require_once speed . iu . controls . control;

class Checkbox extends Control
{
	protected $prefix = "BT";
	public function __construct($name, $action)
	{
		self::CHECKBOX($name, $value, $selected);
	}
}

?>