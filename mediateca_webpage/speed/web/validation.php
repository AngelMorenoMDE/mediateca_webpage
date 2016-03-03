<?php

class Validation
{
    public static function check_dateB_is_high_dateA($dayA, $monthA, $yearA, $dayB, $monthB, $yearB, $diferenceDays)
    {
        $daysA = $yearA + ($monthA * 30) + $dayA;
        //echo "\nDaysA: $daysA MontsA: $monthA YearA: ".$yearA;
        
        $daysB = $yearB + ($monthB * 30) + $dayB;
        //echo "\nDaysB: $daysB MontsB: $monthB YearB: ".$yearB;
        //echo "\nDaysA: $daysA";
        //echo "\nDaysB: $daysB";
        $difference = ($daysB - $daysA);
        //echo "\nDifference: $difference\n";
        if ($difference>= $diferenceDays)
        {
            return 1;
        }
        else
            return 0;
    }
    
    public static function check_empty_fields($fields, &$values, &$errors, &$fieldsNamesLang)
    {
        $formOK = true;
        for($i=0; $i<count($fields); $i++)
        {
            if (Config::getDebugModeService()) echo "\nComprobando el campo ".$fields[$i];
            if (isset($_POST[$fields[$i]]))
            {
                $values[$fields[$i]] = $_POST[$fields[$i]];

                if ($values[$fields[$i]] == "")
                {
                    $formOK = false;
                    if (Config::getDebugModeService())
                    {
                        echo "\nFalla el campo ".$fields[$i];
                        echo "\nEl campo " . $fieldsNamesLang[$fields[$i]] . " está vacio";
                    }
                    $errors[$fields[$i]][] = "El campo " . $fieldsNamesLang[$fields[$i]] . " está vacio";                
                }
            }
            else
            {
                $formOK = false;
                if (Config::getDebugModeService())
                {
                    echo "\nFalla el campo ".$fields[$i];
                    echo "\nEl campo " . $fieldsNamesLang[$fields[$i]] . " no está inicializado";
                }
                $errors[$fields[$i]][] = "El campo " . $fieldsNamesLang[$fields[$i]] . " no está inicializado";
            }
        }
        
        return $formOK;
    }
}
?>
