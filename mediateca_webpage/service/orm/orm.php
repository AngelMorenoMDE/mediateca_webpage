<?php

if ((isset($_POST["action"])) && ($_POST["action"] == "create")) 
{ 
    require_once "/create/create.php";
}

if ((isset($_POST["action"])) && ($_POST["action"] == "update")) 
{ 
    require_once "/update/update.php";
}

if ((isset($_POST["action"])) && ($_POST["action"] == "delete")) 
{ 
    require_once "/delete/delete.php";
}

if ((isset($_POST["action"])) && ($_POST["action"] == "get")) 
{ 
    require_once "/get/get.php";
}

?>