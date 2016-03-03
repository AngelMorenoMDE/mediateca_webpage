<?php

    require_once speed . db . adapters . mysql;

class DBAdapter
{
	private $dbadapter = null;
		
	// This function receive the generic query sql
	public function __construct($query)
	{
		// Search between adapters who is of the query
		foreach (CONFIG::getSpeedFrameworkAdapters() as $adapter) 
		{

			if ($adapter == $query->database()->client())
			{
				// Create a new adapter whith the query
				$this->dbadapter = new $adapter($query);

			}
		}

	}
	
	public function exec()
	{
		return $this->dbadapter->execute();
	}
}

?>