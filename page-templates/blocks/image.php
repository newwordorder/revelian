<?php // TEXT BLOCK

if( get_row_layout() == 'image' ):

  $image = get_sub_field('image_image');
  $spaceBelow = get_sub_field('image_space_below');

  ?>



<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row justify-content-center">
    <div class="col-md-10">

      <?php

      if( !empty($image) ):

        // vars
        $url = $image['url'];
        $alt = $image['alt'];

       ?>
      <img class="rounded" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
      <?php endif; ?>

    </div>
  </div>
</div>


<?php endif;

?>
