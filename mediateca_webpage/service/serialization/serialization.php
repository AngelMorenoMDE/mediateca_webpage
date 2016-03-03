<?php

$form = "";

if (isset($_POST["form"]))
{
    $form = $_POST["form"];
    if ($debug) echo "\nForm: $form";    
}

// This section manage the help for fields forms
if ((isset($_POST["form"])) && ($form == "createCampaignForm")) 
{ 
    require_once "/create/serialization_create_campaign_form.php"; 
}

// This section manage the help for fields forms
if ((isset($_POST["form"])) && ($form == "createTargetPeopleForm")) 
{ 
    require_once "/create/serialization_create_target_people_form.php";
}

// This section manage the help for fields forms
if ((isset($_POST["form"])) && ($form == "createAdvertiserForm")) 
{ 
    require_once "/create/serialization_create_advertiser_form.php";
}

// This section manage the help for fields forms
if ((isset($_POST["form"])) && ($form == "createAdvAgencyForm")) 
{ 
    require_once "/create/serialization_create_adv_agency_form.php";    
}

// This section manage the help for fields forms
if ((isset($_POST["form"])) && ($form == "createUserForm")) 
{ 
    require_once "/create/serialization_create_user_form.php";    
}
// This section manage the help for fields forms
if ((isset($_POST["form"])) && ($form == "modifyCampaignForm")) 
{ 
    require_once "/modify/serialization_modify_campaign_form.php";    
}

?>
