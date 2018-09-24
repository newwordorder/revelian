<?php // Slider Block

if( get_row_layout() == 'image_repeater' ):

  $imageRepeater = get_sub_field('image_repeater');
  $spaceBelow = get_sub_field('image_space_below');
  $width = get_sub_field('image_width');

  ?>

  <div><h1>iooioi</h1></div>

    <?php if ($width): ?>

        <?php if( $width == 'full' ): ?>


      
            <div class="slider" data-arrows="true" data-paging="true">
                <ul class="slides">
                    <li>
                        <img alt="<?php echo $alt; ?>" src="<?php echo $url; ?>" />
                    </li>
                </ul>
            </div>

        <?php else: // end full ?>

            <div class="container space-below--<?php echo $spaceBelow ?>">
                <div class="row justify-content-center">
                    <div class="col-md-<?php echo $width; ?>">
                        <div class="slider" data-arrows="true" data-paging="true">
                            <ul class="slides">
                                <li>          
                                    <img alt="<?php echo $alt; ?>" src="<?php echo $url; ?>" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    <?php else: // end full ?>

        <div class="container space-below--md">
            <div class="row justify-content-center">
                <div class="slider" data-arrows="true" data-paging="true">
                    <ul class="slides">
                        <li>

                            <img alt="<?php echo $alt; ?>" src="<?php echo $url; ?>" />
                        </li>
                    </ul>
                </div>
            </div>
            <!--end row-->
        </div>

    <?php endif; ?>

<?php endif; ?>
