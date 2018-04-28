<?php

$mOldER = ini_get('error_reporting');
$mOldLE = ini_get('log_errors');
$mOldDE = ini_get('display_errors');
$mOldDSE = ini_get('display_startup_errors');

ini_set('error_reporting', E_ALL);
ini_set('log_errors', 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once '../../../includes/defaults.inc.php';
require_once '../../../config.php';
require_once '../../../includes/definitions.inc.php';
require_once '../../includes/functions.inc.php';
require_once '../../../includes/functions.php';
//require_once '../../includes/authenticate.inc.php';
require_once '../../includes/vars.inc.php';

require_once dirname(__FILE__) . '/system/MIBUpAutoload.php';

MIBUpAutoload::register();

try {
	$oMIBUp = new MIBUpPlugin();
	$oMIBUp->processAPI();
} catch (MIBUpException $ex) {
	echo 'Something went wrong with MIBUploader Plugin: ' . $ex->getMessage();
}

ini_set('error_reporting', $mOldER);
ini_set('log_errors', $mOldLE);
ini_set('display_errors', $mOldDE);
ini_set('display_startup_errors', $mOldDSE);