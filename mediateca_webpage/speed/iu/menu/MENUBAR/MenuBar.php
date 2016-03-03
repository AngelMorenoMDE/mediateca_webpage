<?php
require_once SPEED.SPD.IU.CONTROLLERS.CONTROLLER;
/*
class MenuBar extends Controller
{
	public static $HORIZONTAL = 0;
	public static $VERTICAL = 1;
	
	protected $items = null;

	public function __construct($orientation, $name)
	{
		
	}
	
	public function items($items = null)
	{
		if(is_null($items))
			return $this->items;
		$this->items = $items;
	}

	public function add_item($img, $name, $url)
	{
		if(is_null($this->items()))
			$this->items = array(new MenuItem($img, $name, $url));
		else
			$this->items[sizeof($this->items())] = new MenuItem($img, $url, $name, $value);
	}

	public function render()
	{
		$rows = "";
			foreach ($this->items() as $item) 
			{
				$rows.=$item->render();
			}
		
		return HTML5::TABLE($rows);
	}
}
*/
?>