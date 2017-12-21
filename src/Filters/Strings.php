<?php

namespace App\Filters;

class Strings
{
    private $string;
 
    public function __construct($string)
    {
        $this->string = $string;
    }

    public function stringLength()
    {
        return strlen($this->string);
    }
 
    public function stripTags()
    {
        return strip_tags($this->string);
    }
 
    public function stringTrim()
    {
        return trim($this->string);
    }
 
    public function stringToLower()
    {
        return strtolower($this->string);
    }
 
    public function stringToUpper()
    {
        return strtoupper($this->string);
    }
}
