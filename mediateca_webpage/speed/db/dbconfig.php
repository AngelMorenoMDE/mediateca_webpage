<?php

class DBConfig
{
    public static $DB_CLIENT = "client";
    public static $DB_HOST = "host";
    public static $DB_PORT = "port";
    public static $DB_USERNAME = "username";
    public static $DB_PASSWORD = "password";
    public static $DB_DATABASE = "database";
    public static $DB_PREFIX = "prefix";
    
        
    private $client = null;
    public function client()
    {
        switch(func_num_args())
        {
            case 0: return $this->client;
            break;

            case 1: $this->client = func_get_arg(0);
            break;
        }
    }

    private $host = null;
    public function host()
    {
        switch(func_num_args())
        {
            case 0: return $this->host;
            break;

            case 1: $this->host = func_get_arg(0);
            break;
        }
    }

    private $user = null;
    public function user()
    {
        switch(func_num_args())
        {
            case 0: return $this->user;
            break;

            case 1: $this->user = func_get_arg(0);
            break;
        }
    }

    private $pass = null;
    public function pass()
    {
        switch(func_num_args())
        {
            case 0: return $this->pass;
            break;

            case 1: $this->pass = func_get_arg(0);
            break;
        }
    }

    private $database = null;
    public function database()
    {
        switch(func_num_args())
        {
            case 0: return $this->database;
            break;

            case 1: $this->database = func_get_arg(0);
            break;
        }
    }

    private $port = null;
    public function port()
    {
        switch(func_num_args())
        {
            case 0: return $this->port;
            break;

            case 1: $this->port = func_get_arg(0);
            break;
        }
    }

    private $prefix = null;
    public function prefix()
    {
        switch(func_num_args())
        {
            case 0: return $this->prefix;
            break;

            case 1: $this->prefix = func_get_arg(0);
            break;
        }
    }


    public function __construct()
    {
        $db_config = CONFIG::getDefaultDatabaseConfig();

        $this->client($db_config[self::$DB_CLIENT]);
        $this->host($db_config[self::$DB_HOST]);
        $this->port($db_config[self::$DB_PORT]);
        $this->user($db_config[self::$DB_USERNAME]);
        $this->pass($db_config[self::$DB_PASSWORD]);
        $this->database($db_config[self::$DB_DATABASE]);
        $this->prefix($db_config[self::$DB_PREFIX]);
    }
	
}

?>