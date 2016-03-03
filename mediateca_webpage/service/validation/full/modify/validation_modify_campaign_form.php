<?php 
    $formOK = true;
    
    $formName = "modifyCampaignForm";
    
    $fields = ["nameModifyCampaignForm", "targetModifyCampaignForm", "dayStartModifyCampaignForm",
                "monthStartModifyCampaignForm", "yearStartModifyCampaignForm", "dayEndModifyCampaignForm",
                "monthEndModifyCampaignForm", "yearEndModifyCampaignForm", "targetPeopleModifyCampaignForm",
                "advertiserModifyCampaignForm", "advAgencyModifyCampaignForm", "costModifyCampaignForm",
                "summaryModifyCampaignForm"];

    $fieldsNamesLang = ["nameModifyCampaignForm" => "Nombre de la Campaña", 
               "targetModifyCampaignForm" => "Objetivo", 
                "dayStartModifyCampaignForm" => "Día de Inicio",
                "monthStartModifyCampaignForm" => "Mes de Inicio", 
                "yearStartModifyCampaignForm" => "Año de Inicio", 
                "dayEndModifyCampaignForm" => "Día de Fin",
                "monthEndModifyCampaignForm" => "Mes de Fin",
                "yearEndModifyCampaignForm" => "Año de Fin",
                "targetPeopleModifyCampaignForm" => "Público Objetivo",
                "advertiserModifyCampaignForm" => "Organismo Público", 
                "advAgencyModifyCampaignForm" => "Ministerio", 
                "costModifyCampaignForm" => "Coste",
                "summaryModifyCampaignForm" => "Resumen"];    

    
    $requiredFields = ["nameModifyCampaignForm", "targetModifyCampaignForm", "dayStartModifyCampaignForm",
                "monthStartModifyCampaignForm", "yearStartModifyCampaignForm", "dayEndModifyCampaignForm",
                "monthEndModifyCampaignForm", "yearEndModifyCampaignForm", "targetPeopleModifyCampaignForm",
                "advertiserModifyCampaignForm", "advAgencyModifyCampaignForm", "costModifyCampaignForm",
                "summaryModifyCampaignForm"];
    
    $validators = ["nameModifyCampaignForm" => "", 
               "targetModifyCampaignForm" => "", 
                "dayStartModifyCampaignForm" => "",
                "monthStartModifyCampaignForm" => "", 
                "yearStartModifyCampaignForm" => "", 
                "dayEndModifyCampaignForm" => "",
                "monthEndModifyCampaignForm" => "",
                "yearEndModifyCampaignForm" => "",
                "targetPeopleModifyCampaignForm" => "",
                "advertiserModifyCampaignForm" => "", 
                "advAgencyModifyCampaignForm" => "", 
                "costModifyCampaignForm" => "",
                "summaryModifyCampaignForm" => ""];   
    
    $errors = ["nameModifyCampaignForm" => array(), 
               "targetModifyCampaignForm" => array(), 
                "dayStartModifyCampaignForm" => array(), 
                "monthStartModifyCampaignForm" => array(), 
                "yearStartModifyCampaignForm" => array(), 
                "dayEndModifyCampaignForm" => array(), 
                "monthEndModifyCampaignForm" => array(), 
                "yearEndModifyCampaignForm" => array(), 
                "targetPeopleModifyCampaignForm" => array(), 
                "advertiserModifyCampaignForm" => array(), 
                "advAgencyModifyCampaignForm" => array(), 
                "costModifyCampaignForm" => array(), 
                "summaryModifyCampaignForm" => array()];  

    $values = array();  
    
    $types = ["text", "text", "select", "select", "select", "select", "select", "select", 
              "select", "select", "select", "text", "text"];
    
    for($i=0; $i<count($fields); $i++)
    {
        if ($debug) echo "\nComprobando el campo ".$fields[$i];
        if (isset($_POST[$fields[$i]]))
        {
            $values[$fields[$i]] = $_POST[$fields[$i]];
            
            if ($values[$fields[$i]] == "")
            {
                $formOK = false;
                if ($debug) echo "\nFalla el campo ".$fields[$i];
                $errors[$fields[$i]][] = "El campo '" . $fieldsNamesLang[$fields[$i]] . "' está vacio";                
            }
        }
        else
        {
            $formOK = false;
            if ($debug) echo "\nFalla el campo ".$fields[$i];
            $errors[$fields[$i]][] = "El campo '" . $fieldsNamesLang[$fields[$i]] . "' no está inicializado";
        }
    }
    
    if (!Validation::check_dateB_is_high_dateA($values["dayStartModifyCampaignForm"], 
                                              $values["monthStartModifyCampaignForm"], 
                                              $values["yearStartModifyCampaignForm"],
                                                $values["dayEndModifyCampaignForm"], 
                                              $values["monthEndModifyCampaignForm"], 
                                              $values["yearEndModifyCampaignForm"], 1))
    {
        $errors["yearEndModifyCampaignForm"][] = "La Fecha de Inicio debe ser superior en al menos 1 día a la Fecha de Fin de la duración de la campaña";
    }
    
    
        if ($debug)
    {
        echo "\n\nErrors Array\n\n";
        print_r($errors);
        echo "\n\nJSON Result\n\n";
    }
    
    $jsonQuery = "{";
    if (!$formOK)
    {
        $jsonQuery .= "\"result\":\"fail\"";
        $jsonQueryErrors = ", \"errors\":[";
        $jsonQueryFieldsError = ", \"fieldsWithErrors\":[";
        $fe = 0;

        for($i=0; $i<count($fields); $i++)
        {            
            if (count($errors[$fields[$i]]))
            {
                if ($fe) { $jsonQueryFieldsError .= ","; $jsonQueryErrors .= ","; }
                for($j=0; $j<count($errors[$fields[$i]]); $j++)
                {
                    $jsonQueryFieldsError .= "\"".$fields[$i]."\"";
                    if ($j>0) $jsonQueryErrors .= ",";
                    $jsonQueryErrors .= "\"".$errors[$fields[$i]][$j]."\"";
                }
                $fe++;
            }

        }
        
        $jsonQueryErrors .= "]";
        $jsonQueryFieldsError .= "]";
        $jsonQuery .= $jsonQueryFieldsError . $jsonQueryErrors;
    }
    else
    {
                $jsonQuery .= "\"result\":\"ok\",";
                $jsonQuery .= "\"form\":\"modifyCampaignForm\"";
    }
    

    $jsonQuery .= "}";
    
    echo $jsonQuery;    
    
?>

