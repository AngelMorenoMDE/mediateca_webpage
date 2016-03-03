<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Buscador de Campañas Publicitarias</title>
        <script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script language="javascript" type="text/javascript">

            var isLeftMenuHide = false;
            var panelOpened = "";
            function initialize()
            {
                // Ocultamos el área de notificación
                $('#notification_area').css({'display':'none', 'opacity':'0.0'});
                $('#notification_area_layout').css({'display':'none', 'opacity':'0.0'});
                $('#base_layout_menus').css({'display':'none', 'opacity':'0.0'});
            
                generateYearsCampaign();
                getTargetPeopleFromServer();
                getAdvertiserFromServer();
                getAdvAgencyFromServer();
                //$("#notification_area_layout").animate({opacity:'0.5'},"slow");
                //$("#notification_area").animate({opacity:'1.0'},"slow");
                
                //$('#base_layout_body_right_content').html(generateTagString("alert('Hello')", "Drogas"));
            }
            
            function generateYearsCampaign()
            {
                var yearValues = "";
                var date = new Date(); 
                for(i=date.getFullYear(); i>2006;i--)
                {
                    yearValues += "<option value='"+i+"'>"+i+"</option>";
                }
                $('#yearsCampaign').html(yearValues);   
            }
            
            function generateOptionsSelectFromArray(data)
            {
                var options = "";
                for(i=0; i<data.length; i++)
                {
                    options += "<option value='"+data[i]+"'>"+data[i]+"</option>";
                }
                return options;
            }
            
            function evalJSON(data)
            {
                return eval("(" + data + ")");
            }
            
            function setTargetPeopleData(result)
            {
                
                 $('#targetPeopleSelect').html(generateOptionsSelectFromArray(evalJSON(result)));                   
            }
            
            function setAdvertiserData(result)
            {
                
                 $('#advertiserSelect').html(generateOptionsSelectFromArray(evalJSON(result)));                   
            }
            
            function setAdvAgencyData(result)
            {
                
                 $('#advAgencySelect').html(generateOptionsSelectFromArray(evalJSON(result)));                   
            }            
            
            function getTargetPeopleFromServer()
            {
                $.ajax({
                type: "POST",
                url: "./service.php",
                data: "action=getTargetPeopleData",
                success: function(result){ setTargetPeopleData(result); },
                dataType: "html"
                });
            }
            
            function getAdvertiserFromServer()
            {
                $.ajax({
                type: "POST",
                url: "./service.php",
                data: "action=getAdvertiserData",
                success: function(result){ setAdvertiserData(result); },
                dataType: "html"
                });
            }
            
            function getAdvAgencyFromServer()
            {
                $.ajax({
                type: "POST",
                url: "./service.php",
                data: "action=getAdvAgencyData",
                success: function(result){ setAdvAgencyData(result); },
                dataType: "html"
                });
            }            
            

            
            function generateTagString(functionTagClick, tagName)
            {
                var str = "<div id='etiqueta'>";
                    str += "\t<div id='etiqueta_img'><img src='images/Etiqueta.png'></div>";
                    str += "\t<div id='etiqueta_span' onclick='"+functionTagClick+"'>"+tagName+"</div>";
                    str += "</div>";
               
               return str;
            }
            
            function hideLeftMenu()
            {
                if (!isLeftMenuHide)
                {
                    $("#base_layout_body_left").animate({width:"0%", "opacity":"0.0"},"fast", "swing");
                    $("#base_layout_body_right").animate({width:"99%"},"fast", "swing");
                    isLeftMenuHide = true;                    
                }
                else
                {
                    $("#base_layout_body_left").animate({width:"29%", "opacity":"1.0"},"fast", "swing");
                    $("#base_layout_body_right").animate({width:"70%"},"fast", "swing");
                    isLeftMenuHide = false;   
                }
            }
            
            function showMenu(panel)
            {
                panelOpened = panel;
                $('#base_layout_menus').css({'display':'block', 'opacity':'0.0'});
                $('#notification_area_layout').css({'display':'block', 'opacity':'0.0'});
                $('#base_layout_menus').animate({'display':'block', 'opacity':'1.0'}, 'fast', 'swing');
                $('#notification_area_layout').animate({'display':'block', 'opacity':'0.5'}, 'fast', 'swing');
            }
            
            function hideNotificationArea()
            {
                if(panelOpened == 'AdminPanel')
                {
                    $('#base_layout_menus').animate({'display':'none', 'opacity':'0.0'}, 'fast', 'swing');
                    $('#notification_area_layout').animate({'display':'none', 'opacity':'0.0'}, 'fast', 'swing');
                    $('#base_layout_menus').css({'display':'none', 'opacity':'0.0'});
                    $('#notification_area_layout').css({'display':'none', 'opacity':'0.0'});                    
                }
            }
            
            function redirectTo(target)
            {
                if (target === "TargetPeople")
                {
                    window.location = "./targetpeople.php";
                }
                if (target === "Exit")
                {
                    window.location = "./exit.php";
                }                
            }
            
        </script>        
        <style>
            html, body
            {
                height: 100%;
                margin: 0;
                font-family: 'Lato';
            }
            
            input[type='text']
            {
                width: 80%;
                border-radius: 4px;
                height: 25px;
                border-width: 2px;
                border-color: #ded9d9;
                border-style: solid;
                padding-left: 5px;
                margin-top: 5px;
                margin-right: 5px;
                font-family: 'Lato';
                font-size: 16px;
            }
            select
            {
                border-radius: 4px;
                height: 25px;
                width: 90%;
                border-width: 1px;
                border-color: #ded9d9;
                border-style: solid;
                padding-left: 5px;
                margin-top: 5px;
                margin-right: 5px;                
                font-family: 'Lato';
                font-size: 16px;
                
            }            
            #base_layout_body_left_content_row
            {
                position: relative;
                float: left;
                width: 100%;
                margin-left: 5%;
                margin-bottom: 5%;
            }
            #base_layout
            {
                position: relative;
                float: left;
                
                height: 90%;
                width: 80%;
                
                margin-left: 10%;
                margin-right: 10%;
            }
            #base_layout_head
            {
                position: relative;
                float: left;
                
                width: 100%;
                height: 12%;
               
                background-color:white;
                box-shadow: 3px 3px 3px gray;                 
            }
            
            #base_layout_head_left
            {
                position: relative;
                float: left;
                
                width: 70%;
                height: 100%;
                
                background-color:gray;
                

            }       
            #base_layout_head_right
            {
                position: relative;
                float: right;
                
                width: 30%;
                height: 100%;
                
                background-color:lightblue;

            }  
            
            #base_layout_head_right_profile
            {
                position: relative;
                float: left;
                
                width: 84%;
                height: 70%;
                
                margin-top: 5%;
                margin-left: 8%;
                background-color:white;
                border-radius: 5px;
                box-shadow: 3px 3px 3px gray; 
            }            
            
            #base_layout_head_menu
            {
                position: relative;
                float: left;
                
                width: 100%;
                height: 3%;
                
                margin-bottom: 1%;

                background-color: yellow;
                box-shadow: 2px 3px 3px gray;                
            }
            #base_layout_menus
            {
                position: absolute;
                width: 25%;
                margin-top: 2.5%;
                background-color: white;
                border:5px solid midnightblue;
                
                z-index: 2;
                border-radius: 3px;
                box-shadow: 2px 2px 1px gray;
            }
            #base_layout_menus_row
            {
                position: relative;
                float: left;
                width: 90%;
                color:midnightblue;
                font-weight: bold;                
                
                padding-top: 2%;
                padding-bottom: 2%;
                padding-left: 5%;
                padding-right: 5%;
                cursor: pointer;
                border-bottom: 2px solid midnightblue;
            }
            #base_layout_menus_row:hover
            {
                position: relative;
                float: left;
                width: 90%;
                padding-left: 5%;
                padding-right: 5%;
                color:red;
                font-weight: bold;
  
                border-bottom: 2px solid midnightblue;
                cursor: pointer;
            }            
            #base_layout_head_menu_up
            {
                position: relative;
                float: left;
                
                width: 100%;
                height: 3%;
                margin-bottom: 1%;

                background-color: white;
                box-shadow: 2px 3px 3px gray;                
            }            
            #base_layout_head_menu_up_admin_panel
            {
                position: relative;
                float: left;
                height: 98%;
                padding-top: 0.2%;
                padding-left: 1%;
                padding-right: 1%;
                color:white;
                font-weight: bold;
                background-color: red;
                
                cursor: pointer;
                
            }
            #base_layout_head_menu_location
            {
                position: relative;
                float: left;
                
                height: 100%;
                margin-left: 1%;
                margin-top: 0.2%;
            }            
            
            #base_layout_body
            {
                position: relative;
                float: left;
                
                width: 100%;
                height: 78%;
                
                margin-bottom: 1%;
                
                background-color:lightblue;
                
                box-shadow: 3px 3px 3px gray;                 
            }
            
            #base_layout_body_left
            {
                position: relative;
                float: left;
                
                width: 29%;
                height: 100%;
                
                background-color:lightgoldenrodyellow;                
            }     
            
            #base_layout_body_left_content
            {
                position: relative;
                float: left;
                
                width: 92%;
                height: 92%;
                margin-left: 4%;
                margin-top: 4%;
                padding-top: 5%;
                background-color: white;
            }            
            
            #base_layout_body_center
            {
                position: relative;
                float: left;
                
                width: 1%;
                height: 100%;
                
                background-color:black;                    
            }
            #base_layout_body_center img
            {
                position: relative;
                float: left;        
                 width: 80%;
                 height: auto;                
                margin-top: 2500%;
                margin-left: 10%;

            }            
            
            #base_layout_body_right
            {
                position: relative;
                float: left;
                
                width: 70%;
                height: 100%;
                
                background-color:lightpink;               
            }            
            
            #base_layout_body_right_content
            {
                position: relative;
                float: left;
                
                width: 96%;
                height: 96%;
                margin-left: 2%;
                margin-top: 2%;
                background-color: white;
            }
            
            #base_layout_footer
            {
                position: relative;
                float: left;
                
                width: 100%;
                height: 10%;
                
                background-color:lightcoral;
                
                box-shadow: 3px 3px 3px gray;                 
               
            }            
            
            #notification_area
            {
                position: absolute;                
                z-index: 2;                
                height: 30%;
                width: 60%;
                background-color: white;
                margin-left: 20%;
                margin-right: 20%;
                margin-top: 20%;
                border-radius: 3px;
                box-shadow: 5px 5px 5px black;
                border: 5px red solid;
            }
            
            #notification_area_layout
            {
                position: absolute;                
                z-index: 1;
                background-color: gray;
                width: 100%;
                height: 100%;
                opacity: 0.5;
            }
            #etiqueta
            {
                position: relative;
                float: left;            
            }
            #etiqueta_img
            {
                position: relative;
                float: left;                
                width: auto;
            }            
            #etiqueta_img img
            {
                width:20px; 
                height: 24px;
            }
            #etiqueta_span
            {
                position: relative;
                float: left;
                padding-left: 10px;
                padding-right: 10px;
                border-left: 0px;
                border-right: 2px solid black;
                border-top: 2px solid black;
                border-bottom: 2px solid black;
                border-radius: 3px 3px 0px 0px;
                margin-left: -2px;
                background-color: black;
                color:white;
                font-weight: bold;
                box-shadow: 2px 1px 3px gray;

            }    
            #etiqueta_span:hover
            {
                position: relative;
                float: left;
                padding-left: 10px;
                padding-right: 10px;
                border-left: 0px;
                border-right: 2px solid black;
                border-top: 2px solid black;
                border-bottom: 2px solid black;
                border-radius: 3px 3px 0px 0px;
                margin-left: -2px;
                background-color: black;
                color:red;
                font-weight: bold;
                cursor:pointer;
                box-shadow: 2px 1px 3px gray;
            }             
        </style>

    </head>
    <body onload="initialize()">
        <div id="notification_area"></div>
        <div id="notification_area_layout" onclick="hideNotificationArea();"></div>
        <div id="base_layout">
            <div id="base_layout_menus">
                <div id="base_layout_menus_row" onclick="redirectTo('TargetPeople');">
                    Gestor de Públicos Objetivos
                </div>
                <div id="base_layout_menus_row">
                    Gestor de Organismos Públicos
                </div>                
                <div id="base_layout_menus_row">
                    Gestor de Ministerios
                </div>  
                <div id="base_layout_menus_row">
                    Gestor de Archivos Multimedia
                </div>
                <div id="base_layout_menus_row" onclick="redirectTo('Exit');">
                    Salir de la Aplicación
                </div>                
            </div>
            <div id="base_layout_head_menu_up">
                <div id="base_layout_head_menu_up_admin_panel" onclick="showMenu('AdminPanel');">
                    Menú de Administración
                </div>
            </div>
            <div id="base_layout_head">
                <div id="base_layout_head_left"></div>
                <div id="base_layout_head_right">
                    <div id="base_layout_head_right_profile"></div>
                </div>
            </div>
            <div id="base_layout_head_menu">
                <div id="base_layout_head_menu_location">
                    Inicio >> Buscador de Campañas
                </div>
            </div>
            <div id="base_layout_body">
                <div id="base_layout_body_left">
                    <div id="base_layout_body_left_content">
                        <div id="base_layout_body_left_content_row">
                            Título de la Campaña
                            <br>
                            <input type="text" id="campaignTitle">                          
                        </div>
                        <div id="base_layout_body_left_content_row">
                            Etiquetas (Separar por comas)
                            <br>
                            <input type="text" id="campaignTitle">              
                        </div>                        
                        <div id="base_layout_body_left_content_row">
                            Año de Emisión
                            <select id="yearsCampaign"></select>                         
                        </div>
                        <div id="base_layout_body_left_content_row">
                            Público Objetivo
                            <br>
                            <select id="targetPeopleSelect"></select>                         
                        </div> 
                        <div id="base_layout_body_left_content_row">
                            Organismo Público
                            <br>
                            <select id="advertiserSelect"></select>                         
                        </div>  
                        <div id="base_layout_body_left_content_row">
                            Ministerio
                            <br>
                            <select id="advAgencySelect"></select>                         
                        </div>
                        <div id="base_layout_body_left_content_row">
                            <input type="submit" id="startSearch" value="Iniciar Búsqueda">
                        </div>                         
                    </div>                     
                </div>
                <div id="base_layout_body_center">
                    <img src="images/BtnHideMenu.png" onclick="hideLeftMenu()">
                </div>
                <div id="base_layout_body_right">
                    <div id="base_layout_body_right_content"></div>
                </div>
            </div>
            <div id="base_layout_footer"></div>            
        </div>
    </body>
</html>
