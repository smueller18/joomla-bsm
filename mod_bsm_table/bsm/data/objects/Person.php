<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("ContactInfo.php");

class Person{
    
    private $ID;
    
    private $NamePrefix;
    
    private $FirstName;
    
    private $LastName;
    
    private $NameSuffix;
    
    private $ContactInfo;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->NamePrefix = $json->name_prefix;
        $this->FirstName = $json->first_name;
        $this->LastName = $json->last_name;
        $this->NameSuffix = $json->name_suffix;
        if (!empty($json->contact_info))
        {
            $this->ContactInfo = new ContactInfo($json->contact_info);
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetNamePrefix(){
        
        return $this->NamePrefix;
    }
    
    public function GetFirstName(){
        
        return $this->FirstName;
    }
    
    public function GetLastName(){
        
        return $this->LastName;
    }
    
    public function GetNameSuffix(){
        
        return $this->NameSuffix;
    }
    
    public function GetContactInfo(){
        
        return $this->ContactInfo;
    }
}

?>
