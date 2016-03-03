<?php

class DBType
{
	public static $UNSIGNED = 'usg';
	public static $ZEROFILL = 'zro';
	
	protected $properties = array('usg' =>0, 'zro' =>0);
	
	// $std_type : Tipo estándar de Sistema	
	private $std_type = null;
	
	// $size : size for this type
	private $size = null;
	
	// $accuracy : accuracy for float, double, decimal types...
	private $accuracy = null;
	
	public function std_type($std_type = null) 
	{ 
		if (is_null($std_type)) return $this->std_type;
		$this->std_type = $std_type;
	}
	
	public function size($size = null)
	{
		if (is_null($size)) return $this->size;
		$this->size = $size;
	}

	
	public function accuracy($accuracy = null)
	{
		if (is_null($accuracy)) return $this->accuracy;
		$this->accuracy = $accuracy;
	}
	
	public function is_unsigned()
	{
		return $this->properties[self::$UNSIGNED];
	}
	
	public function is_zerofill()
	{
		return $this->properties[self::$ZEROFILL];
	}
	
	public function set_property($property)
	{
		$this->properties[$property] = 1;
	}
	
	public function set_properties($properties)
	{
		if (!is_null($properties))
			foreach ($properties as $property)
			{
				$this->set_property($property);
			}
	}
		
	public function unset_property($property)
	{
		$this->properties[$property] = 0;
	}


	public function __construct($std_type, $size = null, $accuracy = null, $properties = null)
	{
		$this->std_type($std_type);
		$this->size($size);
		$this->accuracy($accuracy);
		$this->set_properties($properties);

	} 
}

?>