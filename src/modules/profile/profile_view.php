<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:08 AM
 */

session_start();

include("../../views/header.php");
?>

<script type="text/javascript">document.title += " Home"</script>

<div class="container">
		<div class="container">
            <?php
            if(!is_null($_SESSION['errorMessage'])){
                $errorMessage = $_SESSION['errorMessage'];
                echo "
                    <div class='alert alert-danger'>
                        $errorMessage
                    </div>
                ";
                $_SESSION['errorMessage'] = null;
            }else{
                if(!is_null($_SESSION['success'])){
                    $message = $_SESSION['success'];
                    echo"
                        <div class='alert alert-success'>
                            $message
                        </div>
                    ";
                }
                $_SESSION['success'] = null;
            }
            ?>
			<form class="form-horizontal" id="saveProfileForm" action="profile_controller.php" method="post" enctype="multipart/form-data">
				<h2 id="PersonInfoHead">Personal Information</h2>
				<hr>
				<h3 style="text-align: center;" id="ProfProgHead">Profile Progress</h3>
				<div class="progress">
                    <div id="userProg" class="progress-bar  progress-bar-striped  bg-success" style="width: <?php echo $_SESSION['progress']?>%" role="progressbar" aria-valuenow="<?php echo $_SESSION['progress'] ?>%" aria-valuemin="0" aria-valuemax="100">
                        <?php echo $_SESSION['progress'];?>%
                    </div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-4">
						<div class="profile-labels">
							<label class="control-label" >Photo&emsp;</label>
						</div>
						<div class="profile-inputs">
							<img src="../../../assets/images/uploads/" alt="Profile Photo" height="175" width="175">&emsp;<br><br>
						</div>
					</div>
					<div class="col-md-4">
