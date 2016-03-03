<?php

    $formOK = true;
    
    $formName = "createUserForm";
    $fields = ["emailCreateUserForm", 
               "realNameCreateUserForm", 
               "passwordCreateUserForm", 
               "passwordConfirmCreateUserForm", 
               "userRolCreateUserForm"];

    $fieldsNamesLang = ["emailCreateUserForm" => "Correo Electrónico", 
                        "realNameCreateUserForm" => "Nombre y Apellidos", 
                        "passwordCreateUserForm" => "Contraseña", 
                        "passwordConfirmCreateUserForm" => "Confirmar Contraseña"];
    
    $requiredFields = ["emailCreateUserForm", 
                       "realNameCreateUserForm", 
                       "passwordCreateUserForm", 
                       "passwordConfirmCreateUserForm"];
    
    $validators = ["emailCreateUserForm" => "", 
                   "realNameCreateUserForm" => "", 
                   "passwordCreateUserForm" => "", 
                   "passwordConfirmCreateUserForm" => "",
                   "userRolCreateUserForm" => ""];    
    
    $errors = ["emailCreateUserForm" => array(), 
               "realNameCreateUserForm" => array(), 
               "passwordCreateUserForm" => array(), 
               "passwordConfirmCreateUserForm" => array(),
               "userRolCreateUserForm" => array()];

    $values = array();
    
    $formOK = Validation::check_empty_fields($fields, $values, $errors, $fieldsNamesLang);
    if ($debug)
    {
        echo "\n\nErrors Array\n\n";
        print_r($errors);
        echo "\n\nJSON Result\n\n";
    }
    

    
    if ($values["passwordCreateUserForm"] != $values["passwordConfirmCreateUserForm"])
    {
            $formOK = false;
            $errors["passwordConfirmCreateUserForm"][] = "El campo '" . $fieldsNamesLang["passwordConfirmCreateUserForm"] . 
                                                              "' debe ser igual al campo '" . $fieldsNamesLang["passwordCreateUserForm"]."'";
    }
    
    
    if (!$formOK)
    {
        echo JSON::jsonErrorMsgForm($fields, $errors);
    }
    else
    {
            
            $userObj = new User();
            $userObj->email($values["emailCreateUserForm"]);
            $userObj->name($values["realNameCreateUserForm"]);
            $userObj->password($values["passwordCreateUserForm"]);
            $userObj->rol($values["userRolCreateUserForm"]);

            if ($userObj->exist())
            {
                $errors["emailCreateUserForm"][] = "Ya existe un usuario con el email: ".$values["emailCreateUserForm"];
                echo JSON::jsonErrorMsgForm($fields, $errors);
            }
            else
            {
                $userObj->save();
                echo JSON::jsonResultOK($formName);
            }
           
            
    }

?>
