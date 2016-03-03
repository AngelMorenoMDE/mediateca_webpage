<?php

class Get 
{
    public static function Contains($key)
    {        
        return array_key_exists($key, $_GET);
    }
    
    public static function getValue($key)
    {
        if (self::contains($key))
        {
            return $_GET[$key];
        }
    }
}

?>