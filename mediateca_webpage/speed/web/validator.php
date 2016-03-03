<?php

class Validator
{
	public static $NOT_EMPTY = "nn";
	public static $ONLY_NUMBERS = 'on';
	public static $ONLY_LETTERS = 'ol';
	public static $ONLY_ALPHANUMERIC = 'an';
	
	private static $REGEXP_NUMBERS = "[0-9]";
	private static $REGEXP_LETTERS = "[a-zA-Z]";
	private static $REGEXP_ALPHANUMERIC = "[0-9a-zA-Z]";
	
	private static $REGEXP_ONLY_NUMBERS = "/^[0-9]*$/";
	private static $REGEXP_ONLY_LETTERS = "/^[a-zA-Zá-úÁ-ÚÑñ ]*$/";
	private static $REGEXP_ONLY_ALPHANUMERIC = "/^[0-9a-zá-úA-ZÁ-ÚÑñ ]*$/";
	
	
	public static $OK = 1;
	public static $ERROR_MUST_BE_NOT_EMPTY = 2;
	public static $ERROR_EXCEED_SIZE_LIMIT=3;
	public static $ERROR_MUST_BE_A_NUMBER = 4;
	public static $ERROR_MUST_BE_A_STRING = 5;
	public static $ERROR_MUST_BE_ALPHANUMERIC = 6;
	
	private $eval_str = null;
	private $properties = array('nn'=>0, 'on'=>0, 'ol'=>0, 'an'=>0);
	private $size = null;
	private function check_size($std_type, $value)
	{
		switch($std_type)
		{
			case STDType::$INT : break;
				
			case STDType::$VARCHAR : break;
		}
	}
	
	public function could_be_empty($dbcolumn, $value)
	{
		if ($dbcolumn->is_not_nullnull())
		{
			if ($value == "") return false;
		}
	}
	
	public function validate()
	{
		if ($this->get_property(self::$NOT_EMPTY))
		{
			if (($this->eval_str == "") || ($this->eval_str == null))
				return self::$ERROR_MUST_BE_NOT_EMPTY;

			
			if (!is_null($this->size))
			{
				if (strlen($this->eval_str) > $this->size)
					return self::$ERROR_EXCEED_SIZE_LIMIT;				
			}
			
		}		
/*
		if ($this->get_property(self::$ONLY_LETTERS))
		{
			if (!preg_match(self::$REGEXP_ONLY_LETTERS, $this->eval_str))
			{
				return self::$ERROR_MUST_BE_A_STRING;
			}
		}
*/		
		if ($this->get_property(self::$ONLY_NUMBERS))
		{
			if (!is_numeric($this->eval_str))
			{
				return self::$ERROR_MUST_BE_A_NUMBER;
			}
		}
	/*
		if ($this->get_property(self::$ONLY_ALPHANUMERIC))
		{
			
			if (!preg_match(self::$REGEXP_ONLY_ALPHANUMERIC, $this->eval_str))
			{
				return self::$ERROR_MUST_BE_ALPHANUMERIC;
			}
		}
	*/	
		return self::$OK;
	}
	
	public function get_property($property)
	{
		return $this->properties[$property];
	}
		
	public function unset_property($property)
	{
		$this->properties[$property] = 0;
	}
	
	public function set_property($property)
	{
		$this->properties[$property] = 1;
	}
	
	public function set_properties($properties)
	{
		foreach ($properties as $property)
		{
			if ($property == self::$ONLY_NUMBERS)
			{
				$this->unset_property(self::$ONLY_LETTERS);
			} 
			if ($property == self::$ONLY_LETTERS)
			{
				$this->unset_property(self::$ONLY_NUMBERS);
			} 
			$this->set_property($property);
		}
	}
	
	public function __construct($str, $properties, $size = null)
	{
		$this->eval_str = $str;
		$this->set_properties($properties);
		$this->size = $size;
	}
	
	public function check()
	{
		return $this->error($this->validate());
	}
	
	public function error($error_no)
	{
		if ($error_no == self::$OK)
			return "";
	
		if ($error_no == self::$ERROR_MUST_BE_NOT_EMPTY)
			return "<- Campo vacio";
		
		if ($error_no == self::$ERROR_EXCEED_SIZE_LIMIT)
			return "<- Excede tamaño max";
		
		if ($error_no == self::$ERROR_MUST_BE_A_NUMBER)
			return "<- Debe ser numérico";
		
		if ($error_no == self::$ERROR_MUST_BE_A_STRING)
			return "<- Debe ser texto";
		
		if ($error_no == self::$ERROR_MUST_BE_ALPHANUMERIC)
			return "<- Debe ser alfanumérico";		
	}
}