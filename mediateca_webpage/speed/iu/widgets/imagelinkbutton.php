<?php


require_once speed . iu . controls . control;
require_once speed . iu . controls . linkbutton;
require_once speed . iu . controls . imagebutton;

class ImageLinkButton extends Control
{
	protected $img = null;
	protected $url = null;
	protected $link_ctrl = null;
	protected $imgbtn_ctrl = null;
	
	public function img($img = null)
	{
		if(is_null($img)) return $this->img;
		$this->img = $img;
	}
	
	public function url($url = null)
	{
		if(is_null($url)) return $this->url;
		$this->url = $url;
	}
	
	public function link_ctrl($link_ctrl = null)
	{
		if(is_null($link_ctrl)) return $this->link_ctrl;
		$this->link_ctrl = $link_ctrl;
	}
	
	public function imgbtn_ctrl($imgbtn_ctrl = null)
	{
		if(is_null($imgbtn_ctrl)) return $this->imgbtn_ctrl;
		$this->imgbtn_ctrl = $imgbtn_ctrl;
	}
	
	public function __construct($img, $url, $name, $value)
	{		
		$this->img($img);
		$this->url($url);
		$this->name($name."_lnkbtn");
		$this->value($value);
		$this->process();
		$this->link_ctrl(new LinkButton($this->url(), $this->name(), $this->value()));
		$this->imgbtn_ctrl(new ImageButton($this->img(), $this->name(), $this->value()));
	}
	
	public function process()
	{
		if ((array_key_exists($this->name(), $_POST)) || (array_key_exists($this->name()."_x", $_POST)))
                {
                    header ("Location: ".$this->url());
                }
	}
	
	public function clicked()
	{
		if ((array_key_exists($this->name(), $_POST)) || (array_key_exists($this->name()."_x", $_POST)))
			return true;
		else return false;
	}
	
	public function render()
	{
		return self::C3ROW($this->imgbtn_ctrl()->render(), $this->link_ctrl()->render());
	}
}