<?php

require_once speed . iu . controls . control;
class SideBar extends Control
{
	protected $items = array();
	
	protected function items($items = null)
	{
		if (is_null($items)) return $this->items;
		$this->items = $items;
	}
	
	protected function add_item($item = null)
	{
		$this->items[sizeof($this->items)] = $item;
	}
	
	public function generate()
	{
		$rows = "";
		foreach ($this->items() as $item) {
			$rows.=$item->render();
		}
		
		return Html::TABLE($rows);
	}
	
	public function get_actual_page()
	{
		$currentFile = $_SERVER["PHP_SELF"];
		$parts = Explode('/', $currentFile);
		return $parts[count($parts) - 1];
	}

}