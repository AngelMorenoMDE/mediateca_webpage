<?php

require_once speed . db . dbtable;
require_once speed . db . dbaction;
require_once speed . db . dbcondition;
require_once speed . db . dbop;

abstract class DBObject extends DBTable
{

	private $exist_def = null;
        
        protected abstract function define();
                
        // Constructor
        public function __construct()
	{		
                
		parent::__construct(get_class($this));

		$this->define();

	}
        
	protected function define_exist()
	{
		$this->exist_def = func_get_args();
	}
	
	protected function define_column($column, $properties = null, $stdtype = null, $size=null, $accuracy=null, $dbtype_properties = null)
	{
            
		parent::add_column(new DBColumn($column, $properties, $stdtype, $size, $accuracy, $dbtype_properties));
	}
	
	public function auto_load()
	{		
		$this->query()->action(DBAction::$SELECT);
		$value = $this->query->pk();
		$this->query()->conditions(new DBCondition($this->query->pk(), DBOP::$EQ, $value));
		
		return $this->query()->exec();
	}
	
	/*public function __call($method, $args=null)
	{
		if($args== null) return $this->$method;
		$this->$method=$args;
	}*/
	
	// CHECKED
	protected function generate_values()
	{
		$values = array();
		foreach ($this->columns() as $column) 
		{
			if (!$column->is_auto_increment())
			{
				$param = $column->column_name();
				if (STDType::is_numeric($column->type()->std_type()))
					$values[sizeof($values)] = $this->$param;
				else
					$values[sizeof($values)] = "'".$this->$param."'";
			}
		}
		return $values;
	}
	
	
	// CHECKED
	protected function generate_conditions()
	{
		$conditions = array();
		foreach ($this->columns() as $column)
		{
			if ($column->is_primary_key())
			{
				$key = $column->column_name();
				$value = $this->$key;
				
				if (!STDType::is_numeric($column->type()->std_type()))
				{
					$value = "'".$this->$key."'";
				}
				
				if (sizeof($conditions) > 0)
				{
					$conditions[sizeof($conditions)] = new DBCondition($key, DBOP::$EQ, $value, DBOP::$AND);
				}
				else $conditions[sizeof($conditions)] = new DBCondition($key, DBOP::$EQ, $value);

			}
		}
		return $conditions;
	}
	
	protected function generate_conditions_delete()
	{
		$conditions = array();
		foreach ($this->columns() as $column)
		{
				$key = $column->column_name();
				$value = $this->$key;
				if (!is_null($value))
				{
					if (!STDType::is_numeric($column->type()->std_type()))
					{
						$value = "'".$this->$key."'";
					}
		
					if (sizeof($conditions) > 0)
					{
						$conditions[sizeof($conditions)] = new DBCondition($key, DBOP::$EQ, $value, DBOP::$AND);
					}
					else $conditions[sizeof($conditions)] = new DBCondition($key, DBOP::$EQ, $value);
				}
			}
		return (count($conditions)>0) ? $conditions : null;
	}
	
	protected function generate_conditions_get()
	{
		$conditions = array();
		foreach ($this->columns() as $column)
		{

				$key = $column->column_name();
				$value = $this->$key;
				if (!is_null($value))
				{
					if (!STDType::is_numeric($column->type()->std_type()))
					{
						$value = "'".$this->$key."'";
					}
		
					if (sizeof($conditions) > 0)
					{
						$conditions[sizeof($conditions)] = new DBCondition($key, DBOP::$EQ, $value, DBOP::$AND);
					}
					else $conditions[sizeof($conditions)] = new DBCondition($key, DBOP::$EQ, $value);
				}
	
		}
		return (count($conditions)>0) ? $conditions : null;;
	}
	
	protected function generate_conditions_exist()
	{
		$conditions = array();
		foreach ($this->columns() as $column)
		{

			$key = $column->column_name();
                        
			$value = $this->$key;
			if (!is_null($value) && (in_array($key, $this->exist_def)))
			{
				if (!STDType::is_numeric($column->type()->std_type()))
				{
					$value = "'".$this->$key."'";
				}
	
				if (sizeof($conditions) > 0)
				{
					$conditions[sizeof($conditions)] = new DBCondition($key, DBOP::$EQ, $value, DBOP::$AND);
				}
				else $conditions[sizeof($conditions)] = new DBCondition($key, DBOP::$EQ, $value);
			}
	
		}
		return $conditions;
	}
	
