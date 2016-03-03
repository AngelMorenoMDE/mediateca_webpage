<?php
/*
 * REVISED : 18.01.2013 - 13.29
*
* */
class STDType
{
	public static $BIT = 0;	
	
	public static $TINY_INT = 1;
	public static $SMALL_INT = 2;
	public static $MEDIUM_INT = 3;
	public static $INT = 4;
	public static $BIG_INT = 5;
	
	public static $INTEGER = 6;	// ALIAS INT
	
	public static $BOOLEAN = 7; // ALIAS TINY_INT
	public static $BOOL = 8; // ALIAS TINY_INT
	
	public static $FLOAT = 9;
	public static $DOUBLE = 10;
	
	public static $DECIMAL = 11;
	
	public static $DATE = 12;
	public static $DATETIME = 13;
	public static $TIMESTAMP = 14;
	public static $TIME = 15;
	public static $YEAR = 16;
	
	public static $CHAR = 17;
	public static $VARCHAR = 18;
	
	public static $BINARY = 19;
	public static $VARBINARY = 20;
	
	public static $TINYBLOB = 21;
	public static $BLOB = 22;
	public static $MEDIUMBLOB = 23;
	public static $LONGBLOB = 24;
	
	public static $TINYTEXT = 25;
	public static $TEXT = 26;
	public static $MEDIUMTEXT = 27;
	public static $LONGTEXT = 28;
	
	public static function is_numeric($type)
	{
		if (STDType::$BIT == $type) { return true; }
		
		if (STDType::$TINY_INT == $type) { return true; }
		if (STDType::$SMALL_INT == $type) { return true; }
		if (STDType::$MEDIUM_INT == $type) { return true; }
		if (STDType::$INT == $type) { return true; }
		if (STDType::$BIG_INT == $type) { return true; }
		
		if (STDType::$INTEGER == $type) { return true; }	// ALIAS INT
		
		if (STDType::$BOOLEAN == $type) { return true; } // ALIAS TINY_INT
		if (STDType::$BOOL == $type) { return true; } // ALIAS TINY_INT
		
		if (STDType::$FLOAT == $type) { return true; }
		if (STDType::$DOUBLE == $type) { return true; }
		
		if (STDType::$DECIMAL == $type) { return true; }
		
		if (STDType::$DATE == $type) { return false; }
		if (STDType::$DATETIME == $type) { return false; }
		if (STDType::$TIMESTAMP == $type) { return false; }
		if (STDType::$TIME == $type) { return false; }
		if (STDType::$YEAR == $type) { return false; }
		
		if (STDType::$CHAR == $type) { return false; }
		if (STDType::$VARCHAR == $type) { return false; }
		
		if (STDType::$BINARY == $type) { return true; }
		if (STDType::$VARBINARY == $type) { return true; }
		
		if (STDType::$TINYBLOB == $type) { return true; }
		if (STDType::$BLOB == $type) { return true; }
		if (STDType::$MEDIUMBLOB == $type) { return true; }
		if (STDType::$LONGBLOB == $type) { return true; }
		
		if (STDType::$TINYTEXT == $type) { return false; }
		if (STDType::$TEXT == $type) { return false; }
		if (STDType::$MEDIUMTEXT == $type) { return false; }
		if (STDType::$LONGTEXT == $type) { return false; }
	}
}