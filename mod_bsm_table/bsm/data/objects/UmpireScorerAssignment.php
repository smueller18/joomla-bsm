<?php

//GENERATED FILE: DO NOT CHANGE

//Include dependencies
include_once ("License.php");

class UmpireScorerAssignment{
    
    private $License;
    
    public function __construct($json) {
    
        if (!empty($json->license))
        {
            $this->License = new License($json->license);
        }
    }
    
    public function GetLicense(){
        
        return $this->License;
    }
}

?>
