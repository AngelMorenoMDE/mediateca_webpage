<?php

class System
{
	public static function GO($page)
	{
		header ("Location: ./".$page);
	}
	
	public static function CHECK_SESSION()
	{
            if (!array_key_exists(Config::getSessionUserKey(), $_SESSION))
			self::GO("index.php"); 
	}
	
        public static function checkSession()
        {
            if (!array_key_exists(Config::getSessionUserKey(), $_SESSION))
			self::GO("index.php");            
        }
        
	public static function INIT_SESSION()
	{
		session_start();
	}
	
	public static function KILL_SESSION()
	{
		session_destroy();
	}
	
	public static function SET_BACK($back)
	{
		$_SESSION['back'] = $back;
	}
	
	public static function REGISTER_USER($user)
	{
		$_SESSION[Config::getSessionUserKey()] = $user;
	}
        
        public static function GET_REGISTER_USER()
        {
            return $_SESSION[Config::getSessionUserKey()];
        }
		
	public static function ADMIN_MODE()
	{
		$user = $_SESSION[Config::getSessionUserKey()];	
		return ($user->rol() == 1);
	}
        
        public static function IS_ADMIN_REGISTERED()
	{
		$user = $_SESSION[Config::getSessionUserKey()];	
		return ($user->rol() == 1);
	}
	
	public static function USER_MODE()
	{
		$user = $_SESSION[Config::getSessionUserKey()];		
		return ($user->rol() == 2);
	}
	
	public static function EXIST_REGISTERED_USER()
	{
            return array_key_exists(Config::getSessionUserKey(), $_SESSION);
	}
        
        public static function isSomeOneLogged()
        {
            return array_key_exists(Config::getSessionUserKey(), $_SESSION);
        }
        
        public static function isAdministratorLogged()
        {
            	$user = $_SESSION[Config::getSessionUserKey()];	
		return ($user->rol() == 1);
        }
        
        public static function isUserLogged()
        {
		$user = $_SESSION[Config::getSessionUserKey()];		
		return ($user->rol() == 2);            
        }
        
        public static function setBackPage($backPage)
        {
            Session::Set('back', $backPage);
        }
        
        public static function goToPage($page)
        {
            header ("Location: ./".$page);
        }
        
        public static function getUserLogged()
        {
            return Session::Get(Config::getSessionUserKey());
        }
        
        public static function registerUser($user)
        {
            $_SESSION[Config::getSessionUserKey()] = $user;
        }
}
?>