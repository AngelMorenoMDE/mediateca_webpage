<?php
require_once SPEED.SPD.IU.CONTROLLERS.CONTROLLER;

class CheckboxSelector extends Controller
{
	protected $object = null;
	protected $selected = null;
	
	public function object($object = null)
	{
		if(is_null($object)) return $this->object;
		$this->object = $object;
	}
	
	private function process()
	{
		if (array_key_exists($this->name(), $_POST))
		{
			if (is_array($_POST[$this->name()]))
			{
				$this->selected($_POST[$this->name()]);
			}
			else
			{
				$this->selected(array($_POST[$this->name()]));
			}
			$this->save_state();
		}
	}
	
	public function selected($selected = null)
	{
		if(is_null($selected)) return $this->selected;
		$this->selected = $selected;
	}
	
	public function __construct($name, $object)
	{
		$this->name($name);
		$this->object($object);
		$this->selected(array());
		$this->process();
	}
	
	public function save_state()
	{
		$_SESSION[$this->name()] = $this->selected();
	}
	
	public function restore_state()
	{
		if (array_key_exists($this->name(), $_SESSION))
			$this->selected($_SESSION[$this->name()]);
	}
	
	public function render()
	{
		$this->restore_state();
		$objs = $this->object()->get_all();
		$rows = "";
		foreach ($objs as $obj) 
		{			
			$rows .= self::TR(self::TD(self::CHECKBOX($this->name()."[]", $obj->id(), in_array($obj->id(), $this->selected()))).self::TD($obj->name()));
		}
		
		return self::TABLE($rows);
		
	}
	
	
}