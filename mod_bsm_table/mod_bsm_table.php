<?php
/**
 * @copyright   Copyright (C) 2017 Stephan Müller
 * @license     MIT; see LICENSE
 */

defined('_JEXEC') or die;

JHTML::stylesheet('modules/mod_bsm_table/css/style.css');

if (!class_exists('Helper'))
  require_once __DIR__ . '/bsm/data/Helper.php';
if (!class_exists('Api'))
  require_once __DIR__ . '/bsm/data/Api.php';

$orgId = 0;
$apiKey = $params->get('apiKey');
$season = (int)$params->get('season');

$Table_League = $params->get('league');
$Table_CaptionMode = $params->get('captionMode');
$Table_LogoMode = $params->get('logoMode');
if ($params->get('tableData', "") != "")
  $Table_Data = implode(",", $params->get('tableData', ""));
else
 $Table_Data = none;

//Try to init
try{
  Api::InitConfig($apiKey, $orgId, $season);
}
catch(Exception $e){
  // TODO remove echo
  JFactory::getApplication()->enqueueMessage($e, 'error');
  //Do nothing
}

try {
  require __DIR__ . '/bsm/Table.php';
}
catch(Exception $e) {
  JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
  JFactory::getApplication()->enqueueMessage(nl2br($e), 'error');
}
