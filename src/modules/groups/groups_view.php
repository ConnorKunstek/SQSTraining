<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:07 AM
 */
    require('groups_controller.php');
    include('../../views/header.php');
////    $_SESSION['role'] = "ROLE_SUPERUSER";
////    $_SESSION['role'] = "ROLE_USER";
//    $_SESSION['uid'] = 6;
////    $_SESSION['role'] = "ROLE_RESTRICTED";
//    $_SESSION['role'] = "ROLE_ADMIN";
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
        print_r($allGroups);
        $count = 0;
        foreach($allGroups as $group){
            echo "
                <div class=\"groups\">
                    <div class='row'>
                        <h5 id=\"Group".$group['name']."Namehead\"><u>".$group['name']."</h5>";
            echo "<button onclick=\"injectGroup(this)\" id=\"".$count."\" style=\"display:inline-block;margin-left:20px;\" type=\"button\" name=\"addUserGroup\" class=\"btn btn-sm btn-success\" data-toggle=\"modal\" data-target=\"#addUserGroupModal\" data-group=\"". $group['UID'] ."\">Add User</button>";
            echo "<form action=\"group_operations/remove_group.php\" id=\"RemoveGroup".$count."\" method=\"post\">";
            echo "<input type=\"text\" id=\"Group".$group['name']."\" name=\"group\" value=\"".$group['UID']."\" style=\"display:none;\">";
            echo "<button style=\"display:inline-block;margin-left:10px;\" id=\"removeGroup".$count."\" type=\"submit\" name=\"removeGroup\" class=\"btn btn-sm btn-danger\" data-group=\"".$group['UID']."\">Remove Group</button>";
            echo "</form></div></div>";
        }
    }
    else{
        echo "<h3> NO USER LOGGED IN </h3>";
    }
    ?>
</div>
<?php
    include('../../views/footer.php');
?>

