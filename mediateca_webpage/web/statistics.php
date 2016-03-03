<?php

    require_once "ini.php";
SYSTEM::CHECK_SESSION();
        $campaigns = new Campaign();
        $no_campains = count($campaigns->get_all());
        $total_medias = new MediaCampaign();        
        $no_total_medias = count($total_medias->get_all());
        
        $total_medias_audio = new MediaCampaign();        
        $total_medias_audio->type(MediaCampaign::$AUDIO);
        $no_total_medias_audio = count($total_medias_audio->get_all());
        
        $total_medias_video = new MediaCampaign();        
        $total_medias_video->type(MediaCampaign::$VIDEO);        
        $no_total_medias_video = count($total_medias_video->get_all());
        
        $total_medias_documents = new MediaCampaign();        
        $total_medias_documents->type(MediaCampaign::$DOCUMENT);          
        $no_total_medias_documents = count($total_medias_documents->get_all());        

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
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="campaigns.php">MAPI</a></h1>
		</div>
		<div id="menu">
                    <h1>Estadísticas Mediateca</h1>
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content" >
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>	
	
		<div id="fbox2">
			<h2><span><?php echo "Estadísticas Globales"?></span></h2>
			<hr>
			<p>
				<?php 		
                                        echo "<h3>Fecha Actual - ".date("d/m/Y")."<br><br>";
					echo "La base de datos cuenta con un total de \"".$no_campains."\" campañas publicitarias institucionales.<br><br>";
					echo "El sistema de archivos tiene almacenados un total de \"".$no_total_medias."\" ficheros multimedia, de los cuales: <br><br>";
                                        
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-> \"".$no_total_medias_video ."\" son archivos de video <br>";
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-> \"".$no_total_medias_audio ."\" son archivos de audio<br>";
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-> \"".$no_total_medias_documents ."\" son otro tipo de archivos (imágenes, documentos, etc.)<br></h3>";
				
				?>
			</p>
                        </div>	
	

	
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>
