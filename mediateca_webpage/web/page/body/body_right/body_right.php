<?php require_once $_SERVER["DOCUMENT_ROOT"]."/mediateca/web/ini.php"; ?>
<?php if (isset($_POST["go"]) && ($_POST["go"]=="recoverMyPassword")) { ?>

    <?php require_once "/view/recover_my_password.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="detailsCampaign")) { ?>

    <?php require_once "/view/view_details_campaign.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="viewMyProfile")) { ?>

    <?php require_once "/view/view_my_profile.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="viewLogin")) { ?>

    <?php require_once "/view/view_login.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createMyUser")) { ?>

    <?php require_once "/create/create_my_user.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createCampaign")) { ?>

    <?php require_once "/create/create_campaign.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createTargetPeople")) { ?>

    <?php require_once "/create/create_target_people.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createAdvertiser")) { ?>

    <?php require_once "/create/create_advertiser.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createAdvAgency")) { ?>

    <?php require_once "/create/create_adv_agency.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createUserForm")) { ?>

    <?php require_once "/create/create_user_form.php"; ?>    

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createMedia")) { ?>

    <?php require_once "/create/create_media.php"; ?>      

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createMediaFTP")) { ?>

    <?php require_once "/create/create_media_ftp.php"; ?> 

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listTargetPeople")) {  ?>

    <?php require_once "/list/list_target_people.php"; ?> 

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listAdvertiser")) { ?>
    
    <?php require_once "/list/list_advertiser.php"; ?>     
    
<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listAdvAgency")) { ?>
    
    <?php require_once "/list/list_adv_agency.php"; ?>    

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listTag")) { ?>
    
    <?php require_once "/list/list_tag.php"; ?>     
    
<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listUsers")) { ?>
    
    <?php require_once "/list/list_user.php"; ?>         

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="campaignsSearcher")) { ?>

    <?php require_once "/list/list_campaign.php"; ?>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="modifyCampaign")) { ?>

    <?php require_once "/modify/modify_campaign.php"; ?>

<?php } ?>