<!--						<input class="form-control" type="File" id="ProfilePhoto" style="display:none;" name="profile_photo" value = " " --><?php //if(!$_SESSION['edit']){echo "disabled";}?><!--<br><br>-->
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="profile-labels">
							<label class="control-label">First Name</label><br><br>
							<label class="control-label" style="padding-top: 12px;">Last Name</label><br><br>
							<label class="control-label" style="padding-top: 12px;">Email</label><br><br>
                            <label class="control-label" style="padding-top: 12px;">Password</label><br><br>
						</div>
						<div class="profile-inputs">
                            <input class="form-control" id="FirstName" type="text" name="first_name" maxlength="25" value="<?php echo $_SESSION['first_name']?>" <?php if(!$_SESSION['edit']){echo "disabled";}?>><br>
                            <input class="form-control" id="LastName" type="text" name="last_name" maxlength="25" value="<?php echo $_SESSION['last_name']?>" <?php if(!$_SESSION['edit']){echo "disabled";}?>><br>
							<input class="form-control" id="Email" type="email" name="email" maxlength="30" value="<?php echo $_SESSION['email']?>" disabled><br>
                            <input class="form-control" id="Password" type="password" name="password" value="*********" disabled>
                            <button type="button" data-toggle="modal" data-target="#ChangePassword" style="display: inline-block; height: 30px; margin-bottom: 4px; margin-top: 2px;" class="btn btn-success btn-sm">Change Password</button><br><br>
                        </div>
					</div>
					<div class="col-md-4">
						<div class="profile-labels">
							<label class="control-label">Role</label><br><br>
                            <label class="control-label" style="padding-top: 12px;">Groups</label><br><br>
							<label class="control-label" style="padding-top: 12px;">Gender</label><br><br>
                            <label class="control-label" style="padding-top: 12px;">Birthday</label><br><br>
						</div>
						<div class="profile-inputs">
							<input class="form-control" id="Role" type="text" name="role" value="<?php echo $_SESSION['role']; ?>" readonly disabled><br>
                            <input class="form-control" id="Groups" type = "text" name="groups" value="<?php echo $_SESSION['group'];?>" readonly disabled><br>
							<select class="form-control" id="Gender" name="gender" <?php if(!$_SESSION['edit']){echo "disabled";}?>>
								<option value="NULL" >Select One</option>
								<option value="Male" <?php
                                    if($_SESSION['gender'] == "Male"){
                                        echo "selected>";
                                    }else{echo ">";}?>Male</option>
                                <option value="Female" <?php
                                if($_SESSION['gender'] == "Female"){
                                    echo "selected>";
                                }else{echo ">";}?>Female</option>
								<option value="Other" <?php
                                if($_SESSION['gender'] == "other"){
                                    echo "selected>";
                                }else{echo ">";}?>Other</option>
							</select><br>
                            <input class="form-control" id="DOB" type="date" name="dob" value="<?php echo $_SESSION['dateofbirth'];?>" <?php if(!$_SESSION['edit']){echo "disabled";}?>><br><br>
                        </div>
					</div>
					<div class="col-md-4">
                        <div class="profile-labels">
                            <label class="control-label" style="padding-top: 12px;" >Phone Numbers</label><br>
                        </div>
                        <div class="profile-inputs">

                            <?php
                                $numbers = $_SESSION['numbers'];
                                $counter = 0;
                                $disabled = "disabled><br>";
                                if($_SESSION['edit']){
                                    $disabled = "><button type=\"button\"  id=\"deletePhoneNumber\" name=\"deletePhoneNumber\" class=\"btn btn-success btn-sm\" style=\"display: none; inline-block; height: 30px; margin-bottom: 4px; margin-top: 2px;\">Delete Number</button>";
                                }
                                foreach($numbers as $number){
                                    $id = "phone_number" . $counter;
                                    echo "<input id='$id' type='text' class='form-control phone-numbers' name='phone_number' value='$number[0]' $disabled";
                                    $counter++;
                                }
                                if($_SESSION['edit'] && $counter < 4){
                                    echo "<button type=\"button\"  id=\"addPhoneNumber\" name=\"addPhoneNumber\" class=\"btn btn-success btn-sm\" style=\"display: none; inline-block; height: 30px; margin-bottom: 4px; margin-top: 2px;\">Add Number</button>";
                                }
                            ?>
                        </div>
					</div>
					<br>
				</div>
				<div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="profile-labels">
                            <label class="control-label" >Address</label>
                        </div>
                        <div class="profile-inputs">
                            <input class="form-control" id="Address" type="text" name="address" maxlength="65" value="<?php echo $_SESSION['address'] ?>" <?php if(!$_SESSION['edit']){echo "disabled";}?>>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="profile-labels">
                            <label class="control-label" >City</label>
                        </div>
                        <div class="profile-inputs">
                            <input class="form-control" id="City" type="text" name="city" maxlength="50" value="<?php echo $_SESSION['city'] ?>" <?php if(!$_SESSION['edit']){echo "disabled";}?>>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="profile-labels">
                            <label class="control-label" >State</label><br>
                        </div>
                        <div class="profile-inputs">
                            <select class="form-control" id="State" name="state" <?php if(!$_SESSION['edit']){echo "disabled";}?> style="width: 178px;">
                                <option value="NU" <?php if($_SESSION['state'] == "NU"){echo "selected";} ?>>Select One</option>
                                <option value="AL" <?php if($_SESSION['state'] == "AL"){echo "selected";} ?>>Alabama</option>
                                <option value="AK" <?php if($_SESSION['state'] == "AK"){echo "selected";} ?>>Alaska</option>
                                <option value="AZ" <?php if($_SESSION['state'] == "AZ"){echo "selected";} ?>>Arizona</option>
                                <option value="AR" <?php if($_SESSION['state'] == "AR"){echo "selected";} ?>>Arkansas</option>
                                <option value="CA" <?php if($_SESSION['state'] == "CA"){echo "selected";} ?>>California</option>
                                <option value="CO" <?php if($_SESSION['state'] == "CO"){echo "selected";} ?>>Colorado</option>
                                <option value="CT" <?php if($_SESSION['state'] == "CT"){echo "selected";} ?>>Connecticut</option>
                                <option value="DE" <?php if($_SESSION['state'] == "DE"){echo "selected";} ?>>Delaware</option>
                                <option value="DC" <?php if($_SESSION['state'] == "DC"){echo "selected";} ?>>District Of Columbia</option>
                                <option value="FL" <?php if($_SESSION['state'] == "FL"){echo "selected";} ?>>Florida</option>
                                <option value="GA" <?php if($_SESSION['state'] == "GA"){echo "selected";} ?>>Georgia</option>
                                <option value="HI" <?php if($_SESSION['state'] == "HI"){echo "selected";} ?>>Hawaii</option>
                                <option value="ID" <?php if($_SESSION['state'] == "ID"){echo "selected";} ?>>Idaho</option>
                                <option value="IL" <?php if($_SESSION['state'] == "IL"){echo "selected";} ?>>Illinois</option>
                                <option value="IN" <?php if($_SESSION['state'] == "IN"){echo "selected";} ?>>Indiana</option>
                                <option value="IA" <?php if($_SESSION['state'] == "IA"){echo "selected";} ?>>Iowa</option>
                                <option value="KS" <?php if($_SESSION['state'] == "KS"){echo "selected";} ?>>Kansas</option>
                                <option value="KY" <?php if($_SESSION['state'] == "KY"){echo "selected";} ?>>Kentucky</option>
                                <option value="LA" <?php if($_SESSION['state'] == "LA"){echo "selected";} ?>>Louisiana</option>
                                <option value="ME" <?php if($_SESSION['state'] == "ME"){echo "selected";} ?>>Maine</option>
                                <option value="MD" <?php if($_SESSION['state'] == "MD"){echo "selected";} ?>>Maryland</option>
                                <option value="MA" <?php if($_SESSION['state'] == "MA"){echo "selected";} ?>>Massachusetts</option>
                                <option value="MI" <?php if($_SESSION['state'] == "MI"){echo "selected";} ?>>Michigan</option>
                                <option value="MN" <?php if($_SESSION['state'] == "MN"){echo "selected";} ?>>Minnesota</option>
                                <option value="MS" <?php if($_SESSION['state'] == "MS"){echo "selected";} ?>>Mississippi</option>
                                <option value="MO" <?php if($_SESSION['state'] == "MO"){echo "selected";} ?>>Missouri</option>
                                <option value="MT" <?php if($_SESSION['state'] == "MT"){echo "selected";} ?>>Montana</option>
                                <option value="NE" <?php if($_SESSION['state'] == "NE"){echo "selected";} ?>>Nebraska</option>
                                <option value="NV" <?php if($_SESSION['state'] == "NV"){echo "selected";} ?>>Nevada</option>
                                <option value="NH" <?php if($_SESSION['state'] == "NH"){echo "selected";} ?>>New Hampshire</option>
                                <option value="NJ" <?php if($_SESSION['state'] == "NJ"){echo "selected";} ?>>New Jersey</option>
                                <option value="NM" <?php if($_SESSION['state'] == "NM"){echo "selected";} ?>>New Mexico</option>
                                <option value="NY" <?php if($_SESSION['state'] == "NY"){echo "selected";} ?>>New York</option>
                                <option value="NC" <?php if($_SESSION['state'] == "NC"){echo "selected";} ?>>North Carolina</option>
                                <option value="ND" <?php if($_SESSION['state'] == "ND"){echo "selected";} ?>>North Dakota</option>
                                <option value="OH" <?php if($_SESSION['state'] == "OH"){echo "selected";} ?>>Ohio</option>
                                <option value="OK" <?php if($_SESSION['state'] == "OK"){echo "selected";} ?>>Oklahoma</option>
                                <option value="OR" <?php if($_SESSION['state'] == "OR"){echo "selected";} ?>>Oregon</option>
                                <option value="PA" <?php if($_SESSION['state'] == "PA"){echo "selected";} ?>>Pennsylvania</option>
                                <option value="RI" <?php if($_SESSION['state'] == "RI"){echo "selected";} ?>>Rhode Island</option>
                                <option value="SC" <?php if($_SESSION['state'] == "SC"){echo "selected";} ?>>South Carolina</option>
                                <option value="SD" <?php if($_SESSION['state'] == "SD"){echo "selected";} ?>>South Dakota</option>
                                <option value="TN" <?php if($_SESSION['state'] == "TN"){echo "selected";} ?>>Tennessee</option>
                                <option value="TX" <?php if($_SESSION['state'] == "TX"){echo "selected";} ?>>Texas</option>
                                <option value="UT" <?php if($_SESSION['state'] == "UT"){echo "selected";} ?>>Utah</option>
                                <option value="VT" <?php if($_SESSION['state'] == "VT"){echo "selected";} ?>>Vermont</option>
                                <option value="VA" <?php if($_SESSION['state'] == "VA"){echo "selected";} ?>>Virginia</option>
                                <option value="WA" <?php if($_SESSION['state'] == "WA"){echo "selected";} ?>>Washington</option>
                                <option value="WV" <?php if($_SESSION['state'] == "WV"){echo "selected";} ?>>West Virginia</option>
                                <option value="WI" <?php if($_SESSION['state'] == "WI"){echo "selected";} ?>>Wisconsin</option>
                                <option value="WY" <?php if($_SESSION['state'] == "WY"){echo "selected";} ?>>Wyoming</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <div class="profile-labels">
                            <label class="control-label" >Zip</label>
                        </div>
                        <div class="profile-inputs">
                            <input class="form-control" id="Zip" type="text" name="zip" maxlength="5" value="<?php echo $_SESSION['zip']?>" <?php if(!$_SESSION['edit']){echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
				<br>
				<h3 id="SoftSkilHead">Software Skills</h3>
				<hr>
				<div class="software-skills-bank">
					<label>Skill Bank</label>
				    <select multiple="multiple" id='lstBoxSoftware1' class="form-control" disabled>
						<option value="5">Ruby</option>
                        <option value="43">C#</option>
                        <option value="9">Perl</option>
                        <option value="10">Graphics</option>
                        <option value="13">.NET</option>
                        <option value="14">Visual Basic</option>
                        <option value="15">Prolog</option>
                        <option value="16">Animation</option>
                        <option value="17">R</option>
                        <option value="18">Swift</option>
                        <option value="47">Assembly</option>
                        <option value="20">Pascal</option>
                        <option value="21">Go</option>
                        <option value="25">Objective-C</option>
                        <option value="27">MATLAB</option>
                        <option value="28">SAS</option>
                        <option value="29">Scratch</option>
                        <option value="30">Cloud Computing</option>
                        <option value="32">Enterprise Systems</option>
                        <option value="33">Android</option>
                        <option value="34">IOS/MAC OS X</option>
                        <option value="35">Windows</option>
                        <option value="36">Linux</option>
                    </select>
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
						<option value="42">C</option>
                        <option value="1">C++</option>
                        <option value="37">Client/Server</option>
                        <option value="24">CSS</option>
                        <option value="23">HTML</option>
                        <option value="6">Java</option>
                        <option value="11">Javascript</option>
                        <option value="31">Microsoft Office</option>
                        <option value="46">PHP</option>
                        <option value="3">Python</option>
                        <option value="12">SQL</option>
                        <option value="26">Shell</option>
                        <option value="22">Web Design</option>
                    </select>
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
						<option value="15">Troubleshooting</option>
                    </select>
				</div>
				<div class="clearfix"></div>
				    <br>
				    <input id="SubmitProfile" type="submit" name="Save" value="Save" class="btn btn-success" style="float:right;" <?php if(!$_SESSION['edit']){echo "disabled";}?>>
            </form>
                    <form class="form-horizontal" id="editProfile" action="profile_controller.php" method="post" enctype="multipart/form-data">
				        <input id="EditProfile" type="submit" name="edit" value="Edit" class="btn btn-primary" style="float:right;margin-right:5px;"<?php if($_SESSION['edit']){echo "disabled";}?>>
                    </form>
<!--				    <input type="text" name="orgin" value="0" style="display:none;">-->
<!--				    <input type="text" id="UserLevel"name="level" value="3" style="display:none;">-->
                </div>
		</div>
		<div style="padding-top:5rem;">
        </div>
	</body>

    <?php include("../../views/footer.php"); ?>

	 <div id="ChangePassword" class="modal fade" role="dialog">
	     <!-- Modal content -->
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Change Password</h4>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>
	            <form id="ChangePasswordForm" name="ChangePasswordFormForm" action="../change_password/change_password_controller.php" method="post">
	                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label"  for="oldPassword">Old Password</label><br><br />
                            </div>
                            <div class="col-md-4">
								 <input class="form-control" type="password" name="oldPassword" value="">
                            </div>
                        </div>
						<hr>
						<div class="row">
						 	<div class="col-md-4">
								<label class="control-label" for="newPassword">New Password</label><br><br><br>
								<label class="control-label"  for="confirmPassword">Confirm Password</label>
						 	</div>
							<div class="col-md-4">
								<input class="form-control" type="password" name="newPassword" value=""><br><br>
								<input class="form-control" type="password" name="confirmPassword" value="">
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
    <div id="ResetPassword" class="modal" role="dialog">
        <!-- Modal content -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="ResetPasswordForm" name="ResetPasswordForm" action="../reset_password/reset_password_controller.php" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label" for="email">Email</label><br><br />
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="email">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="modal-footer">
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
        // document.getElementById("ProfilePhoto").disabled = false;
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
