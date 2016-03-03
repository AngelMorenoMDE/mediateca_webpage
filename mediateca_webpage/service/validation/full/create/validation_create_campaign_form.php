<?php 
    $formOK = true;
    
    $formName = "createCampaignForm";
    
    $fields = ["nameCreateCampaignForm", "targetCreateCampaignForm", "dayStartCreateCampaignForm",
                "monthStartCreateCampaignForm", "yearStartCreateCampaignForm", "dayEndCreateCampaignForm",
                "monthEndCreateCampaignForm", "yearEndCreateCampaignForm", "targetPeopleCreateCampaignForm",
                "advertiserCreateCampaignForm", "advAgencyCreateCampaignForm", "costCreateCampaignForm",
                "summaryCreateCampaignForm"];

    $fieldsNamesLang = ["nameCreateCampaignForm" => "Nombre de la Campaña", 
               "targetCreateCampaignForm" => "Objetivo", 
                "dayStartCreateCampaignForm" => "Día de Inicio",
                "monthStartCreateCampaignForm" => "Mes de Inicio", 
                "yearStartCreateCampaignForm" => "Año de Inicio", 
                "dayEndCreateCampaignForm" => "Día de Fin",
                "monthEndCreateCampaignForm" => "Mes de Fin",
                "yearEndCreateCampaignForm" => "Año de Fin",
                "targetPeopleCreateCampaignForm" => "Público Objetivo",
                "advertiserCreateCampaignForm" => "Organismo Público", 
                "advAgencyCreateCampaignForm" => "Ministerio", 
                "costCreateCampaignForm" => "Coste",
                "summaryCreateCampaignForm" => "Resumen"];    

    
    $requiredFields = ["nameCreateCampaignForm", "targetCreateCampaignForm", "dayStartCreateCampaignForm",
                "monthStartCreateCampaignForm", "yearStartCreateCampaignForm", "dayEndCreateCampaignForm",
                "monthEndCreateCampaignForm", "yearEndCreateCampaignForm", "targetPeopleCreateCampaignForm",
                "advertiserCreateCampaignForm", "advAgencyCreateCampaignForm", "costCreateCampaignForm",
                "summaryCreateCampaignForm"];
    
    $validators = ["nameCreateCampaignForm" => "", 
               "targetCreateCampaignForm" => "", 
                "dayStartCreateCampaignForm" => "",
                "monthStartCreateCampaignForm" => "", 
                "yearStartCreateCampaignForm" => "", 
                "dayEndCreateCampaignForm" => "",
                "monthEndCreateCampaignForm" => "",
                "yearEndCreateCampaignForm" => "",
                "targetPeopleCreateCampaignForm" => "",
                "advertiserCreateCampaignForm" => "", 
                "advAgencyCreateCampaignForm" => "", 
                "costCreateCampaignForm" => "",
                "summaryCreateCampaignForm" => ""];   
    
    $errors = ["nameCreateCampaignForm" => array(), 
               "targetCreateCampaignForm" => array(), 
                "dayStartCreateCampaignForm" => array(), 
                "monthStartCreateCampaignForm" => array(), 
                "yearStartCreateCampaignForm" => array(), 
                "dayEndCreateCampaignForm" => array(), 
                "monthEndCreateCampaignForm" => array(), 
                "yearEndCreateCampaignForm" => array(), 
                "targetPeopleCreateCampaignForm" => array(), 
                "advertiserCreateCampaignForm" => array(), 
                "advAgencyCreateCampaignForm" => array(), 
                "costCreateCampaignForm" => array(), 
                "summaryCreateCampaignForm" => array()];  

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
    
    if (!Validation::check_dateB_is_high_dateA($values["dayStartCreateCampaignForm"], 
                                              $values["monthStartCreateCampaignForm"], 
                                              $values["yearStartCreateCampaignForm"],
                                                $values["dayEndCreateCampaignForm"], 
                                              $values["monthEndCreateCampaignForm"], 
                                              $values["yearEndCreateCampaignForm"], 1))
    {
        $errors["yearEndCreateCampaignForm"][] = "La Fecha de Inicio debe ser superior en al menos 1 día a la Fecha de Fin de la duración de la campaña";
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
                $jsonQuery .= "\"form\":\"createCampaignForm\"";
    }
    

    $jsonQuery .= "}";
    
    echo $jsonQuery;    
    
?>

