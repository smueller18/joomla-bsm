<?php
// Include DTOs
include_once ("objects/Club.php");
include_once ("objects/ContactInfo.php");
include_once ("objects/Course.php");
include_once ("objects/Field.php");
include_once ("objects/Functionary.php");
include_once ("objects/League.php");
include_once ("objects/LeagueEntry.php");
include_once ("objects/LeagueGroup.php");
include_once ("objects/License.php");
include_once ("objects/Match.php");
include_once ("objects/MatchPenalty.php");
include_once ("objects/Organization.php");
include_once ("objects/Person.php");
include_once ("objects/Table.php");
include_once ("objects/Team.php");

class SortConfiguration {

	private $Field;

	private $Direction;

	public function __construct($field, $direction) {

		$this->Field = $field;
		$this->Direction = empty($direction) ? "asc" : $direction;
	}

	public function GetField(){

		return $this->Field;
	}

	public function GetDirection(){

		return $this->Direction;
	}
}

class FilterConfiguration {

	private $Field;

	private $Value;

	public function __construct($field, $value){

		$this->Field = $field;
		$this->Value = $value;
	}

	public function GetField(){

		return $this->Field;
	}

	public function GetValue(){

		return $this->Value;
	}
}

class Api {

	/* REGION API */

	/* REGION CONSTANTS - DO NOT CHANGE */

	const API_URL = "https://bsm.baseball-softball.de";

	const TIMEOUT = 300;

	/* ENDREGION CONSTANTS */

	/* REGION CONFIG */

	// Hier den Api-Schlüssel eintragen
	private static $ApiKey = "";

	// Hier Verbands-ID eintragen (ohne Hochkommata, bspw.: private static $OrgId = 4711)
	private static $OrgId = 0;

	// Hier Season eintragen (ohne Hochkommata, bspw.: private static $Season = 2016)
	private static $Season = 0;

	/* ENDREGION CONFIG */

	private static function ApiCall($resource, array $sortings = null, array $filter = null, $useCompactMode = false) {
		$url = self::API_URL . "/" . $resource . ".json?api_key=" . self::$ApiKey;

		if(!empty($sortings)){

			foreach ($sortings as $sort){

				$url = $url . "&sort[" . $sort->GetField() . "]=" . $sort->GetDirection();
			}
		}

		if(!empty($filter)){

			foreach ($filter as $filterConfig){

				$url = $url . "&filter[" . $filterConfig->GetField() . "][]=" . $filterConfig->GetValue();
			}
		}

		//TODO - nur temporär!
		if($useCompactMode){
			$url = $url . "&compact=true";
		}

		//PHP Timeout
		set_time_limit(self::TIMEOUT);

		$curl = curl_init();

		//SSL - Optionen
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

		//Timeout
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT , self::TIMEOUT);
		curl_setopt($curl, CURLOPT_TIMEOUT, self::TIMEOUT);

		$result = curl_exec($curl);

		curl_close($curl);

		$json = json_decode($result);

		//Fehlerbehandlung
		//Kein Result
		if(!isset($json)){
			throw new Exception("Api call failed - no valid data was returned from the server - please check your configuration, e.g. 'apiKey'");
		}
		//Fehlermeldung vom Server
		else if(!empty($json->status) && $json->status == "500" && !empty($json->error)){
			throw new Exception("Api call failed - there was a problem processing the request - error message returned by server: '" . $json->error . "'");
		}

