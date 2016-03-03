<?php

// This section manage the interface
if ((isset($_POST["action"])) && ($_POST["action"] == "close_session")) 
{ 
    System::INIT_SESSION();
    SYSTEM::KILL_SESSION();
}
?>
