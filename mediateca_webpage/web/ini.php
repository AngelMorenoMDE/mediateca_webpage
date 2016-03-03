<?php


    require_once $_SERVER["DOCUMENT_ROOT"]."/mediateca/speed/speed.php";
    
    require_once speed . system;
    require_once speed . core . date;
    require_once speed . iu . widgets . textfield;
    require_once speed . iu . widgets . passwordtextfield;    
    require_once speed . iu . widgets . listselector;
    require_once speed . iu . widgets . dateselector;
    require_once speed . iu . widgets . textareafield;
    require_once speed . iu . widgets . fileupload;
    require_once speed . web . request;
    require_once speed . web . html;
    require_once speed . web . session;
    require_once speed . web . validator;
    require_once speed . web . get;
    require_once speed . web . post;
    require_once speed . web . json;    
    require_once speed . web . validation; 
    
    require_once speed . tools;
    require_once model . user;
    require_once model . targetpeople;
    require_once model . advertiser;
    require_once model . advagency;
    require_once model . mediasupport;
    require_once model . tag;
    require_once model . tags;
    require_once model . tagcampaign;
    require_once model . campaign;   
    require_once model . comment;    
    require_once model . mediacampaign;
    require_once model . urlcampaign;
    require_once model . userrole;
    
    require_once templates . "Templates.php";
    require_once templates . mediatecabar;
    
    require_once project . "pages.php";
    
    require_once "/functions/functions.php";
    
    SYSTEM::INIT_SESSION();
    //SYSTEM::CHECK_SESSION();

	if (Request::Contains("campaigns_lnkbtn"))
        {
            $campaign = new Campaign();
            Session::Set('lastSelectIsSearch', false);
            $no_campaigns = count($campaign->get_all());
            Session::Set('lastSearchNoResults', $no_campaigns);
			Session::Set('offset', 0);
        }
    
?>

