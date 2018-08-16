<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];
?>
<?php while ( have_posts() ) : the_post(); ?>
<section

class="page-header page-header--work bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
data-overlay="<?php echo $imageOverlay ?>"
>

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

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-8">

      <h1 class="page-title"><?php the_title(); ?></h1>


    </div>
  </div>
</div>



</section>

<section id="single-wrapper">

	<div class="container" id="content" tabindex="-1">



			<main id="main">



					<?php the_content();

          // check if the flexible content field has rows of data
          if( have_rows('posts_blocks') ):

            // loop through the rows of data
            while ( have_rows('posts_blocks') ) : the_row();



            if( get_row_layout() == 'text_block' ): ?>

            <div class="row justify-content-center">
              <div class="col-md-8">

                <?php  the_sub_field('text_block'); ?>

              </div>
            </div>

          <?php  endif;


            endwhile;

          endif;

          ?>





			</main><!-- #main -->




</div><!-- Container end -->

</section><!-- Wrapper end -->

<section class="related-posts">


</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
