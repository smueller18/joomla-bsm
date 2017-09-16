<?php
/**
 * @copyright   Copyright (C) 2017 Stephan Müller
 * @license     MIT; see LICENSE
 */

defined('_JEXEC') or die;

JHTML::stylesheet('modules/mod_bsm_matchtable/css/style.css');

// Include the feed functions only once
if (!class_exists('Helper'))
  require_once __DIR__ . '/bsm/data/Helper.php';
if (!class_exists('Api'))
  require_once __DIR__ . '/bsm/data/Api.php';

$orgId = 0;
$apiKey = $params->get('apiKey');
$MatchTable_Club = $params->get('club');
$MatchTable_League = $params->get('league');
$MatchTable_Season = (int)$params->get('season');

$MatchTable_LogoMode = $params->get('logoMode');
if ($params->get('tableData', "") != "")
  $MatchTable_Data = implode(",", $params->get('tableData', ""));
else
  $MatchTable_Data = none;

$MatchTable_Date_DayOfWeek = $params->get('dayOfWeek');
$MatchTable_GameDays = $params->get('gameDays');
$MatchTable_Hide_Column_Names = $params->get('hideColumnNames');

if ($params->get('excludeStates', "") != "")
  $MatchTable_Exclude_States = implode(",", $params->get('excludeStates', ""));
else
  $MatchTable_Exclude_States = none;

$MatchTable_Exclude_Leagues = $params->get('excludeLeagues');
$MatchTable_Only_Leagues = $params->get('onlyLeagues');
$MatchTable_GroupBy = $params->get('groupBy');
$MatchTable_Use_FieldIcon = $params->get('useFieldIcon');

//Try to init
try{
  Api::InitConfig($apiKey, $orgId, $MatchTable_Season);
}
catch(Exception $e){
  // TODO remove echo
  JFactory::getApplication()->enqueueMessage($e, 'error');
  //Do nothing
}

try {
  require __DIR__ . '/bsm/MatchTable.php';
}
catch(Exception $e) {
  JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
  JFactory::getApplication()->enqueueMessage(nl2br($e), 'error');
}
