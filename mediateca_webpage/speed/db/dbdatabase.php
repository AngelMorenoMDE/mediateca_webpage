<?php

require_once dbentity;

class DBDatabase extends DBEntity
{
	public function client($client = null)
	{
		if (is_null($client)) return $this->client;
		$this->client = $client;
	}
	
	public function db_name($db_name = null)
	{
		if (is_null($db_name)) return $this->db_name;
		$this->db_name = $db_name;
	}
	
	public function prefix($prefix = null)
	{
		if (is_null($prefix)) return $this->prefix;
		$this->prefix = $prefix;
	}
	
	public function host($host = null)
	{
		if (is_null($host)) return $this->host;
		$this->host = $host;
	}
	
	public function user($user = null)
	{
		if (is_null($user)) return $this->user;
		$this->user = $user;
	}
	
	public function pass($pass = null)
	{
		if (is_null($pass)) return $this->pass;
		$this->pass = $pass;
	}
	
	public function port($port = null)
	{
		if (is_null($port)) return $this->port;
		$this->port = $port;
	}
	

	
	public function __construct($dbconfig)
	{
		parent::__construct();
		$this->db_entity(DBEntity::$DATABASE);
		
		$this->client($dbconfig->client());
		$this->db_name($dbconfig->database());
		$this->prefix($dbconfig->prefix());
		$this->host($dbconfig->host());
		$this->user($dbconfig->user());
		$this->pass($dbconfig->pass());
		$this->port($dbconfig->port());
		
	}
}

?>