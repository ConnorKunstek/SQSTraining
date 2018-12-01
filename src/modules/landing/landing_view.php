<?php
/**
 * View for the landing page
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 */ 

include_once("landing_controller.php");
include_once("../../views/header.php");
?>

<script type="text/javascript">document.title += " Home"</script>

<div class="container">

  <div id="welcome_message">
    <h1>Welcome <?php echo $_SESSION['first_name']; ?></h1>
    <p>This website has been created to serve as a sandbox environment for users to test both their
       manual and automated testing strategies.  To begin, press the "Start Testing" button below.</p>
  </div>

  <button type="button" class="btn btn-primary" disabled>Start Testing</button>

    <!-- YouTube Feature -->
    <?php include (FeatureLoader::getInterface()->getFeature("1234", "youtube_video")); ?>

    <!-- Google Map Feature -->
    <?php include (FeatureLoader::getInterface()->getFeature("1234", "google_map")); ?>

    <br>

</div>

<?php include_once("../../views/footer.php"); #HTML footer ?>
