<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 



class TagCampaign extends DBObject 
{
	protected $id_tag = null;
	protected $id_campaign = null;

	protected function define()
	{
		$this->define_column('id_tag', array(DBColumn::$NOT_NULL), STDType::$INT);
		$this->define_column('id_campaign', array(DBColumn::$NOT_NULL), STDType::$INT);		
                $this->define_exist('id_tag');
	}
	
	public function id_tag($id_tag = null)
	{
		if (is_null($id_tag)) return $this->id_tag;
		$this->id_tag = $id_tag;
	}
	
	public function id_campaign($id_campaign = null)
	{
		if (is_null($id_campaign)) return $this->id_campaign;
		$this->id_campaign = $id_campaign;
	}

}

?>
