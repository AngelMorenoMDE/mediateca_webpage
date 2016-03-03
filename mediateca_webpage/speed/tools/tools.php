<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tools
 *
 * @author ÁNGEL
 */
class Tools {
    
    public static function Integer2MoneyNotation($value)
    {
        $value_as_string = strval($value);

        $str2 = "";
        $c = 0;
        $i = strlen($value_as_string);
        while($i > 0)
        {
            if ($c == 3)
            { 
                $str2 = ".".$str2;
                $c = 0;
            }
            $str2 = $value_as_string[$i-1].$str2;
            $c++;
            $i--;
        }

        return $str2;
    }
    
}

?>
