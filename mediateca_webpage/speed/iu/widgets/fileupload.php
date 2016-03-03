<?php


require_once speed . iu . widgets . iwidget;
require_once speed . filesystem;

class FileUpload implements IWidget{
    
    private $name = null;
    private $properties = null;
    private $file = null;
    private $has_file = false;
    
    public function __construct($name, $properties)
    {
        $this->name = $name;
        $this->properties = $properties;        
    }
    
    public function process() 
    {
        if (isset($_FILES[$this->name]))
        {            
            $this->has_file = true;
            $this->file = new FileSystem($this->name);
        }
        else
        {
            $this->has_file = false;
        }
    }

    public function render() 
    {
        return "<input type='file' name='".$this->name."'/>";
    }
    
    public function file()
    {
        return $this->file;
    }
    
    public function has_file()
    {
        return $this->has_file;
    }
}

?>
