<?php


require_once "ini.php";

SYSTEM::CHECK_SESSION();

// Stablish the back page
SYSTEM::SET_BACK("full_details.php");

$campaign = null;

//if (Session::Contains("details_campaign"))
if(array_key_exists("details", $_GET))
{

	$campaign = new Campaign();
//	$campaign->id($_SESSION["details_campaign"]);
        $campaign->id($_GET["details"]);
	$campaign->get();
        
        $media = new MediaCampaign();
        $media->campaign($campaign->id());
        $medias = $media->get_all();

        $medias_tv = new MediaCampaign();
        $medias_tv->campaign($campaign->id());
        $medias_tv->media_support(MediaCampaign::$TV);
        $medias_tv = $medias_tv->get_all();
        
        $medias_radio = new MediaCampaign();
        $medias_radio->campaign($campaign->id());
        $medias_radio->media_support(MediaCampaign::$RADIO);        
        $medias_radio = $medias_radio->get_all();        
        
        $medias_press = new MediaCampaign();
        $medias_press->campaign($campaign->id());
        $medias_press->media_support(MediaCampaign::$PRESS);        
        $medias_press = $medias_press->get_all();      
        
        $medias_street = new MediaCampaign();
        $medias_street->campaign($campaign->id());
        $medias_street->media_support(MediaCampaign::$STREET);        
        $medias_street = $medias_street->get_all();          
        
        $medias_internet = new MediaCampaign();
        $medias_internet->campaign($campaign->id());
        $medias_internet->media_support(MediaCampaign::$INTERNET);        
        $medias_internet = $medias_internet->get_all();          
        
        $url = new URLCampaign();
        $url->campaign($campaign->id());
        $urlss = $url->get_all();
        
}
else
{
	SYSTEM::GO("campaigns.php");
}

