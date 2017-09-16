<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("TableRow.php");

class Table{
    
    private $Season;
    
    private $LeagueID;
    
    private $LeagueName;
    
    private $Rows;
    
    public function __construct($json) {
    
        $this->Season = $json->season;
        $this->LeagueID = $json->league_id;
        $this->LeagueName = $json->league_name;
        if (!empty($json->rows) && is_array($json->rows))
        {
            $this->Rows = array();
            foreach ($json->rows as $jsonElement)
            {
                array_push($this->Rows, new TableRow($jsonElement));
            }
        }
    }
    
    public function GetSeason(){
        
        return $this->Season;
    }
    
    public function GetLeagueID(){
        
        return $this->LeagueID;
    }
    
    public function GetLeagueName(){
        
        return $this->LeagueName;
    }
    
    public function GetRows(){
        
        return $this->Rows;
    }
}

?>
