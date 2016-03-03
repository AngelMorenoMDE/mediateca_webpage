<?php

require_once speed . iu . controls . control;
require_once speed . iu . controls . imagebutton;

class UpDown extends Control
{
	public static $HORIZONTAL = 0;
	public static $VERTICAL = 1;

	// Controls embeed
	protected $up_ctrl = null;
	protected $down_ctrl = null;
	
	// Orientation: [ VERTICAL | HORIZONTAL ]
	protected $orientation = null;
	
	public function orientation($orientation = null)
	{
		if (is_null($orientation)) return $this->orientation();
		$this->orientation = $orientation;
	}
	
	public function __construct($orientation, $name)
	{
		$this->orientation($orientation);
		$this->up_ctrl = new ImageButton("up_ctrl.png", $name."_udcup", "ctrl_up");
		$this->down_ctrl = new ImageButton("down_ctrl.png", $name."_udcdown", "ctrl_down");
	}
	
	public function render()
	{
		$code = "";
		if($this->orientation == self::$HORIZONTAL)
		{
			$code = self::TD($this->up_ctrl->render()).self::TD($this->down_ctrl->render());
			$code = self::TR($code);
			$code = self::TABLE($code);
		}
		if($this->orientation == self::$VERTICAL)
		{
			$code = self::TR(self::TD($this->up_ctrl->render()));
			$code .= self::TR(self::TD($this->down_ctrl->render()));
			$code = self::TABLE($code);
		}
		
		return $code;
	}
	
	public function up_detect()
	{
		return array_key_exists($this->up_ctrl->name()."_x", $_POST);		
	}
	
	public function down_detect()
	{
		return array_key_exists($this->down_ctrl->name()."_x", $_POST);
	}
	
	public function process()
	{
		$this->up_ctrl->process();
		$this->down_ctrl->process();
	}
}