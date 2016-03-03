<?php


    $fields = ["nameModifyCampaignForm", "targetModifyCampaignForm", "dayStartModifyCampaignForm",
                "monthStartModifyCampaignForm", "yearStartModifyCampaignForm", "dayEndModifyCampaignForm",
                "monthEndModifyCampaignForm", "yearEndModifyCampaignForm", "targetPeopleModifyCampaignForm",
                "advertiserModifyCampaignForm", "advAgencyModifyCampaignForm", "costModifyCampaignForm",
                "summaryModifyCampaignForm"];
    
    $types = ["text", "text", "select", "select", "select", "select", "select", "select", 
              "select", "select", "select", "text", "text"];
    
    echo JSON::jsonSerialization($form, $fields, $types);
?>
