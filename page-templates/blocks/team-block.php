<?php // TEAM BLOCK

if( get_row_layout() == 'team_block' ):

  $spaceBelow = get_sub_field('space_below');

?>  

  <?php

  // check if the repeater field has rows of data
  if( have_rows('team_block') ): 
  
  ?>


  <?php $counter = 0;?>
    <div class="container space-below--<?php echo $spaceBelow ?>">

      <div class="row">

        <?php	// loop through the rows of data
        while ( have_rows('team_block') ) : the_row(); 
        
        $image = get_sub_field('profile_image');
        $name = get_sub_field('name');
        $position = get_sub_field('position');
        $linkedin = get_sub_field('linkedin_url');
        
        ?>

        <div class="col-lg-4 col-sm-6">
            <div class="row align-items-center">
            <div class="col-5 team">
                <div class="team__image" >
                    <?php

                    if( !empty($image) ):

                        // vars
                        $url = $image['url'];
                        $alt = $image['alt'];

                    ?>

                    <div class="background-image-holder">
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                    </div>
                    <?php endif; ?>

                    </div>
            </div>
            <div class="col-7">
                <h5><?php echo $name; ?></h5>
                <p><?php echo $position; ?></p>
                <?php if ($linkedin): ?>
                <a class="team__link" href="<?php echo $linkedin; ?>"><i class="fab fa-linkedin"></i> Linkedin</a>
                    <?php endif; ?>
            </div>
            </div>
          
          

        </div>
        <?php $counter++; // add one per row ? ?>
      <?php  endwhile; ?>

    </div>
  </div>

<?php else :

  // no rows found

endif;

?>
<?php endif; ?>
