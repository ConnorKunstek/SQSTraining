<?php
/**
 *
 *
 *
 */

include("../../views/header.php"); # HTML header

?>


<div class="container">

  <div id="welcome_message">
    <h1>Welcome <?php echo $model->get_username(); ?>!</h1>
    <p>This website has been created to serve as a sandbox environment for users to test both their
       manual and automated testing strategies.  To begin, press the "Start Testing" button below.</p>
  </div>

  <button type="button" class="btn btn-primary" disabled>Start Testing</button>

  <?php include $model->get_youtube_video(); ?>

</div>

<?php include("../../views/footer.php"); #HTML footer ?>
