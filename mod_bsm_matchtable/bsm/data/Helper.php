<?php
include_once ("Localization.php");

class Helper{

	public static function GetBsmPathUrl(){

		$basePath = "/modules/mod_bsm_matchtable/bsm/";
		if(function_exists("plugins_url")){

			$basePath = plugins_url("bsm-wordpress-plugin" . $basePath);
		}
		else if(function_exists("get_home_url")){

			$basePath = get_home_url() . $basePath;
		}

		return $basePath;
	}

	public static function PlaceholderIfEmpty($string){

		return (empty($string) ? Localization::GLOBAL_PLACEHOLDER : $string);
	}

	public static function ReplaceWithEntryIfExists($value, array $dictionary){

		if(array_key_exists($value, $dictionary)){

			return $dictionary[$value];
		}

		return $value;
	}

	public static function EncodeUserInputString($userInputString){

		return htmlspecialchars(stripslashes($userInputString));
	}

	public static function UrlForImage($imageFileName){

		return self::GetBsmPathUrl() . "img/" . $imageFileName;
	}

	public static function UrlForDynamicResource($dynamicResourceFileName){

		$wpFuncName = "bsm_show_resource";
		if(function_exists("admin_url") && function_exists($wpFuncName)){
			return admin_url('admin-ajax.php') . "?action=" . $wpFuncName . "&amp;bsm_resource=" . pathinfo($dynamicResourceFileName, PATHINFO_FILENAME);
		}
		return self::GetBsmPathUrl() . "drg/" . $dynamicResourceFileName;
	}

	public static function ConvertParameterListToArray($parameterList, $delimiter = ","){

		$result = array();

		// Nichts gegeben -> Aussteigen
		if(empty($parameterList)){

			return $result;
		}

		// Split
		$untrimmedArray = explode($delimiter, $parameterList);
		foreach ($untrimmedArray as $value){

			// Entferne Spaces
			$trimmedValue = trim($value);
			// Nur dann verwenden, wenn der getrimmte Wert nicht leer ist
			if(!empty($trimmedValue)){
				array_push($result, $trimmedValue);
			}
		}

		return $result;
	}

	public static function GetPersonDisplayName($person, $reverseNames = false){

		if(empty($person)){
			return null;
		}

		// Name - MINIMUM Nachname/Vorname muss gegeben sein, um einen vollständigen Namen anzuzeigen
		$personNameSecondPart = $reverseNames ? $person->GetFirstName() : $person->GetLastName();
		if(!empty($personNameSecondPart)){

			$personNameFirstPart = $reverseNames ? $person->GetLastName() : $person->GetFirstName();
			if(!empty($personNameFirstPart)){

				$personNameSecondPart = $personNameFirstPart . " " . $personNameSecondPart;
			}

			$personNamePrefix = $person->GetNamePrefix();
			if(!empty($personNamePrefix)){

				$personNameSecondPart = $personNamePrefix . " " . $personNameSecondPart;
			}

			$personNameSuffix = $person->GetNameSuffix();
			if(!empty($personNameSuffix)){

				$personNameSecondPart .= " " . $personNameSuffix;
			}
		}

		return $personNameSecondPart;
	}

	//Liefert Adresse als Einzeiler, oder null, wenn eine der nötigen Informationen nicht gegeben ist
	public static function GetFullAddress($contactInfoOrClub){

		if(empty($contactInfoOrClub)){

			return null;
		}

		if(method_exists($contactInfoOrClub, "GetHideInPublic") && $contactInfoOrClub->GetHideInPublic()){

			return null;
		}

		$street = $contactInfoOrClub->GetStreet();
		$postalCode = $contactInfoOrClub->GetPostalCode();
		$city = $contactInfoOrClub->GetCity();

		if(empty($street) || empty($postalCode) || empty($city)){

			return null;
		}

		return $street . ", " . $postalCode . " " . $city;
	}

	public static function GetUsedEMail($contactInfo){

		if(empty($contactInfo)){

			return null;
		}

		$eMail = $contactInfo->GetOrganizationEMail();
		//Falls nicht gegeben, normale EMail
		if(empty($eMail)){

			$eMail = $contactInfo->GetEMail();
		}

		return $eMail;
	}

	public static function GetContactLine($contactInfo){

		if(empty($contactInfo)){

			return null;
		}

		$contactLine = $contactInfo->GetContactName();
		// Evtl. die Erweiterung anfügen
		$contactNameExtension = $contactInfo->GetContactNameExtension();
		if (!empty($contactNameExtension)) {
			// Hauptname war gegeben, füge ein Komma hinzu
			if (!empty($contactLine)){
				$contactLine = $contactLine . ", ";
			}
			// Erweiterung anfügen
			$contactLine = $contactLine . $contactNameExtension;
		}

		return $contactLine;
	}

