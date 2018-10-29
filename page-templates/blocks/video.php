<?php // VIDEO BLOCK

if( get_row_layout() == 'video' ):

  $type = get_sub_field('video_type');
  $videoCoverImage = get_sub_field('video_cover_image');
  $videoEmbedCode = get_sub_field('video_embed_code');
  $text = get_sub_field('text');
  $width = get_sub_field('width');
  $spaceBelow = get_sub_field('space_below');

  ?>

  <?php if( $type == 'inline' ): ?>

  <?php if( $width): ?>

    <?php if( $width == 'full' ): ?>

      <?php if($videoEmbedCode):?><?php echo $videoEmbedCode; ?><? endif; ?>


    <?php else: // end full ?>


      <div class="container space-below--<?php echo $spaceBelow ?>">
        <div class="row justify-content-center">
          <div class="col-md-<?php echo $width; ?> d-flex justify-content-center">

            <?php if($videoEmbedCode):?><?php echo $videoEmbedCode; ?><? endif; ?>

          </div>
        </div>
      </div>
    <?php endif; // end $width ?>
      <?php else: ?>
      <div class="container space-below--md">
        <div class="row justify-content-center">
          <div class="col-md-10 d-flex justify-content-center">

            <?php if($videoEmbedCode):?><?php echo $videoEmbedCode; ?><? endif; ?>

          </div>
        </div>
      </div>

       <?php endif; ?>

  <?php endif; // end inline ?>
  <?php if( $type == 'modal' ): ?>
    <div class="container video video-1">
      <div class="row justify-content-center">
        <div class="col-sm-8 modal-video d-flex justify-content-center">
          <?php if($videoEmbedCode):?><?php echo $videoEmbedCode; ?><? endif; ?>
          <!--end of modal instance-->
          <div class="modal-video__text">
            <?php echo $text; ?>
          </div>
        </div>
      </div>
      <!--end of row-->
    </div>
    <!--end of container-->
  <?php endif; // end modal ?>
<?php endif; // end video ?>
