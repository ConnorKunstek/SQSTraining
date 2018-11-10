<?php
/**
 * 
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 */ 

session_start();
require_once("landing_model.php");
require_once ("../../lib/Logger.php");
$logger = new Logger();

// TODO: move parsing of config elsewhere?
$config_ini = parse_ini_file("../../config/config.ini", True);
$_SESSION['version'] = $config_ini['env']['version'];
$_SESSION['env'] = $config_ini['env']['env'];


# TODO: Check if the user is logged in
$loggedIn = True;
if ($loggedIn){

	$username = "Stephen";

} else {
	$logger->log_warning("Landing page loaded by but was redirected due to not being logged in.");
	header("Location: /index.php");
    exit();
}

/*echo '<pre>';
var_dump($_SESSION);
echo '</pre>';*/

include('landing_view.php');

?>
