<?php

require_once "ini.php";

SYSTEM::CHECK_SESSION();
SYSTEM::SET_BACK("new_campaign.php");


$campaign_name = new TextField("campaign_name");
$campaign_target = new TextField("campaign_target");

$date_start = new DateSelector("date_s");

$date_end = new DateSelector("date_e");


$advertising_agency = new TextField("advertising_agency");

$campaign_cost = new TextField("campaign_cost");

$list_media = new ListSelector("media_support", new MediaSupport());

$advagency = new ListSelector("advagency", new AdvAgency());

$advertiser = new ListSelector("advertiser", new Advertiser());

$summary = new TextAreaField("summary");
$targetpeople = new ListSelector("target_people", new TargetPeople());

$campaign_tags = new TextField("campaign_tags");

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

if (array_key_exists("save", $_POST))
{
		$error_campaign_name = "";
		$error_campaign_target = "";
        $error_advertising_agency = "";
		$error_campaign_cost = "";
		$error_summary = "";
		$error_tags = "";
		
		$error_campaign_name = $validator_campaign_name->check();
		$error_campaign_target = $validator_campaign_target->check();
        $error_advertising_agency = $validator_advertising_agency->check();
		$error_campaign_cost = $validator_campaign_cost->check();
		$error_summary = $validator_campaign_summary->check();
		$error_tags = $validator_campaign_tags->check();

        $error_date = ($date_start->to_time()>= $date_end->to_time()) ? "La fecha de fin tiene que ser mayor que la fecha de inicio":"";
                
		$error = $error_campaign_name != "";
		$error .= $error_campaign_target != "";
		$error .= $error_campaign_cost != "";
                $error .= $error_advertising_agency != "";
		$error .= $error_summary != "";
		$error .= $error_tags != "";
                $error .= $error_date != "";
		
                $error_general .= $error_date;
                
		if (!$error)
		{
			$c = new Campaign();
			$c->name($campaign_name->value());

			$c->target($campaign_target->value());

			$c->date_start($date_start->to_date());

			$c->date_end($date_end->to_date());

                        $c->year($date_start->year());

                        // Revisar!!
			$c->months($date_end->month()-$date_start->month());

			$c->advertiser($advertiser->selected());

			$c->adv_agency($advagency->selected());

			$c->target_people($targetpeople->selected());

                        $c->advertising_agency($advertising_agency->value());
                        
			$c->cost($campaign_cost->value());

			$c->summary($summary->value());

			
                        $c->save();

			$c2 = $c->find_by(array('adv_agency','advertiser', 'date_start', 'date_end', 'cost'));

	
			
			if ($campaign_tags->value()!="")
                        {
                            $tags = preg_split("/,/", $campaign_tags->value());


                            foreach ($tags as $tag) 
                            {
                                $newTag = new Tags();
                                $newTag->name(trim($tag));
                                if (count($newTag->get_all()))
                                {
                                    $newTag->get();
                                    
                                    $tagCampaign = new TagCampaign();
                                    $tagCampaign->id_campaign($c2[0]->id());
                                    $tagCampaign->id_tag($newTag->id());
                                    $tagCampaign->save();
                                }
                                else
                                {
                                    $newTag->save();
                                    $newTag->get();
                                    
                                    $tagCampaign = new TagCampaign();
                                    $tagCampaign->id_campaign($c2[0]->id());
                                    $tagCampaign->id_tag($newTag->id());
                                    $tagCampaign->save();
                                }
                                
                                
                                    $ntag = new Tag();
                                    $ntag->id($c2[0]->id());
                                    $ntag->name(strtolower(trim($tag)));
                                    $ntag->save();
                            }
                        }
			SYSTEM::GO("campaigns.php");
                        
		}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <?php    require_once commons . "head.php"; ?>
    
<body>
    
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
                    <h1>Crear Nueva Campaña Publicitaria</h1>
		</div>            
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span>Crear Nueva Campaña</span></h2>
			<hr>
			<p><?php echo "Rellene los siguientes campos para crear una nueva campaña de publicidad";?></p>
			<p>&nbsp;</p>
			<p><div id="form">				
				<?php 
					$tr = Html::C5ROW("Nombre", $campaign_name->render(), $error_campaign_name);
					$tr .= Html::C5ROW("Objetivo", $campaign_target->render(), $error_campaign_target);
					$tr .= Html::C5ROW("Público Objetivo", $targetpeople->render(), "");
					$tr .= Html::C5ROW("Organismo", $advertiser->render(), "");
					$tr .= Html::C5ROW("Anunciante", $advagency->render(), "");
                                        $tr .= Html::C5ROW("Agencia de Publicidad", $advertising_agency->render(), $error_advertising_agency);
					$tr .= Html::C5ROW("Fecha de Inicio", $date_start->render(), "");
					$tr .= Html::C5ROW("Fecha de Fin", $date_end->render(), "") ;
					$tr .= Html::C5ROW("Coste (en euros)", $campaign_cost->render(), $error_campaign_cost);
					$tr .= Html::C5ROW("Resumen", $summary->render(), $error_summary);
					$tr .= Html::C5ROW("Etiquetas (separar por ',')", $campaign_tags->render(), $error_tags);
					$tr .= Html::C5ROW("", Html::SUBMIT("save", "Crear nueva campaña"), "");
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
