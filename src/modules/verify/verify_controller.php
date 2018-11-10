<?php
/**
 * 
 * 
 */

// Make sure the required GET values have been provided
if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
	// TODO: sanitize and validate inputs
	$email = $_GET['email'];
    $hash = $_GET['hash'];
    include ("verify_model.php");
    include ("verify_view.php");
}
else {
	header("Location: /src/views/error.php");
    exit();
}

?>