<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("Club.php");

class Field{
    
    private $ID;
    
    private $Name;
    
    private $Description;
    
    private $OtherInformation;
    
    private $GroundRules;
    
    private $ContactName;
    
    private $ContactNameExtension;
    
    private $Street;
    
    private $PostalCode;
    
    private $City;
    
    private $Country;
    
    private $Photo;
    
    private $Club;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Name = $json->name;
        $this->Description = $json->description;
        $this->OtherInformation = $json->other_information;
        $this->GroundRules = $json->groundrules;
        $this->ContactName = $json->contact_name;
        $this->ContactNameExtension = $json->address_addon;
        $this->Street = $json->street;
        $this->PostalCode = $json->postal_code;
        $this->City = $json->city;
        $this->Country = $json->country;
        $this->Photo = $json->photo_url;
        if (!empty($json->club))
        {
            $this->Club = new Club($json->club);
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetName(){
        
        return $this->Name;
    }
    
    public function GetDescription(){
        
        return $this->Description;
    }
    
    public function GetOtherInformation(){
        
        return $this->OtherInformation;
    }
    
    public function GetGroundRules(){
        
        return $this->GroundRules;
    }
    
    public function GetContactName(){
        
        return $this->ContactName;
    }
    
    public function GetContactNameExtension(){
        
        return $this->ContactNameExtension;
    }
    
    public function GetStreet(){
        
        return $this->Street;
    }
    
    public function GetPostalCode(){
        
        return $this->PostalCode;
    }
    
    public function GetCity(){
        
        return $this->City;
    }
    
    public function GetCountry(){
        
        return $this->Country;
    }
    
    public function GetPhoto(){
        
        return $this->Photo;
    }
    
    public function GetClub(){
        
        return $this->Club;
    }
}

?>
