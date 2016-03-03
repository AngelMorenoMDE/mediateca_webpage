<?php

require_once speed . db . dbquery;

class DBEntity
{
	public static $TABLE = 1;
	public static $DATABASE = 2;
	
	protected $query = null;
	protected $db_entity = null;

	
	public function __construct()
	{            
            
            $this->query(new DBQuery());
	}
	
	public function db_entity($db_entity = null)
	{
		if (is_null($db_entity)) return $this->db_entity;
		$this->db_entity = $db_entity;
		$this->query->entity($this->db_entity);
	}
	
	public function query($query = null)
	{
		if (is_null($query)) return $this->query;
		$this->query = $query;
	}
	

	public function create()
	{
		$this->build_query();
		$this->query()->action(DBAction::$CREATE);
		$this->query()->exec();
	}
	
	public function drop()
	{
		$this->build_query();
		$this->query()->action(DBAction::$DROP);
		$this->query()->exec();
	}
	
	public function alter()
	{
		$this->build_query();
		$this->query()->action(DBAction::$ALTER);
		$this->query()->exec();
	}
	
	public function exist()
	{
		$this->build_query();
		$this->query()->action(DBAction::$SHOW);
	}
	
	
	public function to_string()
	{
		
	}
}

?>