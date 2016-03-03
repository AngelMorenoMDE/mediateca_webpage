<?php
        require_once "ini.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>        
        <script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script language="javascript" type="text/javascript" src="js/mediateca.js"></script>
        <script language="javascript" type="text/javascript" src="js/validation.js"></script>
        <link rel="stylesheet" type="text/css" href="css/mediateca3.css">

    </head>
    <body>        
        <input type="text" id="testQueryJSON">
        <br>        
        <input type="submit" onclick="checkService()" value="Comprobar Servicio de Datos">
        <br>
        <textarea id="responseDataService" style="height: 50%;"></textarea>
    </body>
</html>