<?php

//GENERATED FILE: DO NOT CHANGE

class Organization{
    
    private $ID;
    
    private $Number;
    
    private $Name;
    
    private $ShortName;
    
    private $Acronym;
    
    private $ContactName;
    
    private $ContactNameExtension;
    
    private $Street;
    
    private $PostalCode;
    
    private $City;
    
    private $Country;
    
    private $Phone;
    
    private $PhoneAlternative;
    
    private $Mobile;
    
    private $MobileAlternative;
    
    private $Fax;
    
    private $FaxAlternative;
    
    private $EMail;
    
    private $EMailAlternative;
    
    private $HomePage;
    
    private $Logo;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Number = $json->number;
        $this->Name = $json->name;
        $this->ShortName = $json->short_name;
        $this->Acronym = $json->acronym;
        $this->ContactName = $json->contact_name;
        $this->ContactNameExtension = $json->address_addon;
        $this->Street = $json->street;
        $this->PostalCode = $json->postal_code;
        $this->City = $json->city;
        $this->Country = $json->country;
        $this->Phone = $json->phone;
        $this->PhoneAlternative = $json->phone_alt;
        $this->Mobile = $json->mobile;
        $this->MobileAlternative = $json->mobile_alt;
        $this->Fax = $json->fax;
        $this->FaxAlternative = $json->fax_alt;
        $this->EMail = $json->mail;
        $this->EMailAlternative = $json->mail_alt;
        $this->HomePage = $json->website;
        $this->Logo = $json->logo_url;
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetNumber(){
        
        return $this->Number;
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
    
    public function GetPhoneAlternative(){
        
        return $this->PhoneAlternative;
    }
    
    public function GetMobile(){
        
        return $this->Mobile;
    }
    
    public function GetMobileAlternative(){
        
        return $this->MobileAlternative;
    }
    
    public function GetFax(){
        
        return $this->Fax;
    }
    
    public function GetFaxAlternative(){
        
        return $this->FaxAlternative;
    }
    
    public function GetEMail(){
        
        return $this->EMail;
    }
    
    public function GetEMailAlternative(){
        
        return $this->EMailAlternative;
    }
    
    public function GetHomePage(){
        
        return $this->HomePage;
    }
    
    public function GetLogo(){
        
        return $this->Logo;
    }
}

?>
