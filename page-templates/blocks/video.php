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
      <?php if($videoEmbedCode):?>
        <div class="row justify-content-center">
          <div class="col-md-<?php echo $width; ?> d-flex  flex-column justify-content-center">

              <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'>
                <?php echo $videoEmbedCode; ?>
              </div>    

            </div>
          </div>
        <? endif; ?>
        <?php if($text):?>
          <div class="row justify-content-center">
            <div class="col-md-8 d-flex  flex-column justify-content-center mt-3">

              <?php echo $text; ?>

            </div>
          </div>
        <? endif; ?>
      </div>
    <?php endif; // end $width ?>
      <?php else: ?>
      <div class="container space-below--md">
        <?php if($videoEmbedCode):?>
          <div class="row justify-content-center">
            <div class="col-md-10 d-flex  flex-column justify-content-center">

            <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'>
                <?php echo $videoEmbedCode; ?>
              </div> 

            </div>
          </div>
        <? endif; ?>
        <?php if($text):?>
          <div class="row justify-content-center">
            <div class="col-md-8 d-flex  flex-column justify-content-center  mt-3">

              <?php echo $text; ?>

            </div>
          </div>
        <? endif; ?>
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
