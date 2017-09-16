<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("LeagueEntry.php");
include_once ("Club.php");

class Team{
    
    private $Name;
    
    private $Acronym;
    
    private $LeagueEntries;
    
    private $Clubs;
    
    public function __construct($json) {
    
        $this->Name = $json->name;
        $this->Acronym = $json->short_name;
        if (!empty($json->league_entries) && is_array($json->league_entries))
        {
            $this->LeagueEntries = array();
            foreach ($json->league_entries as $jsonElement)
            {
                array_push($this->LeagueEntries, new LeagueEntry($jsonElement));
            }
        }
        if (!empty($json->clubs) && is_array($json->clubs))
        {
            $this->Clubs = array();
            foreach ($json->clubs as $jsonElement)
            {
                array_push($this->Clubs, new Club($jsonElement));
            }
        }
    }
    
    public function GetName(){
        
        return $this->Name;
    }
    
    public function GetAcronym(){
        
        return $this->Acronym;
    }
    
    public function GetLeagueEntries(){
        
        return $this->LeagueEntries;
    }
    
    public function GetClubs(){
        
        return $this->Clubs;
    }
}

?>
