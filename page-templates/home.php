<?php
/**
* Template Name: Home
*
* @package understrap
*/

get_header();

//$image = get_field('background_image');
//$imageOverlay = get_field('image_overlay');

$backgroundImage = get_field('background_image');

  $image = $backgroundImage['background_image'];
  $secondaryimage = $backgroundImage['secondary_image'];
  $imageOverlay = $backgroundImage['image_overlay'];
  $backgroundEffect = $backgroundImage['background_effect'];
  $invertColours = $backgroundImage['invert_colours'];
  $headingtext = get_field('headingtext');

?>

<?php

  if( !empty($image) ):

  	// vars
  	$url = $image['url'];
  	$alt = $image['alt'];

   ?>
<div class="blur-wrapper">
    <div class="blur-pic">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%"
            height="100%" id="imagesvg">
            <filter id="blur-image">
                <feGaussianBlur in="SourceGraphic" stdDeviation="5"></feGaussianBlur>
            </filter>
            <mask id="blur-mask">
                <circle cx="200" cy="200" r="100" fill="white" opacity="1" id="mask-circle"></circle>
            </mask>
            <image xlink:href="<?php echo $url; ?>" width="100%" height="100%" filter="url(#blur-image)" x="0" y="0"
                preserveAspectRatio="xMidYMid slice" />
            <image xlink:href="<?php echo $url; ?>" width="100%" height="100%" mask="url(#blur-mask)" x="0" y="0"
                preserveAspectRatio="xMidYMid slice" />
        </svg>

    </div>
    <div class="container line-container home-text">
        <div class="line-container--before"></div>
        <div class="line-container--after"></div>

        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">

                <?php echo $headingtext;?>

            </div>
        </div>
    </div>
    <i class="fal fa-arrow-down"></i>
</div>

<?php endif; ?>


<?php get_template_part( 'page-templates/blocks' ); ?>



<?php get_footer(); ?>