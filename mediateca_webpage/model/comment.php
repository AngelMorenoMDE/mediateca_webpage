<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 

    require_once speed . system;
    
class Comment extends DBObject
{
	protected $id_comment = null;
        protected $reference = null;
	protected $id_user = null;		
	protected $id_campaign = null;
	protected $time_publication = null;
	protected $content = null;
        protected $banned = null;
        
	public function id_comment($id_comment = null) { if (is_null($id_comment)) { return $this->id_comment;} else $this->id_comment = $id_comment; }
        
	public function id_user($id_user = null) { if (is_null($id_user)) { return $this->id_user;} else $this->id_user = $id_user; }
	
	public function id_campaign($id_campaign = null) { if (is_null($id_campaign)) { return $this->id_campaign;} else $this->id_campaign = $id_campaign; }
	
        public function reference($reference = null) { if (is_null($reference)) { return $this->reference;} else $this->reference = $reference; }
	
	public function time_publication($time_publication = null) { if (is_null($time_publication)) { return $this->time_publication;} else $this->time_publication = $time_publication; }
	
	public function content($content = null) { if (is_null($content)) { return $this->content;} else $this->content = $content; }
       
        public function banned($banned = null) { if (is_null($banned)) { return $this->banned;} else $this->banned = $banned; }
	
	protected function define()
	{

		$this->define_column('id_comment', array(DBColumn::$PRIMARY_KEY, DBColumn::$AUTO_INC, DBColumn::$NOT_NULL), STDType::$INT); 
                
		$this->define_column('id_campaign', array(DBColumn::$NOT_NULL), STDType::$INT);                

		$this->define_column('id_user', array(DBColumn::$NOT_NULL), STDType::$INT);
                
                $this->define_column('reference', array(DBColumn::$NOT_NULL), STDType::$INT);                
                
		$this->define_column('time_publication', array(DBColumn::$NOT_NULL), STDType::$INT);		

		$this->define_column('content', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 500);

		$this->define_column('banned', array(DBColumn::$NOT_NULL), STDType::$TINY_INT);                      
	
	}


}

?>
	