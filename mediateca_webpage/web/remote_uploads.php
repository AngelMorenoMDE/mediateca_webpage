<?php
    require_once "ini.php";
    
    System::checkSession();
    
    if (!System::isAdministratorLogged())
        System::goToPage ("campaigns.php");
    
        function update_ftp_files()
        {
            if ($ftpDirectory = opendir(Config::getPathFtpServerUploads())) 
            {
                    while (($file = readdir($ftpDirectory)) !== false) 
                    {
                        $file = iconv( "iso-8859-1", "utf-8", $file );
                        
        		if (is_file(Config::getPathFtpServerUploads().$file))
                        {

                                $file_name = $file;
                                $mimetype = finfo_file(finfo_open(FILEINFO_MIME_TYPE), Config::getPathFtpServerUploads().$file);
                                $file_size = filesize(Config::getPathFtpServerUploads().$file);
                                echo "<br>"."Fichero encontrado [ Nombre = ".$file."; Mimetype = ".$mimetype."; Tamaño = ".$file_size." ]";


                                $media = new MediaCampaign();
                                $media->file_name($file_name);


                                if ($media->exist())
                                {
                                    $media->get();
                                    echo "<br>ID: ".$media->id();
                                    echo "<br>"."El fichero está registrado en la base de datos. Copiando...";
                                    $media->mimetype($mimetype);
                                    $media->size($file_size);

                                    $media->update();
                                    rename(Config::getPathFtpServerUploads().$file, Config::getPathWebServerUploads().$file);
                                }
                                else 
                                {
                                    echo "<br>"."No se ha registrado aún el fichero."; 
                                }
                            }
                    }
                    closedir($ftpDirectory);
                    echo "</br><h1>Finalizado el registro de archivos ftp.</h1>";
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
</div>
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="campaigns.php">MAPI</a></h1>
		</div>
		<div id="menu">
                    <h1>Autocargador de ficheros FTP</h1>
		</div>
	</div>
</div>
<div id="footer-wrapper" >
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span><?php echo "Autocarga de archivos ftp"; ?></span></h2>
			<hr>
			<p><div id="view2">				
				<?php
                                 update_ftp_files();
                                ?>
			</div></p>

		</div>
            

	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>
