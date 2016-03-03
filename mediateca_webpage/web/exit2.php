<?php
require_once "ini.php";
require_once speed . system;

SYSTEM::INIT_SESSION();
SYSTEM::KILL_SESSION();

SYSTEM::GO("search.php");
?>
