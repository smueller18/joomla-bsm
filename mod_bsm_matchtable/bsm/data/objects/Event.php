<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("Location.php");

class Event{
    
    private $ID;
    
    private $Title;
    
    private $Description;
    
    private $StartsAt;
    
    private $EndsAt;
    
    private $Location;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Title = $json->title;
        $this->Description = $json->description;
        $this->StartsAt = $json->starts_at;
        $this->EndsAt = $json->ends_at;
        if (!empty($json->location))
        {
            $this->Location = new Location($json->location);
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetTitle(){
        
        return $this->Title;
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
    
    public function GetLocation(){
        
        return $this->Location;
    }
}

?>
