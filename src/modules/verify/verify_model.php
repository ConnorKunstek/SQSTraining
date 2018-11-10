<?php

require_once ("../../lib/Connector.php");
require_once ("../../lib/Logger.php");
session_start();

$database = new Connector();
$conn = $database->getDatabase();


/**
 * Activate a user account based on an email.
 * @param string $email Email address of the account to activate
 * @return boolean True if account was activaged, false otherwise
 */
function activateAccount($email, $hash){


	# Check the user exists based on provided email
	if (!userExists($email)){
		return False;
	}

	# TODO: Check the hash provided matches the database
	if (!hashesMatch($email, $hash)){
		return False;
	}

	# Update the verified attribute
	if (!verifyUser($email)){
		return False;
	}



	return True;
}

/**
 * Compares the hash from the verification email to the hash in
 * the database for the given email.
 * @param string $email Email of user from verification link.
 * @param string $hash Hash of user from verification link.
 * @return boolean True if URL hash matches database hash, False otherwise
 * @todo review function (add logging)
 */
function hashesMatch($email, $hash){

	try {
		$base = Connector::getDatabase();

		$sql = "SELECT * FROM user WHERE email = '$email';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		if ($result['hash'] == $hash){
			return True;
		} else {
			return False;
		}

	} catch (Exception $e){
		return $e;
	}


	return True;
}



function verifyUser($email){
	try {
		$base = Connector::getDatabase();

		$sql = "UPDATE user SET verified=1 WHERE email = '$email';";

		$stmt = $base->prepare($sql);

		if ($stmt->execute()){
			return True;
		} else {
			return False;
		}

	} catch (Exception $e){
		return $e;
	}
}



function userExists($email){
	try {
		$base = Connector::getDatabase();

		$sql = "SELECT * FROM user WHERE email = '$email';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();

		if (isset($result['email'])){
			return True;
		} else {
			return False;
		}

	} catch (Exception $e){
		return $e;
	}
}





?>