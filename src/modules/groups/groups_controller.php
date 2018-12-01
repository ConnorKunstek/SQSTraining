<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:07 AM
 */
require('groups_model.php');

function getCurrentGroup($uid){
    $result = getMyGroup($uid);
    return $result;
}
function getCurrentGroupMembers($uid){
    $result = getMyGroupMembers($uid);
    return $result;
}
function getAllGroups(){
    $result = getGroups();
    return $result;
}
function getInnerGroups($uid){
    $result = getInnerGroupMembers($uid);
    return $result;
}
function getUsers(){
    $result = getAllUsers();
    return $result;
}
function addNewGroup($group_Name){
    addGroup($group_Name);
}

function addNewUserGroup($user, $group, $leader){
    echo "Called Add New User";
    addUserToGroup($user,$group,$leader);
}
function removeUserFromGroup($user, $group){
    removeUser($user,$group);
}

function demoteLeader($uid,$gid,$isLeader){
    changeLeader($uid,$gid,$isLeader);
}

function promoteLeader($uid,$gid,$isLeader){
    changeLeader($uid,$gid,$isLeader);
}
function removeGroup($gid){
    removeCurrentGroup($gid);
}
if(isset($_POST['group_name'])){
    $groupName = $_POST['group_name'];
    addNewGroup($groupName);
}
else if(isset($_POST['user']) && isset($_POST['group']) && isset($_POST['leader'])){
    $user = ($_POST['user']);
    $groupid = ($_POST['group']);
    $isleader = ($_POST['leader']);
    addNewUserGroup($user, $groupid, $isleader);
}
else if(isset($_POST['user_remove']) && isset($_POST['group_remove'])){
    $uidr = $_POST['user_remove'];
    $gidr = $_POST['group_remove'];
    removeUserFromGroup($uidr, $gidr);
}
else if(isset($_POST['user_p_id']) && isset($_POST['group_p_id']) && isset($_POST['is_leader'])){
    $uid = $_POST['user_p_id'];
    $gid = $_POST['group_p_id'];
    $leader = $_POST['is_leader'];
    if($leader == 1){
        demoteLeader($uid, $gid, $leader);
    }else{
        promoteLeader($uid, $gid, $leader);
    }
}
else if(isset($_POST['groupR'])){
    $groupID = $_POST['groupR'];
    removeGroup($groupID);
}

