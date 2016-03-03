<?php

require_once "ini.php";
SYSTEM::CHECK_SESSION();
if (!SYSTEM::ADMIN_MODE())
{
	SYSTEM::GO("campaigns.php");
}

SYSTEM::SET_BACK("new_campaign.php");

if (!Session::Contains("modify"))
{
    System::goToPage("campaigns.php");
}

$campaign = new Campaign();
$campaign->id($_SESSION["modify"]);
$campaign->get();


// View Definition

if (!array_key_exists("modify", $_POST))
{
    $campaign_name = new TextField("campaign_name", $campaign->name());
    $campaign_target = new TextField("campaign_target", $campaign->target());
    $date_start = new DateSelector("date_s", $campaign->date_start());
    $date_end = new DateSelector("date_e", $campaign->date_end());
    $campaign_cost = new TextField("campaign_cost", $campaign->cost());
    $advagency = new ListSelector("advagency", new AdvAgency(), $campaign->adv_agency());
    $advertiser = new ListSelector("advertiser", new Advertiser(), $campaign->advertiser());
    $advertising_agency = new TextField("advertising_agency", $campaign->advertising_agency());

    $summary = new TextAreaField("summary", $campaign->summary());
    $targetpeople = new ListSelector("target_people", new TargetPeople(), $campaign->target_people());


    $tagCampaigns = new TagCampaign();

    $tagCampaigns->id_campaign($campaign->id());
    $tags = $tagCampaigns->get_all();
    $tagstr = "";
    if (count($tags))
    {

        $c=0;
        foreach ($tags as $tagCampaign) 
        {
            $tag = new Tags();
            $tag->id($tagCampaign->id_tag());
            $tag->get();


            if ($c) $tagstr .= ", ";
            $tagstr .= $tag->name();
            $c++;
        }
    }
    $campaign_tags = new TextField("campaign_tags", $tagstr);
}
else
{
    $campaign_name = new TextField("campaign_name", $_POST["campaign_name"]);
    $campaign_target = new TextField("campaign_target", $_POST["campaign_target"]);
    $date_start = new DateSelector("date_s", $_POST["date_s_year"]."-".$_POST["date_s_month"]."-".$_POST["date_s_day"]);
    $date_end = new DateSelector("date_e", $_POST["date_e_year"]."-".$_POST["date_e_month"]."-".$_POST["date_e_day"]);
    $campaign_cost = new TextField("campaign_cost", $_POST["campaign_cost"]);
    $advagency = new ListSelector("advagency", new AdvAgency(), $_POST["advagency"]);
    $advertiser = new ListSelector("advertiser", new Advertiser(), $_POST["advertiser"]);
    $advertising_agency = new TextField("advertising_agency", $_POST["advertising_agency"]);

    $summary = new TextAreaField("summary", $_POST["summary"]);
    $targetpeople = new ListSelector("target_people", new TargetPeople(), $_POST["target_people"]);

    $campaign_tags = new TextField("campaign_tags", $_POST["campaign_tags"]);
}

// Validator Definition

$error_campaign_name = "";
$validator_campaign_name = new Validator($campaign_name->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC));

$error_campaign_target = "";
$validator_campaign_target = new Validator($campaign_target->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC));

$error_advertising_agency = "";
$validator_advertising_agency = new Validator($advertising_agency->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC));

$error_campaign_cost = "";
$validator_campaign_cost = new Validator($campaign_cost->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_NUMBERS), 8);

$error_summary = "";
$validator_campaign_summary = new Validator($summary->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC));

$error_tags = "";
$validator_campaign_tags = new Validator($campaign_tags->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC));
$error_general = "";

// Check Fields Logic

