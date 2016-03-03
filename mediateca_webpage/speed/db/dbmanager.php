<?php

    require_once speed . db . dbdatabase;
    require_once speed . db . dbconfig;
        require_once speed . db . dbadapter;
class DBManager
{
	private $query = null;
	
	public function __construct($query)
	{
		$this->query = $query;
		$this->query->database(new DBDatabase(new DBConfig()));
	}
	
	public function exec()
	{
		$adapter = new DBAdapter($this->query);
		return $adapter->exec();
	}
}

?>