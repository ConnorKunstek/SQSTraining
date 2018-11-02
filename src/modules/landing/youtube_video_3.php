<?php
/**
 * YouTube video component with invalid URL.
 *
 * @link https://www.youtube.com/watch?time_continue=2&v=UE3pkxPVLiw video source
 * @author Stephen Ritchie <stephenfritchie@gmail.com>
 */
?>

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
          src="https://www.youtube.com/embed/UE3pkxVLiw?autoplay=1&mute=1"
          frameborder="0"
          allow="autoplay; encrypted-media"
          allowfullscreen>
  </iframe>
</div>
