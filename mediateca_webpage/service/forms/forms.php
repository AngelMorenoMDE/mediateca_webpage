<?php

// This section manage the help for fields forms
if ((isset($_POST["action"])) && ($_POST["action"] == "serialization")) 
{ 
    if ($debug) echo "\nAction: Serialization";
    require_once "/serialization/serialization.php";
    
}
?>