if (array_key_exists("modify", $_POST))
{

		$error_campaign_name = "";
		$error_campaign_target = "";
		$error_campaign_cost = "";
		$error_summary = "";
		$error_tags = "";

		$error_campaign_name = $validator_campaign_name->check();
		$error_campaign_target = $validator_campaign_target->check();
		$error_campaign_cost = $validator_campaign_cost->check();
		$error_summary = $validator_campaign_summary->check();
		$error_tags = $validator_campaign_tags->check();
                $error_advertising_agency = $validator_advertising_agency->check();
		

                $error_date = ($date_start->to_time()>= $date_end->to_time()) ? "La fecha de fin tiene que ser mayor que la fecha de inicio":"";
                
		$error = $error_campaign_name != "";
                $error |= $error_advertising_agency != "";
		$error |= $error_campaign_target != "";
		$error |= $error_campaign_cost != "";
		$error |= $error_summary != "";
		$error |= $error_tags != "";
                $error |= $error_date != "";
                
		$error_general .= $error_date;
                
		if (!$error)
		{
			$c = new Campaign();
			$c->id($campaign->id());
			$c->name($campaign_name->value());
			$c->target($campaign_target->value());
			$c->date_start($date_start->to_date());
			$c->date_end($date_end->to_date());
			$c->year($date_start->year());
			$c->months($date_end->month()-$date_start->month());
			$c->advertiser($advertiser->selected());
                        $c->advertising_agency($advertising_agency->value());
			
			$c->adv_agency($advagency->selected());
			$c->target_people($targetpeople->selected());
			$c->cost($campaign_cost->value());
			$c->summary($summary->value());
			
                        $c->debug();
			$c->update();

			$tags = preg_split("/,/", $campaign_tags->value());
			
			$tagsCampaign = new TagCampaign();
			$tagsCampaign->id_campaign($campaign->id());
			$tagsCampaign->delete();
			
                        foreach ($tags as $tag) 
                        {
                            $newTag = new Tags();
                            $newTag->name(trim($tag));
                            if (count($newTag->get_all()))
                            {
                                $newTag->get();

                                $tagCampaign = new TagCampaign();
                                $tagCampaign->id_campaign($campaign->id());
                                $tagCampaign->id_tag($newTag->id());
                                $tagCampaign->save();
                            }
                            else
                            {
                                $newTag->save();
                                $newTag->get();

                                $tagCampaign = new TagCampaign();
                                $tagCampaign->id_campaign($campaign->id());
                                $tagCampaign->id_tag($newTag->id());
                                $tagCampaign->save();
                            }


                                $ntag = new Tag();
                                $ntag->id($campaign->id());
                                $ntag->name(strtolower(trim($tag)));
                                $ntag->save();
                        }
                        $campaign = new Campaign();
                        Session::Set('lastSelectIsSearch', false);
                        $no_campaigns = count($campaign->get_all());
                        Session::Set('lastSearchNoResults', $no_campaigns);
			Session::Set('offset', 0);
			System::goToPage("campaigns.php");
	
		}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php    require_once commons . "head.php"; ?>
    
<body>
    <div id="menu-user">
        <div id="menu-user-wellcome">
            <span>Bienvenido, <?php echo SYSTEM::GET_REGISTER_USER()->name()."<a href='./exit.php'>SALIR</a>"; ?></span>
        </div>
    </div>    
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="campaigns.php">MAPI</a></h1>
		</div>
		<div id="menu">
			<h1>Modificar Campaña Publicitaria</h1>
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span>Modificar Campaña</span></h2>
			<hr>
			<p><?php echo "Rellene los siguientes campos para crear una nueva campaña de publicidad";?></p>
			<p>&nbsp;</p>
			<p><div id="form">				
				<?php 
					$tr = Html::C5ROW("Nombre", $campaign_name->render(), $error_campaign_name);
					$tr .= Html::C5ROW("Objetivo", $campaign_target->render(), $error_campaign_target);
					$tr .= Html::C5ROW("Audiencia", $targetpeople->render(), "");
					$tr .= Html::C5ROW("Organismo", $advertiser->render(), "");
					$tr .= Html::C5ROW("Anunciante", $advagency->render(), "");
                                        $tr .= Html::C5ROW("Agencia de Publicidad",  $advertising_agency->render(), $error_advertising_agency);                                        
					$tr .= Html::C5ROW("Fecha de Inicio", $date_start->render(), "");
					$tr .= Html::C5ROW("Fecha de Fin", $date_end->render(), "") ;
					$tr .= Html::C5ROW("Coste (€)", $campaign_cost->render(), $error_campaign_cost);
					$tr .= Html::C5ROW("Resumen", $summary->render(), $error_summary);
					$tr .= Html::C5ROW("Etiquetas (separar por ',')", $campaign_tags->render(), $error_tags);
					$tr .= Html::C5ROW("", Html::SUBMIT("modify", "Modificar campaña"), "");
                                        $tr .= Html::C5ROW("", $error_general, "");
					echo Html::FORM("campaign_form", "", "POST", Html::TABLE($tr));
				?>
			</div></p>

		</div>
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>
