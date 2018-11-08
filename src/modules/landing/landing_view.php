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
    <div id="googleMap" style="width:100%;height:400px;"></div>
    <script>
        function myMap() {
            var mapProp= {
                center:new google.maps.LatLng(51.508742,-0.120850),
                zoom:5,
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
    <br>


</div>

<?php include("../../views/footer.php"); #HTML footer ?>
