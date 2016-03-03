<?php


class JSON
{
    public static function quotes($str)
    {
        return "\"$str\"";
    }
    public static function quotesString($string)
    {
        return "\"$string\"";
    }

    public static function jsonAttribute($key, $value)
    {
        return JSON::quotesString($key).":".$value;
    }

    public static function jsonObject($content)
    {
        return "{".$content."}";
    }

    public static function jsonArray($content)
    {
        return "[$content]";
    }

    public static function jsonSerialization($form, $fields, $types)
    {
        $serializationString = "";

        for($i=0; $i<count($fields); $i++)
        {
            if ($i) $serializationString .= ",";
            $field = JSON::jsonAttribute("name", JSON::quotesString($fields[$i])).",";
            $field .= JSON::jsonAttribute("type", JSON::quotesString($types[$i]));

            $serializationString .= JSON::jsonObject($field);
        }

        $serializationString = JSON::jsonArray($serializationString);

        return JSON::jsonObject(JSON::jsonAttribute("form", JSON::quotesString($form)).",".JSON::jsonAttribute("fields", $serializationString));
    }
    
    public static function jsonErrorMsgForm($fields, $errors)
    {
        $jsonQuery = "{";
        $jsonQuery .= "\"result\":\"fail\"";
        $jsonQueryErrors = ", \"errors\":[";
        $jsonQueryFieldsError = ", \"fieldsWithErrors\":[";
        $fe = 0;

        for($i=0; $i<count($fields); $i++)
        {            
            if (count($errors[$fields[$i]]))
            {
                if ($fe) { $jsonQueryFieldsError .= ","; $jsonQueryErrors .= ","; }
                for($j=0; $j<count($errors[$fields[$i]]); $j++)
                {
                    $jsonQueryFieldsError .= "\"".$fields[$i]."\"";
                    if ($j>0) $jsonQueryErrors .= ",";
                    $jsonQueryErrors .= "\"".$errors[$fields[$i]][$j]."\"";
                }
                $fe++;
            }

        }
        
        $jsonQueryErrors .= "]";
        $jsonQueryFieldsError .= "]";
        $jsonQuery .= $jsonQueryFieldsError . $jsonQueryErrors;  
        $jsonQuery .= "}";
        return $jsonQuery;
    }
    
    public static function colon()
    {
        return ":";
    }
    public static function coma()
    {
        return ",";
    }
    
    public static function object($content)
    {
        return "{".$content."}";
    }
    
    public static function attributeStr($key, $value)
    {
        return self::quotes($key).self::colon().self::quotes($value);
    }
    public static function attributeList($list)
    {
        $c = 0;
        $attrs = "";
        foreach ($list as $key => $value) 
        {
            if ($c) $attrs .= self::coma();
            
            $attrs .= self::attributeStr($key, $value);
            $c++;
        }
        
        return $attrs;
    }
    public static function jsonResultOK($form)
    {
        $attrs["result"] = "ok";
        $attrs["form"] = $form;
        
        return self::object(self::attributeList($attrs));

    }
}

?>
