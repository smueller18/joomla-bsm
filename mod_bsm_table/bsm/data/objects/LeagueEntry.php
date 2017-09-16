<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("League.php");
include_once ("Field.php");
include_once ("Team.php");
include_once ("Person.php");

class LeagueEntry{
    
    private $ID;
    
    private $IsNotCompeting;
    
    private $League;
    
    private $Field;
    
    private $Team;
    
    private $Contacts;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->IsNotCompeting = $json->not_competing;
        if (!empty($json->league))
        {
            $this->League = new League($json->league);
        }
        if (!empty($json->field))
        {
            $this->Field = new Field($json->field);
        }
        if (!empty($json->team))
        {
            $this->Team = new Team($json->team);
        }
        if (!empty($json->contact_people) && is_array($json->contact_people))
        {
            $this->Contacts = array();
            foreach ($json->contact_people as $jsonElement)
            {
                array_push($this->Contacts, new Person($jsonElement));
            }
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetIsNotCompeting(){
        
        return $this->IsNotCompeting;
    }
    
    public function GetLeague(){
        
        return $this->League;
    }
    
    public function GetField(){
        
        return $this->Field;
    }
    
    public function GetTeam(){
        
        return $this->Team;
    }
    
    public function GetContacts(){
        
        return $this->Contacts;
    }
}

?>
