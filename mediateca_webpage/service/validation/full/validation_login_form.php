<?php

    $formOK = true;
    
    $formName = "loginForm";
    $fields = ["emailLoginForm", "passwordLoginForm"];
    $fieldsNamesLang = ["emailLoginForm"=>"Email", "passwordLoginForm"=>"Contraseña"];
    $requiredFields = ["emailLoginForm", "passwordLoginForm"];
    $validators = ["emailLoginForm"=>"", "passwordLoginForm"=>""];
    $values = array();
    $errors = ["emailLoginForm"=>array(), "passwordLoginForm"=>array()];

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
                $errors[$fields[$i]][] = "El campo " . $fieldsNamesLang[$fields[$i]] . " está vacio";                
            }
        }
        else
        {
            $formOK = false;
            if ($debug) echo "\nFalla el campo ".$fields[$i];
            $errors[$fields[$i]][] = "El campo " . $fieldsNamesLang[$fields[$i]] . " no está inicializado";
        }
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
            if ($fe) { $jsonQueryFieldsError .= ","; $jsonQueryErrors .= ","; }
            if (count($errors[$fields[$i]]))
            {
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
            $userObj = new User();
            $userObj->email($values["emailLoginForm"]);
            $userObj->password($values["passwordLoginForm"]);

            if ($userObj->exist())
            {
                    $userObj->get();

                    System::registerUser($userObj);
                    $jsonQuery .= "\"result\":\"ok\"";
            }
            else
            {
                    $jsonQuery .= "\"result\":\"fail\", \"fieldsWithErrors\":[], ";
                    $jsonQuery .= "\"errors\":[\"Fallo de inicio de sesión\"]";
            }
        
                
    }
    

    $jsonQuery .= "}";
    
    echo $jsonQuery;
    
    
    
    

?>
