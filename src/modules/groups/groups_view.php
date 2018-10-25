<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:07 AM
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
          <li><a class="nav-link" href="../home/home_controller.php">Home </a></li>


            <li><a class="nav-link" href="../profile/profile_controller.php">Profile</a></li>
            <li><a class="nav-link" href="groups_controller.php">Groups</a></li>


            <li><a class="nav-link" href="http://sqs.com/">SQS Site</a></li>
            <li><a class="nav-link" href="../sign_out/sign_out_controller.php">Sign out</a></li>


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
	<body>
		<div class="container">
            <h3 id="GroupHead">My Groups</h3>
      <hr>
      		</div>
	</body>
  <div style="padding-top:50px;"></div>
  <div id="addUserGroupModal" class="modal fade" role="dialog">
      <!-- Modal content -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="addUtoGHeader" class="modal-title">Add User to Group</h4>
            <button type="button" id="addUtoGBut" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form id="AddUserModalForm" name="AddUserGroupModalForm" class="" action="../groups/groups_controller.php" method="post">
          <div class="modal-body">
            <br>
Which User? &nbsp;
            <select class="form-control" id="dropdownUser" class="user-select" name="user">
              <option value='6'> </option><option value='50'>Admin Admin</option>
                <option value='23'>Alfred the Great</option>
                <option value='57'>billy bob</option>
                <option value='20'>Carl the Great</option>
                <option value='100'>Connor Kunstek Kunstek</option>
                <option value='30'>Duke Kong</option>
                <option value='12'>Hanker Hill</option>
                <option value='61'>hunter bowman</option>
                <option value='56'>jim bob</option>
                <option value='106'>Jimmy Cricket</option>
                <option value='73'>jimmy john</option>
                <option value='66'>john berry</option>
                <option value='8'>John Doe</option>
                <option value='71'>john jimmy</option>
                <option value='28'>King Kong</option>
                <option value='70'>Morgan Lewis</option>
                <option value='86'>Parker Householder</option>
                <option value='69'>Parker Householder</option>
                <option value='19'>Peter The Great</option>
                <option value='31'>Prince Buster</option>
                <option value='29'>Queen Kong</option>
                <option value='18'>Robinson Crueso</option>
                <option value='95'>SQS Testing</option>
                <option value='105'>Stephen Ritchie</option>
                <option value='102'>Stephen Ritchie</option>
                <option value='103'>Stephen Ritchie</option>
                <option value='101'>Test Test</option>
                <option value='53'>test account</option>
                <option value='93'>test test</option>
                <option value='59'>Test User</option>
                <option value='60'>test fox</option>
                <option value='98'>test fox fox</option>
                <option value='97'>test fox 12</option>
                <option value='92'>Testing Person (Demo)</option>
                <option value='94'>Testing SQS</option>
                <option value='99'>tyler tallent</option>
                <option value='96'>Wildcat Technology</option>
                <option value='27'>William Conqueror</option>
            </select><br><br>
            Will they be a Leader? &nbsp;
            <select class="form-control" id="dropdownLeader" class="leader-select" name="leader">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <input type="text" id="inputGroup" name="group" value="" hidden>
          </div>
          <div class="modal-footer">
            <input id="SubmitUserGroup" type="submit" name="addUserGroupSub" value="Add User" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="addGroupModal" class="modal fade" role="dialog">
      <!-- Modal content -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="AddGroupHead" class="modal-title">Add Group</h4>
          <button type="button" id="addGExit" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form id="addModalForm" name="addGroupModalForm" class="" action="../groups/groups_controller.php" method="post">
          <div class="modal-body">
            <br>
                Group Name: &nbsp;
            <input class="form-control" id="groupNameInput" type="text" name="group_name" value=""><br>
          </div>
          <div class="modal-footer">
            <input id="AddGroup" type="submit" name="addGroupSub" value="Add Group" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
<footer class="footer">
  <p>Connor Kunstek, Nick Sladic, Stephen Richie, Luke Andrews</p>
</footer>

<style>
.footer {
    height: 100px;
    bottom: 0;
    width: 100%;
    background-color: #343A40;
    color: white;
    text-align: center;
}
</style>
</html>

<script type="text/javascript">
  function injectGroup(param) {
      let group = $(param).data('group');
    var form = document.forms["AddUserGroupModalForm"];
    form.elements["group"].value = group;
    console.log(group);
  }
</script>
