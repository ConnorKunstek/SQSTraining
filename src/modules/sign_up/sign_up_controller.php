<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/9/18
 * Time: 12:38 AM
 */

require_once("sign_up_model.php");
require_once("../../lib/AccountVerification.php");

session_start();

$_SESSION['errorMessage'] = null;

$verification = null;


if(!isset($_POST['hidden'])){
    header("Location: sign_up_view.php");
    exit();
}else{
    sanitized();
    noneMissing();
    passwordsChecked();
    createNewUser();
    header("Location: ../../views/email_verification_page.php");
    exit();
}

//function addUserInfo(){
//    $array = array(
//        'gender' => $_POST['gender'],
//        'dateofbirth' => $_POST['dateofbirth'],
//        'phone_number' => $_POST['phone_number'],
//        'street_number' => $_POST['street_number'],
//        'street_name' => $_POST['street_name'],
//        'city' => $_POST['city'],
//        'state' => $_POST['state'],
//        'zip' => $_POST['zip']
//    );
//    $returned = addInfo($array);
//    if($returned != true){
//        error($returned->getMessage(), 2);
//    }
//}

function createNewUser(){

    $_SESSION['UID'] = null;

    $array = array(
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    );
    $returned = newUser($array);
    if(is_numeric($returned)){
        $_SESSION['UID'] = $returned;
        try {
            $verification = new AccountVerification($array['email']);
            $verification->sendVerification();
            //$verification->sendVerification_TEST();
        }catch(Exception $e){
            error("Error: " . $e);
        }
    }else{
        error("Error: Email already exists. Please sign in." );
    }
}

function passwordsChecked(){
    if($_POST['password'] != $_POST['confirm_password']){
        error("Error: Passwords do not match");
    }
}

function noneMissing(){
    foreach($_POST as $element){
        if(empty($element)){
            error("Error: One or more required fields are empty");
        }
    }
}

function sanitized(){

    $array = array(
        'first_name' => FILTER_SANITIZE_STRING,
        'last_name' => FILTER_SANITIZE_STRING,
        'email' => FILTER_SANITIZE_EMAIL,
        'password' => FILTER_SANITIZE_STRING,
        'confirm_password' => FILTER_SANITIZE_STRING,
        'gender' => FILTER_SANITIZE_STRING
    );

    if(!filter_input_array(INPUT_POST, $array)){
        error("Error: Invalid entry.");
    }
}

function error($message){
    $_SESSION['errorMessage'] = $message;
    header("Location: sign_up_view.php");
    exit();
}
