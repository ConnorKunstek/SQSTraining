<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/9/18
 * Time: 12:39 AM
 */


session_start();

?>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">

        <meta name="author" content="Connor">

        <link href="../../../assets/css/bootstrap.css" rel="stylesheet">

        <link href="../../../assets/css/main.css" rel="stylesheet">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../../assets/js/jquery.min.js"><\/script>')</script>
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
                            <li><a class="nav-link" href="../../../index.php">Home </a></li>


                            <li><a class="nav-link" href="../sign_in/sign_in_controller.php">Sign in</a></li>
                            <li><a class="nav-link" href="sign_up_controller.php">Sign up</a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="./"><img id="header-img" src="../../../assets/images/logo.png" alt="SQS logo"></a>
                </div>
            </nav>


        </div>




        <!-- Bootstrap core JavaScript

        ================================================== -->

        <!-- Placed at the end of the document so the pages load faster -->

        <script src="../../../assets/js/bootstrap.min.js"></script>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

        <script src="../../../assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>

</html>

<!DOCTYPE html>
<html>
    <div class="container">
        <div class="form-horizontal" id="centerbox">
            Registration Progress
        </div>
        <div class="progress">
            <div id="ProgressBarReg1" class="progress-bar progress-bar-striped active" role="progressbar"
                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
        </div>

        <div class="login">
            <?php
                if(isset($_SESSION['errorMessage'])){
                    $errorMessage = $_SESSION['errorMessage'];
                    echo "
                        <div class='alert alert-danger'>
                            $errorMessage
                        </div>
                    ";
                }
            ?>
            <form  id="RegForm1" name="registerform" action="sign_up_controller.php" method="post">
                <input id="hidden" type='hidden' name = 'hidden' value="sign_up_view_1">
                <div class="container-fluid">
                    <br><h5 id="SignUpWelcomeHead">Welcome to the SQS Training Site, please sign up.</h5><br>
                    <img src="../../../assets/images/logo.png" alt="" style="width:50%;display:block;margin-left:auto;margin-right:auto;"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="first_name">First Name:</label><br>
                            <input class="form-control" type="text" name="first_name" size="30" id="SignupFirstName" maxlength="50" placeholder="First Name" autofocus autocomplete="name"/><br>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Last Name:</label><br>
                            <input class="form-control" type="text" name="last_name" size="30" id="SignupLastName" maxlength="50" placeholder="Last Name" autocomplete="family-name"/><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="email">Email:</label><br>
                            <input class="form-control" type="text" name="email" size="30" id="SignupEmail" maxlength="30" placeholder="Email" autocomplete="email"/><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="signup_Password">Password:</label><br>
                            <input class="form-control" type="password" name="password" size="30" id="signup_Password" maxlength="30" placeholder="Password"/><br>
                        </div>
                        <div class="col-md-6">
                            <label for="signup_ConfirmPass">Confirm Password:</label><br>
                            <input class="form-control" type="password" name="confirm_password" size="30" id="signup_ConfirmPass" maxlength="30" placeholder="Confirm Password" autocomplete="off"/><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <input class="btn btn-primary" type="submit" name="submit" value="Register" id="signup_Submit"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</html>

