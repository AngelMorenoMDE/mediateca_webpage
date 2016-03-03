<?php
    if ($debug) echo "\nAction: Form Validation";
    
    if ((isset($_POST["type"])) && ($_POST["type"] == "partial"))
    {
        require_once "/partial/partial.php";      
    }
    if ((isset($_POST["type"])) && ($_POST["type"] == "full"))
    {
        require_once "/full/full.php";
    }
?>
