
<!DOCTYPE html>

<html lang="en">



    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">

        <meta name="author" content="Connor">



        <!-- Bootstrap core CSS -->

        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <link href="assets/css/main.css" rel="stylesheet">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery.min.js"><\/script>')</script>
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


                            <li><a class="nav-link" href="src/modules/sign_in/sign_in_controller.php">Sign in</a></li>
                            <li><a class="nav-link" href="src/modules/sign_up/sign_up_controller.php">Sign up</a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="./"><img id="header-img" src="assets/images/logo.png" alt="SQS logo"></a>
                </div>
            </nav>


        </div>




    <!-- Bootstrap core JavaScript

    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->

    <script src="assets/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>

</html>


<html>
    <div id="home_page">
        <body>
            <div>
                <div class="welcome">
                    <h1 id="WelcomeHead">Welcome to the SQS Training Website!</h1>
                    <p id="DirectionPara">This website is for testing automated script to find different errors throughout the site. Sign in or sign up to begin!</p><br><br>
                    <button class="btn" id="LoginBut" onclick="location.href='src/modules/sign_in/sign_in_controller.php'">Sign In</button>
                    <button class="btn" id="RegisterBut" onclick="location.href='src/modules/sign_up/sign_up_controller.php'">Sign Up</button>
                </div>
            </div>
        </body>
    </div>
</html>
