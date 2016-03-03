<?php
require_once "ini.php";
header("Content-Type:text/plain");
function generateArrayJSon($data)
{
    $str = "[";
    for($i=0; $i<count($data); $i++)
    {
        
        if ($i>0) 
        { 
            $str .= ", ";             
        }
        
        if ($data[$i]->name() == "")
        {
            $str .= "{'id':'-1', 'name':'Sin Selección'}";
        }
        else
        {
            $str .= "{";
            $str .= "'id':'".$data[$i]->id()."', 'name':'".$data[$i]->name()."'";
            $str .= "}";
        }

    }
    $str .="]";
    return trim($str);
}

if (isset($_POST["action"]) && ($_POST["action"] == "getTargetPeopleData"))
{
    
    $targetPeopleObj = new TargetPeople();
    echo generateArrayJSon($targetPeopleObj->get_all());
}

if (isset($_POST["action"]) && ($_POST["action"] == "getAdvertiserData"))
{
    $advertiser = new Advertiser();
    echo generateArrayJSon($advertiser->get_all());    
}

if (isset($_POST["action"]) && ($_POST["action"] == "getAdvAgencyData"))
{
    $advAgencyObj = new AdvAgency();
    echo generateArrayJSon($advAgencyObj->get_all());    
}

if (isset($_POST["action"]) && ($_POST["action"] == "getCampaignsData"))
{
    $campaignObj = new Campaign();
    $campaignObj->limit(1);
    $targetPeopleObj = new TargetPeople();
    echo "[";
    $c = 0;
    foreach ($campaignObj->get_all() as $campaign) 
    {
        if ($c>0) echo ",";
        echo "{";
        echo "'id':'".$campaign->id()."', ";
        echo "'name':'".$campaign->name()."', ";
        echo "'year':'".$campaign->year()."', ";
        echo "'months':'".$campaign->months()."', ";
        echo "'date_start':'".$campaign->date_start()."', ";
        echo "'date_end':'".$campaign->date_end()."', ";
        echo "'target':'".$campaign->target()."', ";
        $targetPeopleObj = new TargetPeople();
        $targetPeopleObj->id($campaign->target_people());
        $targetPeopleObj->get();
        echo "'target_people':'".$targetPeopleObj->name()."', ";
        echo "'cost':'".$campaign->cost()."'";
        //echo "'summary':'".$campaign->summary()."'";
        echo "}";
        $c++;
    }
    echo "]";
}

if (isset($_POST["action"]) && ($_POST["action"] == "getCampaignsDataPersonalized"))
{
    $campaignObj = new Campaign();
    $columns = array();
    
    if (isset($_POST["year"]))
    {
        $columns[] = 'year';
        $campaignObj->year(intval($_POST["year"]));
    }
    
    if (isset($_POST["target_people"]))
    {
        $columns[] = 'target_people';
        $campaignObj->target_people(intval($_POST["target_people"]));
    }
    
    if (isset($_POST["advertiser"]))
    {
        $columns[] = 'advertiser';
        $campaignObj->advertiser(intval($_POST["advertiser"]));
    }
    
    if (isset($_POST["adv_agency"]))
    {
        $columns[] = 'adv_agency';        
        $campaignObj->adv_agency(intval($_POST["adv_agency"]));
    }
    
    //$campaignObj->limit(1);

    echo "[";
    $c = 0;
    $data = $campaignObj->find_by($columns);


    foreach ($data as $campaign) 
    {
        if ($c>0) echo ",";
        echo "{";
        echo "'id':'".$campaign->id()."', ";
        echo "'name':'".$campaign->name()."', ";
        echo "'year':'".$campaign->year()."', ";
        echo "'months':'".$campaign->months()."', ";
        echo "'date_start':'".$campaign->date_start()."', ";
        echo "'date_end':'".$campaign->date_end()."', ";
        echo "'target':'".$campaign->target()."', ";
        $targetPeopleObj = new TargetPeople();
        $targetPeopleObj->id($campaign->target_people());
        $targetPeopleObj->get();
        echo "'target_people':'".$targetPeopleObj->name()."', ";
        echo "'cost':'".$campaign->cost()."'";
        //echo "'summary':'".$campaign->summary()."'";
        echo "}";
        $c++;
    }
    echo "]";
}
?>
