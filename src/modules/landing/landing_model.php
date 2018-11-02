<?php

/**
 *
 *
 */
class LandingModel {

  private $username;
  private $userid;

  private $youtube_video;
  private $google_map;
  private $phone_alerts;

  public function __construct($userid)
  {
    $this->userid = $userid;
    $this->username = "Stephen";
  }

  public function get_username()
  {
    return $this->username;;
  }

  public function get_youtube_video()
  {
    $filepath = "youtube_video_0.php";
    return $filepath;
  }
}

$model = new LandingModel($userid);
include 'landing_view.php';

?>
