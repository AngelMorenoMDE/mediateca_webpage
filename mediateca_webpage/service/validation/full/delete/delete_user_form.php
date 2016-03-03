<?php

        if (isset($_POST["id"])) 
        {
            if ($debug) echo "\nForm: deleteUserForm";
            $userObj = new User();
            $userObj->id($_POST["id"]);
            
            $userObj->delete();
            
            $attrs["result"] = "ok";
            $attrs["form"] = "deleteUserForm";
            echo JSON::object(JSON::attributeList($attrs));
            
        }    
?>
