<?php
include 'src/views/header.php';

//header('Location: src/modules/login/login_view.php');

//exit();


?>

<html>
    <head>
        <title>Login</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <!--
        <link rel = "stylesheet" type = "text/css" href = "SourceFiles/Views/css/bootstrap.css" />
        <link rel = "stylesheet" type = "text/css" href = "SourceFiles/Views/css/main.css" />
        <link rel = "stylesheet" type = "text/css" href = "SourceFiles/Views/css/style.css" />
        -->
    </head>
    <body>

        <h3>
            Please select sign in or sign up
        </h3>
        <form action = 'src/modules/login/login_controller.php' method='post'>

                    <label for='username'>Username: </label>
                    <input type='text' name='username' placeholder = 'Please enter your Linkblue Username...' autofocus>

                    <label for='password'>Password: </label>
                    <input type='password' name='password' placeholder = 'Please enter Linkblue Password...'>

                    <input id='submit' type='submit' name = 'login' value='Login'>



        </form>
    <form action="src/modules/sign_up/sign_up_controller.php" method="post">
        <input id='submit' type='submit' name = 'login' value='New User'>
    </form>
    </body>
</html>
