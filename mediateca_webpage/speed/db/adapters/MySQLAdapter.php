<?php

    require_once speed . db . dbresult;

class MySQLAdapter
{
	
	private $query = null;
	private $conex = null;

	public function generate_type_name($type)
	{
		 if (STDType::$BIT == $type) { return "bit"; }
		
		 if (STDType::$TINY_INT == $type) { return "tinyint"; }
		 if (STDType::$SMALL_INT == $type) { return "smallint"; }
		 if (STDType::$MEDIUM_INT == $type) { return "mediumint"; }
		 if (STDType::$INT == $type) { return "int"; }
		 if (STDType::$BIG_INT == $type) { return "bigint"; }
		
		 if (STDType::$INTEGER == $type) { return "integer"; }	// ALIAS INT
		
		 if (STDType::$BOOLEAN == $type) { return "boolean"; } // ALIAS TINY_INT
		 if (STDType::$BOOL == $type) { return "bool"; } // ALIAS TINY_INT
		
		 if (STDType::$FLOAT == $type) { return "float"; }
		 if (STDType::$DOUBLE == $type) { return "double"; }
		
		 if (STDType::$DECIMAL == $type) { return "decimal"; }
		
		 if (STDType::$DATE == $type) { return "date"; }
		 if (STDType::$DATETIME == $type) { return "datetime"; }
		 if (STDType::$TIMESTAMP == $type) { return "timestamp"; }
		 if (STDType::$TIME == $type) { return "time"; }
		 if (STDType::$YEAR == $type) { return "year"; }
		
		 if (STDType::$CHAR == $type) { return "char"; }
		 if (STDType::$VARCHAR == $type) { return "varchar"; }
		
		 if (STDType::$BINARY == $type) { return "binary"; }
		 if (STDType::$VARBINARY == $type) { return "varbinary"; }
		
		 if (STDType::$TINYBLOB == $type) { return "tinyblob"; }
		 if (STDType::$BLOB == $type) { return "blob"; }
		 if (STDType::$MEDIUMBLOB == $type) { return "mediumblob"; }
		 if (STDType::$LONGBLOB == $type) { return "longblob"; }
		
		 if (STDType::$TINYTEXT == $type) { return "tinytext"; }
		 if (STDType::$TEXT == $type) { return "text "; }
		 if (STDType::$MEDIUMTEXT == $type) { return "mediumtext"; }
		 if (STDType::$LONGTEXT == $type) { return "longtext"; }
	 
	}
	private function generate_action_name($action)
	{
		if (DBAction::$CREATE == $action) { return "create "; }
		if (DBAction::$DROP == $action) { return "drop "; };
		if (DBAction::$ALTER == $action) { return "alter "; };
		if (DBAction::$SELECT == $action) { return "select "; };
                if (DBAction::$SELECT_DISTINCT == $action) { return "select distinct "; };
		if (DBAction::$UPDATE == $action) { return "update "; };
		if (DBAction::$INSERT == $action) { return "insert into ";}
		if (DBAction::$DELETE == $action) { return "delete from ";}
		if (DBAction::$SHOW == $action) { return "show ";}
		
	}
	private function generate_op($op)
	{
		if (DBOP::$AND == $op) return "and";
		if (DBOP::$OR == $op) return "or";
		if (DBOP::$EQ == $op) return "=";
		if (DBOP::$LT == $op) return "<";
		if (DBOP::$LTEQ == $op) return "<=";
		if (DBOP::$GT == $op) return ">";
		if (DBOP::$GTEQ == $op) return ">=";
                if (DBOP::$LIKE == $op) return " like ";
	}
	
	private function open()
	{
            
		$this->conex = mysqli_connect($this->query->database()->host(), 
					   				  $this->query->database()->user(), 
					   				  $this->query->database()->pass(), 
					   				  $this->query->database()->db_name(), 
					   				  $this->query->database()->port());

                if (!$this->conex)
                {
                    echo mysqli_error($this->conex);
                    die();
                }
	}
	
