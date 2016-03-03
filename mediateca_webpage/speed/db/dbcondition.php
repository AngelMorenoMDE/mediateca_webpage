<?php

class DBCondition
{
	private $key = null;
	private $op = null;
	private $value = null;
	
	private $concat = null;
	
	public function __construct($key, $op, $value, $concat = null)
	{
		$this->key($key);
		$this->op($op);
		$this->value($value);
		$this->concat($concat);
	}
	
	public function key($key = null)
	{
		if (is_null($key)) return $this->key;
		$this->key = $key;
	}

	public function op($op = null)
	{
		if (is_null($op)) return $this->op;
		$this->op = $op;
	}
	
	public function value($value = null)
	{
		if (is_null($value)) return $this->value;
		$this->value = $value;
	}
	
	public function concat($concat = null)
	{
		if (is_null($concat)) return $this->concat;
		$this->concat = $concat;
	}
}

?>