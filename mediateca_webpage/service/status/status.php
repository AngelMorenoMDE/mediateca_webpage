<?php

// This section manage the interface
if ((isset($_POST["section"])) && ($_POST["section"] == "page")) 
{ 
    if ($debug) echo "Section: Page\n";
    require_once "/section/page/page.php";
}
?>
