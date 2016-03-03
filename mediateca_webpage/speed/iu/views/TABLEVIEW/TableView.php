<?php

require_once SPEED.SPD.IU.CONTROLLERS.CONTROLLER;

class TableView extends Controller
{
	private $header = null;
	private $body = null;
	
	protected $object = null;
	protected $columns = null;
	protected $name_columns = null;
	public function object($object = null)
	{
		if(is_null($object)) return $this->object;
		$this->object = $object;
	}
	
	public function columns($columns = null)
	{
		if(is_null($columns)) return $this->columns;
		$this->columns = $columns;
	}	
        
        	public function name_columns($name_columns = null)
	{
		if(is_null($name_columns)) return $this->name_columns;
		$this->name_columns = $name_columns;
	}
	public function __construct($obj = null, $columns = null, $name_colums = null)
	{
		$this->object($obj);
		$this->columns($columns);
                $this->name_columns($name_colums);
	}
	
	private function render_header()
	{
		$cols = "";
                $index = 0;
		foreach ($this->object->columns() as $column)
		{
			
			$col_name = $column->column_name();

			if ((!is_null($this->columns())) && (!in_array($col_name, $this->columns())))
			{ 
				continue;
			}
                        if ($this->name_columns != null) $cols .= self::TD($this->name_columns[$index]);
                        else
                            $cols .= self::TD($col_name);
                        $index++;
		}
		return self::THEAD(self::TR($cols));
	}
	
	private function render_body()
	{
		$rows = "";
		$objs = $this->object->get_all();
		if (!is_null($objs) && (count($objs)>0))
		{
			foreach ($this->object->get_all() as $obj)
			{
				$cols = "";
				foreach ($obj->columns() as $column) 
				{
					$col_name = $column->column_name();
					if ((!is_null($this->columns())) && (!in_array($col_name, $this->columns()))) continue;
					$cols .= self::TD($obj->$col_name());
				}
				$rows .= self::TR($cols);
			}
			return self::TBODY($rows);
		}
		else return null;		
		
	}
	
	public function render()
	{
		$body = $this->render_body();
		if (!is_null($body))
		{
			return self::TABLE($this->render_header().$body, "view");
		}
		else
		{
			return self::TABLE(self::TR(self::TD("No hay ning�n resultado.")));
		}
	}
	
}


?>