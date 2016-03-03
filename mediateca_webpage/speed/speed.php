<?php

    define("mediateca", $_SERVER["DOCUMENT_ROOT"]."/mediateca/");
    require_once $_SERVER["DOCUMENT_ROOT"]."/mediateca/config/config.php";
   
    define("model", mediateca."model/");

        require_once model . "model.php";
        
    
    define("speed", mediateca."/speed/"); 
    
        define("iu", "iu/");
        
            define("controls", "controls/");
            
                define("button", "button.php");
                define("checkbox", "checkbox.php");
                define("control", "control.php");
                define("imagebutton", "imagebutton.php");
                define("linkbutton", "linkbutton.php");
                define("updown", "updown.php");
           
           define("interfaces", "interfaces/");
           
                define("iselectable", "iselectable.php");
                
           define("menu", "menu/");
           
                define("sidebar", "sidebar.php");
                
                
           define("widgets", "widgets/");
                
                define("checkboxselector", "checkboxselector");
                define("dateselector", "dateselector.php");
                define("fileupload", "fileupload.php");
                define("imagelinkbutton", "imagelinkbutton.php");
                define("iwidget", "iwidget.php");
                define("listmultiselector", "listmultiselector.php");
                define("listselector", "listselector.php");
                define("passwordtextfield", "passwordtextfield.php");
                define("textareafield", "textareafield.php");
                define("textfield", "textfield.php");
                define("updowncounter", "updowncounter.php");
                define("updownlist", "updownlist.php");
                
        define("system", "system/system.php");
        define("filesystem", "system/filesystem.php");

        define("core", "core/");
        
            define("date", "date.php");
            define("object", "object.php");
            define("stdtype", "stdtype.php");
        
        define("db", "db/");

            define("dbaction", "dbaction.php");
            define("dbadapter", "dbadapter.php");
            define("dbcolumn", "dbcolumn.php");
            define("dbcondition", "dbcondition.php");
            define("dbconfig", "dbconfig.php");
            define("dbdatabase", "dbdatabase.php");
            define("dbentity", "dbentity.php");
            define("dbmanager", "dbmanager.php");
            define("dbobject", "dbobject.php");
            define("dbop", "dbop.php");
            define("dborder", "dborder.php");
            define("dbquery", "dbquery.php");
            define("dbresult", "dbresult.php");
            define("dbrow", "dbrow.php");
            define("dbtable", "dbtable.php");
            define("dbtype", "dbtype.php");

            define("adapters", "adapters/");

                define("mysql", "MySQLAdapter.php");

        define("tools", "tools/tools.php");
                
        define("web", "web/");
        
            define("html", "html.php");
            define("request", "request.php");
            define("post", "post.php");
            define("get", "get.php");
            define("session", "session.php");
            define("validator", "validator.php");
            define("validation", "validation.php");
            define("json", "json.php");
            define("commons", "commons/");
        
        define("templates", mediateca."/templates/");
        define("project", mediateca."/project/");
            define("mediatecabar", "mediatecabar.php");
            
		function SpeedLoader($ruta){
			// abrir un directorio y listarlo recursivo
			if (is_dir($ruta)) {
				if ($dh = opendir($ruta)) {
					while (($file = readdir($dh)) !== false) {
						//esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
						//mostraría tanto archivos como directorios
						//echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file);
						/*if (is_dir($ruta . $file) && ($file!=".") && ($file!="..")){
							//solo si el archivo es un directorio, distinto que "." y ".."
								
							//SPED($ruta . $file . "\\");
						}
						else */
                                                if (is_file($ruta.$file))
						{
                                                        
							require_once $ruta.$file;
						}
		
					}
					closedir($dh);
				}
			}
		}            
?>
