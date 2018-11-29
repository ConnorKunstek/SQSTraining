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
      <?php echo $model->getGoogleMap()['latitude']; ?>
  </div>

  <button type="button" class="btn btn-primary" disabled>Start Testing</button>

    <!-- YouTube Feature -->
    <style>
        .youtube_video {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            margin-top: 5%;
        }
        .video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <div id="youtube_video" class="youtube_video">
        <iframe
                class="video"
                src="https://www.youtube.com/embed/UE3pkxPVLiw?autoplay=1&mute=1"
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen>
        </iframe>
    </div>
    
    <!-- Google Map Feature -->
    <div id="googleMap" class="py-5" style="width:100%;height:400px;"></div>
    <script>
        function myMap() {
            var uluru = {lat: <?php echo $model->getGoogleMap()['latitude']; ?>, lng: <?php echo $model->getGoogleMap()['longitude'];?>};
            var mapProp= {
                center:uluru,
                zoom:<?php echo $model->getGoogleMap()['zoom'];?>,
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_maps_token; ?>&callback=myMap"></script>
    <br>

</div>

<?php include_once("../../views/footer.php"); #HTML footer ?>
