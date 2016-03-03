<?php

require_once speed . iu . controls . control;

class ListSelector extends Control
{
        protected $name = null;
	protected $obj = null;
	protected $selected = null;
        
        public function name($name = null)
        {
            if(is_null($name)) return $this->name;
            $this->name = $name;
        }
        
	public function obj($obj = null)
	{
		if(is_null($obj)) return $this->obj;
		$this->obj = $obj;

	}
	
	public function selected()
	{
                if (!is_null($this->selected)) return $this->selected;
                if (array_key_exists($this->name(), $_POST))
                {
                    return $_POST[$this->name()];
                }
                else
                {
                    return 0;
                }
        }
        
	public function __construct($name, $obj, $selected = null)
	{
		$this->name = $name;
		$this->obj = $obj;
                $this->selected = $selected;

                if (is_null($this->selected)) 
                {
                        if (!array_key_exists($this->name, $_POST))                                
                        {

                                    if (!is_array($this->obj))
                                    {   
                                        $all = $this->obj->get_all();
                                        if (count($all)>0)
                                            $this->selected = $all[0]->id();
                                    }
                                    else 
                                    {
                                        $this->selected = 0;
                                    }
                        }
                        else
                        {
                                    if (!is_array($this->obj))
                                    {   
                                        $this->selected = $_POST[$this->name];
                                    }
                                    else 
                                    {
                                        $this->selected = $_POST[$this->name];
                                    }                            
                        }
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
                            $data = $this->obj();
                            
                            for ($i = 0; $i < count($data); $i++) 
                            {
                                    
                                    if ($i == $this->selected)
                                    {
                                            $ops .= self::OPTION($this->obj[$i], $i, true);
                                    }
                                    else
                                    {
                                        $ops .= self::OPTION($this->obj[$i], $i);
                                    }
                            }

                            return self::SELECT($this->name, $ops);
                    }
                    else
                    {
                            $objs = $this->obj->get_all();
                            $ops = "";
                            if(count($objs)>0)
                            {

                            for ($i = 0; $i < count($objs); $i++) 
                            {                            
                                
                                    if ($objs[$i]->id() == $this->selected)
                                    {
                                            $ops .= self::OPTION($objs[$i]->name(), $objs[$i]->id(), true);
                                    }
                                    else
                                    {                                        
                                            $ops .= self::OPTION($objs[$i]->name(), $objs[$i]->id());
                                    }
                            }
                            
                            }
                            return self::SELECT($this->name, $ops);
                    }

            }
        }
}

?>