<?php

require_once speed . db . dbentity;

class DBTable extends DBEntity
{
	protected $table_name = null;
	protected $columns = array();

	public function __construct($table_name)
	{
           
		parent::__construct();
		$this->db_entity(DBEntity::$TABLE);

		$this->table_name($table_name);

	}        
        
	public function table_name($table_name = null)
	{
		if (is_null($table_name)) return $this->table_name;
		$this->table_name = $table_name;
	}

	public function add_column($column = null)
	{		
		if (is_null($this->columns)) $this->columns = array();
		$this->columns[count($this->columns)] = $column;
	}
	
	public function columns($columns = null)
	{
		if (is_null($columns)) return $this->columns;
		$this->columns = $columns;
	}



	protected function build_query()
	{
            $this->query()->table($this);
	}

}

?>