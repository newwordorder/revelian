<?php // CLIENT LOGOS

if( get_row_layout() == 'client_logos' ):

  $spaceBelow = get_sub_field('space_below');

  ?>  

  <?php

  // check if the repeater field has rows of data
  if( have_rows('logos') ): 
    
    
    
    ?>


  <?php $counter = 0;?>
    <div class="container space-below--<?php echo $spaceBelow ?>">

      <div class="row justify-content-center">

        <?php	// loop through the rows of data
        while ( have_rows('logos') ) : the_row(); 
        
        $image = get_sub_field('logo');
        
        ?>

        <div class="col-md-2 col-6 client-logos">
          <div class="client-logos__image" >
            

            

            

              <?php if (get_sub_field('url')): ?>

                <a href="<?php the_sub_field('url'); ?>">
                
                    <?php

                    if( !empty($image) ):

                        // vars
                        $url = $image['url'];
                        $alt = $image['alt'];

                    ?>

                    <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                    <?php endif; ?>

                </a>
                
                    <?php else: ?>  
                    
                    <?php

                    if( !empty($image) ):

                        // vars
                        $url = $image['url'];
                        $alt = $image['alt'];

                    ?>
                    <img class="" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                    <?php endif; ?>

              <?php endif; ?>

            

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
