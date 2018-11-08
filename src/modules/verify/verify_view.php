<?php
/**
 * 
 */


session_start();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <title>SQS Training - Verify Account</title>
    <style> .alert { margin-top: 5%; }</style>
  </head>

  <body>

  	<!-- Blank Navbar -->
	<nav class="navbar navbar-dark bg-dark">
	  <a class="navbar-brand" href="/index.php">
	    <img src="/assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="alien spaceship">
	    SQS Training
	  </a>
	</nav>

	<?php
		// Choose message to display based on if account can be verified.
		if (activateAccount($email, $conn)){
			include ("success.html");
		} else {
			include ("failure.html"); 
		}	
	?>


 <?php include("../../views/footer.php");?>