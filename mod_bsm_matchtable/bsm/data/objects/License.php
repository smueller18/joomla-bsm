<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("Person.php");
include_once ("Club.php");
include_once ("Organization.php");

class License{
    
    private $ID;
    
    private $Number;
    
    private $ValidUntil;
    
    private $Category;
    
    private $Level;
    
    private $Person;
    
    private $Club;
    
    private $Organization;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Number = $json->number;
        $this->ValidUntil = $json->valid_until;
        $this->Category = $json->category;
        $this->Level = $json->level;
        if (!empty($json->person))
        {
            $this->Person = new Person($json->person);
        }
        if (!empty($json->club))
        {
            $this->Club = new Club($json->club);
        }
        if (!empty($json->organization))
        {
            $this->Organization = new Organization($json->organization);
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetNumber(){
        
        return $this->Number;
    }
    
    public function GetValidUntil(){
        
        return $this->ValidUntil;
    }
    
    public function GetCategory(){
        
        return $this->Category;
    }
    
    public function GetLevel(){
        
        return $this->Level;
    }
    
    public function GetClubOrOrganization(){
        
        return $this->GetClub() === null ? $this->GetOrganization() : $this->GetClub();
    }
    
    public function GetPerson(){
        
        return $this->Person;
    }
    
    public function GetClub(){
        
        return $this->Club;
    }
    
    public function GetOrganization(){
        
        return $this->Organization;
    }
}

?>
