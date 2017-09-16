<?php
if (!class_exists('Helper'))
  require_once __DIR__ . '/data/Helper.php';
if (!class_exists('Api'))
  require_once __DIR__ . '/data/Api.php';
if (!class_exists('Localization'))
  require_once __DIR__ . '/data/Localization.php';

//Variablen initialisieren
//String/Int != 0 -> Check empty
if(empty($MatchTable_League)){
	$MatchTable_League = null;
}
//String/Int != 0 -> Check empty
if(empty($MatchTable_Club)){
	$MatchTable_Club = null;
}
//String/Int != 0 -> Check empty
if(empty($MatchTable_Highlight)){
	$MatchTable_Highlight = null;
}
//String -> Check empty
if(empty($MatchTable_DetailsUrl)){
	$MatchTable_DetailsUrl = null;
}
//String -> Check empty
if(empty($MatchTable_FieldUrl)){
	$MatchTable_FieldUrl = null;
}
//String -> Check empty
if(empty($MatchTable_Data)){
	$MatchTable_Data = null;
}
//String -> Check empty
if(empty($MatchTable_Date_DayOfWeek)){
	$MatchTable_Date_DayOfWeek = "none";
}
else if($MatchTable_Date_DayOfWeek != "none" && $MatchTable_Date_DayOfWeek != "short" && $MatchTable_Date_DayOfWeek != "long"){
	throw new Exception("Date_DayOfWeek has only 3 valid values: 'none' (default), 'short' and 'long', but '" . $MatchTable_Date_DayOfWeek . "' was set");
}
//String -> Check empty
if(empty($MatchTable_GameDays)){
	$MatchTable_GameDays = "any";
}
else if($MatchTable_GameDays != "any" && $MatchTable_GameDays != "previous" && $MatchTable_GameDays != "current" && $MatchTable_GameDays != "next"){
	throw new Exception("GameDays has only 4 valid values: 'any' (default), 'previous', 'current' and 'next', but '" . $MatchTable_GameDays . "' was set");
}
//Bool -> Check !isset
if(!isset($MatchTable_Hide_Column_Names)){
	$MatchTable_Hide_Column_Names = false;
}
//String -> Check empty
if(empty($MatchTable_Exclude_States)){
	$MatchTable_Exclude_States = null;
}
//String -> Check empty
if(empty($MatchTable_Exclude_Leagues)){
	$MatchTable_Exclude_Leagues = null;
}
//String -> Check empty
if(empty($MatchTable_Only_Leagues)){
	$MatchTable_Only_Leagues = null;
}
//String -> Check empty
if(empty($MatchTable_GroupBy)){
	$MatchTable_GroupBy = "none";
}
else if($MatchTable_GroupBy !== "none" && $MatchTable_GroupBy !== "league" && $MatchTable_GroupBy !== "date"){
	throw new Exception("GroupBy has only 3 valid values: 'none' (default), 'league' and 'date', but '" . $MatchTable_GroupBy . "' was set");
}
//Bool -> Check !isset
if(!isset($MatchTable_Use_FieldIcon)){
	$MatchTable_Use_FieldIcon = false;
}
//String -> Check empty
if(empty($MatchTable_LogoMode)){
	$MatchTable_LogoMode = "none";
}
else if($MatchTable_LogoMode != "none" && $MatchTable_LogoMode != "left" && $MatchTable_LogoMode != "right" && $MatchTable_LogoMode != "only"){
	throw new Exception("LogoMode has only 4 valid values: 'none' (default), 'left', 'right' and 'only', but '" . $MatchTable_LogoMode . "' was set");
}
//Bool -> Check !isset
if(!isset($MatchTable_Use_CompactMode)){
	$MatchTable_Use_CompactMode = false;
}
//Int != 0 -> Check empty
if(empty($MatchTable_Season)){
	$MatchTable_Season = null;
}

//Initalisieren der Show Variablen
$MatchTable_Data_Array = Helper::ConvertParameterListToArray($MatchTable_Data);

$MatchTable_Show_Date = in_array("date", $MatchTable_Data_Array);
$MatchTable_Show_Time = in_array("time", $MatchTable_Data_Array);
$MatchTable_Show_League_Acronym = in_array("leagueacronym", $MatchTable_Data_Array);
$MatchTable_Show_League = in_array("league", $MatchTable_Data_Array);
$MatchTable_Show_ID = in_array("id", $MatchTable_Data_Array);
$MatchTable_Show_Home_Acronym = in_array("homeacronym", $MatchTable_Data_Array);
$MatchTable_Show_Home = in_array("home", $MatchTable_Data_Array);
$MatchTable_Show_Away_Acronym = in_array("awayacronym", $MatchTable_Data_Array);
$MatchTable_Show_Away = in_array("away", $MatchTable_Data_Array);
$MatchTable_Show_FieldName = in_array("fieldname", $MatchTable_Data_Array);
$MatchTable_Show_Address = in_array("address", $MatchTable_Data_Array);
$MatchTable_Show_UmpireSelection_Acronym = in_array("umpireselectionacronym", $MatchTable_Data_Array);
$MatchTable_Show_UmpireSelection = in_array("umpireselection", $MatchTable_Data_Array);
$MatchTable_Show_UmpireAssignments = in_array("umpireassignments", $MatchTable_Data_Array);
$MatchTable_Show_ScorerSelection_Acronym = in_array("scorerselectionacronym", $MatchTable_Data_Array);
$MatchTable_Show_ScorerSelection = in_array("scorerselection", $MatchTable_Data_Array);
$MatchTable_Show_ScorerAssignments = in_array("scorerassignments", $MatchTable_Data_Array);
$MatchTable_Show_Result = in_array("result", $MatchTable_Data_Array);
$MatchTable_Show_ScoreSheet = in_array("scoresheet", $MatchTable_Data_Array);