	private function close()
	{
		mysqli_close($this->conex);
	}
	
	public function generate_select() {}
	public function generate_update() {}

	
	public function execute_query()
	{
		//mysqli_execute();
	}
	
	public function __construct()
	{
		$this->query = func_get_arg(0);
	}

	public function generate_entity_name($action, $entity)
	{
		
		if ($entity == DBEntity::$TABLE)
		{
			if ($action == DBAction::$SHOW)
			{
				return "tables ";
			}
			return "table ".$this->query->table()->table_name()." ";
		}
		
		if ($entity == DBEntity::$DATABASE)
		{
			if ($action == DBAction::$SHOW)
			{
				return "databases ";
			}
			return "database ".$this->query->database()->db_name()." ";
		}
	}
	
	public function generate_type($dbtype)
	{
		$str = "";
		$str .= $this->generate_type_name($dbtype->std_type());

		$str .= (!is_null($dbtype->size())) ? "(".$dbtype->size() : "";
                
		$str .= (!is_null($dbtype->accuracy())) ? ",".$dbtype->accuracy() : "";
		$str .= (!is_null($dbtype->size())) ? ")" : "";
                //$str .= ($dbtype->std_type()==STDTYPE::$VARCHAR) ? " character set 'utf8'" :"";
		
		if ($dbtype->is_unsigned()) $str .= " unsigned";
		if ($dbtype->is_zerofill()) $str .= " zerofill";
		
		return $str;
	}
	
	public function generate_typed_columns($columns)
	{
		
		$str = "(";

		foreach ($columns as $column)
		{
			if ($str != "(")
			{
				$str .= ", ";
			}
			$str .= $column->column_name()." ";
			
			$str .= $this->generate_type($column->type());
			
                        
			if ($column->is_not_null()) $str .= " not null";
			if ($column->is_primary_key()) 
			{
				$str .= " primary key";
			}
			if ($column->is_auto_increment()) $str .= " auto_increment";
		}
		$str .= ")";

		return $str;		
	}
	
	public function generate_table($table)
	{
		return $table->table_name()." ";;
	}
	
	public function generate_columns_sets($columns, $values)
	{
		$str = "";
		$i=0;
		foreach ($columns as $column) {
			
			if ($column->is_auto_increment()) continue;
			if ($str == "")	$str .= "set ".$column->column_name()."=".$values[$i];
			else
				$str .= ", ".$column->column_name()."=".$values[$i];
			$i++;
		}
		return $str;
	}
	
	public function generate_columns($columns, $all = false)
	{
		$str = "";
		foreach ($columns as $column) {
	
			if ((!$all) && ($column->is_auto_increment())) continue;
			if ($str == "")	$str .= $column->column_name();
			else
				$str .= ", ".$column->column_name();
		}
		return $str;
	}
	
	public function generate_values($values)
	{
		$str = "";
		foreach ($values as $value) {
			if ($str == "")	$str .= $value;
			else
				$str .= ", ".$value;
		}
		return " values (".$str.")";
	}
	
	public function generate_wheres($wheres)
	{
		if (is_null($wheres)) return "";
		if (count($wheres) < 1) return "";
		$str = "";
		foreach ($wheres as $where) 
		{
			if ($str == "")
			{
				$str .= $where->key().$this->generate_op($where->op()).$where->value();
			}
			else
			{
				$str .= " ".$this->generate_op($where->concat())." ";
				$str .= $where->key().$this->generate_op($where->op()).$where->value();
			}
		}
		
		return " where ".$str;
	}
	
        public function generate_limit()
        {
            
            if ($this->query->limit_offset()>=0)
            {
                return " limit ".$this->query->limit_offset().", ".$this->query->limit_rows();
            }

            return "";
        }


