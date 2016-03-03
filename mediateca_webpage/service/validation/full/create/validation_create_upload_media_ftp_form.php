<?php

$campaingSelected = $_POST["id_campaign"];

$filesSelected = array();
if (isset($_POST["checboxs"]))
{
    $filesSelected = $_POST["checboxs"];
}

$virtualNames = array();
if (isset($_POST["virtualName"]))
{
    $virtualNames = $_POST["virtualName"];
}

$typeAdvices = array();
if (isset($_POST["typeAdvice"]))
{
    $typeAdvices = $_POST["typeAdvice"];
}

if (count($filesSelected) > 0)
{
    for($i=0; $i<count($filesSelected); $i++)
    {
        $extension = "";
        $file = Config::getPathFtpServerUploads().$mediaCampaingObj->file_name();
        $mediaCampaingObj = new MediaCampaign();
        $mediaCampaingObj->campaign($campaingSelected); 
        $mediaCampaingObj->title($virtualNames[$i]);
        $mediaCampaingObj->file_name($filesSelected[$i]);
        $mediaCampaingObj->media_support($typeAdvices[$i]);
        $mediaCampaingObj->mimetype(mime_content_type($file));
        $mediaCampaingObj->size(filesize($file));
        $parts = explode(".", $mediaCampaingObj->file_name());        
        $mediaCampaingObj->extension(".".strtolower($parts[count($parts)-1]));
        if (in_array($extension, CONFIG::getValidVideoExtensions()))
        {                    
            $mediaCampaingObj->type(MediaCampaign::$VIDEO);
        }
        else if (in_array($extension, CONFIG::getValidAudioExtensions()))
        {

            $mediaCampaingObj->type(MediaCampaign::$AUDIO);
        }
        else
        {
            $mediaCampaingObj->type(MediaCampaign::$DOCUMENT);
        }
        /*rename(Config::getPathFtpServerUploads().$mediaCampaingObj->file_name(), 
               Config::getPathWebServerUploads().$mediaCampaingObj->file_name());*/
    }
    
    echo Json::jsonObject(JSon::jsonAttribute("result", "\"OK\""));
}
else
{
    echo Json::jsonObject(JSon::jsonAttribute("result", "\"fail\""));
}

echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
