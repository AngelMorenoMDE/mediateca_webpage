<?php


class Request 
{
    public static function Data()
    {
        if (Config::getFormMethod() == "post")
        {
            return $_POST;
        }
        else
        {
            return $_GET;
        }
    }
    
    public static function Contains($key)
    {        
        return array_key_exists($key, self::Data());
    }
    
    public static function Get($key)
    {
        if (self::contains($key))
        {
            $data = self::Data();
            return $data[$key];
        }
    }
    
    public static function Type()
    {
        return Config::getFormMethod();
    }
}

?>
