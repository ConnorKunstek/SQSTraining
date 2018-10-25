<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/24/18
 * Time: 7:47 PM
 */

?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <!-- Bootstrap core CSS -->

    <link href="../../assets/css/bootstrap.css" rel="stylesheet">

    <link href="../../assets/css/main.css" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/jquery.min.js"><\/script>')</script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


    <script type="text/javascript">
    $(document).ready(function(){

        if($(window).width() > 767){
            $('.navbar .dropdown').hover(function() {
                $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

            }, function() {
                $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

            });

            $('.navbar .dropdown > a').click(function(){
                location.href = this.href;
            });
        }
    });
    </script>

  </head>

  <body>


    <div id="heading2">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-md-10">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link" href="./">Home </a></li>
                    <li><a class="nav-link" href="sign_in_controller.php">Sign in</a></li>
                    <li><a class="nav-link" href="../sign_up/sign_up_controller.php">Sign up</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <a href="./"><img id="header-img" src="../../assets/images/logo.png" alt="SQS logo"></a>
        </div>
        </nav>
    </div>

    <!-- Bootstrap core JavaScript

================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->

    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>


<html>
    <div class="login">
  	    <form method="post" action="">
            <br><h5 id="LogInWelcomeHead">Welcome to the SQS Training Site, please log in.</h5><br>
            <img id="LogInImage" src="../../assets/images/logo.png" alt="" style="width:50%;display:block;margin-left:auto;margin-right:auto;"><br>
	        <label for="email_Signin">Email:</label><br>
	     	<input class="form-control" type="email" name="email" placeholder="Email" maxlength="30" id="email_Signin" autofocus autocomplete="email"/><br>
	    	<label for="password">Password:</label><br>
	        <input class="form-control" type="password" name="password" placeholder="Password" maxlength="30" id="password_Signin"/>
            <input class="btn btn-success" type="submit" name="submit" value="Sign in" id="submit_Signin"/>
	    </form>
	</div>
</html>
