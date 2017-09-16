<?php

//GENERATED FILE: DO NOT CHANGE

class Context{
    
    private $ID;
    
    private $Name;
    
    private $ShortName;
    
    private $Acronym;
    
    private $Type;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Name = $json->name;
        $this->ShortName = $json->short_name;
        $this->Acronym = $json->acronym;
        $this->Type = $json->type;
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetName(){
        
        return $this->Name;
    }
    
    public function GetShortName(){
        
        return $this->ShortName;
    }
    
    public function GetAcronym(){
        
        return $this->Acronym;
    }
    
    public function GetType(){
        
        return $this->Type;
    }
    
    public function GetDisplayName(){
        
        return $this->GetType() === 'Club' ? $this->GetShortName() : $this->GetName();
    }
}

?>
