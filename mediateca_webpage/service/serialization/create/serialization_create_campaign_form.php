<?php


    $fields = ["nameCreateCampaignForm", "targetCreateCampaignForm", "dayStartCreateCampaignForm",
                "monthStartCreateCampaignForm", "yearStartCreateCampaignForm", "dayEndCreateCampaignForm",
                "monthEndCreateCampaignForm", "yearEndCreateCampaignForm", "targetPeopleCreateCampaignForm",
                "advertiserCreateCampaignForm", "advAgencyCreateCampaignForm", "costCreateCampaignForm",
                "summaryCreateCampaignForm"];
    
    $types = ["text", "text", "select", "select", "select", "select", "select", "select", 
              "select", "select", "select", "text", "text"];
    
    echo JSON::jsonSerialization($form, $fields, $types);
?>
