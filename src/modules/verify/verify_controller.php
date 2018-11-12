<?php
/**
 * 
 * 
 */

session_start();

include("verify_model.php");

$activated = false;

// Make sure the required GET values have been provided
if (isset($_GET['email']) AND !empty($_GET['email']) AND isset($_GET['hash']) AND !empty($_GET['hash'])){
	// TODO: sanitize and validate inputs
	$email = $_GET['email'];
    $hash = $_GET['hash'];

    $_SESSION['email'] = $email;
    $_SESSION['hash'] = $hash;

    $_SESSION['verified'] = activateAccount($email, $hash);

    header("Location: verify_view.php");
    exit();
}else {
	header("Location: " . $_SESSION['base_path'] . "/src/views/error.php");
    exit();
}
