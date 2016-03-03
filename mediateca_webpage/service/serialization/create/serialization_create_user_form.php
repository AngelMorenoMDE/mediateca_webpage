<?php

    $fields = ["emailCreateUserForm", "realNameCreateUserForm", "passwordCreateUserForm", "passwordConfirmCreateUserForm", "userRolCreateUserForm"];
    
    $types = ["text", "text", "password", "password", "select"];
    
    echo JSON::jsonSerialization($form, $fields, $types);
?>
