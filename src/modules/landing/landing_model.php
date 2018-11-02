<?php

/**
 *
 *
 */
class LandingModel {

    private $username;
    private $userid;

  public function __construct($userid)
  {
    $this->userid = $userid;
    $this->username = "Stephen";
  }

  public function get_username()
  {
    return $this->username;
  }

}

$model = new LandingModel($userid);
include 'landing_view.php';

?>
