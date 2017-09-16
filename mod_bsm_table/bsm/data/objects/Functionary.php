<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("Person.php");

class Functionary{
    
    private $ID;
    
    private $Name;
    
    private $Category;
    
    private $Person;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Name = $json->function;
        $this->Category = $json->category;
        if (!empty($json->person))
        {
            $this->Person = new Person($json->person);
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetName(){
        
        return $this->Name;
    }
    
    public function GetCategory(){
        
        return $this->Category;
    }
    
    public function GetPerson(){
        
        return $this->Person;
    }
}

?>
