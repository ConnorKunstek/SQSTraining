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