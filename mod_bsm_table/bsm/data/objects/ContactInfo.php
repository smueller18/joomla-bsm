<?php

//GENERATED FILE: DO NOT CHANGE

class ContactInfo{
    
    private $ID;
    
    private $ContactName;
    
    private $ContactNameExtension;
    
    private $Street;
    
    private $PostalCode;
    
    private $City;
    
    private $Country;
    
    private $Phone;
    
    private $Mobile;
    
    private $Fax;
    
    private $EMail;
    
    private $OrganizationEMail;
    
    private $HomePage;
    
    private $Photo;
    
    private $HideInPublic;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->ContactName = $json->contact_name;
        $this->ContactNameExtension = $json->address_addon;
        $this->Street = $json->street;
        $this->PostalCode = $json->postal_code;
        $this->City = $json->city;
        $this->Country = $json->country;
        $this->Phone = $json->phone;
        $this->Mobile = $json->mobile;
        $this->Fax = $json->fax;
        $this->EMail = $json->mail;
        $this->OrganizationEMail = $json->mail_org;
        $this->HomePage = $json->website;
        $this->Photo = $json->photo_url;
        $this->HideInPublic = $json->hide_in_public;
    }
    
    public function GetID(){
        
        return $this->ID;
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
    
    public function GetPhone(){
        
        return $this->Phone;
    }
    
    public function GetMobile(){
        
        return $this->Mobile;
    }
    
    public function GetFax(){
        
        return $this->Fax;
    }
    
    public function GetEMail(){
        
        return $this->EMail;
    }
    
    public function GetOrganizationEMail(){
        
        return $this->OrganizationEMail;
    }
    
    public function GetHomePage(){
        
        return $this->HomePage;
    }
    
    public function GetPhoto(){
        
        return $this->Photo;
    }
    
    public function GetHideInPublic(){
        
        return $this->HideInPublic;
    }
}

?>