$MatchTable_Matches = null;
if(!empty($MatchTable_Club)){
	//TODO: Die API muss auch Acronym unterstützen!
	$MatchTable_ClubObject = Api::GetClub($MatchTable_Club);
	//Wenn Verein gegeben, anhand des Vereins die Daten laden - kleinste erwartete Datenmenge
	$MatchTable_Matches = Api::GetMatchesForClub($MatchTable_ClubObject->GetID(), $MatchTable_GameDays, $MatchTable_Season, $MatchTable_GroupBy == "league", $MatchTable_Use_CompactMode);
}
else{
	//Wenn kein Verein gegeben, aber Liga, anhand der Liga die Daten laden - mittlere erwartete Datenmenge - Ansonsten alle - größte erwartete Datenmenge!
	$MatchTable_Matches = empty($MatchTable_League) ? Api::GetMatches($MatchTable_GameDays, $MatchTable_Season, $MatchTable_GroupBy == "league", $MatchTable_Use_CompactMode) : Api::GetMatchesForLeague($MatchTable_League, $MatchTable_GameDays, $MatchTable_Season, $MatchTable_GroupBy == "league", $MatchTable_Use_CompactMode);
}
//Gruppiere und filtere ggf. nach Liga
$MatchTable_Grouped_Matches = Helper::GroupMatches($MatchTable_GroupBy, $MatchTable_Matches, $MatchTable_League, $MatchTable_Exclude_States, $MatchTable_Exclude_Leagues, $MatchTable_Only_Leagues, $MatchTable_Date_DayOfWeek);

$MatchTable_ProvideDetails = !empty($MatchTable_DetailsUrl);
$MatchTable_ProvideFieldDetails = !empty($MatchTable_FieldUrl);

