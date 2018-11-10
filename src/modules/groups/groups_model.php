<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/25/18
 * Time: 12:05 PM
 */


require_once ("../../lib/Connector.php");

session_start();

function getGroups(){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT * FROM groups";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }catch(Exception $e){
        return $e;
    }
}

function getMyGroup($uid){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT groups.UID, groups.name FROM groups INNER JOIN group_members ON groups.UID = group_members.group_id WHERE group_members.uid = $uid";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch(Exception $e){
        return $e;
    }
}

function getMyGroupMembers($uid){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT user.first_name, user.last_name FROM user INNER JOIN group_members ON user.UID = group_members.uid WHERE group_members.group_id = $uid";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch(Exception $e){
        return $e;
    }
}
