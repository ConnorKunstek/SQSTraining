<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:07 AM
 */
    require('groups_controller.php');
    include('../../views/header.php');
    $_SESSION['role'] = "ROLE_SUPERUSER";
//    $_SESSION['role'] = "ROLE_USER";
    $_SESSION['uid'] = 6;
//    $_SESSION['role'] = "ROLE_RESTRICTED";
//    $_SESSION['role'] = "ROLE_ADMIN";
//    $_SESSION['role'] = "ROLE_SUPERADMIN";
//    print_r($_SESSION);
//    echo $_SESSION['first_name'];
//    echo $_SESSION['role'];
?>
<div class="container">
    <h3 id="GroupHead">My Groups</h3>
    <hr>
    <?php
    if($_SESSION['role'] == "ROLE_USER"){
        $groups = getCurrentGroup($_SESSION['uid']);
        try{
            if(sizeof($groups) > 0){
                foreach($groups as $groupName){
                    echo "<div class=\"my-group-container\">";
                    echo "<h5>" . $groupName['name'] . "</h5>";
                    if($_SESSION['role'] == "ROLE_USER"){
                        $groupMembers = getMyGroupMembers($groupName['UID']);
                        if(sizeof($groupMembers) > 0){
                            try{
                                foreach($groupMembers as $group) {
                                    echo "<span class=\"badge badge-success\">" . $group['first_name'] . " " . $group['last_name'] . " </span><br>";
                                }

                            }catch(Exception $e){
                                return $e;
                            }
                        }
                        echo "</div>";
                    }
                }
            }
        }catch(Exception $e){
            return $e;
        }
        echo "</div>";
    }
    else if($_SESSION['role'] == "ROLE_RESTRICTED") {
        $groups = getCurrentGroup($_SESSION['uid']);
        try {
            if (sizeof($groups) > 0) {
                foreach ($groups as $groupName) {
                    echo "<div class=\"my-group-container\">";
                    echo "<h5>" . $groupName['name'] . "</h5>";
                    echo "</div>";
                }
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    else if($_SESSION['role'] == "ROLE_SUPERUSER" || $_SESSION['role'] == "ROLE_ADMIN" || $_SESSION['role'] == "ROLE_SUPERADMIN"){
        echo "
            <h3 id=\"groupsHead\" style=\"display:inline\">Groups</h3>
          <button style=\"display:inline;margin-left:20px;\" id=\"addgroupBut\" type=\"button\" name=\"addGroup\" class=\"btn btn-sm btn-success\" data-toggle=\"modal\" data-target=\"#addGroupModal\">Add Group</button>
          <hr>
          <div style=\"margin-left:5%;\">
          </div>
        ";
        $allGroups = getAllGroups();
        //renders groups
        if(sizeof($allGroups) > 0){
            foreach($allGroups as $group){
                echo "<div class=\"groups\">
                    <div class='row'>
                        <h5 id=\"Group".$group['name']."Namehead\"><u>".$group['name']."</u></h5>";
                echo "<button onclick=\"injectGroup(this)\" id=\"".$count."\" style=\"display:inline-block;margin-left:20px;\" type=\"button\" name=\"addUserGroup\" class=\"btn btn-sm btn-success\" data-toggle=\"modal\" data-target=\"#addUserGroupModal\" data-group=\"". $group['UID'] ."\">Add User</button>";
                echo "<form action=\"group_operations/remove_group.php\" id=\"RemoveGroup".$count."\" method=\"post\">";
                echo "<input type=\"text\" id=\"Group".$group['name']."\" name=\"group\" value=\"".$group['UID']."\" style=\"display:none;\">";
                echo "<button style=\"display:inline-block;margin-left:10px;\" id=\"removeGroup".$count."\" type=\"submit\" name=\"removeGroup\" class=\"btn btn-sm btn-danger\" data-group=\"".$group['UID']."\">Remove Group</button>";
                echo "</form></div><br>";
                $innerGroups = getInnerGroups($group['UID']);
                $countInner = 0;
                //renders inner groups by groupID
                if(sizeof($innerGroups) > 0){
                    foreach ($innerGroups as $innerGroup) {
                        $leadership = "";
                        if ($innerGroup['leader'] == 1) {
                            $leadership = "(Leader) ";
                        }
                        echo "
                         <div class=\"row\">
                            <div class=\"group-info\">" . $leadership . $innerGroup['first_name'] . " ". $innerGroups[1]['last_name'] . "</div>
                         </div>
                         <div class =\"group-info\">
                         " . $innerGroup['Email'] . "
                         </div>
                         <div class=\"group-btn\">
                           <form action=\"\" id=\"Group".$innerGroup['name'].">UserActions\" method=\"post\">
                            <input 
                            type=\"text\" 
                            id=\"userInput".$countInner."
                            name=\"user\" 
                            value=\"".$innerGroup['UID']."\" 
                            style=\"display:none;\">
                            
                           <input 
                            type=\"text\" 
                            id=\"userInput".$countInner."
                            name=\"user\" 
                            value=\"".$group['UID']."\" 
                            style=\"display:none;\">";
                            if($innerGroup['leader'] == 1){
                                echo "<button type=\"submit\" id=\"Demote".$countInner."\" name=\"button\" class=\"btn btn-sm btn-info\"'>Demote&nbsp;</button>";
                            }
                            else{
                                echo "<button type=\"submit\" id=\"Promote".$countInner."\" name=\"button\" class=\"btn btn-sm btn-info\"'>Promote&nbsp;</button>";
                            }
                            echo"</form>
                            </div>";

                            echo"
                            <div class=\"group-btn\">
                                <form action=\"\" id=\"userFormRemove".$countInner."\" method=\"post\">
                                <input type=\"text\" id=\"userRemoveInput".$countInner."\" name=\"user\" value =\"".$innerGroup['UID']."\" style=\"display:none;\">
                                <input type=\"text\" id=\"groupRemoveInput".$countInner."\" name=\"group\" value =\"".$group['UID']."\" style=\"display:none;\">
                                <button type=\"submit\" id=\"remove".$countInner."\" name=\"button\" class=\"btn btn-sm btn-danger\">Remove</button>
                            </form>
                            </div>";

                            $countInner++;
                    }
                    echo "</div>";
                    $count++;
                }
                else{
                    echo "<h5>No Current Users</h5>";
                }
            }
        }
        else{
            echo "<h5>No Current Groups</h5>";
        }
    }
    else{
        echo "<h3> NO USER LOGGED IN </h3>";
    }
    $users = getUsers();
    echo "<div style=\"padding-top:50px;\"></div>
  <div id=\"addUserGroupModal\" class=\"modal fade\" role=\"dialog\">
      <!-- Modal content -->
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h4 id=\"addUtoGHeader\" class=\"modal-title\">Add User to Group</h4>
            <button type=\"button\" id=\"addUtoGBut\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        </div>
         <form id=\"AddUserModalForm\" name=\"AddUserGroupModalForm\" class=\"\" action=\"group_operations/add_to_group.php\" method=\"post\">
          <div class=\"modal-body\">
            <br>
            Which User? &nbsp;
            <select class=\"form-control\" id=\"dropdownUser\" class=\"user-select\" name=\"user\">
            ";
            foreach($users as $user){
                echo "<option value =\"".$user['UID']."\">".$user['first_name'] . " ". $user['last_name'] . " </option>";
            }
            echo"
            </select><br><br>
            Will they be a Leader? &nbsp;
            <select class=\"form-control\" id=\"dropdownLeader\" class=\"leader-select\" name=\"leader\">
              <option value=\"0\">No</option>
              <option value=\"1\">Yes</option>
            </select>
            <input type=\"text\" id=\"inputGroup\" name=\"group\" value=\"\" hidden>
          </div>
          <div class=\"modal-footer\">
            <input id=\"SubmitUserGroup\" type=\"submit\" name=\"addUserGroupSub\" value=\"Add User\" class=\"btn btn-success\">
          </div>
      </div>
    </div>
  </div>";

    echo "
      <div id=\"addGroupModal\" class=\"modal fade\" role=\"dialog\">
      <!-- Modal content -->
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <h4 id=\"AddGroupHead\" class=\"modal-title\">Add Group</h4>
              <button type=\"button\" id=\"addGExit\" class=\"close\" data-dismiss=\"modal\">&times;</button>
            </div>
            <form id=\"addModalForm\" name=\"addGroupModalForm\" class=\"\" action=\"group_operations/add_group.php\" method=\"post\">
              <div class=\"modal-body\">
                <br>
                Group Name: &nbsp;
                <input class=\"form-control\" id=\"groupNameInput\" type=\"text\" name=\"group_name\" value=\"\"><br>
              </div>
              <div class=\"modal-footer\">
                <input id=\"AddGroup\" type=\"submit\" name=\"addGroupSub\" value=\"Add Group\" class=\"btn btn-success\">
              </div>
            </form>
          </div>
        </div>
      </div>
    ";
    echo "
    <script type=\"text/javascript\">
      function injectGroup(param) {
        let group = $(param).data('group');
        var form = document.forms[\"AddUserGroupModalForm\"];
        form.elements[\"group\"].value = group;
        console.log(group);
      }
    </script>";
    ?>
</div>
<?php
    include('../../views/footer.php');
?>

