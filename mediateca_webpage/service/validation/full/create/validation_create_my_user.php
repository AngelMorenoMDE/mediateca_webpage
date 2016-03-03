<?php

    $formOK = true;
    
    $formName = "createUserForm";
    $fields = ["emailCreateUserForm", "realNameCreateUserForm", "passwordCreateUserForm", "confirmPasswordCreateUserForm", "userRoleCreateUserForm"];
    $checkbox = ["confirmPrivacyPolicyCreateUserForm"];
    $fieldsNamesLang = ["emailCreateUserForm" => "Correo Electrónico", 
                        "realNameCreateUserForm" => "Nombre y Apellidos", 
                        "passwordCreateUserForm" => "Contraseña", 
                        "confirmPasswordCreateUserForm" => "Confirmar Contraseña",
                        "confirmPrivacyPolicyCreateUserForm" => "Politica de Privacidad"];
    
    $requiredFields = ["emailCreateUserForm", 
                       "realNameCreateUserForm", 
                       "passwordCreateUserForm", 
                       "confirmPasswordCreateUserForm",
                       "confirmPrivacyPolicyCreateUserForm"];
    
    $validators = ["emailCreateUserForm" => "", 
                   "realNameCreateUserForm" => "", 
                   "passwordCreateUserForm" => "", 
                   "confirmPasswordCreateUserForm" => "",
                   "confirmPrivacyPolicyCreateUserForm" => ""];    
    
    $errors = ["emailCreateUserForm" => array(), 
               "realNameCreateUserForm" => array(), 
               "passwordCreateUserForm" => array(), 
               "confirmPasswordCreateUserForm" => array(),
               "confirmPrivacyPolicyCreateUserForm" => array()];

    $values = array();
    
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
    
    if (isset($_POST["confirmPrivacyPolicyCreateUserForm"]))
    {
        $valueCheckboxPrivacyPolicy = htmlentities($_POST["confirmPrivacyPolicyCreateUserForm"]);
        if ($valueCheckboxPrivacyPolicy === "false")
        {
            $formOK = false;
            $errors["confirmPrivacyPolicyCreateUserForm"][] = "Debe aceptar la " . $fieldsNamesLang["confirmPrivacyPolicyCreateUserForm"];
        }
    }
    
    if ($values["passwordCreateUserForm"] != $values["confirmPasswordCreateUserForm"])
    {
            $formOK = false;
            $errors["confirmPrivacyPolicyCreateUserForm"][] = "El campo '" . $fieldsNamesLang["confirmPasswordCreateUserForm"] . 
                                                              "' debe ser igual al campo '" . $fieldsNamesLang["passwordCreateUserForm"]."'";
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
            $userRoleObj = new UserRole();
            $userRoleObj->name("Usuario");
            $userRoleObj->get();
            $userRoleUsuarioID = $userRoleObj->id();
            echo "\nID: $userRoleUsuarioID\n";
            
            $userObj = new User();
           
                $jsonQuery .= "\"result\":\"ok\"";
    }
    

    $jsonQuery .= "}";
    
    echo $jsonQuery;
?>
