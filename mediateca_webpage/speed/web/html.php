<?php

require_once speed . core . object;

class Html extends Object
{
	public static $ITEXT;
	public static $IBUTTON;
	public static $IIMAGE;
	protected $id = null;
	protected $name = null;
	protected $css = null;
	protected $value = null;
	
	
	public function id($id = null)
	{
		if(is_null($id)) return $this->id;
		$this->id = $id;
	}
	
	public function name($name = null)
	{
		if(is_null($name)) return $this->name;
		$this->name = $name;
	}
	
	public function css($css = null)
	{
		if(is_null($css)) return $this->css;
		$this->css = $css;
	}
	
	public function value($value = null)
	{
		if(is_null($value)) return $this->value;
		$this->value = $value;
	}
	
	
	public function __construct($name, $css = null, $id = null)
	{
		$this->name($name);
		$this->css($css);
		$this->id($id);
	}
	
	private static function CSSID($css = null, $id = null)
	{
		$css2 = (!is_null($css))? " class='".$css."'" : "";
		$id2 = (!is_null($id))? " id='".$id."'" : "";
		return "$css2$id2";
	}
	
	private static function NAMECSSID($name, $css = null, $id = null)
	{
		$name2 = " name='".$name."'";
		return "$name2".self::CSSID($css, $id);
	}
	

	
	public static function CTAG($tag)
	{
		return "</$tag>";
	}
	
	
	public static function OTAG($tag, $css=null, $id=null)
	{
		return "<$tag".self::CSSID($css, $id).">";
	}
	
	public static function TAG($content, $tag, $css=null, $id=null)
	{
		return self::OTAG($tag, $css, $id).$content.self::CTAG($tag);
	}

	public static function THEAD($content, $css=null, $id = null)
	{
		return self::OTAG("thead", $css, $id).$content.self::CTAG("thead");
	}
	
	public static function TBODY($content, $css=null, $id = null)
	{
		return self::OTAG("tbody", $css, $id).$content.self::CTAG("tbody");
	}
	
	public static function TFOOT($content, $css=null, $id = null)
	{
		return self::OTAG("tfoot", $css, $id).$content.self::CTAG("tfoot");
	}
	
	public static function SPAN($content, $css=null, $id = null)
	{
		return self::OTAG("span", $css, $id).$content.self::CTAG("span");
	}
	
	public static function TD($content, $css = null, $id = null)
	{
		return self::TAG($content, "td", $css, $id);
	}
	
        public static function TH($content, $css = null, $id = null)
	{
		return self::TAG($content, "th", $css, $id);
	}
        
        
	public static function TR($content, $css = null, $id = null)
	{
		return self::TAG($content, "tr", $css, $id);
	}
	
	public static function TABLE($content, $name= null, $css = null, $id = null)
	{
		return self::TAG($content, "table", $css, $id);
	}	
        
        public static function OPEN_TABLE($css = null, $id = null)
        {
            return self::OTAG("table", $css, $id);
        }
	
        public static function CLOSE_TABLE()
        {
            return self::CTAG("table");
        }
        
	public static function INPUT($type, $name, $value, $css, $id)
	{
		return "<input type='".$type."' ".self::NAMECSSID($name, $css, $id)." value='".$value."'>";
	}
	
	public static function BUTTON($name, $value, $css=null, $id=null)
	{
		return self::INPUT("button", $name, $value, $css, $id);
	}
	
        public static function IMAGETAG($image)
        {
            return "<img src='".CONFIG::getDefaultPathWebImages().$image."' />";
        }
        
	public static function IMAGEBUTTON($img, $name, $value, $css=null, $id=null)
	{
                $image = CONFIG::getDefaultPathWebImages().$img;
                $css = " style=\"background:none; background-image:url('$image'); background-repeat:no-repeat\" ";
                    

		return "<input type='image' src='$image' name='$name' value='".$value."' >";
	}
        
        public static function IMAGEACTION($img, $name, $value)
        {
            return "<input type='submit' name='$name' value='$value' style='width: 26px; height: 26px; background:none;text-decoration:none; color:transparent; border:none; background-image:url($img); background-repeat: no-repeat; background-position: 0px 0px;' />";
        }
	
        public static function HIDDEN($name, $value, $css=null, $id=null)
        {
            return self::INPUT("hidden", $name, $value, $css, $id);
        }
        
	public static function SUBMIT($name, $value, $css="SubmitBtn", $id=null)
	{
		return self::INPUT("submit", $name, $value, $css, $id);
	}
	
	public static function INPUTTEXT($name, $value, $css=null, $id=null)
	{
		return self::INPUT("text", $name, $value, $css, $id);
	}
	
	public static function INPUTTEXTDISABLED($name, $value, $css=null, $id=null)
	{
		return "<input type='text' ".self::NAMECSSID($name, $css, $id)." value='".$value."' disabled>";
	}
	
	public static function INPUTPASSWORD($name, $value, $css=null, $id=null)
	{
		return self::INPUT("password", $name, $value, $css, $id);
	}
	
	public static function C5ROW($content1, $content2, $content3)
	{
		return self::TR(self::TD($content1,"label_textfield").self::TD("&nbsp;&nbsp;&nbsp;").self::TD($content2).self::TD("&nbsp;").self::TD($content3, 'error_field'));
	}
	
	public static function C3ROW($content1, $content2)
	{
		return self::TR(self::TD($content1,"label_textfield").self::TD("&nbsp;&nbsp;&nbsp;").self::TD($content2));
	}
	
	public static function C2ROW($content1, $content2, $css_left=null, $css_right=null)
	{
		return self::TR(self::TD($content1,$css_left).self::TD($content2,$css_right));
	}
	
	public static function FORM($name, $action, $method, $content)
	{
		return "<form name='".$name."' action='".$action."' method='".$method."'>".$content."</form>";
	}
        
        public static function OPEN_FORM($name, $action, $method)
	{
		return "<form name='".$name."' action='".$action."' method='".$method."'>";
	}
        
        public static function CLOSE_FORM()
        {
            return "</form>";
        }
        
        public static function OPEN_FORM_POST($name, $action)
	{
		return "<form name='".$name."' action='".$action."' method='post'>";
	}
        
        public static function CLOSE_FORM_POST()
        {
            return "</form>";
        }
        
	
        public static function FORM_DATA($name, $action, $method, $content)
	{
		return "<form name='".$name."' action='".$action."' method='".$method."' enctype='multipart/form-data'>".$content."</form>";
	}
	public static function TEXTAREA($name, $value, $css = null, $id = null)
	{
		return "<textarea ".self::NAMECSSID($name, $css, $id).">$value</textarea>";
	}
	
	public static function OPTION($name, $value, $selected = null)
	{
		if ($selected) return "<option value='$value' selected>$name</option>";
		return "<option value='$value'>$name</option>";
	}
	
	public static function SELECT($name, $content, $css=null, $id=null)
	{
		return "<select name='$name'>$content</select>";
	}
	
        public static function SELECT_MULTI($name, $content, $css=null, $id=null)
	{
		return "<select name='$name' size='1' multiple='multiple' >$content</select>";
	}
        
	public static function CHECKBOX($name, $value, $selected, $css = null, $id = null)
	{
		$selected = ($selected) ? "checked":"";
		return "<input type='checkbox' ".self::NAMECSSID($name, $css, $id)." value='$value' $selected/>";
	}
	
	public static function LINK($name, $value, $selected, $css = null, $id = null)
	{
		
		return "<input type='submit' ".self::NAMECSSID($name, $css, $id).">$value</input>";
	}
	
	public function to_string()
	{}
}