<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("Club.php");
include_once ("Match.php");

class MatchPenalty{
    
    private $ID;
    
    private $Type;
    
    private $Incident;
    
    private $Sentence;
    
    private $number;
    
    private $Function;
    
    private $Fee;
    
    private $Club;
    
    private $Match;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Type = $json->type;
        $this->Incident = $json->incident;
        $this->Sentence = $json->sentence;
        $this->number = $json->id_number;
        $this->Function = $json->function;
        $this->Fee = $json->fee;
        if (!empty($json->club))
        {
            $this->Club = new Club($json->club);
        }
        if (!empty($json->match))
        {
            $this->Match = new Match($json->match);
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetType(){
        
        return $this->Type;
    }
    
    public function GetIncident(){
        
        return $this->Incident;
    }
    
    public function GetSentence(){
        
        return $this->Sentence;
    }
    
    public function Getnumber(){
        
        return $this->number;
    }
    
    public function GetFunction(){
        
        return $this->Function;
    }
    
    public function GetFee(){
        
        return $this->Fee;
    }
    
    public function GetClub(){
        
        return $this->Club;
    }
    
    public function GetMatch(){
        
        return $this->Match;
    }
}

?>