		return $json;
	}

	public static function InitConfig($apiKey, $orgId, $season){

		// Nur wenn Wert gegeben ist, den DEFAULT überschreiben
		if(!empty($apiKey)){

			self::$ApiKey = $apiKey;
		}
		// Nur wenn Wert gegeben ist, den DEFAULT überschreiben
		if(!empty($orgId) && is_numeric($orgId)){

			self::$OrgId = $orgId;
		}
		// Nur wenn Wert gegeben ist, den DEFAULT überschreiben
		if(!empty($season) && is_numeric($season)){

			self::$Season = $season;
		}
	}

	/* END REGION API */

	public static function GetOrganization() {

		// Erhalte Organization im JSON-Format
		$json = self::ApiCall("organizations/" . self::$OrgId);

		return new Organization($json);
	}

	public static function GetLeaguesForOrganization($season = null) {

		$filter = array();
		$seasonFilter = empty($season) ? self::$Season : $season;
		if(!empty($seasonFilter)){
			array_push($filter, new FilterConfiguration("seasons", $seasonFilter));
		}
		// Erhalte OrganizationLeague im JSON-Format
		$json = self::ApiCall("organizations/" . self::$OrgId . "/leagues", null, $filter);

		$result = array ();
		foreach ($json as $jsonElement) {

			array_push($result, new League($jsonElement));
		}

		return $result;
	}

	public static function GetFunctionariesForOrganization() {

		// Erhalte OrganizationFunction im JSON-Format
		$json = self::ApiCall("organizations/" . self::$OrgId . "/organization_functions");

		$result = array ();
		foreach ($json as $jsonElement) {

			array_push($result, new Functionary($jsonElement));
		}

		return $result;
	}

	public static function GetClubsForOrganization() {

		// Erhalte Club-Array im JSON-Format
		$json = self::ApiCall("organizations/" . self::$OrgId . "/clubs");

		$result = array ();
		foreach ($json as $jsonElement) {

			array_push($result, new Club($jsonElement));
		}

		return $result;
	}

	public static function GetClubs() {

		// Erhalte Club-Array im JSON-Format
		$json = self::ApiCall("clubs");

		$result = array ();
		foreach ($json as $jsonElement) {

			array_push($result, new Club($jsonElement));
		}

		return $result;
	}

	public static function GetLicenses(){

		$sortings = array(new SortConfiguration("last_name", "asc"));

		// Erhalte License-Array im JSON-Format
		$json = self::ApiCall("licenses", $sortings);

		$result = array ();
		foreach ($json as $jsonElement) {

			array_push($result, new License($jsonElement));
		}

		return $result;
	}

	public static function GetLicensesForOrganization(){

		$sortings = array(new SortConfiguration("last_name", "asc"));

		// Erhalte License-Array im JSON-Format
		$json = self::ApiCall("organizations/" . self::$OrgId . "/licenses", $sortings);

		$result = array ();
		foreach ($json as $jsonElement) {

			array_push($result, new License($jsonElement));
		}

		return $result;
	}

	public static function GetTeamsForOrganization(){

		// Erhalte Team-Array im JSON-Format
		$json = self::ApiCall("organizations/" . self::$OrgId . "/teams");

		$result = array();
		foreach ($json as $jsonElement) {

			array_push($result, new Team($jsonElement));
		}

		return $result;
	}

	public static function GetMatchPenaltiesForOrganization($season = null){

		$filter = array();
		$seasonFilter = empty($season) ? self::$Season : $season;
		if(!empty($seasonFilter)){
			array_push($filter, new FilterConfiguration("seasons", $seasonFilter));
		}
		// Erhalte MatchPenalty-Array im JSON-Format
		$json = self::ApiCall("organizations/" . self::$OrgId . "/match_penalties", null, $filter);

		$result = array();
		foreach ($json as $jsonElement) {

			//Manueller Filter
			$matchPenalty = new MatchPenalty($jsonElement);
			if($matchPenalty->GetClub()->GetOrganizationID() != self::$OrgId){
				continue;
			}
			array_push($result, $matchPenalty);
		}

		return $result;
	}

	public static function GetCoursesForOrganization($category, $status = null) {

		$filter = array();
		$statusFilter = empty($status) ? "published" : $status;
		if(!empty($statusFilter)){
			array_push($filter, new FilterConfiguration("status", $statusFilter));
		}
		if(!empty($category)){
			array_push($filter, new FilterConfiguration("category", $category));
		}
		// Erhalte Course-Array im JSON-Format
		$json = self::ApiCall("organizations/" . self::$OrgId . "/courses", null, $filter);

		$result = array();
		foreach ($json as $jsonElement) {

			array_push($result, new Course($jsonElement));
		}

		return $result;
	}

	public static function GetCourse($id) {

		// Erhalte Course im JSON-Format
		$json = self::ApiCall("courses/" . $id);

		return new Course($json);
	}

	public static function GetLeagueGroupsForOrganization($season = null) {

		$filter = array();
		$seasonFilter = empty($season) ? self::$Season : $season;
		if(!empty($seasonFilter)){
			array_push($filter, new FilterConfiguration("seasons", $seasonFilter));
		}
		// Erhalte LeagueGroup-Array im JSON-Format
		$json = self::ApiCall("organizations/" . self::$OrgId . "/league_groups", null, $filter);

		$result = array();
		foreach ($json as $jsonElement) {

			array_push($result, new LeagueGroup($jsonElement));
		}

		return $result;
	}

	public static function GetLeagueGroup($id) {

		// Erhalte LeagueGroup im JSON-Format
		$json = self::ApiCall("leagues/" . $id);

		return new LeagueGroup($json);
	}

	public static function GetLeague($id) {

		// Erhalte League im JSON-Format
		$json = self::ApiCall("leagues/" . $id);

		return new League($json);
	}

	public static function GetTable($id, $season = null) {

		$filter = array();
		$seasonFilter = empty($season) ? self::$Season : $season;
		if(!empty($seasonFilter)){
			array_push($filter, new FilterConfiguration("seasons", $seasonFilter));
		}
		// Erhalte Table im JSON-Format
		$json = self::ApiCall("leagues/" . $id . "/table", null, $filter);

		return new Table($json);
	}

	public static function GetLeagueEntriesForLeague($id) {

		// Erhalte LeagueEntry-Array im JSON-Format
		$json = self::ApiCall("leagues/" . $id . "/league_entries");

		$result = array();
		foreach ($json as $jsonElement) {

			array_push($result, new LeagueEntry($jsonElement));
		}

		return $result;
	}

	public static function GetMatchesForLeague($id, $gamedays = null, $season = null, $sortByLeague = false, $useCompactMode = false) {

		$filter = array();
		$seasonFilter = empty($season) ? self::$Season : $season;
		if(!empty($seasonFilter)){
			array_push($filter, new FilterConfiguration("seasons", $seasonFilter));
		}
		if(!empty($gamedays)){
			array_push($filter, new FilterConfiguration("gamedays", $gamedays));
		}
		$sortings = $sortByLeague ? array(new SortConfiguration("league_sort", "asc"), new SortConfiguration("time", "asc")) : null;
		// Erhalte Match-Array im JSON-Format - TODO: $useCompactMode nur temporär!
		$json = self::ApiCall("leagues/" . $id . "/matches", $sortings, $filter, $useCompactMode);

		$result = array();
		foreach ($json as $jsonElement) {

			array_push($result, new Match($jsonElement));
		}

		return $result;
	}

	public static function GetMatchesForClub($id, $gamedays = null, $season = null, $sortByLeague = false, $useCompactMode = false) {

		$filter = array();
		$seasonFilter = empty($season) ? self::$Season : $season;
		if(!empty($seasonFilter)){
			array_push($filter, new FilterConfiguration("seasons", $seasonFilter));
		}
		if(!empty($gamedays)){
			array_push($filter, new FilterConfiguration("gamedays", $gamedays));
		}
		$sortings = $sortByLeague ? array(new SortConfiguration("league_sort", "asc"), new SortConfiguration("time", "asc")) : null;
		// Erhalte Match-Array im JSON-Format - TODO: $useCompactMode nur temporär!
		$json = self::ApiCall("clubs/" . $id . "/matches", $sortings, $filter, $useCompactMode);

		$result = array();
		foreach ($json as $jsonElement) {

			array_push($result, new Match($jsonElement));
		}

		return $result;
	}

	public static function GetMatches($gamedays = null, $season = null, $sortByLeague = false, $useCompactMode = false) {

		$filter = array();
		$seasonFilter = empty($season) ? self::$Season : $season;
		if(!empty($seasonFilter)){
			array_push($filter, new FilterConfiguration("seasons", $seasonFilter));
		}
		if(!empty($gamedays)){
			array_push($filter, new FilterConfiguration("gamedays", $gamedays));
		}
		$sortings = $sortByLeague ? array(new SortConfiguration("league_sort", "asc"), new SortConfiguration("time", "asc")) : null;
		// Erhalte Match-Array im JSON-Format - TODO: $useCompactMode nur temporär!
		$json = self::ApiCall("matches", $sortings, $filter, $useCompactMode);

		$result = array();
		foreach ($json as $jsonElement) {

			array_push($result, new Match($jsonElement));
		}

		return $result;
	}

	public static function GetMatch($id) {

		// Erhalte Match im JSON-Format
		$json = self::ApiCall("matches/" . $id);

		return new Match($json);
	}

	public static function GetClub($id) {

		// Erhalte Club im JSON-Format
		$json = self::ApiCall("clubs/" . $id);

		return new Club($json);
	}

	public static function GetFunctionariesForClub($id) {

		// Erhalte Function im JSON-Format
		$json = self::ApiCall("clubs/" . $id . "/club_functions");

		$result = array ();
		foreach ($json as $jsonElement) {

			array_push($result, new Functionary($jsonElement));
		}

		return $result;
	}

	public static function GetFieldsForClub($id) {

		// Erhalte Field im JSON-Format
		$json = self::ApiCall("clubs/" . $id . "/fields");

		$result = array ();
		foreach ($json as $jsonElement) {

			array_push($result, new Field($jsonElement));
		}

		return $result;
	}

	public static function GetField($id) {

		// Erhalte Field im JSON-Format
		$json = self::ApiCall("fields/" . $id);

		return new Field($json);
	}

	public static function GetTeamsForClub($id){

		// Erhalte Team-Array im JSON-Format
		$json = self::ApiCall("clubs/" . $id . "/teams");

		$result = array();
		foreach ($json as $jsonElement) {

			array_push($result, new Team($jsonElement));
		}

		return $result;
	}

	public static function GetLicensesForClub($id){

		$sortings = array(new SortConfiguration("last_name", "asc"));

		// Erhalte License-Array im JSON-Format
		$json = self::ApiCall("clubs/" . $id . "/licenses", $sortings);

		$result = array ();
		foreach ($json as $jsonElement) {

			array_push($result, new License($jsonElement));
		}

		return $result;
	}
}

?>
