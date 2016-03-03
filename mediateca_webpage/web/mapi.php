<?php

        require_once "ini.php";
        
        require_once "./webdata/webdata.php";
        header('Content-Type: text/html; charset=utf-8');
        
       
        if (session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
        }
        
        if (!Session::Contains('lastSelectIsSearch'))
        {
            Session::Set('lastSelectIsSearch', false);
            Session::Set('searchByTagEnabled', false);
            Session::Set('lastSearchColumns', null);
        }
        
        $offset = 0;
        if (Request::Contains("reseter") || Request::Contains("searcher"))
        {
            
            Session::Set("offset", 0);
            Session::Set("lastSearchNoResults", 0);
            Session::Set('searchByTagEnabled', false);
            if (Request::Contains("reseter"))
            {
            foreach ($_POST as $key => $value) 
            {
                if ($key == "reseter") continue;
                unset($_POST[$key]);
            }
            }
            
        }
        
        if (Session::Contains('offset'))
        {
            $offset = Session::Get('offset');
        }        
        else 
        {
            Session::Set('offset', 0);
        }
        
        // Data Interface Definition
        $years = WebData::generateYearsData();

	// Interface definition
	$textfield_search_by_name = new TextField("search_name");
	$textfield_search_by_tag = new TextField("search_tag");

		
	$input_list_years = new ListSelector("campaign_years_selector", $years);
        $input_list_target_people = new ListSelector("list_target_people", new TargetPeople());	
	$input_list_advertisers = new ListSelector("advertisers_selector", new Advertiser());
        $input_list_advagencies = new ListSelector("advagencys_selector", new AdvAgency());
	$list_medias = new ListSelector("mediasupports", new MediaSupport());
	$tag_box = new ListSelector("tag_box", new Tag());
        //$multi_tag = new ListMultiSelector("listmulti_tag[]", new Tag());
	
	$campaing = new Campaign();
	$result = null;
	$table = "";
        $no_campaigns = 0;
        $campaignsSearchListByTag = null;
        
        // Detectamos que se ha produccido un evento de búsqueda de campañas
	if (Request::Contains("searcher"))
	{
            
            // Notificamos que se está realizando una búsqueda manual de campañas
            Session::Set('lastSelectIsSearch', true);
            
            // Preparamos un array de columnas para realizar la búsqueda.
            $columns = array();
            
            // Definimos un objeto tipo Campaign para realizar la búsqueda
            $campaignObj = new Campaign();
            
            // Comprobamos que el campo de texto Palabra clave no se encuentre vació
            if ($textfield_search_by_name->value() != null)
            {
                $columns[sizeof($columns)] = 'name';
                $campaignObj->name($textfield_search_by_name->value());
            }
            // Comprobamos que se haya seleccionado un año
            if ($input_list_years->selected()!= 0)
            {
                $columns[sizeof($columns)] = 'year';
	        $campaignObj->year($years[$input_list_years->selected()]);
            }
            // Comprobamos que se haya seleccionado un público objetivo
            if ($input_list_target_people->selected() != 1)
            {
                    $columns[sizeof($columns)] = 'target_people';
                    $campaignObj->target_people($input_list_target_people->selected());
            }
            // Comprobamos que se haya seleccionado un organismo público
            if ($input_list_advagencies->selected() != 1)
            {
                    $columns[sizeof($columns)] = 'adv_agency';
                    $campaignObj->adv_agency($input_list_advagencies->selected());
            }
            // Comprobamos que se haya seleccionado un anunciante
            if ($input_list_advertisers->selected() != 1)
            {			
                    $columns[sizeof($columns)] = 'advertiser';
                    $campaignObj->advertiser($input_list_advertisers->selected());
            }

            // Guardamos las columnas para una futura búsqueda manual
            Session::Set('lastSearchColumns', $columns);
            
            // Guardamos el $campaignObj objeto Campaign para realizar búsquedas
            // en un futuro.
            Session::Set('lastSearchObject', $campaignObj);
            
            // Realizamos la búsqueda
            $campaignObj->order_by('year', DBOrder::$DESC);
            $list_campaigns_result = $campaignObj->find_by($columns);
            
            
            $tagsCampaignsList = array();
            $tagsArraysCampaigns = array();
            
            // Comprobamos si se han introducido etiquetas
            if ($textfield_search_by_tag->value() != "")
            {
                Session::Set('searchByTagEnabled', true);
                $campaignsSearchListByTag = array();
                $tags_textfield = $textfield_search_by_tag->value();
                
                $tags = explode(",", $tags_textfield);
                $c = 0;
                foreach ($tags as $tag) 
                {
                    $tagsCampaignsList = array();
                    $tagObj = new Tags();
                    $tagObj->name(trim($tag));
                    if ($tagObj->exist())
                    {
                       
                        $tagObj->get();
                        
                        $tagCampaignObj = new TagCampaign();

                        $tagCampaignObj->id_tag($tagObj->id());
                        foreach ($tagCampaignObj->get_all() as $tagCampaign) 
                        {
                                if (!in_array($tagCampaign->id_campaign(), $tagsCampaignsList))
                                {
                                    $tagsCampaignsList[] = $tagCampaign->id_campaign();
                                }
                         }
                        $tagsArraysCampaigns[] = $tagsCampaignsList;
                    }
                    $tagObj = new Tags();
                    $tagObj->name(str_replace(array("á", "é", "í", "ó", "ú"), array("a", "e", "i", "o", "u"), trim($tag)));

                    if ($tagObj->exist())
                    {
                       
                        $tagObj->get();
                        
                        $tagCampaignObj = new TagCampaign();

                        $tagCampaignObj->id_tag($tagObj->id());
                        foreach ($tagCampaignObj->get_all() as $tagCampaign) 
                        {
                                if (!in_array($tagCampaign->id_campaign(), $tagsCampaignsList))
                                {
                                    $tagsCampaignsList[] = $tagCampaign->id_campaign();
                                }
                         }
                        $tagsArraysCampaigns[] = $tagsCampaignsList;
                    }
               
                    $c++;
                }

                if (count($tagsArraysCampaigns) > 1)
                {
                    for($i=1;$i<count($tagsArraysCampaigns); $i++)
                    {
                        $tagsArraysCampaigns[0] = array_intersect($tagsArraysCampaigns[0], $tagsArraysCampaigns[$i]);
                    }
                    
                }
                $tagsCampaignsList = $tagsArraysCampaigns[0];
                
                foreach ($list_campaigns_result as $campaign) 
                {
                    if (count($tagsCampaignsList) > 0)
                    {
                        if (in_array($campaign->id(), $tagsCampaignsList))
                        {
                            $campaignsSearchListByTag[] = $campaign;
                        }
                    }
                }
                
                if (count($campaignsSearchListByTag) > 0)
                {
                    
                    $no_campaigns = count($campaignsSearchListByTag);
                    Session::Set('lastSearchNoResults', $no_campaigns);
                    $result = $campaignsSearchListByTag;
                    Session::Set('searchByTagResults', $result);
                }
                else
                {                    
                    Session::Set('searchByTagZeroResults', true);
                }
            }
            else
            {
                    Session::Set('searchByTagEnabled', false);
                    $no_campaigns = count($list_campaigns_result);
                    Session::Set('lastSearchNoResults', $no_campaigns);
            }

            

     
	}       
        


        
        if (Session::Contains('lastSearchNoResults'))
        {
            $no_campaigns = Session::Get('lastSearchNoResults');            
        }
        else
        {
            $campaign = new Campaign();
            $no_campaigns = count($campaign->get_all());
            Session::Set('lastSearchNoResults', $no_campaigns);
        }
        
        if (Request::Contains('back_page') || Request::Contains('back_page_x'))
        {
            if (Session::Contains('offset'))
            {
                $offset = Session::Get('offset');
                if ($offset >= Config::getNoResultsByPage())
                {
                    $offset -=Config::getNoResultsByPage();                
                }
                Session::Set('offset', $offset);
            }
        }    
        if (Request::Contains('next_page')|| Request::Contains('next_page_x'))
        {
            if (Session::Contains('offset'))
            {
                $offset = Session::Get('offset');
                if ($offset < ($no_campaigns-Config::getNoResultsByPage()))
                {
                    $offset +=Config::getNoResultsByPage();                
                }             
                Session::Set('offset', $offset);
            }
        }
        // Se produce una búsqueda y no se producen resultados por tag
        if (Session::Contains('lastSelectIsSearch') && Session::Get('lastSelectIsSearch') && 
                Session::Contains('searchByTagEnabled', $result)&& !Session::Get('searchByTagEnabled'))
        {                        
                $searchObj = Session::Get('lastSearchObject');
                $searchObj->order_by('year', DBOrder::$DESC);
                $searchObj->limit($offset);   
                $no_campaigns = Session::Get('lastSearchNoResults');

                $result = $searchObj->find_by(Session::Get('lastSearchColumns'));
  
        }
        
        // Se produce una busqueda y hay resultado por tag
        if (Session::Contains('lastSelectIsSearch') && Session::Get('lastSelectIsSearch') && 
                Session::Contains('searchByTagEnabled', $result)&& Session::Get('searchByTagEnabled'))
        {        
            $listCampaignsSearchByTag = Session::Get('searchByTagResults');
            $result = array();
            $top = $offset+Config::getNoResultsByPage();
            $c = 0;
            foreach ($listCampaignsSearchByTag as $campaign) 
            {
                    if ($c < $offset)
                    {
                        $c++;
                        continue;
                    }
                    if (($c >= $offset) && ($c <$top));
                    {
                        $result[] = $campaign;
                    }
                    
                    $c++;
                    if ($c >= $top) break;
            }            
            

            $no_campaigns = Session::Get('lastSearchNoResults');
            
   
        }
        if (Request::Contains("reseter") || (!Request::Contains("searcher")))            
        {
            $campaign = new Campaign();
            if (Request::Contains("reseter"))
            {
                $campaign = new Campaign();
                Session::Set('lastSelectIsSearch', false);
                $no_campaigns = count($campaign->get_all());
                Session::Set('lastSearchNoResults', $no_campaigns);
            }            

            if ((!Session::Contains('lastSearchNoResults')) || (Request::Contains("reseter")))
            {          
                $campaign = new Campaign();
                $no_campaigns = count($campaign->get_all());
                Session::Set('lastSearchNoResults', $no_campaigns);
            }
            if (!(Session::Contains('lastSelectIsSearch') && Session::Get('lastSelectIsSearch')))
            {
                $campaing->limit($offset);
                
                $result = $campaing->get_all();
            }

        }

        if (isset($result)&& (count($result)>0))
        {
            $table = "";
            foreach ($result as $c) 
            {
                $table .= Templates::campaign_search_table_row_public($c);
            }
            
            $table = Html::TABLE(Templates::campaign_search_table_row_title_public().Html::TBODY($table));
        }
        
        if (isset($result)&& (count($result) == 0))
        {

            $table = "";
        }
        



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <?php    require_once commons . "head.php"; ?>
    