$MatchTable_Highlight_Array = Helper::ConvertParameterListToArray($MatchTable_Highlight);
//Der gewählte Verein muss benutzt werden
$MatchTable_Highlight_Array_UseSelectedClub = !empty($MatchTable_Club) && in_array("selected", $MatchTable_Highlight_Array);
?>
<div data-bsm="data-bsm" data-type="table" data-object-type="match">
	<?php if(empty($MatchTable_Grouped_Matches)): ?><?php echo Localization::MATCHTABLE_NOENTRIES; ?><?php endif; ?>
	<?php foreach($MatchTable_Grouped_Matches as $key => $matches): ?>
	<table class="table table-striped" data-grouping="<?php echo $key; ?>" data-grouping-type="<?php echo $MatchTable_GroupBy == "none" ? "match" : $MatchTable_GroupBy; ?>">
		<?php if(($MatchTable_GroupBy == "league" && $MatchTable_Show_League) || ($MatchTable_GroupBy == "date" && $MatchTable_Show_Date)): ?>
		<caption><?php echo $key; ?></caption>
		<?php endif; ?>
		<?php if(!$MatchTable_Hide_Column_Names): ?>
		<thead>
			<tr>
				<?php if($MatchTable_GroupBy != "date" && $MatchTable_Show_Date): ?><th data-cell-for="date"><?php echo Localization::MATCHTABLE_COLUMN_DATE; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_Time): ?><th data-cell-for="time"><?php echo Localization::MATCHTABLE_COLUMN_TIME; ?></th><?php endif; ?>
				<?php if($MatchTable_GroupBy != "league" && $MatchTable_Show_League_Acronym): ?><th data-cell-for="leagueacronym"><?php echo Localization::MATCHTABLE_COLUMN_LEAGUEACRONYM; ?></th><?php endif; ?>
				<?php if($MatchTable_GroupBy != "league" && $MatchTable_Show_League): ?><th data-cell-for="league"><?php echo Localization::MATCHTABLE_COLUMN_LEAGUE; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_ID): ?><th data-cell-for="id"><?php echo Localization::MATCHTABLE_COLUMN_ID; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_Home_Acronym): ?><th data-cell-for="homeacronym"><?php echo Localization::MATCHTABLE_COLUMN_HOMEACRONYM; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_Home): ?><th data-cell-for="home"><?php echo Localization::MATCHTABLE_COLUMN_HOME; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_Away_Acronym): ?><th data-cell-for="awayacronym"><?php echo Localization::MATCHTABLE_COLUMN_AWAYACRONYM; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_Away): ?><th data-cell-for="away"><?php echo Localization::MATCHTABLE_COLUMN_AWAY; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_FieldName || $MatchTable_Show_Address): ?><th data-cell-for="field"><?php echo Localization::MATCHTABLE_COLUMN_FIELD; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_UmpireSelection_Acronym): ?><th data-cell-for="umpireselectionacronym"><?php echo Localization::MATCHTABLE_COLUMN_UMPIRESELECTIONACRONYM; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_UmpireSelection): ?><th data-cell-for="umpireselection"><?php echo Localization::MATCHTABLE_COLUMN_UMPIRESELECTION; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_UmpireAssignments): ?><th data-cell-for="umpireassignments"><?php echo Localization::MATCHTABLE_COLUMN_UMPIREASSIGNMENTS; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_ScorerSelection_Acronym): ?><th data-cell-for="scorerselectionacronym"><?php echo Localization::MATCHTABLE_COLUMN_SCORERSELECTIONACRONYM; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_ScorerSelection): ?><th data-cell-for="scorerselection"><?php echo Localization::MATCHTABLE_COLUMN_SCORERSELECTION; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_ScorerAssignments): ?><th data-cell-for="scorerassignments"><?php echo Localization::MATCHTABLE_COLUMN_SCORERASSIGNMENTS; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_Result): ?><th data-cell-for="result"><?php echo Localization::MATCHTABLE_COLUMN_RESULT; ?></th><?php endif; ?>
				<?php if($MatchTable_Show_ScoreSheet): ?><th data-cell-for="scoresheet"><?php echo Localization::MATCHTABLE_COLUMN_SCORESHEET; ?></th><?php endif; ?>
			</tr>
		</thead>
		<?php endif; ?>
		<tbody>
			<?php foreach($matches as $match): ?>
			<?php
				//Nur wenn nicht nach Liga gruppiert wird, macht es Sinn, die Liga innerhalb der Tabelle anzuzeigen
				$MatchTable_League = $MatchTable_GroupBy != "league" &&  ($MatchTable_Show_League_Acronym || $MatchTable_Show_League) ? $match->GetLeague() : null;
				//Prüfung Highlight - Row nur dann, wenn Home oder Away!
				$MatchTable_Highlight_Row_Value = "";
				$MatchTable_Highlight_Home_Value = "";
				$MatchTable_Highlight_Away_Value = "";
				//Auch bei "selected" true, da "selected" drinsteht
				if(!empty($MatchTable_Highlight)){

					//Vorbereitung
					$homeTeam = $match->GetHomeLeagueEntry()->GetTeam();
					$homeName = $homeTeam->GetName();
					$homeAcronym = $homeTeam->GetAcronym();
					$awayTeam = $match->GetAwayLeagueEntry()->GetTeam();
					$awayName = $awayTeam->GetName();
					$awayAcronym = $awayTeam->GetAcronym();

					//Wenn Selected, das Team hinzufügen - via Acronym
					if($MatchTable_Highlight_Array_UseSelectedClub){
						//Home - nur wenn noch nicht sowieso enthalten
						$homeClubs = $homeTeam->GetClubs();
						if(!empty($homeClubs) && !in_array($homeAcronym, $MatchTable_Highlight_Array)){
							foreach ($homeClubs as $homeClub){
								if($homeClub->GetID() == $MatchTable_Club || $homeClub->GetAcronym() == $MatchTable_Club){
									array_push($MatchTable_Highlight_Array, $homeAcronym);
									//Nur 1 Mal
									break;
								}
							}
						}
						//Away - nur wenn noch nicht sowieso enthalten
						$awayClubs = $awayTeam->GetClubs();
						if(!empty($awayClubs) && !in_array($awayAcronym, $MatchTable_Highlight_Array)){
							foreach ($awayClubs as $awayClub){
								if($awayClub->GetID() == $MatchTable_Club || $awayClub->GetAcronym() == $MatchTable_Club){
									array_push($MatchTable_Highlight_Array, $awayAcronym);
									//Nur 1 Mal
									break;
								}
							}
						}
						//Umpire - nur wenn noch nicht sowieso enthalten
						$umpire = $match->GetUmpireSelection();
						if(!empty($umpire)){
							$umpireAcronym = $umpire->GetAcronym();
							if(!in_array($umpireAcronym, $MatchTable_Highlight_Array) && ($umpire->GetID() == $MatchTable_Club || $umpire->GetAcronym() == $MatchTable_Club)){
								array_push($MatchTable_Highlight_Array, $umpireAcronym);
							}
						}
						//Scorer - nur wenn noch nicht sowieso enthalten
						$scorer = $match->GetScorerSelection();
						if(!empty($scorer)){
							$scorerAcronym = $scorer->GetAcronym();
							if(!in_array($scorerAcronym, $MatchTable_Highlight_Array) && ($scorer->GetID() == $MatchTable_Club || $scorer->GetAcronym() == $MatchTable_Club)){
								array_push($MatchTable_Highlight_Array, $scorerAcronym);
							}
						}
					}

					//Home - Name?
					if(in_array($homeName, $MatchTable_Highlight_Array)){
						//Noch nichts gesetzt, daher einfach übernehmen
						$MatchTable_Highlight_Row_Value = $homeName;
						$MatchTable_Highlight_Home_Value = $homeName;
					}
					//Home - Kürzel?
					if(in_array($homeAcronym, $MatchTable_Highlight_Array)){
						//Evtl. bereits wegen anderem Eintrag enthalten, daher anfügen
						$MatchTable_Highlight_Row_Value .= (empty($MatchTable_Highlight_Row_Value) ? "" : ",") . $homeAcronym;
						$MatchTable_Highlight_Home_Value .= (empty($MatchTable_Highlight_Home_Value) ? "" : ",") . $homeAcronym;
					}
					//Away - Name?
					if(in_array($awayName, $MatchTable_Highlight_Array)){
						//Evtl. bereits wegen anderem Eintrag enthalten, daher anfügen
						$MatchTable_Highlight_Row_Value .= (empty($MatchTable_Highlight_Row_Value) ? "" : ",") . $awayName;
						$MatchTable_Highlight_Away_Value .= (empty($MatchTable_Highlight_Away_Value) ? "" : ",") . $awayName;
					}
					//Away - Kürzel?
					if(in_array($awayAcronym, $MatchTable_Highlight_Array)){
						//Evtl. bereits wegen anderem Eintrag enthalten, daher anfügen
						$MatchTable_Highlight_Row_Value .= (empty($MatchTable_Highlight_Row_Value) ? "" : ",") . $awayAcronym;
						$MatchTable_Highlight_Away_Value .= (empty($MatchTable_Highlight_Away_Value) ? "" : ",") . $awayAcronym;
					}
				}
			?>
			<tr data-row-for="<?php echo $match->GetMatchID(); ?>"<?php if(!empty($MatchTable_Highlight_Row_Value)):?> data-highlight="<?php echo $MatchTable_Highlight_Row_Value; ?>"<?php endif; ?>>
				<?php if($MatchTable_GroupBy != "date" && $MatchTable_Show_Date): ?><td data-cell-for="date"><?php echo Helper::PlaceholderIfEmpty(Helper::GetDateByString($match->GetTime(), false, $MatchTable_Date_DayOfWeek === "short", $MatchTable_Date_DayOfWeek === "long")); ?></td><?php endif; ?>
				<?php if($MatchTable_Show_Time): ?><td data-cell-for="time"><?php echo Helper::PlaceholderIfEmpty(Helper::GetTimeByString($match->GetTime())); ?></td><?php endif; ?>
				<?php if($MatchTable_GroupBy != "league" && $MatchTable_Show_League_Acronym): ?><td data-cell-for="leagueacronym"><abbr title="<?php echo $MatchTable_League->GetName(); ?>"><?php echo $MatchTable_League->GetAcronym(); ?></abbr></td><?php endif; ?>
				<?php if($MatchTable_GroupBy != "league" && $MatchTable_Show_League): ?><td data-cell-for="league"><?php echo Helper::PlaceholderIfEmpty($MatchTable_League->GetName()); ?></td><?php endif; ?>
				<?php if($MatchTable_Show_ID) :?>
				<td data-cell-for="id">
					<?php if($MatchTable_ProvideDetails): ?>
					<?php
						$url = $MatchTable_DetailsUrl;
						$query = parse_url($url, PHP_URL_QUERY);

						if($query){

							$url .= "&amp;bsm_match=";
						}else{

							$url .= "?bsm_match=";
						}

						$url .= $match->GetID();
					?>
					<a href="<?php echo $url ?>">
			        <?php endif; ?>
			        <?php echo $match->GetMatchID(); ?>
			        <?php if($MatchTable_ProvideDetails): ?>
			        </a>
			        <?php endif; ?>
		        </td>
		        <?php endif; ?>
		        <?php
		        	  $MatchTable_UmpireSelection = $MatchTable_Show_UmpireSelection_Acronym || $MatchTable_Show_UmpireSelection ? $match->GetUmpireSelection() : null;
		        	  //Highlight immer möglich, wirkt sich aber ggf. nicht auf die Row aus
		        	  $MatchTable_Highlight_UmpireSelection_Value = "";
		        	  if(!empty($MatchTable_UmpireSelection)){
		        	  	$MatchTable_UmpireSelectionAcronym = $MatchTable_UmpireSelection->GetAcronym();
		        	  	if(in_array($MatchTable_UmpireSelectionAcronym, $MatchTable_Highlight_Array)){
		        	  		$MatchTable_Highlight_UmpireSelection_Value = $MatchTable_UmpireSelectionAcronym;
		        	  	}
		        	  	$MatchTable_UmpireSelectionName = $MatchTable_UmpireSelection->GetDisplayName();
	        	  		if(in_array($MatchTable_UmpireSelectionName, $MatchTable_Highlight_Array)){
	        	  			$MatchTable_Highlight_UmpireSelection_Value .= (empty($MatchTable_Highlight_UmpireSelection_Value) ? "" : ",") . $MatchTable_UmpireSelectionName;
	        	  		}
		        	  }
		        	  $MatchTable_UmpireAssignments = null;
		       		  if($MatchTable_Show_UmpireAssignments){

		       		  	$assignmentValues = array();
		       		  	$assignments = $match->GetUmpireAssignments();

		       		  	if(!empty($assignments)){
			       		  	foreach ($assignments as $assignment){

			       		  		$license = $assignment->GetLicense();
			       		  		$displayName = Helper::GetPersonDisplayName($license->GetPerson()) . " (" . $license->GetLevel() . ")";
			       		  		array_push($assignmentValues, $displayName);
			       		  	}
		       		  	}

		       		  	$MatchTable_UmpireAssignments = $assignmentValues;
		       		  }
		        	  $MatchTable_ScorerSelection = $MatchTable_Show_ScorerSelection_Acronym || $MatchTable_Show_ScorerSelection ? $match->GetScorerSelection() : null;
					  //Highlight immer möglich, wirkt sich aber ggf. nicht auf die Row aus
		        	  $MatchTable_Highlight_ScorerSelection_Value = "";
		        	  if(!empty($MatchTable_ScorerSelection)){
		        	  	$MatchTable_ScorerSelectionAcronym = $MatchTable_ScorerSelection->GetAcronym();
		        	  	if(in_array($MatchTable_ScorerSelectionAcronym, $MatchTable_Highlight_Array)){
		        	  		$MatchTable_Highlight_ScorerSelection_Value = $MatchTable_ScorerSelectionAcronym;
		        	  	}
	        	  		$MatchTable_ScorerSelectionName = $MatchTable_ScorerSelection->GetDisplayName();
	        	  		if(in_array($MatchTable_ScorerSelectionName, $MatchTable_Highlight_Array)){
	        	  			$MatchTable_Highlight_ScorerSelection_Value .= (empty($MatchTable_Highlight_ScorerSelection_Value) ? "" : ",") . $MatchTable_ScorerSelectionName;
		        	  	}
		        	  }
		        	  $MatchTable_ScorerAssignments = null;
		        	  if($MatchTable_Show_ScorerAssignments){

		        	  	$assignmentValues = array();
		        	  	$assignments = $match->GetScorerAssignments();

		        	  	if(!empty($assignments)){
			        	  	foreach ($assignments as $assignment){

			        	  		$license = $assignment->GetLicense();
			        	  		$displayName = Helper::GetPersonDisplayName($license->GetPerson()) . " (" . $license->GetLevel() . ")";

			        	  		array_push($assignmentValues, $displayName);
			        	  	}
		        	  	}

		        	  	$MatchTable_ScorerAssignments = $assignmentValues;
		        	  }

		        	  //Logo-Urls
		        	  $MatchTable_HomeLogoUrl = null;
		        	  $MatchTable_HomeLogoHolder = null;
		        	  $MatchTable_AwayLogoUrl = null;
		        	  $MatchTable_AwayLogoHolder = null;
		        	  //Nur nötig, wenn Logo verwendet wird
		        	  if($MatchTable_LogoMode !== "none"){
		        	  	$MatchTable_HomeLeagueEntry = $MatchTable_Show_Home_Acronym || $MatchTable_Show_Home ? $match->GetHomeLeagueEntry() : null;
		        	  	$MatchTable_AwayLeagueEntry = $MatchTable_Show_Away_Acronym || $MatchTable_Show_Away ? $match->GetAwayLeagueEntry() : null;
		        	  	//Kein DS
		        	  	if(!empty($MatchTable_HomeLeagueEntry)){
		        	  		$MatchTable_LeagueEntry_Team = $MatchTable_HomeLeagueEntry->GetTeam();
		        	  		//Kein DS
		        	  		if(!empty($MatchTable_LeagueEntry_Team)){
		        	  			$MatchTable_LeagueEntry_Team_Clubs = $MatchTable_LeagueEntry_Team->GetClubs();
		        	  			//Kein DS
		        	  			if(!empty($MatchTable_LeagueEntry_Team_Clubs)){
		        	  				//Wenn nur ein Verein, nutze diesen
		        	  				$MatchTable_LeagueEntry_Team_Clubs_Used = count($MatchTable_LeagueEntry_Team_Clubs) === 1 ? $MatchTable_LeagueEntry_Team_Clubs[0] : null;
		        	  				//Entweder vom Verein oder SG
		        	  				$MatchTable_HomeLogoUrl = !empty($MatchTable_LeagueEntry_Team_Clubs_Used)? $MatchTable_LeagueEntry_Team_Clubs_Used->GetLogo() : Helper::UrlForImage("sg.png");
		        	  				//Entweder vom Verein oder SG
		        	  				$MatchTable_HomeLogoHolder = !empty($MatchTable_LeagueEntry_Team_Clubs_Used) ? $MatchTable_LeagueEntry_Team_Clubs_Used->GetAcronym() : "SG";
		        	  			}
		        	  		}
		        	  	}
		        	  if(!empty($MatchTable_AwayLeagueEntry)){
		        	  		$MatchTable_LeagueEntry_Team = $MatchTable_AwayLeagueEntry->GetTeam();
		        	  		//Kein DS
		        	  		if(!empty($MatchTable_LeagueEntry_Team)){
		        	  			$MatchTable_LeagueEntry_Team_Clubs = $MatchTable_LeagueEntry_Team->GetClubs();
		        	  			//Kein DS
		        	  			if(!empty($MatchTable_LeagueEntry_Team_Clubs)){
		        	  				//Wenn nur ein Verein, nutze diesen
		        	  				$MatchTable_LeagueEntry_Team_Clubs_Used = count($MatchTable_LeagueEntry_Team_Clubs) === 1 ? $MatchTable_LeagueEntry_Team_Clubs[0] : null;
		        	  				//Entweder vom Verein oder SG
		        	  				$MatchTable_AwayLogoUrl = !empty($MatchTable_LeagueEntry_Team_Clubs_Used)? $MatchTable_LeagueEntry_Team_Clubs_Used->GetLogo() : Helper::UrlForImage("sg.png");
		        	  				//Entweder vom Verein oder SG
		        	  				$MatchTable_AwayLogoHolder = !empty($MatchTable_LeagueEntry_Team_Clubs_Used) ? $MatchTable_LeagueEntry_Team_Clubs_Used->GetAcronym() : "SG";
		        	  			}
		        	  		}
		        	  	}
		        	  }

		        	  //Nur anzeigen, wenn beide Daten gegeben
		        	  $MatchTable_ShowHomeLogo = !empty($MatchTable_HomeLogoUrl) && !empty($MatchTable_HomeLogoHolder);
		        	  $MatchTable_ShowAwayLogo = !empty($MatchTable_AwayLogoUrl) && !empty($MatchTable_AwayLogoHolder);
		        ?>
		        <?php if($MatchTable_Show_Home_Acronym): ?>
		        <td data-cell-for="homeacronym"<?php if(!empty($MatchTable_Highlight_Home_Value)):?> data-highlight="<?php echo $MatchTable_Highlight_Home_Value; ?>"<?php endif; ?>>
		        	<?php if($MatchTable_ShowHomeLogo && $MatchTable_LogoMode === "left"): ?>
					<img class="alignleft" src="<?php echo $MatchTable_HomeLogoUrl; ?>" alt="" data-logo-for="<?php echo $MatchTable_HomeLogoHolder; ?>" />
					<?php endif; ?>
					<?php if($MatchTable_ShowHomeLogo && $MatchTable_LogoMode === "only"): ?>
					<?php $MatchTable_LogoAlt = $match->GetHomeLeagueEntry()->GetTeam()->GetAcronym() . " " . Localization::GLOBAL_PLACEHOLDER . " " . $match->GetHomeLeagueEntry()->GetTeam()->GetName(); ?>
					<img class="aligncenter" src="<?php echo $MatchTable_HomeLogoUrl; ?>" alt="<?php echo $MatchTable_LogoAlt; ?>" title="<?php echo $MatchTable_LogoAlt; ?>" data-logo-for="<?php echo $MatchTable_HomeLogoHolder; ?>" />
					<?php else: ?>
					<abbr title="<?php echo $match->GetHomeLeagueEntry()->GetTeam()->GetName(); ?>"><?php echo $match->GetHomeLeagueEntry()->GetTeam()->GetAcronym(); ?></abbr>
					<?php endif; ?>
					<?php if($MatchTable_ShowHomeLogo && $MatchTable_LogoMode === "right"): ?>
					<img class="alignright" src="<?php echo $MatchTable_HomeLogoUrl; ?>" alt="" data-logo-for="<?php echo $MatchTable_HomeLogoHolder; ?>" />
					<?php endif; ?>
		        </td>
		        <?php endif; ?>
		        <?php if($MatchTable_Show_Home): ?>
		        <td data-cell-for="home"<?php if(!empty($MatchTable_Highlight_Home_Value)):?> data-highlight="<?php echo $MatchTable_Highlight_Home_Value; ?>"<?php endif; ?>>
		        	<?php if($MatchTable_ShowHomeLogo && $MatchTable_LogoMode === "left"): ?>
					<img class="alignleft" src="<?php echo $MatchTable_HomeLogoUrl; ?>" alt="" data-logo-for="<?php echo $MatchTable_HomeLogoHolder; ?>" />
					<?php endif; ?>
					<?php if($MatchTable_ShowHomeLogo && $MatchTable_LogoMode === "only"): ?>
					<?php $MatchTable_LogoAlt = $match->GetHomeLeagueEntry()->GetTeam()->GetName(); ?>
					<img class="aligncenter" src="<?php echo $MatchTable_HomeLogoUrl; ?>" alt="<?php echo $MatchTable_LogoAlt; ?>" title="<?php echo $MatchTable_LogoAlt; ?>" data-logo-for="<?php echo $MatchTable_HomeLogoHolder; ?>" />
					<?php else: ?>
					<?php echo $match->GetHomeLeagueEntry()->GetTeam()->GetName(); ?>
					<?php endif; ?>
					<?php if($MatchTable_ShowHomeLogo && $MatchTable_LogoMode === "right"): ?>
					<img class="alignright" src="<?php echo $MatchTable_HomeLogoUrl; ?>" alt="" data-logo-for="<?php echo $MatchTable_HomeLogoHolder; ?>" />
					<?php endif; ?>
		        </td>
		        <?php endif; ?>
		        <?php if($MatchTable_Show_Away_Acronym): ?>
		        <td data-cell-for="awayacronym"<?php if(!empty($MatchTable_Highlight_Away_Value)):?> data-highlight="<?php echo $MatchTable_Highlight_Away_Value; ?>"<?php endif; ?>>
		        	<?php if($MatchTable_ShowAwayLogo && $MatchTable_LogoMode === "left"): ?>
					<img class="alignleft" src="<?php echo $MatchTable_AwayLogoUrl; ?>" alt="" data-logo-for="<?php echo $MatchTable_AwayLogoHolder; ?>" />
					<?php endif; ?>
					<?php if($MatchTable_ShowAwayLogo && $MatchTable_LogoMode === "only"): ?>
					<?php $MatchTable_LogoAlt = $match->GetAwayLeagueEntry()->GetTeam()->GetAcronym() . " " . Localization::GLOBAL_PLACEHOLDER . " " . $match->GetAwayLeagueEntry()->GetTeam()->GetName(); ?>
					<img class="aligncenter" src="<?php echo $MatchTable_AwayLogoUrl; ?>" alt="<?php echo $MatchTable_LogoAlt; ?>" title="<?php echo $MatchTable_LogoAlt; ?>" data-logo-for="<?php echo $MatchTable_AwayLogoHolder; ?>" />
					<?php else: ?>
					<abbr title="<?php echo $match->GetAwayLeagueEntry()->GetTeam()->GetName(); ?>"><?php echo $match->GetAwayLeagueEntry()->GetTeam()->GetAcronym(); ?></abbr>
					<?php endif; ?>
					<?php if($MatchTable_ShowAwayLogo && $MatchTable_LogoMode === "right"): ?>
					<img class="alignright" src="<?php echo $MatchTable_AwayLogoUrl; ?>" alt="" data-logo-for="<?php echo $MatchTable_AwayLogoHolder; ?>" />
					<?php endif; ?>
		        </td>
		        <?php endif; ?>
		        <?php if($MatchTable_Show_Away): ?>
		        <td data-cell-for="away"<?php if(!empty($MatchTable_Highlight_Away_Value)):?> data-highlight="<?php echo $MatchTable_Highlight_Away_Value; ?>"<?php endif; ?>>
		        	<?php if($MatchTable_ShowAwayLogo && $MatchTable_LogoMode === "left"): ?>
					<img class="alignleft" src="<?php echo $MatchTable_AwayLogoUrl; ?>" alt="" data-logo-for="<?php echo $MatchTable_AwayLogoHolder; ?>" />
					<?php endif; ?>
					<?php if($MatchTable_ShowAwayLogo && $MatchTable_LogoMode === "only"): ?>
					<?php $MatchTable_LogoAlt = $match->GetAwayLeagueEntry()->GetTeam()->GetName(); ?>
					<img class="aligncenter" src="<?php echo $MatchTable_AwayLogoUrl; ?>" alt="<?php echo $MatchTable_LogoAlt; ?>" title="<?php echo $MatchTable_LogoAlt; ?>" data-logo-for="<?php echo $MatchTable_AwayLogoHolder; ?>" />
					<?php else: ?>
					<?php echo $match->GetAwayLeagueEntry()->GetTeam()->GetName(); ?>
					<?php endif; ?>
					<?php if($MatchTable_ShowAwayLogo && $MatchTable_LogoMode === "right"): ?>
					<img class="alignright" src="<?php echo $MatchTable_AwayLogoUrl; ?>" alt="" data-logo-for="<?php echo $MatchTable_AwayLogoHolder; ?>" />
					<?php endif; ?>
		        </td>
		        <?php endif; ?>
		        <?php if($MatchTable_Show_FieldName || $MatchTable_Show_Address): ?>
		        	<td data-cell-for="field">
		        		<?php
		        		$MatchTable_Field = $match->GetField();
		        		// Spielfeld
		        		$MatchTable_FieldName = $MatchTable_Show_FieldName && !empty($MatchTable_Field) ? $MatchTable_Field->GetName() : null;
		        		// Adresse
		        		$MatchTable_Address = $MatchTable_Show_Address && !empty($MatchTable_Field) ? Helper::GetFullAddress($MatchTable_Field) : null;
		        		// Zusammen
		        		$MatchTable_FieldValue = null;
		        		// Setze Name, wenn vorhanden
		        		if(!empty($MatchTable_FieldName)){
		        			$MatchTable_FieldValue = $MatchTable_FieldName;
		        		}
		        		if(!empty($MatchTable_Address)){
		        			$MatchTable_FieldValue = !empty($MatchTable_FieldValue)
		        				// Wenn Name bereits enthalten, hinzufügen
		        				? $MatchTable_FieldValue . " " . Localization::GLOBAL_PLACEHOLDER . " " . $MatchTable_Address
		        				// Ansonsten nur Adresse
		        				: $MatchTable_Address;
		        		}
		        		//Url vorbereiten
		        		if($MatchTable_ProvideFieldDetails && !empty($MatchTable_Field)){
		        			$url = $MatchTable_FieldUrl;
		        			$query = parse_url($url, PHP_URL_QUERY);

			        		if($query){

			        			$url .= "&amp;bsm_field=";
			        		}else{

			        			$url .= "?bsm_field=";
			        		}

			        		$url .= $MatchTable_Field->GetID();
		        		}
		        		?>
		        		<?php if(empty($MatchTable_FieldValue)): ?>
		        		<?php echo Localization::GLOBAL_PLACEHOLDER; ?>
		        		<?php else: ?>
			        		<?php if($MatchTable_Use_FieldIcon): ?>
			        		<?php
			        		// Check, ob Away-Feld - im Standard von Away ausgehen
			        		$MatchTable_FieldIconUrl = "locationaway.png";
			        		// Field kann nicht NULL sein, da sonst $MatchTable_FieldValue NULL wäre
			        		$MatchTable_FieldClub = $MatchTable_Field->GetClub();
			        		$MatchTable_HomeLeagueEntry = $match->GetHomeLeagueEntry();
			        		// Kein DS
			        		if(!empty($MatchTable_FieldClub) && !empty($MatchTable_HomeLeagueEntry)){
			        			$MatchTable_Team = $MatchTable_HomeLeagueEntry->GetTeam();
			        			// Kein DS
			        			if(!empty($MatchTable_Team)){
			        				$MatchTable_Team_Clubs = $MatchTable_Team->GetClubs();
			        				// Kein DS
			        				if(!empty($MatchTable_Team_Clubs)){
			        					foreach($MatchTable_Team_Clubs as $club){
			        						// Wenn einer der Vereine passt, ist das Spielfeld der Heimmannschaft
			        						if($club->GetID() === $MatchTable_FieldClub->GetID()){
			        							$MatchTable_FieldIconUrl = "location.png";
			        							break;
			        						}
			        					}
			        				}
			        			}
			        		}
			        		?>
			        		<a <?php if($MatchTable_ProvideFieldDetails): ?>href="<?php echo $url; ?>" <?php endif; ?>title="<?php echo $MatchTable_FieldValue; ?>"><img src="<?php echo Helper::UrlForImage($MatchTable_FieldIconUrl)?>" alt="<?php echo $MatchTable_FieldValue; ?>" data-icon-for="field" /></a>
			        		<?php else: ?>
			        		<?php if($MatchTable_ProvideFieldDetails): ?>
			        		<a href="<?php echo $url ?>">
			        		<?php endif; ?>
			        		<?php echo $MatchTable_FieldValue; ?>
			        		<?php if($MatchTable_ProvideFieldDetails): ?>
					        </a>
					        <?php endif; ?>
			        		<?php endif; ?>
			        	<?php endif; ?>
		        	</td>
		        <?php endif; ?>
		        <?php if($MatchTable_Show_UmpireSelection_Acronym): ?><td data-cell-for="umpireselectionacronym"<?php if(!empty($MatchTable_Highlight_UmpireSelection_Value)):?> data-highlight="<?php echo $MatchTable_Highlight_UmpireSelection_Value; ?>"<?php endif; ?>><?php if(empty($MatchTable_UmpireSelection)): ?><?php echo Localization::GLOBAL_PLACEHOLDER; ?><?php else: ?><abbr title="<?php echo $MatchTable_UmpireSelection->GetDisplayName(); ?>"><?php echo $MatchTable_UmpireSelection->GetAcronym(); ?></abbr><?php endif; ?></td><?php endif; ?>
		        <?php if($MatchTable_Show_UmpireSelection): ?><td data-cell-for="umpireselection"<?php if(!empty($MatchTable_Highlight_UmpireSelection_Value)):?> data-highlight="<?php echo $MatchTable_Highlight_UmpireSelection_Value; ?>"<?php endif; ?>><?php echo Helper::PlaceholderIfEmpty(empty($MatchTable_UmpireSelection) ? null : $MatchTable_UmpireSelection->GetDisplayName()); ?></td><?php endif; ?>
		        <?php if($MatchTable_Show_UmpireAssignments): ?>
		        	<td data-cell-for="umpireassignments">
		        		<?php if(empty($MatchTable_UmpireAssignments)): ?>
		        		<?php echo Localization::GLOBAL_PLACEHOLDER; ?>
		        		<?php else: ?>
		        		<ul data-object-type="umpireAssignment">
		        			<?php foreach($MatchTable_UmpireAssignments as $umpireAssignment): ?>
		        			<li><?php echo $umpireAssignment; ?></li>
		        			<?php endforeach; ?>
		        		</ul>
		        		<?php endif; ?>
		        	</td>
		        <?php endif; ?>
		        <?php if($MatchTable_Show_ScorerSelection_Acronym): ?><td data-cell-for="scorerselectionacronym"<?php if(!empty($MatchTable_Highlight_ScorerSelection_Value)):?> data-highlight="<?php echo $MatchTable_Highlight_ScorerSelection_Value; ?>"<?php endif; ?>><?php if(empty($MatchTable_ScorerSelection)): ?><?php echo Localization::GLOBAL_PLACEHOLDER; ?><?php else: ?><abbr title="<?php echo $MatchTable_ScorerSelection->GetDisplayName(); ?>"><?php echo $MatchTable_ScorerSelection->GetAcronym(); ?></abbr><?php endif; ?></td><?php endif; ?>
		        <?php if($MatchTable_Show_ScorerSelection): ?><td data-cell-for="scorerselection"<?php if(!empty($MatchTable_Highlight_ScorerSelection_Value)):?> data-highlight="<?php echo $MatchTable_Highlight_ScorerSelection_Value; ?>"<?php endif; ?>><?php echo Helper::PlaceholderIfEmpty(empty($MatchTable_ScorerSelection) ? null : $MatchTable_ScorerSelection->GetDisplayName()); ?></td><?php endif; ?>
		        <?php if($MatchTable_Show_ScorerAssignments): ?>
		        	<td data-cell-for="scorerassignments">
		        		<?php if(empty($MatchTable_ScorerAssignments)): ?>
		        		<?php echo Localization::GLOBAL_PLACEHOLDER; ?>
		        		<?php else: ?>
		        		<ul data-object-type="scorerAssignment">
		        			<?php foreach($MatchTable_ScorerAssignments as $scorerAssignment): ?>
		        			<li><?php echo $scorerAssignment; ?></li>
		        			<?php endforeach; ?>
		        		</ul>
		        		<?php endif; ?>
		        	</td>
		        <?php endif; ?>
		        <?php if($MatchTable_Show_Result): ?><td data-cell-for="result"><?php if($match->GetState() === "canceled"): ?><abbr title="<?php echo $match->GetLocalizedState(); ?>"><?php echo Localization::MATCHTABLE_COLUMN_VALUE_RESULT_PPD; ?></abbr><?php else: ?><?php echo Helper::PlaceholderIfEmpty($match->GetResult()); ?><?php if(!empty($match->GetResult()) && $match->GetState() !== "played" && $match->GetState() !== "planned"): ?>&nbsp;<a href="javascript:void(0);" title="<?php echo $match->GetLocalizedState(); ?>"><img src="<?php echo Helper::UrlForImage("info.png")?>" alt="<?php echo $match->GetLocalizedState(); ?>" data-icon-for="result" /></a><?php endif; ?><?php endif; ?></td><?php endif; ?>
		        <?php if($MatchTable_Show_ScoreSheet): ?><td data-cell-for="scoresheet"><?php if (empty($match->GetScoreSheetUrl()) || empty($match->GetScoreSheetFileName())): ?><?php echo Localization::GLOBAL_PLACEHOLDER; ?><?php else: ?><a href="<?php echo $match->GetScoreSheetUrl(); ?>" target="_blank" title="<?php echo Localization::GLOBAL_DOWNLOAD. ": " . Localization::MATCHTABLE_COLUMN_VALUE_SCORESHEET . " - " . $match->GetScoreSheetFileName(); ?>"><img src="<?php echo Helper::UrlForImage("paperclip.png")?>" alt="<?php echo Localization::GLOBAL_DOWNLOAD. ": " . Localization::MATCHTABLE_COLUMN_VALUE_SCORESHEET . " - " . $match->GetScoreSheetFileName(); ?>" data-icon-for="scoresheet" /></a><?php endif;?></td><?php endif; ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php endforeach; ?>
</div>
