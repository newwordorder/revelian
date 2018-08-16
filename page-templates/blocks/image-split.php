<?php // Image Split

if( get_row_layout() == 'image_split' ):

  $image_left = get_sub_field('image_split_image_left');
  $image_right = get_sub_field('image_split_image_right');
  $text_left = get_sub_field('image_split_text_left');
  $text_right = get_sub_field('image_split_text_right');


  $spaceBelow = get_sub_field('image_space_below');

  ?>



<div class="container-fluid space-below--<?php echo $spaceBelow ?>">
  <div class="row">
    <div class="col-md-6 px-0 py-7 imagebg zoomimg">
      <div class="background-image-holder">
        <img src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>"/>
      </div>
      <div class="text">
        <?php echo $text_left; ?>
      </div>
        <div class="overlay"></div>
    </div>
    <div class="col-md-6 px-0 py-7 imagebg zoomimg">
    <div class="background-image-holder">
        <img src="<?php echo $image_right['url']; ?>" alt="<?php echo $image_right['alt']; ?>"/>
      </div>
      <div class="text">
        <?php echo $text_right; ?>
        </div>
        <div class="overlay"></div>

    </div>
  </div>
</div>

<?php endif;

?>
