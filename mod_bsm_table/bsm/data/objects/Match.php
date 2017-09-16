<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("LeagueEntry.php");
include_once ("Field.php");
include_once ("Context.php");
include_once ("LeagueGroup.php");
include_once ("UmpireScorerAssignment.php");

class Match{
    
    private $ID;
    
    private $MatchID;
    
    private $Time;
    
    private $HomeRuns;
    
    private $AwayRuns;
    
    private $State;
    
    private $LocalizedState;
    
    private $ScoreSheetUrl;
    
    private $ScoreSheetFileName;
    
    private $HomeLeagueEntry;
    
    private $AwayLeagueEntry;
    
    private $Field;
    
    private $UmpireSelection;
    
    private $ScorerSelection;
    
    private $League;
    
    private $UmpireAssignments;
    
    private $ScorerAssignments;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->MatchID = $json->match_id;
        $this->Time = $json->time;
        $this->HomeRuns = $json->home_runs;
        $this->AwayRuns = $json->away_runs;
        $this->State = $json->state;
        $this->LocalizedState = $json->human_state;
        $this->ScoreSheetUrl = $json->scoresheet_url;
        $this->ScoreSheetFileName = $json->scoresheet_file_name;
        if (!empty($json->home_league_entry))
        {
            $this->HomeLeagueEntry = new LeagueEntry($json->home_league_entry);
        }
        if (!empty($json->away_league_entry))
        {
            $this->AwayLeagueEntry = new LeagueEntry($json->away_league_entry);
        }
        if (!empty($json->field))
        {
            $this->Field = new Field($json->field);
        }
        if (!empty($json->umpire_selection))
        {
            $this->UmpireSelection = new Context($json->umpire_selection);
        }
        if (!empty($json->scorer_selection))
        {
            $this->ScorerSelection = new Context($json->scorer_selection);
        }
        if (!empty($json->league))
        {
            $this->League = new LeagueGroup($json->league);
        }
        if (!empty($json->umpire_assignments) && is_array($json->umpire_assignments))
        {
            $this->UmpireAssignments = array();
            foreach ($json->umpire_assignments as $jsonElement)
            {
                array_push($this->UmpireAssignments, new UmpireScorerAssignment($jsonElement));
            }
        }
        if (!empty($json->scorer_assignments) && is_array($json->scorer_assignments))
        {
            $this->ScorerAssignments = array();
            foreach ($json->scorer_assignments as $jsonElement)
            {
                array_push($this->ScorerAssignments, new UmpireScorerAssignment($jsonElement));
            }
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetMatchID(){
        
        return $this->MatchID;
    }
    
    public function GetTime(){
        
        return $this->Time;
    }
    
    public function GetHomeRuns(){
        
        return $this->HomeRuns;
    }
    
    public function GetAwayRuns(){
        
        return $this->AwayRuns;
    }
    
    public function GetState(){
        
        return $this->State;
    }
    
    public function GetLocalizedState(){
        
        return $this->LocalizedState;
    }
    
    public function GetScoreSheetUrl(){
        
        return $this->ScoreSheetUrl;
    }
    
    public function GetScoreSheetFileName(){
        
        return $this->ScoreSheetFileName;
    }
    
    public function GetResult(){
        
        return $this->GetHomeRuns() === null || $this->GetAwayRuns() === null ? null : $this->GetHomeRuns() . ":" . $this->GetAwayRuns();
    }
    
    public function GetHomeLeagueEntry(){
        
        return $this->HomeLeagueEntry;
    }
    
    public function GetAwayLeagueEntry(){
        
        return $this->AwayLeagueEntry;
    }
    
    public function GetField(){
        
        return $this->Field;
    }
    
    public function GetUmpireSelection(){
        
        return $this->UmpireSelection;
    }
    
    public function GetScorerSelection(){
        
        return $this->ScorerSelection;
    }
    
    public function GetLeague(){
        
        return $this->League;
    }
    
    public function GetUmpireAssignments(){
        
        return $this->UmpireAssignments;
    }
    
    public function GetScorerAssignments(){
        
        return $this->ScorerAssignments;
    }
}

?>
