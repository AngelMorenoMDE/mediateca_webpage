<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 

class MediaCampaign extends DBObject
{
        public static $RADIO = 1;
        public static $TV = 2;
        public static $PRESS = 3;
        public static $STREET = 4;
        public static $INTERNET = 5;
    
        public static $VIDEO = 1;
        public static $AUDIO = 2;
        public static $DOCUMENT = 3;
    
	protected $id = null;
	protected $campaign = null;	
        protected $title = null;
	protected $file_name = null;
        protected $size = null;
	protected $extension= null;
        protected $mimetype= null;
        protected $type = null;
        protected $media = null;
        protected $media_support = null;
        
	public function id($id = null) { if (is_null($id)) { return $this->id;} else $this->id = $id; }
	
	public function campaign($campaign = null) { if (is_null($campaign)) { return $this->campaign;} else $this->campaign = $campaign; }
	
        public function title($title = null) { if (is_null($title)) { return $this->title;} else $this->title = $title; }
        
	public function file_name($file_name = null) { if (is_null($file_name)) { return $this->file_name;} else $this->file_name = $file_name; }
	
	public function size($size = null) { if (is_null($size)) { return $this->size;} else $this->size = $size; }
	
        public function mimetype($mimetype = null) { if (is_null($mimetype)) {return $this->mimetype; } else $this->mimetype = $mimetype; }
        
	public function extension($extension = null) { if (is_null($extension)) {return $this->extension; } else $this->extension = $extension; }
        
        public function type($type = null) { if (is_null($type)) { return $this->type; } else $this->type = $type;}
        
        public function media_support($media = null) { if (is_null($media)) { return $this->media_support; } else $this->media_support = $media; }
        
	protected function define()
	{

		// ['adv_agency'][VARCHAR][25] : código único de identificador de cada una de las campañas. 
		$this->define_column('id', array(DBColumn::$PRIMARY_KEY, DBColumn::$AUTO_INC, DBColumn::$NOT_NULL), STDType::$INT); 
		
                // ['adv_agency'][VARCHAR][25] : código único de identificador de cada una de las campañas. 
		$this->define_column('campaign', array(DBColumn::$NOT_NULL), STDType::$INT); 
                
                // ['name'][VARCHAR][255] : Nómbre/Título de la campaña. Ej. "Vigilancia y Control de Distracciones".
		$this->define_column('title', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 255);
                
		// ['name'][VARCHAR][255] : Nómbre/Título de la campaña. Ej. "Vigilancia y Control de Distracciones".
		$this->define_column('file_name', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 255);
		
    
		// ['year'][SMALL_INT]: Año de la campaña. Ej. 2012 
		$this->define_column('size', array(DBColumn::$NOT_NULL), STDType::$INT);
                
		// ['year'][SMALL_INT]: Año de la campaña. Ej. 2012 
		$this->define_column('mimetype', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 255);
                
		// ['date_start'][DATE]: Fecha de inicio de la campaña. Ej. 201201
		$this->define_column('extension', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 50);
                
                // ['date_start'][DATE]: Fecha de inicio de la campaña. Ej. 201201
		$this->define_column('media_support', array(DBColumn::$NOT_NULL), STDType::$INT);
                
                $this->define_column('type', array(DBColumn::$NOT_NULL), STDType::$INT);
                
                $this->define_exist('file_name');
	}
}
?>
