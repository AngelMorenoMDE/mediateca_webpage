<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 

class MediaSupport extends DBObject implements ISelectable
{
	protected $id = null;
	protected $name = null;

	protected function define()
	{
		$this->define_column('id', array(DBColumn::$PRIMARY_KEY, DBColumn::$AUTO_INC, DBColumn::$NOT_NULL), STDType::$INT);
		$this->define_column('name', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 50);		
	}
	
	public function id($id = null)
	{
		if (is_null($id)) return $this->id;
		$this->id = $id;
	}
	
	public function name($name = null)
	{
		if (is_null($name)) return $this->name;
		$this->name = $name;
	}
}