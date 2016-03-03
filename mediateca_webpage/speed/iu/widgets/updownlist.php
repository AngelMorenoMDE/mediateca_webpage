<?php


require_once speed . iu . controls . control;
require_once speed . iu . widgets . updownlist;


class UpDownList extends Control
{
	protected $data = null;
	
	protected $max = 0;
	protected $min = 0;
	protected $actual = 0;

	protected $textfield_ctrl = null;
	protected $updown_ctrl = null;

	public function data($data = null)
	{
		if(is_null($data))
			return $this->data;
	
		$this->data = $data;
	}
	
	public function max($max = null)
	{
		if(is_null($max))
			return $this->max;

		$this->max = $max;
	}

	public function min($min = null)
	{
		if(is_null($min))
			return $this->min;

		$this->min = $min;
	}

	public function actual($actual = null)
	{
		if(is_null($actual))
			return $this->actual;

		$this->actual = $actual;
	}

	public function item_list()
	{
		return $this->data[$this->actual()];
	}

	public function __construct($name, $data, $actual=null)
	{
		$this->name($name);
		$this->max(sizeof($data)-1);
		$this->min(0);
		if (is_null($actual)) 
		{ 
			$this->actual(0);
		}
		else
		{
			$this->actual($actual);
		}
		$this->data($data);
		$this->updown_ctrl = new UpDown(UpDown::$HORIZONTAL, $this->name());

	}

	private function save_state()
	{
		$_SESSION[$this->name()] = $this->actual();
	}

	private function restore_state()
	{
		if (array_key_exists($this->name(), $_SESSION))
		{
			$this->actual = $_SESSION[$this->name()];
		}
	}

	public function process()
	{
		$this->restore_state();
		if ($this->updown_ctrl->up_detect())
		{
			if (!(($this->actual+1) > $this->max()))
				$this->actual++;
		}
		if ($this->updown_ctrl->down_detect())
		{
			if (!(($this->actual-1) < $this->min()))
				$this->actual--;

		}
		$this->save_state();
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
		$code = self::TD(self::INPUTTEXTDISABLED($this->name(), $this->item_list(), $this->name()));
		$code .= self::TD($this->updown_ctrl->render());
		$code = self::TR($code);
		$code = self::TABLE($code);
		return $code;
	}
}
?>