        public function generate_from($table)
	{
		return " from ".$this->generate_table($table);
	}
	
	public function generate_order_by()
	{
		if (!is_null($this->query->order_by()))
		{
                    
                    $orders = $this->query->asc_desc();
                    if (is_array($this->query->order_by()) && count($this->query->order_by())>0)
                    {
                        $str = " order by ";
                        $c=0;
                        foreach ($this->query->order_by() as $order_column) 
                        {
                            if($c) $str .= ", ";
                            $str .= $order_column." ";
                            if ($orders[$c] == DBOrder::$ASC)
                            {
                                    $str.= " asc";
                            }
                            else 
                            {
                                $str .= " desc";
                            }
                            $c++;
                        }
                        return $str;
                    }
			/*$str = " order by ".$this->query->order_by();
			if ($this->query->asc_desc() == DBOrder::$ASC)
			{
                            
				$str.= " asc";
			}
			else 
                        {
                            $str .= " desc";
                        }*/
			
			
		} 
		
		return "";
	}
	
	public function generate_query()
	{
		$str = "";
		$str .= $this->generate_action_name($this->query->action());
		
		if ($this->query->action() == DBAction::$CREATE)
		{
			$str .= $this->generate_entity_name($this->query->action(), $this->query->entity());
			



				$str .= $this->generate_typed_columns($this->query->table()->columns());

		}
		
		if ($this->query->action() == DBAction::$DROP)
		{
			$str .= $this->generate_entity_name($this->query->action(), $this->query->entity());
		}
		
		// CHECKED
		if ($this->query->action() == DBAction::$INSERT)
		{
			$str .= $this->generate_table($this->query->table());			
			$str .= "(".$this->generate_columns($this->query->table()->columns()).") ";			
			$str .= $this->generate_values($this->query->values());
		}
		
		// CHECKED
		if ($this->query->action() == DBAction::$UPDATE)
		{
			$str .= $this->generate_table($this->query->table());
			$str .= $this->generate_columns_sets($this->query->table()->columns(), $this->query->values());
			$str .= $this->generate_wheres($this->query->wheres());
		}
		
		// CHECKED
		if ($this->query->action() == DBAction::$DELETE)
		{
			$str .= $this->generate_table($this->query->table());
			$str .= $this->generate_wheres($this->query->wheres());
		}
		
		// CHECKED
		if ($this->query->action() == DBAction::$SELECT)
		{
			$str .= $this->generate_columns($this->query->table()->columns(), true);
			$str .= $this->generate_from($this->query->table());			
			$str .= $this->generate_wheres($this->query->wheres());
                        $str .= $this->generate_order_by();
                        
                        
		}
                if ($this->query->action() == DBAction::$SELECT_DISTINCT)                
                {
			$str .= $this->generate_columns($this->query->table()->columns(), true);
			$str .= $this->generate_from($this->query->table());
			
			$str .= $this->generate_wheres($this->query->wheres());         
                        $str .= $this->generate_order_by();
                }
		$str .= $this->generate_limit();
		$str .= ";";
		
                if ($this->query->debugOn()) echo $str."<br/>"; 
		return $str;
	}
	
	public function execute()
	{
		$this->open();
                
		$response = mysqli_query($this->conex, $this->generate_query()); 
		if (($this->query->action() == DBAction::$SELECT)||($this->query->action() == DBAction::$SELECT_DISTINCT))
		{

			if (!$response)
				return new DBResult(DBResult::$NO_RESULT, null);
			
			$result = array();
			for ($i = 0; $i < $response->num_rows; $i++) 
			{
				$response->data_seek($i);
				$result[sizeof($result)] = $response->fetch_assoc();				
			}		
			return new DBResult(DBResult::$OK, $result, mysqli_num_rows($response));
		}
		
		$this->close();
	}
	
	
	public function execute_rassoc()
	{
		mysqli_fetch_assoc($result);
	}
}

?>