<?php // postSection

if( get_row_layout() == 'post_section' ):

  $spaceBelow = get_sub_field('post_section_space_below');
  ?>

   <div class="container text-center space-below--<?php echo $spaceBelow ?>">
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-10 align-self-center">
             
            <?php

            $key = get_sub_field('post_section_key_field');

            if( $key ): ?>
            <div class="row">
                <?php foreach( $key as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>
                    <div class="col-sm-4" style="margin-top:1em; margin-bottom:1em;">
                     <div style="padding-top:0; padding-bottom: 0.5em;" class="feature-card">
                        <a style='margin-left:0px; margin-right:0px;'  href="<?php the_permalink(); ?>">
                            <?php

                            $bg_image = get_field('background_image');

                            $category = get_field('category');

                            $image = $bg_image['background_image'];

                            if( !empty($image) ):

                            // vars
                            $url = $image['url'];
                            $alt = $image['alt'];

                            // thumbnail
                            $size = '600x600';
                            $thumb = $image['sizes'][ $size ];
                            ?>
                            <div class="image">
                                <div class="background-image-holder" style="background-image:url('<?php echo $url; ?>')">
                                    <img style='margin-left:0px; margin-right:0px;' src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                                </div>
                                <?php if( $category ): ?>
                                    <div class="icon" style="position:absolute; height: 1em; width: 1em; bottom:0; left: 0; background-color:white; display:flex; flex-direction: row; align-items: center; justify-content: center;">
                                        <?php if($category == 'text'): ?>
                                        <i class="fas fa-file" style="font-size:0.5em; color:#ef0d33;"></i>
                                        <?php endif; ?>
                                        <?php if($category == 'event'): ?>
                                        <i class="fas fa-calendar" style="font-size:0.5em; color:#ef0d33"></i>
                                        <?php endif; ?>
                                        <?php if($category == 'video'): ?>
                                        <i class="fas fa-video" style="font-size:0.5em; color:#ef0d33"></i>
                                        <?php endif; ?>
                                        <?php if($category == 'audio'): ?>
                                        <i class="fas fa-microphone" style="font-size:0.5em; color:#ef0d33"></i>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php endif; ?>
                            <div style="display:flex; flex-direction: column; justify-content: space-between; min-height:5em;">
                            <h6 class="mb-0"><?php the_title(); ?></h6>
                            <p><?php the_field(''); ?></p>
                            <button class="btn" style="display:block; padding-left:0.5em; padding-right: 0.5em;text-align:left;">Read</button>
                            </div>
                        </a>
                        </div>
                        </div>

                <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                </div>
            <?php endif; ?>

            </div>
        </div>
        <!--end of row-->
    </div>

<?php endif;
?>

  