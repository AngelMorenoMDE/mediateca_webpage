<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WebData
{
    
    public static function generateYearsData()
    {
        $data = array();        
	$data[0] = 'Todos';
	for ($i = date("Y"); $i >= 1970; $i--) 
        {
		$data[((date("Y")+1)-$i)] = $i;
	}
        
        return $data;
    }
    
    
}
?>
