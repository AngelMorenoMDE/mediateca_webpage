<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 
    
class Tag extends DBObject implements ISelectable
{
	protected $id = null;
	protected $name = null;

	protected function define()
	{
		$this->define_column('id', array(DBColumn::$NOT_NULL), STDType::$INT);
		$this->define_column('name', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 100);		
                $this->define_exist('name');
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
		$tag_name = new TextField("tag_name", "");
	
		$tr = Html::C3ROW("Tag: ", $tag_name->render());
		$tr .= Html::C3ROW("", Html::SUBMIT($this->table_name()."_save", "Crear nueva etiqueta"));
		echo Html::FORM("tag_form", "", "POST", Html::TABLE($tr, "form"));
	}
	
	public function process()
	{
		if(array_key_exists($this->table_name()."_save", $_POST))
		{
			$this->name($_POST["tag_name"]);
			if (array_key_exists("tag_name", $_SESSION)) unset($_SESSION["tag_name"]);
			$this->save();
		}
	}
}

?>