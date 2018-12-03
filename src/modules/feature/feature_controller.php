<?php
/**
 * Created by PhpStorm.
 * User: Nick Sladic
 * Date: 11/19/18
 * Time: 20:04
 */
require_once('feature_model.php');
session_start();

if($_SESSION['role'] == "SUPERUSER" || $_SESSION['role'] == "ADMIN" || $_SESSION['role'] == "SUPERADMIN"){
    if(isset($_POST['apply'])){

    }
    else{
        $users = getAllUsers();
        $_SESSION['users'] = $users;
        header('Location: feature_view.php');

        exit();
    }
}
else{
    header('Loacation: ../landing/landing_controller.php');
    exit();
}