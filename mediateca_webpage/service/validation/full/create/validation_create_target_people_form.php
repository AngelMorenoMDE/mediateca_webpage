<?php

    $formOK = true;
    
    $formName = "createTargetPeopleForm";
    $fields = ["nameCreateTargetPeopleForm"];
    $fieldsNamesLang = ["nameCreateTargetPeopleForm"=>"Nombre del Público Objetivo"];
    $requiredFields = ["nameCreateTargetPeopleForm"];
    $validators = ["nameCreateTargetPeopleForm"=>""];
    $values = array();
    $errors = ["nameCreateTargetPeopleForm"=>array()];

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