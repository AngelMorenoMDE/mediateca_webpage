<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 

    require_once speed . system;
    
class Campaign extends DBObject implements ISelectable
{
	protected $id = null;
	protected $name = null;		
	protected $year = null;
	protected $date_start = null;
	protected $date_end = null;
	protected $months = null;
	protected $adv_agency = null;
	protected $advertiser = null;
	protected $target = null;
	protected $target_people = null;
	protected $cost = null;
	protected $summary = null;
        protected $advertising_agency=null;
        
	public function id($id = null) { if (is_null($id)) { return $this->id;} else $this->id = $id; }
	
	public function name($name = null) { if (is_null($name)) { return $this->name;} else $this->name = $name; }
	
	public function year($year = null) { if (is_null($year)) { return $this->year;} else $this->year = $year; }
	
	public function date_start($date_start = null) { if (is_null($date_start)) { return $this->date_start;} else $this->date_start = $date_start; }
	
	public function date_end($date_end = null) { if (is_null($date_end)) { return $this->date_end;} else $this->date_end = $date_end; }
	
	public function months($months = null) { if (is_null($months)) { return $this->months;} else $this->months = $months; }
	
	public function adv_agency($adv_agency = null) { if (is_null($adv_agency)) { return $this->adv_agency;} else $this->adv_agency = $adv_agency; }
	
	public function advertiser($advertiser = null) { if (is_null($advertiser)) { return $this->advertiser;} else $this->advertiser = $advertiser; }
	
        public function advertising_agency($advertising_agency = null) { if (is_null($advertising_agency)) { return $this->advertising_agency;} else $this->advertising_agency = $advertising_agency; }

        
	public function target($target = null) { if (is_null($target)) { return $this->target;} else $this->target = $target; }
	
	public function target_people($target_people = null) { if (is_null($target_people)) { return $this->target_people;} else $this->target_people = $target_people; }
	
	public function cost($cost = null) { if (is_null($cost)) { return $this->cost;} else $this->cost = $cost; }
	
	public function summary($summary = null) { if (is_null($summary)) { return $this->summary;} else $this->summary = $summary; }
	
	protected function define()
	{

		// ['adv_agency'][VARCHAR][25] : código único de identificador de cada una de las campañas. 
		$this->define_column('id', array(DBColumn::$PRIMARY_KEY, DBColumn::$AUTO_INC, DBColumn::$NOT_NULL), STDType::$INT); 
		
		// ['name'][VARCHAR][255] : Nómbre/Título de la campaña. Ej. "Vigilancia y Control de Distracciones".
		$this->define_column('name', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 255);
		
		// ['year'][SMALL_INT]: Año de la campaña. Ej. 2012 
		$this->define_column('year', array(DBColumn::$NOT_NULL), STDType::$SMALL_INT);
		
		// ['date_start'][DATE]: Fecha de inicio de la campaña. Ej. 201201
		$this->define_column('date_start', array(DBColumn::$NOT_NULL), STDType::$DATE);
		
		// ['date_end'][DATE]: Fecha de fin de la campaña. Ej. 201203
		$this->define_column('date_end', array(DBColumn::$NOT_NULL), STDType::$DATE);
		
		// ['months'][TINY_INT]: Duración en meses de la campaña. Ej. 2 meses.
		$this->define_column('months', array(DBColumn::$NOT_NULL), STDType::$TINY_INT);
		
		// ['adv_agency'][INT]: Id. de la Agencia de publicidad que diseño la campaña. Ej. URJC Producciones.
		$this->define_column('adv_agency', array(DBColumn::$NOT_NULL), STDType::$INT);
		
		// ['advertiser'][INT]: Id. de la institución emisora de la campaña. Ej. Ministerio del Interior 
		$this->define_column('advertiser', array(DBColumn::$NOT_NULL), STDType::$INT);
		
                // ['target'][VARCHAR][255]: Pequeña descripción de la campaña. Ej. Mostrar prácticas para ahorrar combustible.
		$this->define_column('advertising_agency', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 255);
                
		// ['target'][VARCHAR][255]: Pequeña descripción de la campaña. Ej. Mostrar prácticas para ahorrar combustible.
		$this->define_column('target', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 255);
		
		// ['target_people'][INT]: Id. del grupo de personas al que va dirigida la campala. Ej. Conductores.
		$this->define_column('target_people', array(DBColumn::$NOT_NULL), STDType::$INT);
		
		// ['cost'][INT]: Coste en euros de la campaña. Ej. 120.000 €
		$this->define_column('cost', array(DBColumn::$NOT_NULL), STDType::$INT);
		
		// ['summary'][VARCHAR][1000]: Descripción extensa de la campaña.
		$this->define_column('summary', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 1000);
	
	}

        public function get_all() 
        {
            /*if (!System::isAdministratorLogged())
            {*/
                $this->order_by('year', DBOrder::$DESC);
                $this->order_by('advertising_agency', DBOrder::$ASC);
                $this->order_by('advertiser', DBOrder::$ASC);
            //}
            
            return parent::get_all();
        }

	

}

?>
	