<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 10/24/18
 * Time: 7:48 PM
 */

require_once ("../../lib/Connector.php");

session_start();

function verifyUserInfo($data) {

    try {
        $base = Connector::getDatabase();

        $email = $data['email'];
        $password = $data['password'];

        $sql = "SELECT password FROM user WHERE email = '$email';";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result['password'] == $password) {
            $sql = "SELECT UID, first_name, last_name, verified FROM user WHERE email = '$email';";
            $stmt = $base->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            // write a verified check after implementation
        } else {
            errorModel('password');
        }
    } catch (Exception $e) {
        throw ($e);
    }
}

function errorModel($var) {
    if ($var == 'password') {
        $message = header("Invalid password! Please try again.");
    }

    return $message;
}
?>