	public static function GetContactInfoByMode($mainInfo, $altInfo, $contactMode, $separator){

		//Standard = mainInfo
		$result = $mainInfo;
		//Werden beide angezeigt, oder fallback versucht, mache weiter
		if($contactMode == "both" || $contactMode == "fallback"){

			//Ist result leer, nutze nur altInfo
			if(empty($result)){

				$result = $altInfo;
			}
			//Ansonsten füge altInfo dann hinzu, wenn beide angezeigt werden sollen und altInfo nicht leer ist
			else if($contactMode == "both" && !empty($altInfo)){

				$result = $result . " " . $separator . " " . $altInfo;
			}
		}

		return $result;
	}

	public static function GetMoney($money){
		if($money === null)
			return null;

		return number_format(round($money / (float) 100, 2), 2, Localization::GLOBAL_DECIMAL_POINT, Localization::GLOBAL_THOUSANDS_SEPARATOR) . " " . Localization::GLOBAL_CURRENCY;
	}

	public static function GetDateByString($date, $yearOnly = false, $withDayOfWeek = false, $withLongDayOfWeek = false){
		if(empty($date)){
			return null;
		}

		$dateObject = strtotime($date);
		$result = date($yearOnly ? Localization::GLOBAL_DATEFORMAT_YEARONLY : Localization::GLOBAL_DATEFORMAT, $dateObject);
		if($withDayOfWeek || $withLongDayOfWeek){

			$daysOfWeek = $withLongDayOfWeek ? Localization::$GLOBAL_DAYSOFWEEK_LONG : Localization::$GLOBAL_DAYSOFWEEK;
			$result = $daysOfWeek[date("w", $dateObject)] . " " . $result;
		}

		return $result;
	}

	public static function GetTimeByString($time){
		if(empty($time)){
			return null;
		}

		$usedZone = 'Europe/Berlin';
		$currentZone = date_default_timezone_get();
		if($currentZone != $usedZone){

			date_default_timezone_set($usedZone);
		}
		return date(Localization::GLOBAL_TIMEFORMAT, strtotime($time));
	}

	public static function IsPastDateString($date){
		if(empty($date)){
			return false;
		}
		//Nur das Datum interessiert - daher evtl. Zeitangaben entfernen
		$dateObject = strtotime($date);
		return strtotime(date("Y-m-d", $dateObject)) < strtotime(date("Y-m-d"));
	}

	public static function ToHtmlNumbers($string){

		return mb_encode_numericentity($string, array (0x0, 0xffff, 0, 0xffff));
	}

	public static function ToMailToLink($email){

		return self::ToHtmlNumbers("mailto:" . $email);
	}

	public static function ToTelLink($tel){

		return self::ToHtmlNumbers("tel:" . $tel);
	}

	public static function ToDelimitedList($array){

		$result = "";
		if(!empty($array)){

			$first = true;
			foreach($array as $value){

				if($first){
					$result = $value;
					$first = false;
					continue;
				}

				$result = $result . Localization::GLOBAL_DELIMITER . $value;
			}
		}

		return $result;
	}

	public static function GroupFunctions($functions, $categoryFilter, $functionFilter){

		$categoryArray = array();

		//Filter nach eingestellter Kategorie / Function und anschließende Gruppierung
		foreach($functions as $function) {

			$groupingCategory = $function->GetCategory();

			//Filtern nach Kategorie, wenn diese nicht passt weiter iterieren
			if((!empty($functionFilter) && $functionFilter !== $function->GetName())
					|| (!empty($categoryFilter) && $categoryFilter !== $groupingCategory)){

				continue;
			}

			//Gruppierung nach Kategorie
			//Wenn inneres Array noch nicht existert, erzeugen
			if(!array_key_exists($groupingCategory, $categoryArray)){
				//Inneres Array erzeugen
				$categoryArray[$groupingCategory] = array();
			}
			//Dem inneren Array den Funktionär hinzufügen
			array_push($categoryArray[$groupingCategory], $function);
		}

		return $categoryArray;
	}

