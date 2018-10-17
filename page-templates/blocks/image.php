<?php // TEXT BLOCK

if( get_row_layout() == 'image' ):

  $image = get_sub_field('image_image');
  $spaceBelow = get_sub_field('image_space_below');
  $width = get_sub_field('image_width');

  ?>

  <?php if ($width): ?>

    <?php if( $width == 'full' ): ?>
      <?php

      if( !empty($image) ):

        // vars
        $url = $image['url'];
        $alt = $image['alt'];

      ?>
      <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
      <?php endif; ?>

          <?php else: // end full ?>


          <div class="container space-below--<?php echo $spaceBelow ?>">
            <div class="row justify-content-center">
            <div class="col-md-<?php echo $width; ?>">

                <?php

                if( !empty($image) ):

                  // vars
                  $url = $image['url'];
                  $alt = $image['alt'];
                  $caption = $image['caption'];

                ?>
                <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                <p class="small text-center"><?php echo $caption; ?></p>
                <?php endif; ?>

              </div>
            </div>
          </div>

          <?php endif; ?>

  <?php else: // end full ?>
  

          <div class="container space-below--md">
            <div class="row justify-content-center">
            <div class="col-md-10 justify-content-center">

                <?php

                if( !empty($image) ):

                  // vars
                  $url = $image['url'];
                  $alt = $image['alt'];
                  $caption = $image['caption'];

                ?>
                <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                <p class="small text-center"><?php echo $caption; ?></p>
                <?php endif; ?>

              </div>
            </div>
          </div>
          <?php endif; ?>


<?php endif;

?>
