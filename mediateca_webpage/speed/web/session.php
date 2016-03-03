<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author ÁNGEL
 */
class Session 
{
    
    public static function Contains($key)
    {        
        return array_key_exists($key, $_SESSION);
    }
    
    public static function Get($key)
    {
        if (self::contains($key))
        {
            return $_SESSION[$key];
        }
    }
    
    public static function Set($key, $value)
    {
        $_SESSION[$key] = $value;
    }    
}

?>
