<?php

require_once speed . iu . controls . control;

class LinkButton extends Control
{
	private $url = null;
	
	public function url($url = null)
	{
		if(is_null($url)) return $this->url;
		$this->url = $url;
	}
	
	public function __construct($url, $name, $value, $css=null, $id=null)
	{
		$this->name($name);
		$this->value($value);
		$this->url($url);
		$this->css($css);
		$this->id($id);
	}
	
	public function render()
	{
		return self::SUBMIT($this->name(), $this->value(), "link_btn");
	}
	
	
}

?>