if (array_key_exists("back_search", $_POST))
{
    SYSTEM::GO("campaigns.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php    require_once commons . "head.php"; ?>
    
<body>
<div id="menu-user">
    <div id="menu-user-wellcome">
        <span>Bienvenido, <?php echo SYSTEM::GET_REGISTER_USER()->name()."<a href='./exit.php'>SALIR</a>"; ?></span>
    </div>
</div>
    <div id="all_page" style="position: relative; z-index: 0; float: top">

<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="campaigns.php">MAPI</a></h1>
		</div>
		<div id="menu">
                    <h1></h1>
		</div>
	</div>
</div>
<div id="footer-wrapper" >
	<div id="footer-content">
            <?php if (System::ADMIN_MODE()) {?>
		<div id="fbox1">
                        <?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>	
            <?php } ?>
		<div id="fbox2" <?php if (System::USER_MODE()) echo " style='width:90%; margin:auto; float:none;'";?>>
                    <?php if (System::USER_MODE()) {?>
                    <form method="post" action="">
                        
                        <input type="submit" name="back_search" value="Volver al buscador" class="SubmitBtn"></input>
                        
                        
                    </form>
                    </br>
                    <?php }?>
			<h2><span><?php echo "Detalles de Campaña"; ?></span></h2>
			<hr>
			<p><div id="view2">				
				<?php 
                                    echo Templates::CampaignFullDetailsTable($campaign); 
				?>
			</div></p>
                        </br>
		</div>
            
            	<div id="fbox2" <?php if (System::USER_MODE()) echo " style='width:90%; margin:auto; float:none;'";?>>
			<h2><span><?php echo "Piezas Publicitarias"; ?></span></h2>
			<hr>
			<p>
                            <div id="view4" style="padding-left: 30px;">
                                <?php if (count($medias_radio)>0) { ?>
                                <div id="c2" style="position:relative; float:bottom; width:100%;">
                                    <table>
                                        <tr >
                                            <td style="width:40px;"><img src="<?php echo CONFIG::getDefaultPathWebImages().'/radio.png' ?>"/></td>
                                            <td style="width:2px;"></td>
                                            <td><span class="label_ads">Anuncios en Radio - <?php echo count($medias_radio)." anuncio".((count($medias_radio)>1)?"s":"");?></span></td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td colspan="3">
                                                <ul style="margin-left: 70px;">
                                                    
                                                        <?php  

                                                            
                                                            if (count($medias_radio)>0)
                                                            {
                                                                foreach ($medias_radio as $item) 
                                                                {
                                                                    if ($item->media_support() ==  MediaCampaign::$RADIO)
                                                                    {
                                                                        $doc = CONFIG::$uploads."/".$item->file_name();
                                                                        //$player = "<audio controls><source src=\"$doc\" type=\"audio/mpeg\"></audio>";

                                                                        if (file_exists($doc))
                                                                            echo "<li><a href='download.php?id=".$item->id()."' target='_blank'>".$item->title()."</a></li>";

                                                                    }
                                                                }
                                                                    
                                                             
                                                            }
                                                            
                                                            
                                                            ?>
                                                
                                                
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div> 
                                <?php } ?>
                                <?php if (count($medias_tv)>0) { ?>
                                <div id="c2" style="position:relative; float:bottom; width:100%;">
                                    <table>
                                        <tr style="border-bottom-style: solid; border-bottom-width: 2px">
                                            <td style="width:40px;"><img src="<?php echo CONFIG::getDefaultPathWebImages().'/tv.png' ?>"/></td>
                                            <td style="width:2px;"></td>
                                            <td><span class="label_ads">Anuncios en Televisión - <?php echo count($medias_tv)." anuncio".((count($medias_tv)>1)?"s":"");?></span></td>
                                        </tr>
                                    </table>
                                    <table>                                        
                                        <tr>
                                            <td colspan="3">
                                                <ul style="margin-left: 70px;">
                                                    
                                                        <?php  

                                                            if (count($medias_tv)>0)
                                                            {
																
                                                                foreach ($medias_tv as $item) 
                                                                {
																	
                                                                    if ($item->media_support() ==  MediaCampaign::$TV)
                                                                    {
                                                                        $doc = CONFIG::$uploads."/".$item->file_name();
                                                                        if (file_exists($doc))                                                                        
                                                                            echo "<li><a href='download.php?id=".$item->id()."' target='_blank'>".$item->title()."</a></li>";
                                                                    }
                                                                }
                                                                    
                                                             
                                                            }
                                                            
                                                            
                                                            ?>
                                                
                                                
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <?php } ?>
                                <?php if (count($medias_press)>0) { ?>
                                <div id="c2" style="position:relative; float:bottom; width:100%;">
                                    <table>
                                        <tr >
                                            <td style="width:40px;"><img src="<?php echo CONFIG::getDefaultPathWebImages().'/press.png' ?>"/></td>
                                            <td style="width:2px;"></td>
                                            <td><span class="label_ads">Anuncios en Prensa - <?php echo count($medias_press)." anuncio".((count($medias_press)>1)?"s":"");?></span></td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td colspan="3">
                                                <ul style="margin-left: 70px;">
                                                    
                                                        <?php  
                                                        
                                                            
                                                            if (count($medias_press)>0)
                                                            {
                                                                foreach ($medias_press as $item) 
                                                                {
                                                                    if ($item->media_support() ==  MediaCampaign::$PRESS)
                                                                    {
                                                                        $doc = CONFIG::$uploads."/".$item->file_name();
                                                                        if (file_exists($doc))
                                                                            echo "<li><a href='download.php?id=".$item->id()."' target='_blank'>".$item->title()."</a></li>";
                                                                    }
                                                                }
                                                                    
                                                             
                                                            }
                                                            
                                                            
                                                            ?>
                                                
                                                
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <?php } ?>
                                <?php if (count($medias_street)>0) { ?>                                
                                <div id="c2" style="position:relative; float:bottom; width:100%;">
                                    <table>
                                        <tr >
                                            <td style="width:40px;"><img src="<?php echo CONFIG::getDefaultPathWebImages().'/exterior.png' ?>"/></td>
                                            <td style="width:2px;"></td>
                                            <td><span class="label_ads">Anuncios en Exteriores - <?php echo count($medias_street)." anuncio".((count($medias_street)>1)?"s":"");?></span></td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td colspan="3">
                                                <ul style="margin-left: 70px;">
                                                    
                                                        <?php  
                                                        
                                                            
                                                            if (count($medias_street)>0)
                                                            {
                                                                foreach ($medias_street as $item) 
                                                                {
                                                                    if ($item->media_support() ==  MediaCampaign::$STREET)
                                                                    {
                                                                        
                                                                        $doc = CONFIG::$uploads."/".$item->file_name();
                                                                        if (file_exists($doc))
                                                                            echo "<li><a href='download.php?id=".$item->id()."' target='_blank'>".$item->title()."</a></li>";
                                                                    }
                                                                }
                                                                    
                                                             
                                                            }
                                                            
                                                            
                                                            ?>
                                                
                                                
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div> 
                                <?php } ?>
                                <?php if (count($medias_internet)>0) { ?>                                 
                                <div id="c2" style="position:relative; float:bottom; width:100%;">
                                    <table>
                                        <tr >
                                            <td style="width:40px;"><img src="<?php echo CONFIG::getDefaultPathWebImages().'/internet2.png' ?>"/></td>
                                            <td style="width:2px;"></td>
                                            <td><span class="label_ads">Anuncios en Internet - <?php echo count($medias_internet)." anuncio".((count($medias_internet)>1)?"s":"");?></span></td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td colspan="3">
                                                <ul style="margin-left: 70px;">
                                                    
                                                        <?php  
                                                        
                                                            
                                                            if (count($medias_internet)>0)
                                                            {
                                                                foreach ($medias_internet as $item) 
                                                                {
                                                                    if ($item->media_support() == MediaCampaign::$INTERNET)
                                                                    {
                                                                        
                                                                        $doc = Config::getPathWebServerUploads().$item->file_name();
                                                                        if (file_exists($doc))
                                                                            echo "<li><a href='download.php?id=".$item->id()."' target='_blank'>".$item->title()."</a></li>";
                                                                    }
                                                                }
                                                                    
                                                             
                                                            }
                                                            
                                                            
                                                            ?>
                                                
                                                
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div> 
                                <?php } ?>
                            </div>
                                                            
                            </div>
                            <?php if (count($urlss)) { ?>
            	<div id="fbox2"<?php if (System::USER_MODE()) echo " style='width:90%; margin:auto; float:none;'";?>>
			<h2><span><?php echo "Recursos Web"; ?></span></h2>
			<hr>
			<p>
                            <div id="view4" style="padding-left: 30px;">				
                                                              
                                <div id="c3" style="position:relative; float:top; width:100%;">
                                    <table>
                                        <tr >
                                            <td><img src="<?php echo CONFIG::getDefaultPathWebImages().'/link2.png'; ?>"/></td>
                                            <td style="width:2px;"></td>
                                            <td><span>URL's</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <ul style="margin-left: 70px;">
                                                     <?php  

                                                            if (count($urlss)>0)
                                                            {
                                                                foreach ($urlss as $item) 
                                                                {
                                                                    $url_ref = "'".$item->url()."'";
                                                                    echo "<li><a href=$url_ref  target='_blank'>$url_ref</a></li>";

                                                                }
                                                                    
                                                             
                                                            }
                                                            
                                                            
                                                            ?>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div>   
                                
                        </div></p>

		</div>
                            
	<?php } ?>
        </div>
</div>
<?php require_once commons . "foot.php"; ?>

</body>
</html>
