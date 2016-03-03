<?php

class DBOrder
{
	public static $ASC = 0;
	public static $DESC = 1;
	
	private $column;
	
	private $order;
	
	
	public function column($column=null)
	{
		if (is_null($column))
			return $this->column;
		$this->column = $column;
	}

	public function order($order=null)
	{
		if (is_null($order))
			return $this->order;
		$this->order = $order;
	}
	
	public function __construct($column, $order)
	{
		$this->column($column);
		$this->order($order);
	}
}