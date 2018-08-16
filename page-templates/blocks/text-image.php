<?php // TEXT & IMAGE BLOCK

if( get_row_layout() == 'text_image' ):

$textImage = get_sub_field('text_image');

$text = get_sub_field('text_block');

$image = get_sub_field('image');

$flipLayout = get_sub_field('flip_layout');

$spaceBelow = get_sub_field('space_below');


?>

  <div class="container space-below--<?php echo $spaceBelow ?>">

      <div class="row flippable <?php if( $flipLayout == 'yes' ): echo 'flippable--flip'; endif; ?>">
          <div class="col-md-6 flippable__text">
              <?php echo $text ?>
              <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
          </div>
          <div class="col-md-6 flippable__image">
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
