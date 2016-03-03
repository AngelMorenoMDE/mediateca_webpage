<?php
require_once SPEED.SPD.IU.CONTROLLERS.CONTROLLER;

class PSTable extends Controller
{
	
	// Options
	private $cols_visible = null; // <= array 
	private $max_rows = null;
	
	
	// Size table
	private $max_width = null; // number
	private $max_height = null; // number
	
	public function set_title_labels($title)
	{
		$this->title=$title;
	}
	
	public function set_object($object)
	{
		$this->object = $object;
	}
	
	public function set_max_rows($rows) 
	{ 
		$this->max_rows = $rows; 
	}
	
	public function set_cols_visible($cols) 
	{ 
		$this->cols_visible = $cols; 
	}
	
	public function __construct($name)
	{
		$this->name($name);
		
	}
	
	public function render_up_tools()
	{
		$options = array(10, 25, 50, 100);
		$num_items_selector = new ListSelector("items_selector", $options);
		
		echo "No Items mostrados: ".$num_items_selector->render();
	}
	
	public function render_body()
	{
		$rows_to_render = "";
		$objs = $this->object->get_all();
		if (!is_null($objs) && (count($objs)>0))
		{
			foreach ($objs as $obj)
			{
				$cols = "";
				foreach ($obj->columns() as $column)
				{
					if ((!is_null($this->cols_visible)) && (!in_array($column, $this->cols_visible))) continue;
					$col_name = $column->column_name();
					if ((!is_null($this->columns())) && (!in_array($col_name, $this->columns()))) continue;
					$cols .= self::TD($obj->$col_name());
				}
				$rows_to_render .= self::TR($cols);
			}
			return self::TBODY($rows_to_render);
		}
		else return null;
	}
	
	public function render_down_tools()
	{
		
	}
	
	public function render()
	{
		$this->render_up_tools();
	}
	
	public function event_handler()
	{
		
	}
}

?>