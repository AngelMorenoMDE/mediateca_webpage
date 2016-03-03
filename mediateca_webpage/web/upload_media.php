<?php
        require_once "ini.php";
		
        SYSTEM::CHECK_SESSION();
	SYSTEM::SET_BACK("campaigns.php");
        
        // Interface elements
        
        $campaign = new Campaign();
        $campaign->get_all();
        
        if (count($campaign->get_all()) == 0) 
			echo "<script>alert('ATENCIÓN!!! - No se puede acceder a la sección Multimedia hasta que no cree una nueva campaña'); document.location = 'new_campaign.php'</script>";
        
        if (array_key_exists("list_campaigns", $_POST))
        {
            $_SESSION["campaign_upload"] = $_POST["list_campaigns"];
            $list_campaigns = new ListSelector("list_campaigns", new Campaign(), $_SESSION["campaign_upload"]);
            
        }   
        else
        if (array_key_exists("campaign_upload", $_SESSION))
        {
            $campaignObj = new Campaign();
            $campaignObj->order_by('name', DBOrder::$ASC);
            $list_campaigns = new ListSelector("list_campaigns", $campaignObj, $_SESSION["campaign_upload"]);  
        }
        else
        {
            $campaignObj = new Campaign();
            $campaignObj->order_by('name', DBOrder::$ASC);            
            $list_campaigns = new ListSelector("list_campaigns", $campaignObj, null);
        }
        
        $fup = new FileUpload("upload", null);
        $fup->process();
        
        $turl = new TextField("url_media");
        $tvf = new TextField("virtual_file");
        $title = new TextField("title");
        
        $list_type_medias = new ListSelector("list_type_medias", new MediaSupport());
        
        $error_upload = "";
        $error_vf = "";
        $error_url = "";
             
        
        
        // Checker's

        $error_title_file = "";
                
        $error = true;
        
        if (array_key_exists("submit_upload", $_POST))
        {

                $validator_title_file = new Validator($title->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC), 255);   
                $error_title_file = $validator_title_file->check();

                $error_fup =  $fup->has_file() ? "" : "No se ha seleccionado ningún fichero";

                $error = $error_title_file != "";
                $error &= $error_fup != "";

                $error_upload = "<br>".$error_fup;

                if (!$error) 
                {

                }

                $ext = $fup->file()->extension();

                if (in_array($ext, CONFIG::getAllValidExtensions()))
                {
                    $media = new MediaCampaign();
                    $media->create();

                    move_uploaded_file($fup->file()->tmp(), CONFIG::getPathWebServerUploads().$fup->file()->name());

                    $selected = (array_key_exists("campaign_upload", $_SESSION)) ? $_SESSION["campaign_upload"] : $list_campaigns->selected();
                    $media->campaign($selected);
                    $media->title($title->value());
                    $media->file_name($fup->file()->name());
                    $media->extension($fup->file()->extension());
                    $media->mimetype($fup->file()->mimetype());
                    $media->size($fup->file()->size());

                    if (in_array($ext, CONFIG::getValidVideoExtensions()))
                    {                    
                        $media->type(MediaCampaign::$VIDEO);
                    }
                    else if (in_array($ext, CONFIG::getValidAudioExtensions()))
                    {

                        $media->type(MediaCampaign::$AUDIO);
                    }
                    else
                    {
                        $media->type(MediaCampaign::$DOCUMENT);
                    }

                    $media->media_support($list_type_medias->selected());
                    $media->save();
                }
                else
                {
                    $error_upload = "El fichero que ha seleccionado no es válido".$error_upload;
                }

            

             
        }
        
        if (array_key_exists("submit_select_campaign", $_POST))
        {
            $_SESSION["campaign_upload"] = $_POST[$list_campaigns->name()];
        }
        
        if (array_key_exists("delete_media", $_POST))
        {
            $media = new MediaCampaign();
            $media->id($_POST["delete_media"]);
            
            $media->get();
            
            if (file_exists(CONFIG::$path_uploads.$media->file_name()))
                    unlink(CONFIG::$path_uploads.$media->file_name());
            
            $media->delete();
        }
        
        if (array_key_exists("delete_url", $_POST))
        {
            $url = new URLCampaign();
            $url->id($_POST["delete_url"]);
            $url->delete();
        }
        
        if (array_key_exists("submit_virtual_file", $_POST))
        {

            $validator_virtual_file = new Validator($tvf->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC), 255);
            
            $error_vf = $validator_virtual_file->check();
            
            $error = $error_vf != "";
            
            if (!$error)
            {
                $parts = explode(".", $tvf->value());        
                $ext = ".".strtolower($parts[count($parts)-1]);
                if (in_array($ext, CONFIG::getAllValidExtensions()))
                {
                    $media = new MediaCampaign();
                    $media->create();

                    $selected = (array_key_exists("campaign_upload", $_SESSION)) ? $_SESSION["campaign_upload"] : $list_campaigns->selected();
                    $media->campaign($selected);
                    
                    $media->title($tvf->value());
                    $media->file_name($tvf->value());
                    $media->title($title->value());
                    $media->extension($ext);

                    $media->mimetype("");
                    $media->size(0);

                    if (in_array($ext, CONFIG::getValidVideoExtensions()))
                    {

                        $media->type(MediaCampaign::$VIDEO);
                    }
                    else                    
                    if (in_array($ext, CONFIG::getValidAudioExtensions()))
                    {
                        $media->type(MediaCampaign::$AUDIO);
                    }
                    else
                    {
                        $media->type(MediaCampaign::$DOCUMENT);
                    }

                        $media->media_support($list_type_medias->selected());

                        $media->save();
                    }
                    else
                    {
                        $error_virtual_file = "El fichero que intenta registrar no es válido";
                    }
                }


            
        }
        
        if (array_key_exists("submit_url", $_POST))
        {

            $validator_url = new Validator($turl->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC), 255);
            
            $error_url = $validator_url->check();
            
            $error = $error_url != "";
            
            if (!$error)
            {
                $url  =new URLCampaign();
                $selected = (array_key_exists("campaign_upload", $_SESSION)) ? $_SESSION["campaign_upload"] : $list_campaigns->selected();
                $url->campaign($selected);
                $url->url($turl->value());
                
                $url->save();
            }
        
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
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="campaigns.php">MAPI</a></h1>
		</div>
		<div id="menu">
                    <h1>Gestor de Archivos Multimedia</h1>
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>	
	        <div id="fbox2">
			<h2><span><?php echo "Seleccione la campaña a la que desea agregar ficheros multimedia"; ?></span></h2>
			<hr>
                        <?php 
                        
                            $table = Html::C3ROW("Seleccione una campaña: ", $list_campaigns->render());
                            $table .= Html::C3ROW("", Html::SUBMIT("submit_select_campaign", "Cambiar campaña"));
                            
                            $table = Html::TABLE($table);
                            
                            echo Html::FORM_DATA("uploading", "upload_media.php", "POST", $table);
                         ?>
		</div>

		<div id="fbox2">
			<h2><span><?php echo "Seleccion el fichero multimedia que desea añadir";?></span></h2>
			<hr>
                            <div id="view2">
                                <p>A continuación se muestran los archivos multimedia para la campaña seleccionada</p><br/>
                        <?php 
                            $table2 = "";
                            $media = new MediaCampaign(); 

                            $campaign_number = 0;
                            
                            $selected = (array_key_exists("campaign_upload", $_SESSION)) ? $_SESSION["campaign_upload"] : $list_campaigns->selected();
                            
                            $media->campaign($selected);
                            $medias = $media->get_all();
                            
                            
                            
                            $delete_opc = (SYSTEM::ADMIN_MODE()) ? Html::TD("Eliminar") : "";
                            $table2 .= Html::THEAD(Html::TR($delete_opc.Html::TD("Nombre Archivo Multimedia").Html::TD("Archivo asociado").Html::TD("Tamaño").Html::TD("Tipo")));
                            
                            if (count($medias)> 0)
                            {
                                foreach ($medias as $item) 
                                { 
                                    $img = ($item->type() == MediaCampaign::$VIDEO) ? Html::IMAGETAG('movie.png') : "";
                                    $img = ($item->type() == MediaCampaign::$AUDIO) ? Html::IMAGETAG('audio.png') : $img;
                                    $img = ($item->type() == MediaCampaign::$DOCUMENT) ? Html::IMAGETAG('press.png') : $img;
                                    
                                    Html::IMAGETAG('press.png');
                                    $btn_delete = Html::IMAGEACTION(CONFIG::getDefaultPathWebImages()."delete.png", "delete_media", $item->id());
                                    $delete_opc = (SYSTEM::ADMIN_MODE()) ? Html::TD($btn_delete):"";
                                    $table2 .= Html::TR($delete_opc.Html::TD($item->title()).Html::TD($item->file_name()).Html::TD($item->size()).Html::TD($img));
                                }
                                echo Html::FORM("form_table_files", "upload_media.php", "POST", Html::TABLE($table2));
                            }
                            else
                            {
                                echo Html::TABLE(Html::TR(Html::TD("No hay registrado ningun archivo multimedia para esta campaña.")));
                            }
                            
                                ?>
                            </div>
                            </br>
                            <div id="fbox2_form">
                                <?php

                            $table3 = Html::C5ROW("Tipo de Publicidad", $list_type_medias->render(), "");
                            $table3 .= Html::C5ROW("Nombre fichero multimedia: ", $title->render(), $error_title_file);
                            $table3 .= Html::C5ROW("Seleccione un fichero: ", $fup->render(), "");
                            
                            $table3 .= Html::C5ROW("", Html::SUBMIT("submit_upload", "Subir fichero"), "");
                            $table3 .= Html::C5ROW("", $error_upload, "");
                            $table3 = Html::TABLE($table3);
                            
                            echo Html::FORM_DATA("uploading", "", "POST", $table3);
                         ?>
                                
		</div>
                            </div>    
                <?php if (SYSTEM::ADMIN_MODE()) {?>
            	<div id="fbox2">
			<h2><span><?php echo "Registrar Nombre Fichero FTP";?></span></h2>
			<hr>
			<p>Introduzca el nombre del fichero que se subirá posteriormente.</p>
                        <div id="fbox2_form">
                                <?php 


                                    $table4 = Html::C5ROW("Tipo de Publicidad", $list_type_medias->render(), "");
                                    $table4 .= Html::C5ROW("Nombre virtual del fichero multimedia: ", $title->render(), $error_title_file);
                                    $table4 .= Html::C5ROW("Nombre real del fichero multimeda ftp: ", $tvf->render(), $error_vf);
                                    $table4 .= Html::C5ROW("", Html::SUBMIT("submit_virtual_file", "Registrar nombre de fichero"), "");

                                    $table4 = Html::TABLE($table4);

                                    echo Html::FORM_DATA("uploading_virtual", "upload_media.php", "POST", $table4);
                                 ?>
                            </div>
                            </div>
                <?php }?>
            	<div id="fbox2">
			<h2><span><?php echo "Gestor de URLs";?></span></h2>
			<hr>
			<p>Introduza direcciones de páginas web externas, en las que se haga referencia a esta campaña de publicidad.</p>
                        
                        <div id="fbox2_table">
                        <br/>
                        <?php 
                            $table2 = "";
                            $urls = new URLCampaign(); 
                            $selected = (array_key_exists("campaign_upload", $_SESSION)) ? $_SESSION["campaign_upload"] : $list_campaigns->selected();
                            $urls->campaign($selected);
                            $urls = $urls->get_all();                            
                            
                            $delete_opc = (SYSTEM::ADMIN_MODE()) ? Html::TH("Eliminar"):"";
                            $table2 .= Html::TR($delete_opc.Html::TH("URL"));
                            
                            if (count($urls)> 0)
                            {
                                foreach ($urls as $item) 
                                { 
                                    $btn_delete = Html::IMAGEACTION(CONFIG::getDefaultPathWebImages()."delete.png", "delete_url", $item->id());
                                    $delete_opc = (SYSTEM::ADMIN_MODE()) ? Html::TD($btn_delete):"";
                                    $table2 .= Html::TR($delete_opc.Html::TD($item->url()));
                                }
                                echo Html::FORM("form_table_files", "upload_media.php", "POST", Html::TABLE($table2));
                            }
                            else
                            {
                                echo Html::TABLE(Html::TR(Html::TD("No hay registrado ninguna url para esta campaña.")));
                            }
                            
                        ?>
                        </div>
                        <br/>
                        <div id="fbox2_form">
                            <?php 

                                $table5 = Html::C5ROW("URL Web asociada", $turl->render(), $error_url);
                                $table5 .= Html::C5ROW("", Html::SUBMIT("submit_url", "Guardar URL"), "");

                                $table5 = Html::TABLE($table5);

                                echo Html::FORM_DATA("uploading_url", "upload_media.php", "POST", $table5);
                             ?>
                         </div>
		</div>
	
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>

