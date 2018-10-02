<?php // SETUP UP FOR EACH BLOCK REPEATER FIELD

$blockSetup = get_sub_field('block_setup');

  $space = $blockSetup['space'];
  $background = $blockSetup['block_background'];
  $flipLayout = $blockSetup['flip_layout'];

  $backgroundImage = $blockSetup['background_image'];

  $image = $backgroundImage['background_image'];
  $imageOverlay = $backgroundImage['image_overlay'];
  $backgroundEffect = $backgroundImage['background_effect'];
  $invertColours = $backgroundImage['invert_colours'];

  $blockid = $blockSetup['id'];
  $hideBlock = $blockSetup['hide_block'];

?>

<section

  class="bg--<?php echo $background ?> space--<?php echo $space ?> bg-effect--<?php echo $backgroundEffect ?> <?php if( $background == 'image' ): echo 'imagebg'; endif; ?> <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
  <?php if( $background == 'image' ): ?>
    data-overlay="<?php echo $imageOverlay ?>"
  <?php endif; ?>
  <?php if( $blockid ): ?>
    id="<?php echo $blockid ?>"
  <?php endif; ?>
  <?php if( $hideBlock ): ?>
    style="display:none;"
  <?php endif; ?>
>

<?php if( $background == 'image' ):?>
  <?php if($backgroundEffect == 'reveal' ):?>
      <?php

        if( !empty($image) ):

          // vars
          $url = $image['url'];
          $alt = $image['alt'];
        ?>


      <div class="wrapper contain">
      <!-- This div handle the background color -->
      <div class="mask-bg-color full-size bg--image">
        <div class="background-image-holder">
          <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
        </div>
      </div>
      <!-- This div  wrap all other elements with blend-mode multiply apply -->
      <div class="blend-multiply full-size">	
        <!-- This div handle the background element (could be an image, a video or in that case a gif) -->
        <div class="animated-bg full-size bg--image">
          <div class="background-image-holder">
            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
          </div>
        </div>
            <!-- This div wrap the masked element with blend-mode screen apply and background-color set as #ffffff = white background -->
        <div class="blend-screen element-mask full-size">
          
          <!-- This span display the masked element-->
          <span id="circle" class="circle-follow">
          </span>
        </div>
      </div>
    </div>

    <?php endif; ?>

  <?php else: ?>
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
  <?php endif;?>

<?php endif; ?>
