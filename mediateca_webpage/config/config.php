<?php



class Config
{
    
        public static function getDebugModeService()
        {
            return 0;
        }
        
    
        //__  Debug Configuration  _____________________________________________
        
        public static function getDebugMode()
        {
            return false;
        }

		
        //__  General Configuration  ___________________________________________
    
        public static function getProjectName()
        {
            return "mediateca";
        }        
    
        public static function getServerDirectory()
        {
            return $_SERVER["DOCUMENT_ROOT"];
        }        
        
        public static function getProjectDirectory()
        {
            return self::getServerDirectory()."/".self::getProjectName()."/";
        } 
        
        
        //__  Database Configuration  __________________________________________
       
        public static function getProductionServerDatabaseConfig()
        {
                $db_config = array();
                $db_config["client"] = "MySQLAdapter";
                $db_config["host"] = "localhost";
                $db_config["port"] = 3306;		
                $db_config["username"] = "";
                $db_config["password"] = "";
                $db_config["database"] = "mediateca";
                $db_config["prefix"] = "";

                return $db_config;
        }

        public static function getTestServerDatabaseConfig()
        {
                $db_config = array();
                $db_config["client"] = "MySQLAdapter";
                $db_config["host"] = "127.0.0.1";
                $db_config["port"] = 3306;		
                $db_config["username"] = "";
                $db_config["password"] = "";
                $db_config["database"] = "mediateca";
                $db_config["prefix"] = "med_";

                return $db_config;
        }

        public static function getDefaultDatabaseConfig()
        {
                return self::getProductionServerDatabaseConfig();
        }
        
		
        //__  Folders Configuration  ___________________________________________
        
        public static function getPathWebServerUploads()
        {
            return self::getProjectDirectory()."/uploads/";
        }
        
        public static function getPathFtpServerUploads()
        {
            return self::getProjectDirectory()."/remote_uploads/";
        }
        
        public static function getDefaultPathWebImages()
        {
                return "images/";
        }

        //__ Media Options _____________________________________________________

        public static function getValidVideoExtensions()
        {
                return array(".wmv", ".avi", ".mp4", ".mpeg", ".mpg");
        }

        public static function getValidAudioExtensions()
        {
                return array(".mp3", ".wav");
        }

        public static function getValidDocumentExtensions()
        {
                return array(".doc", ".xls", ".pdf", ".jpeg", ".png", ".gif", ".jpg");
        }		

        public static function getAllValidExtensions()
        {
                return array(".wmv", ".avi", ".mp4", ".mpeg", ".mpg", ".mp3", ".wav", ".doc", ".xls", ".pdf", ".jpeg", ".png", ".gif", ".jpg"); 
        }
		
        public static function getMimetypes()
        {
                return array(".wmv" => "audio/x-ms-wmv", ".avi"=>"video/avi", ".mp3"=>"audio/mpeg3");
        }



	//__  Other Options  ___________________________________________________

        public static function getSessionUserKey()
        {
                return "user_app";
        }
		
        public static function getFormMethod()
        {
            return "post";
        }
        
	public static function getNoResultsByPage()
        {
            return 20;
        }
		
        public static function getSpeedFrameworkAdapters()
        {
            return array('MySQLAdapter');
        }
        
       public static $path_uploads = "C:/wamp/www/mediateca/uploads/";
       public static $path_remote_uploads = "C:/wamp/www/mediateca/remote_uploads/";        
       public static $uploads = "../uploads";

}


?>
