<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 

class Advertiser extends DBObject implements ISelectable
{
	protected $id = null;
	protected $name = null;

	protected function define()
	{
		$this->define_column('id', array(DBColumn::$PRIMARY_KEY, DBColumn::$AUTO_INC, DBColumn::$NOT_NULL), STDType::$INT);
		$this->define_column('name', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 255);		
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
	

	public function create_form()
	{
		$advertiser_name = new TextField("advertiser_name", "");
	
		$tr = Html::C3ROW("Anunciante: ", $advertiser_name->render());
		$tr .= Html::C3ROW("", Html::SUBMIT($this->table_name()."_save", "Crear nuevo anunciante"));
		echo Html::FORM("advertiser_form", "", "POST", Html::TABLE($tr, "form"));
	}
	
	public function process()
	{
		if(array_key_exists($this->table_name()."_save", $_POST))
		{
			$this->name($_POST["advertiser_name"]);
			if (array_key_exists("advertiser_name", $_SESSION)) unset($_SESSION["advertiser_name"]);
			$this->save();
		}
	}
        
        public function get_all()
	{
            $this->order_by('name', DBOrder::$ASC);
            return parent::get_all(); 
	}
}
?>