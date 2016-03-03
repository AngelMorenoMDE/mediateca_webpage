<?php

require_once speed . core . date;
require_once speed . iu . controls . control;
require_once speed . iu . widgets . updownlist;
require_once speed . iu . widgets . updowncounter;
require_once speed . iu . widgets . listselector;


class DateSelector extends Control
{
	private $day_ctrl = null;
	private $month_ctrl = null;
	private $year_ctrl = null;
	
	private $month_list = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	private $day_month = array(31,28, 31, 30, 31, 30, 31,31, 30, 31, 30, 31);
	
	public function __construct($name, $date=null)
	{
		if ($date != null)
		{
			$date_parts = explode("-", $date);
		}
		$this->name($name);	
		$month_selected = null;
		if ($date!=null)
		{
			$month_selected = intval($date_parts[1])-1;
		}			
		$this->month_ctrl = new ListSelector($this->name()."_month", $this->month_list, $month_selected);
                               
		$day_selected = null;
        for($i=0; $i<=$this->day_month[$this->month_ctrl->selected()]; $i++) 
        { 
			if ($date!=null)
			{
				if (intval($date_parts[2]) == ($i+1))
				{
							$day_selected = $i;
				}
			}
                $days[$i] = $i+1; 
        }
		$this->day_ctrl = new ListSelector($this->name()."_day", $days, $day_selected);   
		
		$year_selected = null;
        for($i=date("Y"); $i>=1970; $i--) 
        { 
			$index = (date("Y")-$i);
			if ($date!=null)
			{
				if (intval($date_parts[0]) == $i)
				{
					$year_selected = $index;
				}
			}				
                    
            $years[$index] = $i; 

        }

        $this->year_ctrl = new ListSelector($this->name()."_year", $years, $year_selected);
		
	}
	
	public function day() { return $this->day_ctrl->selected()+1; }
	public function month() { return $this->month_ctrl->selected()+1;}
	public function year() 
        { 
                                    $years = array();
                        for($i=date("Y"); $i>=1970; $i--) 
                        { 
                            $index = (date("Y")-$i);
                            $years[$index] = $i; 

                        }
            return $years[$this->year_ctrl->selected()];            
        }
	
	public function render()
	{
		$code = self::TD($this->day_ctrl->render()).self::TD($this->month_ctrl->render()).self::TD($this->year_ctrl->render());
		$code = self::TR($code);
		$code = self::TABLE($code);
		
		return $code;
	}

	public function to_date()
	{
                $date = new Date($this->year(), $this->month(), $this->day());
		return $date->to_date();
	}
        
        public function to_time()
        {
            return mktime(0, 0, 0, $this->month(), $this->day(), $this->year());
        }
        
        
}