<?php

class Post 
{
    public static function Contains($key)
    {        
        return array_key_exists($key, $_POST);
    }
    
    public static function getValue($key)
    {
        if (self::contains($key))
        {
            return $_POST[$key];
        }
    }
}

?>