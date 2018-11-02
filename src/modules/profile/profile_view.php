<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:08 AM
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


            <li><a class="nav-link" href="profile_controller.php">Profile</a></li>
            <li><a class="nav-link" href="../groups/groups_controller.php">Groups</a></li>


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


<script type=text/javascript src="../../assets/js/jquery.min.js"></script>
<html>
	<body>
		<div class="container">
			<form class="form-horizontal" id="saveProfileForm" action="profile_controller.php" method="post" enctype="multipart/form-data">

				<h2 id="PersInfoHead">Personal Information</h2>
				<hr>
				<h3 style="text-align: center;" id="ProfProgHead">Profile Progress</h3>
				<div class="progress">
                    <div id="userProg" class="progress-bar  progress-bar-striped  bg-success" style="width:93%" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100">
                        93%
                    </div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-4">
						<div class="profile-labels">
							<label class="control-label" >Photo&emsp;</label>
						</div>
						<div class="profile-inputs">
							<img src="../../assets/images/uploads/" alt="Profile Photo" height="175" width="175">&emsp;<br><br>
						</div>
					</div>
					<div class="col-md-4">
						<input class="form-control" type="File" id="ProfilePhoto" style="display:none;" name="profile_photo" disabled><br><br>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="profile-labels">
							<label class="control-label">First Name</label><br><br>
							<label class="control-label" style="padding-top: 12px;">Last Name</label><br><br>
							<label class="control-label" style="padding-top: 12px;">Email</label><br><br>
						</div>
						<div class="profile-inputs">
                            <input class="form-control" id="FirstName" type="text" name="first_name" maxlength="25" value="Connor Kunstek" disabled><br>
                            <input class="form-control" id="LastName" type="text" name="last_name" maxlength="25" value="Kunstek" disabled><br>
							<input class="form-control" id="Email" type="email" name="email" maxlength="30" value="ccku223@g.uky.edu" disabled><br><br>
						</div>
					</div>
					<div class="col-md-4">
						<div class="profile-labels">
							<label class="control-label">Rank</label><br><br>
							<label class="control-label" style="padding-top: 12px;">Gender</label><br><br>
							<label class="control-label" style="padding-top: 12px;">Password</label><br><br>
						</div>
						<div class="profile-inputs">
							<input class="form-control" id="Rank" type="text" name="rank" value="User" readonly disabled><br>
							<select class="form-control" id="Gender" name="gender" disabled>
								<option value="NULL" >Select One</option>
								<option value="Male"  selected >Male</option>
								<option value="Female" >Female</option>
								<option value="Other" >Other</option>
							</select><br>
							<input class="form-control" id="Password" type="password" name="password" value="*********" disabled>
							<button type="button" data-toggle="modal" data-target="#ChangePassword" style="display: inline-block; height: 30px; margin-bottom: 4px; margin-top: 2px;" class="btn btn-primary btn-sm">Change Password</button><br><br>
						</div>
					</div>
					<div class="col-md-4">
						<div class="profile-labels">
							<label class="control-label">Birthday</label><br><br>
						</div>
						<div class="profile-inputs">
							<input class="form-control" id="DOB" type="date" name="dob" value="1996-05-23" disabled><br><br>
						</div>
					</div>
					<br>
				</div>

				<input class="form-control" id="UserID" type="text" name="uid" value="100" hidden>
				<div class="row">
			        <div class="col-md-4 col-sm-4">
				        <div class="profile-labels">
					        <label class="control-label" >Groups</label>
				        </div>
				        <div class="profile-inputs">
                            None
                        </div>
				    </div>
                    <div class="col-md-4 col-sm-4">
		                <div class="profile-labels">
			                <label class="control-label" >Tel. Numbers</label>
		                </div>
		                <div class="profile-inputs" id="pn-container">
			                <div>
                                <input class="form-control" style="display: none;" type="number" value="" name="phone_id[]">
                                <input id="phone_number0" disabled type="text" class="form-control phone-numbers" name="phone_number[]" value="8594453880">
                                <button type="button" style="display: none; height: 30px; margin-bottom: 4px;" data-id="0"class="deletePN btn btn-danger btn-sm">
                                    <i class="fas fa-minus"></i>
					            </button>
                            </div>
                        </div>
		                <button type="button" style="display: none" id="addPhoneNumber" name="addPhoneNumber" class="btn btn-success btn-sm">Add Number</button>
	                </div>
                </div>
                <br>
				<div class="row">

                    <div class="col-md-3 col-sm-3">
                        <div class="profile-labels">
                            <label class="control-label" >Address</label>
                        </div>
                        <div class="profile-inputs">
                            <input class="form-control" id="Address" type="text" name="address" maxlength="65" value=" 2519 Towering Ridge Lane" disabled>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="profile-labels">
                            <label class="control-label" >City</label>
                        </div>
                        <div class="profile-inputs">
                            <input class="form-control" id="City" type="text" name="city" maxlength="50" value="Florence" disabled>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="profile-labels">
                            <label class="control-label" >State</label><br>
                        </div>
                        <div class="profile-inputs">
                            <select class="form-control" id="State" name="state" disabled style="width: 178px;">
                                <option value="NU" >Select One</option>
                                <option value="AL" >Alabama</option>
                                <option value="AK" >Alaska</option>
                                <option value="AZ" >Arizona</option>
                                <option value="AR" >Arkansas</option>
                                <option value="CA" >California</option>
                                <option value="CO" >Colorado</option>
                                <option value="CT" >Connecticut</option>
                                <option value="DE" >Delaware</option>
                                <option value="DC" >District Of Columbia</option>
                                <option value="FL" >Florida</option>
                                <option value="GA" >Georgia</option>
                                <option value="HI" >Hawaii</option>
                                <option value="ID" >Idaho</option>
                                <option value="IL" >Illinois</option>
                                <option value="IN" >Indiana</option>
                                <option value="IA" >Iowa</option>
                                <option value="KS" >Kansas</option>
                                <option value="KY"  selected >Kentucky</option>
                                <option value="LA" >Louisiana</option>
                                <option value="ME" >Maine</option>
                                <option value="MD" >Maryland</option>
                                <option value="MA" >Massachusetts</option>
                                <option value="MI" >Michigan</option>
                                <option value="MN" >Minnesota</option>
                                <option value="MS" >Mississippi</option>
                                <option value="MO" >Missouri</option>
                                <option value="MT" >Montana</option>
                                <option value="NE" >Nebraska</option>
                                <option value="NV" >Nevada</option>
                                <option value="NH" >New Hampshire</option>
                                <option value="NJ" >New Jersey</option>
                                <option value="NM" >New Mexico</option>
                                <option value="NY" >New York</option>
                                <option value="NC" >North Carolina</option>
                                <option value="ND" >North Dakota</option>
                                <option value="OH" >Ohio</option>
                                <option value="OK" >Oklahoma</option>
                                <option value="OR" >Oregon</option>
                                <option value="PA" >Pennsylvania</option>
                                <option value="RI" >Rhode Island</option>
                                <option value="SC" >South Carolina</option>
                                <option value="SD" >South Dakota</option>
                                <option value="TN" >Tennessee</option>
                                <option value="TX" >Texas</option>
                                <option value="UT" >Utah</option>
                                <option value="VT" >Vermont</option>
                                <option value="VA" >Virginia</option>
                                <option value="WA" >Washington</option>
                                <option value="WV" >West Virginia</option>
                                <option value="WI" >Wisconsin</option>
                                <option value="WY" >Wyoming</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <div class="profile-labels">
                            <label class="control-label" >Zip</label>
                        </div>
                        <div class="profile-inputs">
                            <input class="form-control" id="Zip" type="text" name="zip" maxlength="5" value="41042" disabled>
                        </div>
                    </div>
                </div>
				<br>
				<h3 id="SoftSkilHead">Software Skills</h3>
				<hr>
				<div class="software-skills-bank">
					<label>Skill Bank</label>
				    <select multiple="multiple" id='lstBoxSoftware1' class="form-control" disabled>
						<option value="5">Ruby</option><option value="43">C#</option><option value="9">Perl</option><option value="10">Graphics</option><option value="13">.NET</option><option value="14">Visual Basic</option><option value="15">Prolog</option><option value="16">Animation</option><option value="17">R</option><option value="18">Swift</option><option value="47">Assembly</option><option value="20">Pascal</option><option value="21">Go</option><option value="25">Objective-C</option><option value="27">MATLAB</option><option value="28">SAS</option><option value="29">Scratch</option><option value="30">Cloud Computing</option><option value="32">Enterprise Systems</option><option value="33">Android</option><option value="34">IOS/MAC OS X</option><option value="35">Windows</option><option value="36">Linux</option>				  </select>
				</div>
				<div class="software-skills-arrows text-center">
				    <input type="button" id="SoftwarebtnAllRight" value=">>" class="btn btn-default" disabled/><br />
				    <input type="button" id="SoftwarebtnRight" value=">" class="btn btn-default" disabled/><br />
				    <input type="button" id="SoftwarebtnLeft" value="<" class="btn btn-default" disabled/><br />
				    <input type="button" id="SoftwarebtnAllLeft" value="<<" class="btn btn-default" disabled/>
				</div>
				<div class="software-skills-personal">
					<label>Your Skills</label>
				    <select multiple="multiple" name="personalss[]" id='lstBoxSoftware2' class="form-control" disabled>
						<option value="42">C</option><option value="1">C++</option><option value="37">Client/Server</option><option value="24">CSS</option><option value="23">HTML</option><option value="6">Java</option><option value="11">Javascript</option><option value="31">Microsoft Office</option><option value="46">PHP</option><option value="3">Python</option><option value="12">SQL</option><option value="26">Shell</option><option value="22">Web Design</option>				  </select>
				</div>
				<div class="clearfix">

                </div>
				<br>

				<h3 id="HardSkilHead">Hardware Skills</h3>
				<hr>
				<div class="hardware-skills-bank">
					<label>Skill Bank</label>
				    <select multiple="multiple" id='lstBoxHardware1' class="form-control" disabled>
						<option value="1">Computer Assembly</option>
                        <option value="2">Computer Maintenance</option>
                        <option value="4">Printer & Cartage Refilling</option>
                        <option value="5">Operation Monitoring</option>
                        <option value="6">Network Processing</option>
                        <option value="7">Disaster Recovery</option>
                        <option value="8">Circuit Design Knowledge</option>
                        <option value="9">Systems Analysis</option>
                        <option value="10">Installing Applications</option>
                        <option value="11">Installing Components & Driver</option>
                        <option value="12">Backup Management, Reporting &</option>
                    </select>
				</div>
				<div class="hardware-skills-arrows text-center">
				    <input type="button" id="HardwarebtnAllRight" value=">>" class="btn btn-default" disabled/><br />
				    <input type="button" id="HardwarebtnRight" value=">" class="btn btn-default" disabled/><br />
				    <input type="button" id="HardwarebtnLeft" value="<" class="btn btn-default" disabled/><br />
				    <input type="button" id="HardwarebtnAllLeft" value="<<" class="btn btn-default" disabled/>
				</div>
				<div class="hardware-skills-personal">
					<label>Your Skills</label>
				    <select multiple="multiple" id='lstBoxHardware2' name="personalhs[]" class="form-control" disabled>
						<option value="15">Troubleshooting</option>				  </select>
				</div>
				<div class="clearfix"></div>
				    <br>
				    <input id="SubmitProfile" type="submit" name="Save" value="Save" class="btn btn-success" style="float:right;" disabled>
				    <button id="EditProfile" type="button" name="editprofile" class="btn btn-primary" style="float:right;margin-right:5px;">Edit</button>
				    <input type="text" name="orgin" value="0" style="display:none;">
				    <input type="text" id="UserLevel"name="level" value="3" style="display:none;">
                </div>
            </form>
		</div>
		<div style="padding-top:5rem;"></div>
	</body>

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

	 <div id="ChangePassword" class="modal fade" role="dialog">
	     <!-- Modal content -->
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Change Password</h4>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>
	            <form id="ChangePasswordForm" name="ChangePasswordFormForm" action="../../change_password_change_password_controller.php" method="post">
	                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label"  for="oldPassword">Old Password</label><br><br />
                            </div>
                            <div class="col-md-4">
								 <input class="form-control" type="text" name="oldPassword" value="">
                            </div>
                        </div>
						<hr>
						<div class="row">
						 	<div class="col-md-4">
								<label class="control-label" for="newPassword">New Password</label><br><br><br>
								<label class="control-label" for="confirmPassword">Confirm Password</label>
						 	</div>
							<div class="col-md-4">
								<input class="form-control" type="text" name="newPassword" value=""><br><br>
								<input class="form-control" type="text" name="confirmPassword" value="">
							</div>
						 </div>
	                </div>
	                <div class="modal-footer">
	                    <input hidden type="number" id="UID" name="UID" value="100">
	                    <input class="btn btn-success" id="Submit" type="submit" name="submit" value="Confirm">
                        <button type="button" name="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	                </div>
	            </form>
	        </div>
	    </div>
     </div>
