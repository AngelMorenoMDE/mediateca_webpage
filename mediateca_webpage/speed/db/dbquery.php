<?php

require_once speed . db . dbmanager;

class DBQuery extends Object
{
	// 
	private $client = null;
	
	private $database = null;	
	
	private $entity = null;
	
	private $action = null;
	
	private $table = null;
	
	private $order_by = array();
	
	private $asc_desc = array();
	
	private $having = null;
	
	private $wheres = null;
	
	private $values = null;
	
	private $like = null;
        
        private $limit_offset = -1;
        private $limit_rows = -1;
        
        private $debug = false;
	
	public function client($client = null)
	{
		if (is_null($client)) return $this->client;
		$this->client = $client;
	}
	public function database($database = null)
	{
		if (is_null($database)) return $this->database;
		$this->database = $database;
	}
	public function entity($entity = null)
	{
		if (is_null($entity)) return $this->entity;
		$this->entity = $entity;
	}
	
	public function action($action = null)
	{
		if (is_null($action)) return $this->action;
		$this->action = $action;
	}
	
	// CHECKED
	public function table($table = null)
	{
		if (is_null($table)) return $this->table;
		
		$this->table = $table;
	}
	
	public function order_by($column = null)
	{
		if (is_null($column)) return $this->order_by;
                if (!is_array($this->order_by)) $this->order_by = array();
		$this->order_by[] = $column;
	}
	
	public function limit($offset, $rows)
	{
		$this->limit_offset = $offset;
                $this->limit_rows = $rows;
	}
        
        public function debug()
        {
            $this->debug = true;
        }
        
        public function debugOn()
        {
            return $this->debug;
        }
        
        public function limit_offset()
        {
            return $this->limit_offset;
        }
        
        public function limit_rows()
        {
            return $this->limit_rows;
        }
	public function asc_desc($asc_desc = null)
	{
		if (is_null($asc_desc)) return $this->asc_desc;
                if (!is_array($this->asc_desc)) $this->asc_desc = array();
		$this->asc_desc[] = $asc_desc;
	}
	
	
	/*public function having()
	{
		if (is_null($having)) return $this->having;
		$this->having = $having;
	}
		
	public function like()
	{
		if (is_null($like)) return $this->like;
		$this->like = $like;
	}*/
	
	public function __construct()
	{
		
	}
	
	
	public function values($values = null)
	{
		if (is_null($values)) return $this->values;
	
		if (is_null($this->values)) $this->values = $values;

	}
	
	public function wheres($wheres = null)
	{
		if (is_null($wheres)) return $this->wheres;

		$this->wheres = $wheres;
	}
	

	

	public function exec()
	{
		$manager = new DBManager($this);
		return $manager->exec();
	}
	
	public function to_string()
	{}
}

?>