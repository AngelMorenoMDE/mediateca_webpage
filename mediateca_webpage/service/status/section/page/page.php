<?php

// This section manage the interface
if ((isset($_POST["query"])) && ($_POST["query"] == "actual_page")) 
{ 
    if ($debug) echo "Query: Actual Page\n";

    if (System::isSomeOneLogged())
    {
        echo "{\"go\":\"campaignsSearcher\"}";
    }
    else
    {
        echo "{\"go\":\"viewLogin\"}";
    }
    
}
?>
