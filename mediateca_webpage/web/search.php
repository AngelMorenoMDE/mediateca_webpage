<?php
        require_once "ini.php";
if (0){
echo "Page Under Construction";
die();}

if (isset($_POST["service"])) 
{ 
    require_once "../service/service.php";
}
else
{
    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />

        
        <title>Buscador de Campañas Publicitarias</title>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>        
        <script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

        <script language="javascript" type="text/javascript" src="js/mediateca.js"></script>
        <!--<script language="javascript" type="text/javascript" src="js/mediateca2.js"></script>        -->
        <script language="javascript" type="text/javascript" src="js/validation.js"></script>
        <link rel="stylesheet" type="text/css" href="css/mediateca3.css">

    </head>
    <body onload="initialize()">
        
            <?php /* Área de Notificaciones */ ?>
            <?php include "page/notification/notification.php"; ?>
        
            <?php /* Menú de Navegación superior de la página */ ?>
            <?php include "page/menu_up/menu_up.php"; ?>
            
        <div id="base_layout">  
            
            <?php /* Cabecera de la página */ ?>            
            <?php include "page/head/head.php"; ?>
            
            <?php /* Cuerpo principal de la página */ ?>            
            <?php include "page/body/body.php"; ?>
            
            <?php /* Pie de la página */ ?> 
            <?php /*include "page/footer/footer.php";*/ ?>  
        </div>
                
    </body>
</html>

<?php } ?>