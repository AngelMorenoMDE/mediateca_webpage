<?php


require_once "ini.php";
header('Content-Type: text/html; charset=utf-8');
$tagObj = new Tags();

$tags = $tagObj->get_all();

foreach ($tags as $tag) {
    
    echo "Tag: ".$tag->name()."<br>"; 
    
}

?>
