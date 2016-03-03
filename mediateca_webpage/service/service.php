<?php 

require_once $_SERVER["DOCUMENT_ROOT"]."/mediateca/web/ini.php";

$debug = 0;

// Show the POST Content
if ($debug)
{
    echo "\nPOST DATA:\n";
    print_r($_POST);
    echo "\n\n";
}

// Stablish the HTTP Response in text/plain format
header("Content-Type:text/plain");

// This Section manage the form validation query's
if ((isset($_POST["service"])) && ($_POST["service"] == "validation")) 
{ 
    require_once "/validation/validation.php";
}

// This section manage the ORM query's
if ((isset($_POST["service"])) && ($_POST["service"] == "orm")) 
{ 
    require_once "/orm/orm.php";
}

// This section manage the help service
if ((isset($_POST["service"])) && ($_POST["service"] == "help")) 
{ 
    require_once "/help/help.php";
} 

// This section manage the interface
if ((isset($_POST["service"])) && ($_POST["service"] == "interface")) 
{ 
    if ($debug) echo "Service: Interface";
    require_once "/interface/interface.php";
}

// This section manage the interface
if ((isset($_POST["service"])) && ($_POST["service"] == "forms")) 
{ 
    if ($debug) echo "Service: Forms";
    require_once "/forms/forms.php";
}

// This section manage the interface
if ((isset($_POST["service"])) && ($_POST["service"] == "info")) 
{ 
    if ($debug) echo "Service: Info\n";
    require_once "/status/status.php";
}

// This section manage the interface
if ((isset($_POST["service"])) && ($_POST["service"] == "serialization")) 
{ 
    if ($debug) echo "Service: Serialization";
    require_once "/serialization/serialization.php";
}

// This section manage the interface
if ((isset($_POST["service"])) && ($_POST["service"] == "system")) 
{ 
    if ($debug) echo "Service: Serialization";
    require_once "/system/system.php";
}

?>
