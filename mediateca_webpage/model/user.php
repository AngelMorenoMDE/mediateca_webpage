<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 

class User extends DBObject
{
	protected $id = null;
	protected $name = null;
	protected $password = null;
	protected $email = null;
	protected $rol = null;

	public function id($id = null) { if (is_null($id)) { return $this->id;} else $this->id = $id; }
	public function name($name = null) { if (is_null($name)) { return $this->name;} else $this->name = $name; }
	public function email($email = null) { if (is_null($email)) { return $this->email;} else $this->email = $email; }
	public function password($password = null) { if (is_null($password)) { return $this->password;} else $this->password = md5($password); }
	public function rol($rol = null) { if (is_null($rol)) { return $this->rol;} else $this->rol = $rol; }
		
	protected function define()
	{
		$this->define_column('id', array(DBColumn::$PRIMARY_KEY, DBColumn::$AUTO_INC, DBColumn::$NOT_NULL), STDType::$INT);
		$this->define_column('name', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 50);
		$this->define_column('email', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 50);
		$this->define_column('password', array(DBColumn::$NOT_NULL), STDType::$VARCHAR, 32);
		$this->define_column('rol', array(DBColumn::$NOT_NULL), STDType::$INT);
		
		$this->define_exist('email', 'password');
	}
}