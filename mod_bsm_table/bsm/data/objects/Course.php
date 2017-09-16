<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("Person.php");
include_once ("Organization.php");
include_once ("Club.php");
include_once ("Event.php");

class Course{
    
    private $ID;
    
    private $Title;
    
    private $Code;
    
    private $Description;
    
    private $RegistrationEndsAt;
    
    private $CancellationEndsAt;
    
    private $CostCents;
    
    private $ParticipantCount;
    
    private $MaxParticipants;
    
    private $MinParticipants;
    
    private $Category;
    
    private $ContextType;
    
    private $EMail;
    
    private $HasScript;
    
    private $ScriptDescription;
    
    private $ScriptCostCents;
    
    private $HasAccomodation;
    
    private $AccomodationDeadline;
    
    private $AccomodationComment;
    
    private $AccomodationCostCents;
    
    private $Trainer;
    
    private $Organization;
    
    private $Club;
    
    private $Events;
    
    public function __construct($json) {
    
        $this->ID = $json->id;
        $this->Title = $json->title;
        $this->Code = $json->code;
        $this->Description = $json->description;
        $this->RegistrationEndsAt = $json->registration_ends_at;
        $this->CancellationEndsAt = $json->cancellation_ends_at;
        $this->CostCents = $json->cost_cents;
        $this->ParticipantCount = $json->participant_count;
        $this->MaxParticipants = $json->participants_max;
        $this->MinParticipants = $json->participants_min;
        $this->Category = $json->category;
        $this->ContextType = $json->context_type;
        $this->EMail = $json->email;
        $this->HasScript = $json->script;
        $this->ScriptDescription = $json->script_description;
        $this->ScriptCostCents = $json->script_cost_cents;
        $this->HasAccomodation = $json->accomodation;
        $this->AccomodationDeadline = $json->accomodation_deadline;
        $this->AccomodationComment = $json->accomodation_comment;
        $this->AccomodationCostCents = $json->accomodation_cost_cents;
        if (!empty($json->trainer))
        {
            $this->Trainer = new Person($json->trainer);
        }
        if (!empty($json->context))
        {
            $this->Organization = new Organization($json->context);
        }
        if (!empty($json->context))
        {
            $this->Club = new Club($json->context);
        }
        if (!empty($json->events) && is_array($json->events))
        {
            $this->Events = array();
            foreach ($json->events as $jsonElement)
            {
                array_push($this->Events, new Event($jsonElement));
            }
        }
    }
    
    public function GetID(){
        
        return $this->ID;
    }
    
    public function GetTitle(){
        
        return $this->Title;
    }
    
    public function GetCode(){
        
        return $this->Code;
    }
    
    public function GetDescription(){
        
        return $this->Description;
    }
    
    public function GetRegistrationEndsAt(){
        
        return $this->RegistrationEndsAt;
    }
    
    public function GetCancellationEndsAt(){
        
        return $this->CancellationEndsAt;
    }
    
    public function GetCostCents(){
        
        return $this->CostCents;
    }
    
    public function GetParticipantCount(){
        
        return $this->ParticipantCount;
    }
    
    public function GetMaxParticipants(){
        
        return $this->MaxParticipants;
    }
    
    public function GetMinParticipants(){
        
        return $this->MinParticipants;
    }
    
    public function GetCategory(){
        
        return $this->Category;
    }
    
    public function GetContextType(){
        
        return $this->ContextType;
    }
    
    public function GetEMail(){
        
        return $this->EMail;
    }
    
    public function GetHasScript(){
        
        return $this->HasScript;
    }
    
    public function GetScriptDescription(){
        
        return $this->ScriptDescription;
    }
    
    public function GetScriptCostCents(){
        
        return $this->ScriptCostCents;
    }
    
    public function GetHasAccomodation(){
        
        return $this->HasAccomodation;
    }
    
    public function GetAccomodationDeadline(){
        
        return $this->AccomodationDeadline;
    }
    
    public function GetAccomodationComment(){
        
        return $this->AccomodationComment;
    }
    
    public function GetAccomodationCostCents(){
        
        return $this->AccomodationCostCents;
    }
    
    public function GetOrganizer(){
        
        return $this->GetContextType() === 'Organization' ? $this->GetOrganization() : $this->GetContextType() === 'Club' ? $this->GetClub() : null;
    }
    
    public function GetParticipants(){
        
        return ($this->GetParticipantCount() === null ? 0 : $this->GetParticipantCount()) . ' (' . ($this->GetMinParticipants() === $this->GetMaxParticipants() ? $this->GetMinParticipants() : $this->GetMinParticipants() . ' - ' . $this->GetMaxParticipants()) . ')';
    }
    
    public function GetTrainer(){
        
        return $this->Trainer;
    }
    
    public function GetOrganization(){
        
        return $this->Organization;
    }
    
    public function GetClub(){
        
        return $this->Club;
    }
    
    public function GetEvents(){
        
        return $this->Events;
    }
}

?>
