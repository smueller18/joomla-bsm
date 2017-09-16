<?php
if (!class_exists('Helper'))
  require_once __DIR__ . '/data/Helper.php';
if (!class_exists('Api'))
  require_once __DIR__ . '/data/Api.php';
if (!class_exists('Localization'))
  require_once __DIR__ . '/data/Localization.php';

//Variablen initialisieren
//String/Int != 0 -> Check empty
if(empty($Table_League)){
	throw new Exception("No league given");
}
//String/Int != 0 -> Check empty
if(empty($Table_Highlight)){
	$Table_Highlight = null;
}
//String -> Check empty
if(empty($Table_Data)){
	$Table_Data = null;
}
//String -> Check empty
if(empty($Table_CaptionMode)){
	$Table_CaptionMode = "none";
}
else if($Table_CaptionMode != "none" && $Table_CaptionMode != "localized" && $Table_CaptionMode != "league"){
	throw new Exception("CaptionMode has only 3 valid values: 'none' (default), 'localized' and 'league', but '" . $Table_CaptionMode . "' was set");
}
//String -> Check empty
if(empty($Table_LogoMode)){
	$Table_LogoMode = "none";
}
else if($Table_LogoMode != "none" && $Table_LogoMode != "left" && $Table_LogoMode != "right" && $Table_LogoMode != "only"){
	throw new Exception("LogoMode has only 4 valid values: 'none' (default), 'left', 'right' and 'only', but '" . $Table_LogoMode . "' was set");
}
//Int != 0 -> Check empty
if(empty($Table_Season)){
	$Table_Season = null;
}

//Initalisieren der Show Variablen
$Table_Data_Array = Helper::ConvertParameterListToArray($Table_Data);

$Table_Show_TeamName = in_array("team", $Table_Data_Array);
$Table_Show_TeamShortName = in_array("acronym", $Table_Data_Array);
$Table_Show_NotCompeting = in_array("notcompeting", $Table_Data_Array);
$Table_Show_MatchesCount = in_array("matches", $Table_Data_Array);
$Table_Show_WinsCount = in_array("wins", $Table_Data_Array);
$Table_Show_LossesCount = in_array("losses", $Table_Data_Array);
$Table_Show_Quota = in_array("quota", $Table_Data_Array);
$Table_Show_GamesBehind = in_array("gamesbehind", $Table_Data_Array);
$Table_Show_Streak = in_array("streak", $Table_Data_Array);

// Tabelle erhalten
$Table = Api::GetTable($Table_League, $Table_Season);
$Table_Rows = empty($Table) ? null : $Table->GetRows();

