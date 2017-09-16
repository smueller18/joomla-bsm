<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("LeagueEntry.php");

class TableRow{
    
    private $Rank;
    
    private $TeamName;
    
    private $ShortTeamName;
    
    private $NotCompeting;
    
    private $MatchCount;
    
    private $WinsCount;
    
    private $LossesCount;
    
    private $Quota;
    
    private $GamesBehind;
    
    private $Streak;
    
    private $LeagueEntry;
    
    public function __construct($json) {
    
        $this->Rank = $json->rank;
        $this->TeamName = $json->team_name;
        $this->ShortTeamName = $json->short_team_name;
        $this->NotCompeting = $json->not_competing;
        $this->MatchCount = $json->match_count;
        $this->WinsCount = $json->wins_count;
        $this->LossesCount = $json->losses_count;
        $this->Quota = $json->quota;
        $this->GamesBehind = $json->games_behind;
        $this->Streak = $json->streak;
        if (!empty($json->league_entry))
        {
            $this->LeagueEntry = new LeagueEntry($json->league_entry);
        }
    }
    
    public function GetRank(){
        
        return $this->Rank;
    }
    
    public function GetTeamName(){
        
        return $this->TeamName;
    }
    
    public function GetShortTeamName(){
        
        return $this->ShortTeamName;
    }
    
    public function GetNotCompeting(){
        
        return $this->NotCompeting;
    }
    
    public function GetMatchCount(){
        
        return $this->MatchCount;
    }
    
    public function GetWinsCount(){
        
        return $this->WinsCount;
    }
    
    public function GetLossesCount(){
        
        return $this->LossesCount;
    }
    
    public function GetQuota(){
        
        return $this->Quota;
    }
    
    public function GetGamesBehind(){
        
        return $this->GamesBehind;
    }
    
    public function GetStreak(){
        
        return $this->Streak;
    }
    
    public function GetLeagueEntry(){
        
        return $this->LeagueEntry;
    }
}

?>
