<?php

require_once "ini.php";

if (array_key_exists("id", $_GET))
{

    $id = htmlentities($_GET["id"]);
    $media = new MediaCampaign();
    $media->id($id);
    $media->get();

    $name = str_replace(" ", "_", $media->file_name());
   
    $mime = $media->mimetype();
    $to_down = Config::$uploads."/".$media->file_name();
    
    header('Content-Description: File Transfer');
    header('Content-Type: '.$mime);
    header('Content-Disposition: attachment; filename='.$name);
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . $media->size());
    ob_clean();
    flush();
    readfile($to_down);
    exit;
}

?>
