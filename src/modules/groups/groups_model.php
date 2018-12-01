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
function getInnerGroupMembers($uid){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT user.UID, user.first_name, user.last_name, user.Email, group_members.leader FROM user INNER JOIN group_members ON user.uid=group_members.uid WHERE group_members.group_id=$uid ORDER BY leader DESC;";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch(Exception $e){
        return $e;
    }
}

function getAllUsers(){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT * FROM user ORDER BY first_name";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch( Exception $e){
        return $e;
    }
}

function addGroup($newGroup){
    try{
        $base = Connector::getDatabase();
        $sql = "INSERT INTO groups (name) VALUES ('$newGroup')";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    }catch( Exception $e){
        return $e;
    }
}

function addUserToGroup($uid,$gid, $isLeader){
    try{
        $base = Connector::getDatabase();
        $sql = "INSERT INTO group_members (group_id, uid, leader) VALUES('$gid', '$uid', '$isLeader')";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    }catch( Exception $e){
        return $e;
    }
}

function removeUser($uid, $gid){
    try {
        $base = Connector::getDatabase();
        $sql = "DELETE FROM group_members WHERE uid = '$uid' AND group_id = '$gid'";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        return $e;
    }
}

function changeLeader($uid,$gid,$isLeader){
    try {
        $base = Connector::getDatabase();
        if($isLeader == 1){
            echo "is a leader";
            try{
                $sql = "UPDATE group_members SET leader = 0 WHERE group_id='$gid' AND uid='$uid'";
                $stmt = $base->prepare($sql);
                $stmt->execute();
            }catch( Exception $e){
                echo $e;
                return $e;
            }
        }
        else{
            echo "is a not a leader";

            try{
                $sql2 = "UPDATE group_members SET leader = 1 WHERE group_id='$gid' AND uid='$uid'";
                $stmt2 = $base->prepare($sql2);
                $stmt2->execute();
            }catch( Exception $e){
                echo $e;
                return $e;
            }
        }
    } catch (Exception $e) {
        echo $e;
        return $e;
    }
}

function removeCurrentGroup($gid){
    try {
        $base = Connector::getDatabase();
        $sql = "DELETE FROM group_members WHERE group_id = '$gid'";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $sql = "DELETE FROM groups WHERE UID = '$gid'";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        return $e;
    }

}