</html>

<script>
$('.deletePN').on('click', function(){
    console.log('hi');
    let id = $(this).data('id');

		$('#phone_number' + id).css("display", "none");
		$('#phone_number' + id).val('delete');
		$(this).css("display", "none");
	});
	$('#addPhoneNumber').on('click', function() {
        let inputs = $('#pn-container').find($("input"));
		let new_id_num = (inputs.length / 2);
		$('#pn-container').append('<div><input style="display: none;" type="number" value="-1" name="phone_id[]">');
		$("#pn-container").append('<input id="phone_number' + new_id_num + '" type="number" class="phone-numbers" name="phone_number[]" value="New Number"> <button type="button" style="display: inline; height: 30px; margin-bottom: 4px;" data-id="' + new_id_num + '" class="deletePN btn btn-danger btn-sm"><i class="fas fa-minus"></i></button></div>');

		$('.deletePN').on('click', function(){
            console.log('hi');
            let id = $(this).data('id');

			$('#phone_number' + id).css("display", "none");
			$('#phone_number' + id).val('delete');
			$(this).css("display", "none");
		});
	});
	$("#EditProfile").on('click', function() {
        $("#ProfilePhoto").css("display", "inline-block");
        $('#addPhoneNumber').css("display", "block");
        $('.deletePN').css("display", "inline");
        $('.phone-numbers').removeAttr("disabled");
        document.getElementById("ProfilePhoto").disabled = false;
        document.getElementById("EditProfile").disabled = true;
        document.getElementById("SubmitProfile").disabled = false;
        document.getElementById("FirstName").disabled = false;
        document.getElementById("LastName").disabled = false;
        document.getElementById("Gender").disabled = false;
        document.getElementById("Email").disabled = false;
        document.getElementById("DOB").disabled = false;
        document.getElementById("lstBoxSoftware1").disabled = false;
        document.getElementById("SoftwarebtnAllRight").disabled = false;
        document.getElementById("SoftwarebtnRight").disabled = false;
        document.getElementById("SoftwarebtnLeft").disabled = false;
        document.getElementById("SoftwarebtnAllLeft").disabled = false;
        document.getElementById("lstBoxSoftware2").disabled = false;
        document.getElementById("lstBoxHardware1").disabled = false;
        document.getElementById("HardwarebtnAllRight").disabled = false;
        document.getElementById("HardwarebtnRight").disabled = false;
        document.getElementById("HardwarebtnLeft").disabled = false;
        document.getElementById("HardwarebtnAllLeft").disabled = false;
        document.getElementById("lstBoxHardware2").disabled = false;
        document.getElementById("Address").disabled = false;
        document.getElementById("City").disabled = false;
        document.getElementById("State").disabled = false;
        document.getElementById("Zip").disabled = false;
    });
	$("#SubmitProfile").on('click', function() {
        var ssSelect = document.getElementById("lstBoxSoftware2");
        for (var i = 0; i < ssSelect.options.length; i++)
         ssSelect.options[i].selected = true;

		var hsSelect = document.getElementById("lstBoxHardware2");
    for (var i = 0; i < hsSelect.options.length; i++)
         hsSelect.options[i].selected = true;
	});

	(function () {
        $('#SoftwarebtnRight').click(function (e) {
            var selectedOpts = $('#lstBoxSoftware1 option:selected');
            if (selectedOpts.length == 0) {
                alert("Nothing to move.");
                e.preventDefault();
            }
            $('#lstBoxSoftware2').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            e.preventDefault();
        });
        $('#HardwarebtnRight').click(function (e) {
            var selectedOpts = $('#lstBoxHardware1 option:selected');
            if (selectedOpts.length == 0) {
                alert("Nothing to move.");
                e.preventDefault();
            }
            $('#lstBoxHardware2').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            e.preventDefault();
        });

        $('#SoftwarebtnAllRight').click(function (e) {
            var selectedOpts = $('#lstBoxSoftware1 option');
            if (selectedOpts.length == 0) {
                alert("Nothing to move.");
                e.preventDefault();
            }
            $('#lstBoxSoftware2').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            e.preventDefault();
        });
        $('#HardwarebtnAllRight').click(function (e) {
            var selectedOpts = $('#lstBoxHardware1 option');
            if (selectedOpts.length == 0) {
                alert("Nothing to move.");
                e.preventDefault();
            }
            $('#lstBoxHardware2').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            e.preventDefault();
        });

        $('#SoftwarebtnLeft').click(function (e) {
            var selectedOpts = $('#lstBoxSoftware2 option:selected');
            if (selectedOpts.length == 0) {
                alert("Nothing to move.");
                e.preventDefault();
            }
            $('#lstBoxSoftware1').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            e.preventDefault();
        });
        $('#HardwarebtnLeft').click(function (e) {
            var selectedOpts = $('#lstBoxHardware2 option:selected');
            if (selectedOpts.length == 0) {
                alert("Nothing to move.");
                e.preventDefault();
            }
            $('#lstBoxHardware1').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            e.preventDefault();
        });

        $('#SoftwarebtnAllLeft').click(function (e) {
            var selectedOpts = $('#lstBoxSoftware2 option');
            if (selectedOpts.length == 0) {
                alert("Nothing to move.");
                e.preventDefault();
            }
            $('#lstBoxSoftware1').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            e.preventDefault();
        });
        $('#HardwarebtnAllLeft').click(function (e) {
            var selectedOpts = $('#lstBoxHardware2 option');
            if (selectedOpts.length == 0) {
                alert("Nothing to move.");
                e.preventDefault();
            }
            $('#lstBoxHardware1').append($(selectedOpts).clone());
            $(selectedOpts).remove();
            e.preventDefault();
        });
    }(jQuery));
</script>