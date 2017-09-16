<?php

//GENERATED FILE: DO NOT CHANGE

class Location{
    
    private $ID;
    
    private $Name;
    
    private $Description;
    
    private $StartsAt;
    
    private $EndsAt;
    
    private $ContactName;
    
    private $ContactNameExtension;
    
    private $Street;
    
    private $PostalCode;
    
    private $City;
    
    private $Country;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Name = $json->name;
        $this->Description = $json->description;
        $this->StartsAt = $json->starts_at;
        $this->EndsAt = $json->ends_at;
        $this->ContactName = $json->contact_name;
        $this->ContactNameExtension = $json->address_addon;
        $this->Street = $json->street;
        $this->PostalCode = $json->postal_code;
        $this->City = $json->city;
        $this->Country = $json->country;
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
    
    public function GetStartsAt(){
        
        return $this->StartsAt;
    }
    
    public function GetEndsAt(){
        
        return $this->EndsAt;
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
}

?>
