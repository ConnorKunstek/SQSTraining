<?php
/**
 * Controller for the landing page.
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 */ 

session_start();

require_once ("../../lib/Logger.php");
require_once ("landing_model.php");

$model = new LandingModel();
$logger = Logger::getInstance();


// Parsing config.ini to get store version and development in session variable
$config_filename = "../../../config/config.ini";

if (file_exists($config_filename)){
	$config_ini = parse_ini_file($config_filename, True);
	$_SESSION['version'] = $config_ini['env']['version'];
	$_SESSION['env'] = $config_ini['env']['env'];

} else {
	$logger->log_error("could not find config file:".$config_filename);
}


// Making sure client is logged in 
if ($_SESSION['uid'] != null){
	//$logger->log_debug("Landing page loaded");
	include_once ("landing_view.php");

} else {
	$logger->log("User was not logged in; redirecting to index.php");
	header("Location: /index.php");
    exit();
}

?>
