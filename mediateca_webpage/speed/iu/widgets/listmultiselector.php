<?php

require_once SPEED.SPD.IU.CONTROLLERS.CONTROLLER;

class ListMultiSelector extends Controller
{
	protected $obj;
	protected $selected = null;
	
	public function obj($obj = null)
	{
		if(is_null($obj)) return $this->obj;
		$this->obj = $obj;
                $this->process();
	}
	
	public function selected($selected = null)
	{
		if(is_null($selected)) return $this->selected;
		$this->selected = $selected;
        }
        
	public function __construct($name, $obj, $selected = null)
	{
		$this->name($name);
		$this->obj($obj);
		$this->process();
	}
		
	
	public function process()
	{
                
		if(array_key_exists(str_replace("[]", "", $this->name()), $_POST))
		{
			$this->selected = array_unique($_POST[str_replace("[]", "", $this->name())]);
                }

	}
	
	public function render()
	{
                if (is_null($this->obj))
                {
                    return self::SELECT($this->name, "");
                }
                else
                {

                    if (is_array($this->obj()))
                    {

                            $ops = "";

                            for ($i = 0; $i < count($this->obj()); $i++) 
                            {
                                    if ($i == $this->selected)
                                            $ops .= self::OPTION($this->obj[$i], $i);
                                    else

                                            $ops .= self::OPTION($this->obj[$i], $i);
                            }

                            return self::SELECT($this->name, $ops);
                    }
                    else
                    {
                            $objs = $this->obj->get_all_distinct();

                            $ops = "";
                            foreach ($objs as $item)
                            {
                                    if ($item->id() == $this->selected)
                                            $ops .= self::OPTION($item->name(), $item->id());
                                    else
                                            $ops .= self::OPTION($item->name(), $item->id());
                            }
                            return self::SELECT_MULTI($this->name, $ops);
                    }

            }
        }
}

?>