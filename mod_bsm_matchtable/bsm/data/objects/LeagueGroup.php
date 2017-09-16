<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("Person.php");

class LeagueGroup{
    
    private $ID;
    
    private $Name;
    
    private $Acronym;
    
    private $GameMode;
    
    private $UmpireSelection;
    
    private $ScorerSelection;
    
    private $ScoreReporting;
    
    private $HideTable;
    
    private $Manager;
    
    private $Statistician;
    
    private $UmpireSelector;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Name = $json->name;
        $this->Acronym = $json->acronym;
        $this->GameMode = $json->game_mode_description;
        $this->UmpireSelection = $json->umpire_selection;
        $this->ScorerSelection = $json->scorer_selection;
        $this->ScoreReporting = $json->score_reporting;
        $this->HideTable = $json->hide_table;
        if (!empty($json->manager))
        {
            $this->Manager = new Person($json->manager);
        }
        if (!empty($json->statistician))
        {
            $this->Statistician = new Person($json->statistician);
        }
        if (!empty($json->umpire_selector))
        {
            $this->UmpireSelector = new Person($json->umpire_selector);
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetName(){
        
        return $this->Name;
    }
    
    public function GetAcronym(){
        
        return $this->Acronym;
    }
    
    public function GetGameMode(){
        
        return $this->GameMode;
    }
    
    public function GetUmpireSelection(){
        
        return $this->UmpireSelection;
    }
    
    public function GetScorerSelection(){
        
        return $this->ScorerSelection;
    }
    
    public function GetScoreReporting(){
        
        return $this->ScoreReporting;
    }
    
    public function GetHideTable(){
        
        return $this->HideTable;
    }
    
    public function GetManager(){
        
        return $this->Manager;
    }
    
    public function GetStatistician(){
        
        return $this->Statistician;
    }
    
    public function GetUmpireSelector(){
        
        return $this->UmpireSelector;
    }
}

?>