$Table_Highlight_Array = Helper::ConvertParameterListToArray($Table_Highlight);
?>
<div data-bsm="data-bsm" data-type="detail" data-object-type="table">
	<?php if(empty($Table_Rows)): ?>
	<?php echo Localization::TABLE_NOENTRIES; ?>
	<?php else: ?>
	<table class="table table-striped">
		<?php if($Table_CaptionMode !== "none"): ?>
		<caption><?php echo $Table_CaptionMode === "league" ? $Table->GetLeagueName() : Localization::TABLE_CAPTION; ?></caption>
		<?php endif; ?>
		<thead>
			<tr>
				<th data-cell-for="rank"><?php echo Localization::TABLE_COLUMN_RANK; ?></th>
				<?php if ($Table_Show_TeamName): ?><th data-cell-for="team"><?php echo Localization::TABLE_COLUMN_TEAMNAME; ?></th><?php endif; ?>
				<?php if ($Table_Show_TeamShortName): ?><th data-cell-for="acronym"><?php echo Localization::TABLE_COLUMN_TEAMSHORTNAME; ?></th><?php endif; ?>
				<?php if ($Table_Show_MatchesCount): ?><th data-cell-for="matches"><?php echo Localization::TABLE_COLUMN_MATCHESCOUNT; ?></th><?php endif; ?>
				<?php if ($Table_Show_WinsCount): ?><th data-cell-for="wins"><?php echo Localization::TABLE_COLUMN_WINSCOUNT; ?></th><?php endif; ?>
				<?php if ($Table_Show_LossesCount): ?><th data-cell-for="losses"><?php echo Localization::TABLE_COLUMN_LOSSESCOUNT; ?></th><?php endif; ?>
				<?php if ($Table_Show_Quota): ?><th data-cell-for="quota"><?php echo Localization::TABLE_COLUMN_QUOTA; ?></th><?php endif; ?>
				<?php if ($Table_Show_GamesBehind): ?><th data-cell-for="gamesbehind"><?php echo Localization::TABLE_COLUMN_GAMESBEHIND; ?></th><?php endif; ?>
				<?php if ($Table_Show_Streak): ?><th data-cell-for="streak"><?php echo Localization::TABLE_COLUMN_STREAK; ?></th><?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($Table_Rows as $row): ?>
			<?php
				//Logo-Url
				$Table_LogoUrl = null;
				$Table_LogoHolder = null;
				//Nur nötig, wenn Logo verwendet wird
				if($Table_LogoMode !== "none"){
					$Table_LeagueEntry = $row->GetLeagueEntry();
					//Kein DS
					if(!empty($Table_LeagueEntry)){
						$Table_LeagueEntry_Team = $Table_LeagueEntry->GetTeam();
						//Kein DS
						if(!empty($Table_LeagueEntry_Team)){
							$Table_LeagueEntry_Team_Clubs = $Table_LeagueEntry_Team->GetClubs();
							//Kein DS
							if(!empty($Table_LeagueEntry_Team_Clubs)){
								//Wenn nur ein Verein, nutze diesen
								$Table_LeagueEntry_Team_Clubs_Used = count($Table_LeagueEntry_Team_Clubs) === 1 ? $Table_LeagueEntry_Team_Clubs[0] : null;
								//Entweder vom Verein oder SG
								$Table_LogoUrl = !empty($Table_LeagueEntry_Team_Clubs_Used)? $Table_LeagueEntry_Team_Clubs_Used->GetLogo() : Helper::UrlForImage("sg.png");
								//Entweder vom Verein oder SG
								$Table_LogoHolder = !empty($Table_LeagueEntry_Team_Clubs_Used) ? $Table_LeagueEntry_Team_Clubs_Used->GetAcronym() : "SG";
							}
						}
					}
				}
				//Nur anzeigen, wenn beide Daten gegeben
				$Table_ShowLogo = !empty($Table_LogoUrl) && !empty($Table_LogoHolder);

				//Prüfung Highlight
				$Table_Highlight_Row_Value = "";
				if(!empty($Table_Highlight)){
					$teamName = $row->GetTeamName();
					if(in_array($teamName, $Table_Highlight_Array)){
						//Noch nichts gesetzt, daher einfach übernehmen
						$Table_Highlight_Row_Value = $teamName;
					}
					$teamAcronym = $row->GetShortTeamName();
					if(in_array($teamAcronym, $Table_Highlight_Array)){
						//Evtl. bereits wegen anderem Eintrag enthalten, daher anfügen
						$Table_Highlight_Row_Value .= (empty($Table_Highlight_Row_Value) ? "" : ",") . $teamAcronym;
					}
				}
			?>
			<tr data-row-for="<?php echo $row->GetShortTeamName(); ?>"<?php if(!empty($Table_Highlight_Row_Value)):?> data-highlight="<?php echo $Table_Highlight_Row_Value; ?>"<?php endif; ?>>
				<td data-cell-for="rank"><?php echo $row->GetRank(); ?></td>
				<?php if ($Table_Show_TeamName): ?>
				<td data-cell-for="team"<?php if(!empty($Table_Highlight_Row_Value)):?> data-highlight="<?php echo $Table_Highlight_Row_Value; ?>"<?php endif; ?>>
					<?php if($Table_ShowLogo && $Table_LogoMode === "left"): ?>
					<img class="alignleft" src="<?php echo $Table_LogoUrl; ?>" alt="" data-logo-for="<?php echo $Table_LogoHolder; ?>" />
					<?php endif; ?>
					<?php if($Table_ShowLogo && $Table_LogoMode === "only"): ?>
					<?php $Table_LogoAlt = $row->GetTeamName() . ($Table_Show_NotCompeting && !empty($row->GetNotCompeting()) ? (" " . $row->GetNotCompeting()) : ""); ?>
					<img class="aligncenter" src="<?php echo $Table_LogoUrl; ?>" alt="<?php echo $Table_LogoAlt; ?>" title="<?php echo $Table_LogoAlt; ?>" data-logo-for="<?php echo $Table_LogoHolder; ?>" />
					<?php else: ?>
					<?php echo $row->GetTeamName(); if($Table_Show_NotCompeting && !empty($row->GetNotCompeting())) { echo "&nbsp;" . $row->GetNotCompeting(); } ?>
					<?php endif; ?>
					<?php if($Table_ShowLogo && $Table_LogoMode === "right"): ?>
					<img class="alignright" src="<?php echo $Table_LogoUrl; ?>" alt="" data-logo-for="<?php echo $Table_LogoHolder; ?>" />
					<?php endif; ?>
				</td>
				<?php endif; ?>
				<?php if ($Table_Show_TeamShortName): ?>
				<td data-cell-for="acronym"<?php if(!empty($Table_Highlight_Row_Value)):?> data-highlight="<?php echo $Table_Highlight_Row_Value; ?>"<?php endif; ?>>
					<?php if($Table_ShowLogo && $Table_LogoMode === "left"): ?>
					<img class="alignleft" src="<?php echo $Table_LogoUrl; ?>" alt="" data-logo-for="<?php echo $Table_LogoHolder; ?>" />
					<?php endif; ?>
					<?php if($Table_ShowLogo && $Table_LogoMode === "only"): ?>
					<?php $Table_LogoAlt = $row->GetShortTeamName() . " " . Localization::GLOBAL_PLACEHOLDER . " " . $row->GetTeamName() . ($Table_Show_NotCompeting && !empty($row->GetNotCompeting()) ? (" " . $row->GetNotCompeting()) : ""); ?>
					<img class="aligncenter" src="<?php echo $Table_LogoUrl; ?>" alt="<?php echo $Table_LogoAlt; ?>" title="<?php echo $Table_LogoAlt; ?>" data-logo-for="<?php echo $Table_LogoHolder; ?>" />
					<?php else: ?>
					<abbr title="<?php echo $row->GetTeamName(); ?>"><?php echo $row->GetShortTeamName(); ?></abbr><?php if($Table_Show_NotCompeting && !empty($row->GetNotCompeting())) { echo "&nbsp;" . $row->GetNotCompeting(); } ?>
					<?php endif; ?>
					<?php if($Table_ShowLogo && $Table_LogoMode === "right"): ?>
					<img class="alignright" src="<?php echo $Table_LogoUrl; ?>" alt="" data-logo-for="<?php echo $Table_LogoHolder; ?>" />
					<?php endif; ?>
				</td>
				<?php endif; ?>
				<?php if ($Table_Show_MatchesCount): ?><td data-cell-for="matches"><?php echo Helper::PlaceholderIfEmpty($row->GetMatchCount()); ?></td><?php endif; ?>
				<?php if ($Table_Show_WinsCount): ?><td data-cell-for="wins"><?php echo Helper::PlaceholderIfEmpty($row->GetWinsCount()); ?></td><?php endif; ?>
				<?php if ($Table_Show_LossesCount): ?><td data-cell-for="losses"><?php echo Helper::PlaceholderIfEmpty($row->GetLossesCount()); ?></td><?php endif; ?>
				<?php if ($Table_Show_Quota): ?><td data-cell-for="quota"><?php echo Helper::PlaceholderIfEmpty($row->GetQuota()); ?></td><?php endif; ?>
				<?php if ($Table_Show_GamesBehind): ?><td data-cell-for="gamesbehind"><?php echo Helper::PlaceholderIfEmpty($row->GetGamesBehind()); ?></td><?php endif; ?>
				<?php if ($Table_Show_Streak): ?><td data-cell-for="streak"><?php echo Helper::PlaceholderIfEmpty($row->GetStreak()); ?></td><?php endif; ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
</div>