	protected function generate_conditions_find($columns_selected)
	{
		$conditions = array();
		foreach ($this->columns() as $column)
		{
	
			$key = $column->column_name();
			$value = $this->$key;
			if (!is_null($value) && (in_array($key, $columns_selected)))
			{
                                $op = DBOP::$EQ;
				if (!STDType::is_numeric($column->type()->std_type()))
				{
					$value = "'%".$this->$key."%'";
                                        $op = DBOP::$LIKE;
				}
                                
				if (sizeof($conditions) > 0)
				{
					$conditions[sizeof($conditions)] = new DBCondition($key, $op, $value, DBOP::$AND);
				}
				else $conditions[sizeof($conditions)] = new DBCondition($key, $op, $value);
			}
	
		}
		return $conditions;
	}
        
        protected function generate_conditions_find_or($columns_selected)
	{
		$conditions = array();
		foreach ($this->columns() as $column)
		{
	
			$key = $column->column_name();
			$value = $this->$key;
			if (!is_null($value) && (in_array($key, $columns_selected)))
			{
                                $op = DBOP::$EQ;
				if (!STDType::is_numeric($column->type()->std_type()))
				{
					$value = "'".$this->$key."'";
                                        $op = DBOP::$LIKE;
				}
	
				if (sizeof($conditions) > 0)
				{
					$conditions[sizeof($conditions)] = new DBCondition($key, $op, $value, DBOP::$OR);
				}
				else $conditions[sizeof($conditions)] = new DBCondition($key, $op, $value);
			}
	
		}
		return $conditions;
	}        
	
	// CHECKED
	public function save()
	{
		$this->build_query();
		$this->query()->action(DBAction::$INSERT);
		$this->query()->values($this->generate_values());
		return $this->query()->exec();
	}
	
	
	// CHECKED
	public function update()
	{
		$this->build_query();
		$this->query()->action(DBAction::$UPDATE);
		$this->query()->values($this->generate_values());
		$this->query()->wheres($this->generate_conditions());
		return $this->query()->exec();
	}
	
	// CHECKED
	public function delete()
	{
		$this->build_query();
		$this->query()->action(DBAction::$DELETE);
		$this->query()->wheres($this->generate_conditions_delete());

		return $this->query()->exec();
	}
	
	// CHECKED
	public function get()
	{
		$this->build_query();
		$this->query()->action(DBAction::$SELECT);
		$this->query()->wheres($this->generate_conditions_get());
		$result = $this->query()->exec();
		if ($result->code() == DBResult::$NO_RESULT) return null;
		
		if ($result->code() == DBResult::$OK)
		{
			$data = array();
			for ($i = 0; $i < sizeof($result->result()); $i++) 
			{
				$rs = $result->result();
				$rs = $rs[$i];
				$cols = $this->columns();
				$obj = new $this->table_name();
				for ($j = 0; $j < sizeof($cols); $j++) 
				{
				
					// Get the name of the column
					$col_name = $cols[$j]->column_name();		

					// Assign the value of the result to the property
					$obj->$col_name($rs[$col_name]);

				}
				$data[sizeof($data)] = $obj;
			}
                        if (count($data))
                            $this->mutate($data[0]);
		}
	}
	
	// CHECKED
	public function get_all()
	{
		$this->build_query();         
                
		$this->query()->action(DBAction::$SELECT);
		$this->query()->wheres($this->generate_conditions_get());

		$result = $this->query()->exec();
		
		if ($result->code() == DBResult::$NO_RESULT) return null;
		
		if ($result->code() == DBResult::$OK)
		{
			$data = array();
			for ($i = 0; $i < sizeof($result->result()); $i++) 
			{
				$rs = $result->result();
				$rs = $rs[$i];
				$cols = $this->columns();
				$obj = new $this->table_name();
				for ($j = 0; $j < sizeof($cols); $j++) 
				{
				
					// Get the name of the column
					$col_name = $cols[$j]->column_name();		

					// Assign the value of the result to the property
					$obj->$col_name($rs[$col_name]);

				}
				$data[sizeof($data)] = $obj;
			}
			return $data;
			
			
			
		}
	}
        
