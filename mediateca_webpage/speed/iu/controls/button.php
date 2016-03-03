<?php

require_once speed . iu . controls . control;

class Button extends Control
{
	protected $prefix = "BT";
	public function __construct($name, $action)
	{
		self::BUTTON($this->prefix.$name, $action);
	}
}

?>