<?php
/**
 * Created by PhpStorm.
 * User: Nick Sladic
 * Date: 11/19/18
 * Time: 20:04
 */

require_once ("../../lib/Connector.php");
session_start();

/**
 * @function:       getGroups
 * @params:         NA
 * @return          array|Exception
 * @Description:    retrieves all the current groups in the database
 *
 */

function getAllUsers(){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT user.UID, user.first_name, user.last_name, user.email FROM user;";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }catch(Exception $e){
        return $e;
    }
}

