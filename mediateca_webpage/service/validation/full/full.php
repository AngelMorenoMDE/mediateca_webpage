<?php

        if ($debug) echo "\nType: Full Validation";
        
        // This section validate the form "uploadMediaForm" located in 
        // web/page/body/body_right/create/create_media.php
        if ((isset($_POST["form"])) && ($_POST["form"] == "uploadMediaForm")) 
        {
            if ($debug) echo "\nForm: uploadMediaForm";
            require_once "/validation_upload_media_form.php";
        }
     
        
        // This section validate the form "LoginForm" located in 
        // web/page/body/body_right/view/view_login.php         
        if ((isset($_POST["form"])) && ($_POST["form"] == "loginForm")) 
        {
            if ($debug) echo "\nForm: LoginForm";
            require_once "/login/validation_login_form.php";
        } 
        
        ////////////////////////////////////////////////////////////////////////
        ////////////// CREATE //////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        
        // This section validate the form "LoginForm" located in 
        // web/page/body/body_right/view/view_login.php         
        if ((isset($_POST["form"])) && ($_POST["form"] == "createTargetPeopleForm")) 
        {
            if ($debug) echo "\nForm: Target People Form";
            require_once "/create/validation_create_target_people_form.php";
        } 
        
        // This section validate the form "LoginForm" located in 
        // web/page/body/body_right/view/view_login.php         
        if ((isset($_POST["form"])) && ($_POST["form"] == "createAdvertiserForm")) 
        {
            if ($debug) echo "\nForm: Advertiser Form";
            require_once "/create/validation_create_advertiser_form.php";
        }         
        
        // This section validate the form "LoginForm" located in 
        // web/page/body/body_right/view/view_login.php         
        if ((isset($_POST["form"])) && ($_POST["form"] == "createAdvAgencyForm")) 
        {
            if ($debug) echo "\nForm: Advertiser Form";
            require_once "/create/validation_create_adv_agency_form.php";
        }         
        
        // This section validate the form "CreateUserForm" located in 
        // web/page/body/body_right/view/view_login.php         
        if ((isset($_POST["form"])) && ($_POST["form"] == "createUserForm")) 
        {
            if ($debug) echo "\nForm: Create User Form";
            require_once "/create/validation_create_user_form.php";
        }
        // This section validate the form "CreateUserForm" located in 
        // web/page/body/body_right/view/view_login.php         
        if ((isset($_POST["form"])) && ($_POST["form"] == "createCampaignForm")) 
        {
            if ($debug) echo "\nForm: createCampaignForm";
            require_once "/create/validation_create_campaign_form.php";
        } 
        
        
        // This section validate the form "uploadMediaForm" located in 
        // web/page/body/body_right/create/create_media.php
        if ((isset($_POST["form"])) && ($_POST["form"] == "uploadMediaFTPForm")) 
        {
            if ($debug) echo "\nForm: uploadMediaForm";
            require_once "/create/validation_create_upload_media_ftp_form.php";
        }        
        
        ////////////////////////////////////////////////////////////////////////
        ////////////// DELETE //////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        
        
        // This section validate the form "CreateUserForm" located in 
        // web/page/body/body_right/view/view_login.php         
        if ((isset($_POST["form"])) && ($_POST["form"] == "deleteUserForm")) 
        {
            if ($debug) echo "\nForm: createCampaignForm";
            require_once "/delete/delete_user_form.php";
        } 
        
        
        ////////////////////////////////////////////////////////////////////////
        ////////////// MODIFY //////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////        
        
        // This section validate the form "CreateUserForm" located in 
        // web/page/body/body_right/view/view_login.php         
        if ((isset($_POST["form"])) && ($_POST["form"] == "modifyCampaignForm")) 
        {
            if ($debug) echo "\nForm: modifyCampaignForm";
            require_once "/modify/validation_modify_campaign_form.php";
        }         
?>
