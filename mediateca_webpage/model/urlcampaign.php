<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 

class URLCampaign extends DBObject 
{
    	protected $id = null;
	protected $campaign = null;		
	protected $url= null;

	public function id($id = null) { if (is_null($id)) { return $this->id;} else $this->id = $id; }

        public function campaign($campaign = null) { if (is_null($campaign)) {return $this->campaign; } else $this->campaign = $campaign; }
        
	public function url($url = null) { if (is_null($url)) {return $this->url; } else $this->url = $url; }
        
	protected function define()
	{
		$this->define_column('id', array(DBColumn::$PRIMARY_KEY, DBColumn::$AUTO_INC, DBColumn::$NOT_NULL), STDType::$INT); 

		$this->define_column('campaign', array(DBColumn::$NOT_NULL), STDType::$INT);
                
		$this->define_column('url', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 255);		
	}
}

?>
