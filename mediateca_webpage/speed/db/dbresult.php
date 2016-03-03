<?php

class DBResult
{
	public static $OK = 1;
	public static $NO_RESULT = 2;
	public static $FAIL = 3;
	
	protected $result;
	protected $code;
	protected $num_rows = null;
	
	public function code($code = null)
	{
		if(is_null($code))
			return $this->code;
		
		$this->code = $code;
	}
	
	public function result($result = null)
	{
		if(is_null($result))
			return $this->result;
	
		$this->result = $result;
	}
	
	public function num_rows($num_rows = null)
	{
		if(is_null($num_rows))
			return $this->num_rows;
		
		$this->num_rows = $num_rows;
	}
	
	public function __construct($code, $result, $numrows = null)
	{
		$this->code = $code;
		$this->result = $result;	
		$this->num_rows = $numrows;
	}
}