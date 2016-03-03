<?php

    function toArrayAssoc($objects)
    {
        $data = array();
        foreach($objects as $object)
        {
            $data[$object->id()] = $object->name();
        }
        
        return $data;
    }
    
    function generateMonthsCampaign()
    {
        return [1=>"Enero", 2=>"Febrero", 3=>"Marzo", 4=>"Abril", 5 =>"Mayo", 6 =>"Junio",
                7=>"Julio", 8=>"Agosto", 9=>"Septiembre", 10 =>"Octubre", 11=>"Noviembre", 12=>"Diciembre"];
    }
    
    function getNameMonthNumber($monthNumber)
    {
        $months = [1=>"Enero", 2=>"Febrero", 3=>"Marzo", 4=>"Abril", 5 =>"Mayo", 6 =>"Junio",
                7=>"Julio", 8=>"Agosto", 9=>"Septiembre", 10 =>"Octubre", 11=>"Noviembre", 12=>"Diciembre"];
        return $months[$monthNumber];
    }
    
    function generateYearsCampaign()
    {
        $minYear = 2006;
        $maxYear = date('Y');
        $years = array();
        for($i=$maxYear; $i>=$minYear; $i--)
        {
            $years[] = $i;
        }
        
        return $years;
    }
    
    function generateDaysMonth()
    {
        
    }
?>