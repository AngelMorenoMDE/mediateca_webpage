<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CampaignTemplate
 *
 * @author ÁNGEL
 */
class Templates {
    //put your code here
    
    public static function CampaignFullDetailsTable($campaign_object)
    {

		$row = Html::C2ROW("Campaña ", $campaign_object->name(), "campaign_left");
		$row .= Html::C2ROW("Objetivo ",  $campaign_object->target(), "campaign_left");
                
                $target_people = new TargetPeople();
		$target_people->id($campaign_object->target_people());

                $target_people->get();
                $row .= Html::C2ROW("Público Objetivo ",  $target_people->name(), "campaign_left");
		$row .= Html::C2ROW("Año ", $campaign_object->year(), "campaign_left");
		
		$date_s = Date::parse($campaign_object->date_start());
		$date_s = $date_s->day()."-".$date_s->month()."-".$date_s->year();
		
		$date_e = Date::parse($campaign_object->date_end());
		$date_e = $date_e->day()."-".$date_e->month()."-".$date_e->year();
		
		$row .= Html::C2ROW("Fechas ", "Del ".$date_s." al ".$date_e, "campaign_left");
		
                $advertiser = new Advertiser();
		$advertiser->id($campaign_object->advertiser());
		if (CONFIG::getDebugMode()) { echo "Anunciante==>".$campaign_object->advertiser()." <br>";}
		$advertiser->get();
		
		$row .= Html::C2ROW("Organismo ", $advertiser->name(), "campaign_left");
                
		$adv_agency = new AdvAgency();
		$adv_agency->id($campaign_object->adv_agency());
		$adv_agency->get();
		$row .= Html::C2ROW("Anunciante ",  $adv_agency->name(), "campaign_left");

                $row .= Html::C2ROW("Agencia de Publicidad ",  $campaign_object->advertising_agency(), "campaign_left");

                
                
              
                
		$row .= Html::C2ROW("Coste (en euros): ", Tools::Integer2MoneyNotation($campaign_object->cost())." €", "campaign_left");
		
                $tagCampaigns = new TagCampaign();

                $tagCampaigns->id_campaign($campaign_object->id());
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
                
		/*$tags = new Tag();
		$tags->id($campaign_object->id());
		$vtag = $tags->find_by(array('id'));
		$stag = "";
		
                foreach ($vtag as $itag) 
                {
                        $stag .= ($stag == "") ? "" : ", ";
			$stag .= $itag->name();
		}*/
		
		
		$row .= Html::C2ROW("Resumen ",  $campaign_object->summary(), "campaign_left");
		$row .= Html::C2ROW("Etiquetas ", $tagstr, "campaign_left");
		
		$row = Html::TABLE($row);
		
		return $row;
	
    }
    
    public static function campaign_search_table_row_title()
    {
	//$title = Html::TD(Html::SPAN("Detalles"));
	$title = Html::TD(Html::SPAN("Campaña")); 
	$title .= Html::TD(Html::SPAN("Año"));
	$title .= Html::TD(Html::SPAN("Objetivo"));
        $title .= Html::TD(Html::SPAN("Público Objetivo"));
	$title .= Html::TD(Html::SPAN("Anunciante"));
		
	if (SYSTEM::ADMIN_MODE())
	{
		$title .= Html::TD(Html::SPAN("Modificar"));
		$title .= Html::TD(Html::SPAN("Borrar"));
	}
		
	return Html::THEAD(Html::TR($title));
    }    
    
        public static function campaign_search_table_row_title_public()
    {
	//$title = Html::TD(Html::SPAN("Detalles"));
	$title = Html::TD(Html::SPAN("Campaña")); 
	$title .= Html::TD(Html::SPAN("Año"));
	$title .= Html::TD(Html::SPAN("Objetivo"));
        $title .= Html::TD(Html::SPAN("Público Objetivo"));
	$title .= Html::TD(Html::SPAN("Anunciante"));

		
	return Html::THEAD(Html::TR($title));
    } 
    
    public static function campaign_search_table_row($campaign)
    {		
		
        $row = "";


        $a = "<a href='./full_details.php?details=".$campaign->id()."' class='link_full_details'>".$campaign->name()."</a>";
        $row .= Html::TD($a);
        $row .= Html::TD(Html::SPAN($campaign->year()));
        $row .= Html::TD(Html::SPAN($campaign->target()));

        $target_people = new TargetPeople();
        $target_people->id($campaign->target_people());
        $target_people->get();

        $row .= Html::TD(Html::SPAN($target_people->name()));

        $adv_agency = new AdvAgency();
        $adv_agency->id($campaign->adv_agency());
        $adv_agency->get();

        $row .= Html::TD(Html::SPAN($adv_agency->name()));



        if (SYSTEM::ADMIN_MODE())
        {
                $mod_btn = Html::IMAGEACTION(CONFIG::getDefaultPathWebImages()."modify.png", "modify", $campaign->id());
                $row .= Html::TD($mod_btn);
                $del_btn = Html::IMAGEACTION(CONFIG::getDefaultPathWebImages()."delete.png", "delete", $campaign->id());
                $row .= Html::TD($del_btn);
        }

        $row = Html::TR($row);

        return $row;
		
	}
        
            public static function campaign_search_table_row_public($campaign)
    {		
		
        $row = "";


        $a = "<a href='./details.php?details=".$campaign->id()."' class='link_full_details'>".$campaign->name()."</a>";
        $row .= Html::TD($a);
        $row .= Html::TD(Html::SPAN($campaign->year()));
        $row .= Html::TD(Html::SPAN($campaign->target()));

        $target_people = new TargetPeople();
        $target_people->id($campaign->target_people());
        $target_people->get();

        $row .= Html::TD(Html::SPAN($target_people->name()));

        $adv_agency = new AdvAgency();
        $adv_agency->id($campaign->adv_agency());
        $adv_agency->get();

        $row .= Html::TD(Html::SPAN($adv_agency->name()));


        $row = Html::TR($row);

        return $row;
		
	}
    
}



?>
