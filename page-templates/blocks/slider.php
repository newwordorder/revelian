<?php // Slider Block

if( get_row_layout() == 'slider' ):

  $imageRepeater = get_sub_field('slider_image_repeater');
  $spaceBelow = get_sub_field('slider_image_space_below');
  $width = get_sub_field('image_width');

  ?>
        <div class="container space-below--md">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                <?php if( have_rows('slider_image_repeater') ): ?>

                    <div class="owl-carousel">
                  
                    <?php while( have_rows('slider_image_repeater') ): the_row(); 

                        // vars
                        $image = get_sub_field('image');

                        ?>
                        <div class="background-image-holder">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"/>
                        </div>
                    <?php endwhile; ?>
        
                    </div>

                    <?php endif; ?>
                </div>
            <!--end row-->
        </div>
        </div>


<?php endif; ?>
