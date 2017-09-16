<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("Person.php");

class League{
    
    private $ID;
    
    private $Name;
    
    private $Acronym;
    
    private $Sports;
    
    private $Classification;
    
    private $Male;
    
    private $Female;
    
    private $Agegroup;
    
    private $GameMode;
    
    private $MinBirthYear;
    
    private $MaxBirthYear;
    
    private $UmpireSelection;
    
    private $ScorerSelection;
    
    private $ScoreReporting;
    
    private $GameRoundModeDescription;
    
    private $Fee;
    
    private $Deposit;
    
    private $UmpireFixedRate;
    
    private $Season;
    
    private $HideTable;
    
    private $Manager;
    
    private $Statistician;
    
    private $UmpireSelector;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Name = $json->name;
        $this->Acronym = $json->acronym;
        $this->Sports = $json->sport;
        $this->Classification = $json->classification;
        $this->Male = $json->gender_male;
        $this->Female = $json->gender_female;
        $this->Agegroup = $json->age_group;
        $this->GameMode = $json->game_mode_description;
        $this->MinBirthYear = $json->min_year_of_birth;
        $this->MaxBirthYear = $json->max_year_of_birth;
        $this->UmpireSelection = $json->umpire_selection;
        $this->ScorerSelection = $json->scorer_selection;
        $this->ScoreReporting = $json->score_reporting;
        $this->GameRoundModeDescription = $json->game_round_mode_description;
        $this->Fee = $json->fee;
        $this->Deposit = $json->deposit;
        $this->UmpireFixedRate = $json->umpire_fixed_rate;
        $this->Season = $json->season;
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
    
    public function GetSports(){
        
        return $this->Sports;
    }
    
    public function GetClassification(){
        
        return $this->Classification;
    }
    
    public function GetMale(){
        
        return $this->Male;
    }
    
    public function GetFemale(){
        
        return $this->Female;
    }
    
    public function GetAgegroup(){
        
        return $this->Agegroup;
    }
    
    public function GetGameMode(){
        
        return $this->GameMode;
    }
    
    public function GetMinBirthYear(){
        
        return $this->MinBirthYear;
    }
    
    public function GetMaxBirthYear(){
        
        return $this->MaxBirthYear;
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
    
    public function GetGameRoundModeDescription(){
        
        return $this->GameRoundModeDescription;
    }
    
    public function GetFee(){
        
        return $this->Fee;
    }
    
    public function GetDeposit(){
        
        return $this->Deposit;
    }
    
    public function GetUmpireFixedRate(){
        
        return $this->UmpireFixedRate;
    }
    
    public function GetSeason(){
        
        return $this->Season;
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
