<?php

require_once ("../../lib/Connector.php");
session_start();

$database = new Connector();
$conn = $database->getDatabase();

/**
 * Activate a user account based on an email.
 * @param string $email Email address of the account to activate
 * @return boolean True if account was activaged, false otherwise
 */
function activateAccount($email, $conn){

	return False;

	# TODO: Query database to see if email exists
	$query = $conn->prepare("SELECT UID FROM user WHERE email='".$email."'");
	$query-execute();

	if ($query->rowCount() == 1){
		echo "Email address is in database";
	} else {
		echo "Email address does not exist in database";
		return False;
	}

	# TODO: Query database to update active attribute of $email
	$query = $conn->prepare("UPDATE user SET active='1' WHERE email='".$email."'");
	if ($query->rowCount() == 1){
		echo "User was updated";
	} else {
		echo "user update failed";
		return False;
	}



	return False;
}

include ("verify_view.php");



?>