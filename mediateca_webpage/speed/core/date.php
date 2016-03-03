<?php

require_once speed . core . object;

class Date extends Object
{
	protected $day = 1;
	protected $month = 1;
	protected $year = 1900;
	
	public function day($day = null)
	{
		if(is_null($day))
			return $this->day;
		$this->day = $day;
	}
	
	public function month($month = null)
	{
		if(is_null($month))
			return $this->month;
		$this->month = $month;
	}
	
	public function year($year = null)
	{
		if(is_null($year))
			return $this->year;
		$this->year = $year;
	}
	
	public static function parse($date)
	{
		$datev = preg_split("/-/", $date);
		
		return new Date($datev[0], $datev[1], $datev[2]);
	}

	public function __construct($year, $month, $day)
	{
		$this->year($year);
		$this->month($month);
		$this->day($day);
	}
	
	public function to_date()
	{
		return date("Y-m-d", mktime(0,0,0,$this->month(), $this->day(), $this->year()));
	}
	
	public function to_string()
	{
	}
}

?>
