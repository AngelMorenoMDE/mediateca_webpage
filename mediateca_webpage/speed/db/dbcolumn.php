<?php

        
    require_once speed . db . dbtype;


class DBColumn
{
	public static $NOT_NULL = 'nn';
	
	public static $AUTO_INC = 'ai';	
	
	public static $PRIMARY_KEY = 'pk';
	
	public static $UNIQUE_KEY = 'uk';
	
	protected $column_name = null;
	protected $column_type = null;
 
	protected $properties = array('ai' => 0, 'nn' => 0, 'uk' => 0, 'pk' =>0);
	
	public function column_name($column_name = null) 
	{ 
		if (is_null($column_name)) return $this->column_name;
		$this->column_name = $column_name;
	}

	public function type($type = null, $size = null, $accuracy = null, $properties = null)
	{
		if (is_null($type)) return $this->type;
		$this->type = new DBType($type, $size, $accuracy, $properties);
	}
	
	public function is_primary_key()
	{
		return $this->properties[self::$PRIMARY_KEY];
	}
	
	public function is_unique()
	{
		return $this->properties[self::$UNIQUE_KEY];
	}
	
	public function is_auto_increment()
	{
		return $this->properties[self::$AUTO_INC];
	}
	
	public function is_not_null()
	{
		return !$this->properties[self::$NOT_NULL];
	}
	
	public function set_property($property)
	{
		$this->properties[$property] = 1;
	}
	
	public function set_properties($properties)
	{
		foreach ($properties as $property) 
		{
			$this->set_property($property);
		}
	}
	
	
	public function unset_property($property)
	{
		$this->properties[$property] = 0;
	}
	
	public function __construct($column_name, $properties = null, $std_type=null, $size = null, $accuracy=null, $dbtype_properties = null)
	{
		$this->column_name($column_name);
		
		if (!is_null($properties)) 
			$this->set_properties($properties);
		
		if (!is_null($std_type))
			$this->type($std_type, $size, $accuracy, $dbtype_properties);
	}
	

}