<?php

    require_once speed . core . stdtype;
    require_once speed . db . dbobject;
    require_once speed . db . dbcolumn;
    require_once speed . iu . interfaces . iselectable; 

class FileSystem {
    
    private $name = null;
    private $extension = null;
    private $mimetype = null;
    private $size = null;    
    private $tmp = null;
    
    public function name($name = null) { if (is_null($name)) { return $this->name; } else $this->name = $name; }
    
    public function extension($extension = null) { if (is_null($extension)) { return $this->extension; } else $this->extension = $extension; }
    
    public function mimetype($mimetype = null) { if (is_null($mimetype)) { return $this->mimetype; } else $this->mimetype = $mimetype; }
    
    public function size($size = null) { if (is_null($size)) { return $this->size; } else $this->size = $size; }
    
    public function tmp($tmp = null) { if (is_null($tmp)) { return $this->tmp; } else $this->tmp = $tmp; }
    
    public function __construct($name = null) 
    {
        $this->name($_FILES[$name]["name"]);
        
        $parts = explode(".", $this->name);        
        $this->extension(".".strtolower($parts[count($parts)-1]));
        
        $this->mimetype($_FILES[$name]["type"]);
        
        $this->tmp($_FILES[$name]["tmp_name"]);
        $this->size($_FILES[$name]["size"]);
    }
}

?>
