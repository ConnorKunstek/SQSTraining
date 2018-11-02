<?php
/**
 * Created by PhpStorm.
 * User: Stephen
 * Date: 11/1/18
 * Time: 10:29 PM
 */

require_once(__DIR__.'/../config/config.php');


class AccountVerification {

    private $userID;
    private $verificationType;

    public function __construct($id)
    {
        $this->userID = $id;
        $this->verificationType = "email";
    }


    public function sendVerification()
    {

    }

    public function getUserID(){
        return $this->userID;
    }
    public function setUserID($id)
    {
        $this->userID = $id;
    }
}


?>