<body>
<div id="menu-user">

</div>
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="mapi.php">MAPI</a></h1>
		</div>
		<div id="menu">
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content" >
            <div id="fbox2" <?php if (true) echo " style='width:90%; margin:auto; float:none;'";?>>
			<h2><span><?php echo "Buscador de Campañas"?></span></h2>
			<hr>
			<p>
				<?php 
				
					$row = Html::TD("Nombre de la Campaña");
					$row .= Html::TD("");
					$row .= Html::TD($textfield_search_by_name->render());
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
										
					$rows = Html::TR($row);
					
					$row = "";
					$row .= Html::TD("Tags (separar por ',') ");
					$row .= Html::TD("");
					$row .= Html::TD($textfield_search_by_tag->render());
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					
					$rows .= Html::TR($row);                                        
                                        
					$row = "";
					$row .= Html::TD("Año");
					$row .= Html::TD("");
					$row .= Html::TD($input_list_years->render());
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$rows .= Html::TR($row);
					
                                        $row = "";
					$row .= Html::TD("Público Objetivo");
					$row .= Html::TD("");
					$row .= Html::TD($input_list_target_people->render());
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					
					$rows .= Html::TR($row);
					
					$row = "";
					$row .= Html::TD("Organismo Público");
					$row .= Html::TD("");
					$row .= Html::TD($input_list_advertisers->render());
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");

                                        $rows .= Html::TR($row);
                                        
                                        $row = "";
					$row .= Html::TD("Anunciante");
					$row .= Html::TD("");
					$row .= Html::TD($input_list_advagencies->render());
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
                                        
					$rows .= Html::TR($row);
					
                                        

					
					
					$row = Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD(Html::SUBMIT("searcher", "Filtrar Búsqueda").Html::SUBMIT("reseter", "Reiniciar Búsqueda", "SubmitBtn2"));
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$row .= Html::TD("");
					$rows .= Html::TR($row);
					
					echo Html::FORM("form_search", "mapi.php", "POST", Html::TABLE($rows));
					
					
				
				?>
			</p>
                        </div>	
	
                        <div id="fbox2" <?php if (true) echo " style='width:90%; margin:auto; float:none;'";?>>                      
                            <?php $resultados = ($no_campaigns>0) ? $no_campaigns." ] campañas publicitarias." : "0 ] campañas publicitarias."; 
                            
                                $paginator = "";
                                $paginator .= "<form action='' method='post'>";
      
                                if ($offset >= Config::getNoResultsByPage())
                                {
                                    $paginator .= "<input type='image' value='back_page' name='back_page' src='images/back_page.png'></input>";
                                }
                                else
                                {
                                    $paginator .= "<input type='image' value='back_page' name='back_page' src='images/back_page_off.png' disabled></input>";
                                }
                                $paginator .= "<b>  Página de Resultados ( ".  intval(($offset/Config::getNoResultsByPage())+1)." / ".  (intval($no_campaigns/Config::getNoResultsByPage())+1)." )   </b>";
                                
                                if ($offset<=($no_campaigns-Config::getNoResultsByPage()))
                                {
                                    $paginator .= "<input type='image' value='next_page' name='next_page' src='images/next_page.png'></input>";
                                }
                                else
                                {
                                    $paginator .= "<input type='image' value='next_page' name='next_page' src='images/next_page_off.png' disabled></input>";
                                }
                                
                                $paginator .= "</form>";
                            echo "<br>";
                            ?>
                            
			<h2><span class="list_campaigns_title"><?php echo "<table style='width:100%'><tr><td style='width:65%'>Se han encontrado [ ".$resultados."</td><td style='text-align:right'>".$paginator."</td></tr></table>"; ?></span></h2>
			<hr>
			<p>
				<div id="view5">
				<?php 
					

					if ((count($result)>0) && ($no_campaigns > 0))
                                        {
                                            echo Html::FORM("f2", "", "POST", $table);
                                        }
                                        else
                                        {
                                                echo Html::TABLE(Html::TR(Html::TD("No se ha encontrado ningún resultado.")));
                                        }                                        

				?>
				</div>
			</p>

		</div>
	
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>

