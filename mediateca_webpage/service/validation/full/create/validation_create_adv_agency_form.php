<?php

    $formOK = true;
    
    $formName = "createAdvAgencyForm";
    $fields = ["nameCreateAdvAgencyForm"];
    $fieldsNamesLang = ["nameCreateAdvAgencyForm"=>"Nombre del Ministerio"];    
    $requiredFields = ["nameCreateAdvAgencyForm"];
    $validators = ["nameCreateAdvAgencyForm"=>""];
    $values = array();
    $errors = ["nameCreateAdvAgencyForm"=>array()];
    
    $formOK = Validation::check_empty_fields($fields, $values, $errors, $fieldsNamesLang);


    if (!$formOK)
    {
        echo JSON::jsonErrorMsgForm($fields, $errors);
    }
    else
    {
        echo JSON::jsonResultOK();
    }
    ?>