	public static function GroupLicenses($licenses, $categoryFilter, $clubFilter, $levelFilter, $groupByClubOrOrganization){

		$categoryArray = array();

		//Filter nach eingestellter Kategorie / Verein / Stufe und anschließende Gruppierung nach Kategorie
		foreach($licenses as $license) {

			$groupingCategory = $license->GetCategory();
			$groupingClubOrOrganization = $license->GetClubOrOrganization()->GetAcronym();

			//Filtern, wenn nicht passt weiter iterieren
			if((!empty($categoryFilter) && $categoryFilter !== $groupingCategory)
					|| (!empty($clubFilter) && $clubFilter !== $groupingClubOrOrganization)
					|| (!empty($levelFilter) && $levelFilter !== $license->GetLevel())){

				continue;
			}

			//Gruppierung nach Kategorie
			//Wenn inneres Array noch nicht existert, erzeugen
			if(!array_key_exists($groupingCategory, $categoryArray)){
				//Inneres Array erzeugen
				$categoryArray[$groupingCategory] = array();
			}

			if(!$groupByClubOrOrganization){
				$groupingClubOrOrganization = "AllClubsOrOrganizations";
			}

			//Gruppierung nach Verein
			//Wenn inneres Array noch nicht existert, erzeugen
			if(!array_key_exists($groupingClubOrOrganization, $categoryArray[$groupingCategory])){
				//Inneres Array erzeugen
				$categoryArray[$groupingCategory][$groupingClubOrOrganization] = array();
			}
			//Dem inneren Array die Lizenz hinzufügen
			array_push($categoryArray[$groupingCategory][$groupingClubOrOrganization], $license);
		}

		return $categoryArray;
	}

	public static function GroupMatches($groupBy, $matches, $leagueFilter, $stateExclusionFilter, $leagueExclusionFilter, $leagueInclusionFilter, $dateSetting){

		$matchArray = array();
		$groupBy = empty($groupBy) ? "AllMatches" : $groupBy;
		$stateExclusionFilterArray = empty($stateExclusionFilter) ? null : (is_array($stateExclusionFilter) ? $stateExclusionFilter : self::ConvertParameterListToArray($stateExclusionFilter));
		$leagueExclusionFilterArray = empty($leagueExclusionFilter) ? null : (is_array($leagueExclusionFilter) ? $leagueExclusionFilter : self::ConvertParameterListToArray($leagueExclusionFilter));
		$leagueInclusionFilterArray = empty($leagueInclusionFilter) ? null : (is_array($leagueInclusionFilter) ? $leagueInclusionFilter : self::ConvertParameterListToArray($leagueInclusionFilter));

		//Gruppierung nach Datum
		foreach ($matches as $match) {

			$match_league = $match->GetLeague();

			//Filtern, wenn nicht passt weiter iterieren
			if(!empty($leagueFilter)){

				//Wenn Liga nicht gegeben oder Liga nicht dem Filter entspricht
				if(empty($match_league) || ($match_league->GetID() != $leagueFilter && $match_league->GetAcronym() != $leagueFilter)){

					continue;
				}
			}

			//Filtern, wenn nicht passt weiter iterieren
			if(!empty($stateExclusionFilterArray)){

				//Wenn Status in Exklusion
				if(in_array($match->GetState(), $stateExclusionFilterArray)){

					continue;
				}
			}

			//Filtern, wenn nicht passt weiter iterieren
			if(!empty($leagueExclusionFilterArray)){

				//Wenn Liga gegeben und in Exklusion
				if(!empty($match_league) && (in_array($match_league->GetID(), $leagueExclusionFilterArray) || in_array($match_league->GetAcronym(), $leagueExclusionFilterArray))){

					continue;
				}
			}

			//Filtern, wenn nicht passt weiter iterieren
			if(!empty($leagueInclusionFilterArray)){

				//Wenn Liga nicht gegeben oder nicht in Inklusion
				if(empty($match_league) || (!in_array($match_league->GetID(), $leagueInclusionFilterArray) && !in_array($match_league->GetAcronym(), $leagueInclusionFilterArray))){

					continue;
				}
			}

			$grouping = $groupBy == "date"
					? self::GetDateByString($match->GetTime(), false, $dateSetting === "short", $dateSetting === "long")
					: ($groupBy == "league"
							? $match->GetLeague()->GetName()
							: $groupBy);

			//Wenn inneres Array noch nicht existert, erzeugen
			if(!array_key_exists($grouping, $matchArray)){
				//Inneres Array erzeugen
				$matchArray[$grouping] = array();
			}
			//Dem inneren Array das Spiel hinzufügen
			array_push($matchArray[$grouping], $match);
		}

		return $matchArray;
	}
}

?>
