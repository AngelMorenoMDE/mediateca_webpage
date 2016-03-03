<?php

if ((isset($_POST["section"])) && ($_POST["section"] == "notification")) 
{ 
    require_once "/notification/notification.php";
}
if ((isset($_POST["section"])) && ($_POST["section"] == "menu_up")) 
{ 
    require_once "/menu_up/menu_up.php";
}
if ((isset($_POST["section"])) && ($_POST["section"] == "head")) 
{ 
    require_once "/head/head.php";
}
if ((isset($_POST["section"])) && ($_POST["section"] == "body")) 
{ 
    if ($debug) echo "\nSection: Body";
    require_once "/body/body.php";
}
if ((isset($_POST["section"])) && ($_POST["section"] == "footer")) 
{ 
    require_once "/footer/footer.php";
}
if ((isset($_POST["section"])) && ($_POST["section"] == "profile")) 
{ 
    require_once "/profile/profile.php";
}
?>
