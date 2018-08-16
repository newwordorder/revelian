<?php // VIDEO

if( get_row_layout() == 'video' ):

  $textBlock = get_sub_field('video_text_block');
  $spaceBelow = get_sub_field('video_space_below');
  $video = get_sub_field('video_video');
  ?>



<div class="container flex space-below--<?php echo $spaceBelow ?>">
  <div class="row">
    <div class="col-4 col-md-5">
        <div class="background-image-holder">
            <img alt="image" src="img/landing-3.jpg" />
        </div>
        <div class="modal-instance d-flex">
            <div class="video-play-icon modal-trigger"></div>
            <div class="modal-container">
                <div class="modal-content bg-dark" data-width="60%" data-height="60%">
                    <iframe data-src="<?php echo $video; ?>" allowfullscreen="allowfullscreen"></iframe>
                </div>
                <!--end of modal-content-->
            </div>
            <!--end of modal-container-->
        </div>
        <!--end of modal instance-->
    </div>
    <div class="col-8 col-md-7  d-flex flex-column justify-content-center">
        <?php echo $textBlock; ?>
        <!--end of modal instance-->
    </div>
    <!--end of container-->
  </div>
</div>


<?php endif;

?>
