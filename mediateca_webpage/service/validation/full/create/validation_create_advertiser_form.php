<?php

    $formOK = true;
    
    $formName = "createAdvertiserForm";
    $fields = ["nameCreateAdvertiserForm"];
    $fieldsNamesLang = ["nameCreateAdvertiserForm"=>"Nombre del Organismo Público"];
    $requiredFields = ["nameCreateAdvertiserForm"];
    $validators = ["nameCreateAdvertiserForm"=>""];
    $values = array();
    $errors = ["nameCreateAdvertiserForm"=>array()];

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