	public function get_all_distinct()
	{
		$this->build_query();
		$this->query()->action(DBAction::$SELECT_DISTINCT);
		$this->query()->wheres($this->generate_conditions_get());
		$result = $this->query()->exec();
		
		if ($result->code() == DBResult::$NO_RESULT) return null;
		
		if ($result->code() == DBResult::$OK)
		{
			$data = array();
			for ($i = 0; $i < sizeof($result->result()); $i++) 
			{
				$rs = $result->result();
				$rs = $rs[$i];
				$cols = $this->columns();
				$obj = new $this->table_name();
				for ($j = 0; $j < sizeof($cols); $j++) 
				{
				
					// Get the name of the column
					$col_name = $cols[$j]->column_name();		

					// Assign the value of the result to the property
					$obj->$col_name($rs[$col_name]);

				}
				$data[sizeof($data)] = $obj;
			}
			return $data;
			
			
			
		}
	}        

	public function order_by($column, $mode)
	{

		$this->query->order_by($column);
		$this->query->asc_desc($mode);
	}
	
        public function limit($offset)
        {
            $rows = Config::getNoResultsByPage();            
            $this->query->limit($offset, $rows);

            
        }
        
        public function debug()
        {
            if (is_null($this->query)) $this->query = new DBQuery();
            $this->query->debug(true);
        }
        
	public function exist()
	{
		$this->build_query();
		$this->query()->action(DBAction::$SELECT);
		$this->query()->wheres($this->generate_conditions_exist());
		$result = $this->query()->exec();

		if ($result->code() == DBResult::$NO_RESULT) return false;
		
		if (($result->code() == DBResult::$OK) && ($result->num_rows() > 0))  return true;

                return false;
	}
	
	public function find_by($colums)
	{
		$this->build_query();
		$this->query()->action(DBAction::$SELECT);
		$this->query()->wheres($this->generate_conditions_find($colums));
		$result = $this->query()->exec();
		
		if ($result->code() == DBResult::$NO_RESULT) return null;
		
		if ($result->code() == DBResult::$OK)
		{
			$data = array();
			for ($i = 0; $i < sizeof($result->result()); $i++)
			{
			$rs = $result->result();
			$rs = $rs[$i];
			$cols = $this->columns();
			$obj = new $this->table_name();
			for ($j = 0; $j < sizeof($cols); $j++)
			{
		
			// Get the name of the column
				$col_name = $cols[$j]->column_name();
		
				// Assign the value of the result to the property
				$obj->$col_name($rs[$col_name]);
		
			}
			$data[sizeof($data)] = $obj;
			}
			return $data;
				
				
				
			}
	}

        public function find_by_or($colums)
	{
		$this->build_query();
		$this->query()->action(DBAction::$SELECT);
		$this->query()->wheres($this->generate_conditions_find_or($colums));
		$result = $this->query()->exec();
		
		if ($result->code() == DBResult::$NO_RESULT) return null;
		
		if ($result->code() == DBResult::$OK)
		{
			$data = array();
			for ($i = 0; $i < sizeof($result->result()); $i++)
			{
			$rs = $result->result();
			$rs = $rs[$i];
			$cols = $this->columns();
			$obj = new $this->table_name();
			for ($j = 0; $j < sizeof($cols); $j++)
			{
		
			// Get the name of the column
				$col_name = $cols[$j]->column_name();
		
				// Assign the value of the result to the property
				$obj->$col_name($rs[$col_name]);
		
			}
			$data[sizeof($data)] = $obj;
			}
			return $data;
				
				
				
			}
	}
        
	public function change($action, $data)
	{
		switch ($action)
		{
			case DBAction::$DELETE: break;
		}
	}
	
	

	
	public function to_string()
	{
		$columns = $this->columns();
		
		$str = "";
		
		for ($i = 0; $i < sizeof($columns); $i++) 
		{
			$col_name = $columns[$i]->column_name();
			
			 $str .= "[".$col_name."] - ".$this->$col_name;
		}

		$str .= "<br>";
		
		return $str;
	}
	
	public function mutate($obj)
	{
		foreach ($this->columns() as $column)
		{
			$key = $column->column_name();
			$this->$key($obj->$key);
		}
	}

}