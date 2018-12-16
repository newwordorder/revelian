<?php // FEATURE

if( get_row_layout() == 'feature' ):

  $textBlock = get_sub_field('feature_text_block');
  $spaceBelow = get_sub_field('feature_space_below');
  $feature_left = get_sub_field('feature_left');

  ?>


    <div class="container space-below--<?php echo $spaceBelow ?> switchable">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-5 offset-md-1 switchable__text <?php if($feature_left == true){ echo "order-md-1";} ?>">
                <div class='my-auto'>
                <?php echo $textBlock; ?>
                </div>
            </div>
            <?php if( have_rows('feature_slides') ): ?>
            <div class=" col-12 col-sm-6 col-md-4 offset-md-1">
                    <div class="slider" data-paging="true">
                        <ul class="slides">
                            <?php while( have_rows('feature_slides') ): the_row();

                                    $text = get_sub_field('text');
                                    $image = get_sub_field('image');

                                    ?>    
                            <li class="col-12">
                                <div class="feature feature-3 text-center  boxed--border box-shadow-wide">
                                    <img src='<?php echo $image['url']; ?>' />
                                    <?php echo $text; ?>
                                </div>
                                <!--end feature-->
                            </li>
                            <?php endwhile; ?>

                        </ul>
                        <!--end of slides-->
                    </div>
                    <!--end of slider-->
            </div>
            <?php endif; ?>
        </div>
        <!--end of row-->
    </div>





<?php endif;
?>