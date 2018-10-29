<?php // Image Split

if( get_row_layout() == 'image_split' ):

  $image_left = get_sub_field('image_split_image_left');
  $image_right = get_sub_field('image_split_image_right');
  $text_left = get_sub_field('image_split_text_left');
  $text_right = get_sub_field('image_split_text_right');
  $link_text_right = get_sub_field('image_split_link_text_right');
  $link_text_left = get_sub_field('image_split_link_text_left');
  $link_url_right = get_sub_field('image_split_link_url_right');
  $link_url_left = get_sub_field('image_split_link_url_left');



  $spaceBelow = get_sub_field('image_space_below');

  ?>



<div class="container-fluid space-below--<?php echo $spaceBelow ?>">
  <div class="row">
  
    <div class="col-md-6 px-0 py-7 imagebg zoomimg image-split">
    <a class="image-split__link" href="<?php echo $link_url_left; ?>"></a>
      <div class="background-image-holder">
        <img src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>"/>
      </div>
      <div class="text text-center">
        <?php echo $text_left; ?>
        <a class="image-split__btn" href="<?php echo $link_url_left; ?>"><?php echo $link_text_left; ?></a>
      </div>
        <div class="overlay"></div>
        
    </div>
    
    <div class="col-md-6 px-0 py-7 imagebg zoomimg image-split">
    <a class="image-split__link" href="<?php echo $link_url_right; ?>"></a>
    <div class="background-image-holder">
        <img src="<?php echo $image_right['url']; ?>" alt="<?php echo $image_right['alt']; ?>"/>
      </div>
      <div class="text text-center">
        <?php echo $text_right; ?>
        <a class="image-split__btn" href="<?php echo $link_url_right; ?>"><?php echo $link_text_right; ?></a>
        </div>
        

        <div class="overlay"></div>

    </div>
  </div>
</div>

<?php endif;

?>
