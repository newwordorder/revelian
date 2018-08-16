<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

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

      <h1 class="page-title">Journal</h1>
      <hr class="short">
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

    </div>
  </div>
</div>



</section>
<div class="wrapper blog-feed" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">




				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<div class="row">

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-6" data-aos="fade-up" data-aos-delay="300">

							<a href="<?php the_permalink(); ?>" class="blog">
								<div class="blog__thumb" data-aos="zoom-out" data-aos-delay="300">

						          <?php
						          $workImage = get_field('background_image_background_image');

						          if( !empty($workImage) ):

						            // vars
						            $url = $workImage['url'];
						            $alt = $workImage['alt'];

						            ?>
						            <div class="background-image-holder" >
						              <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
						            </div>
						          <?php endif; ?>



						      </div>
									<div class="blog__content">
										<h2><?php the_title(); ?></h2>
										<?php the_excerpt(); ?>
									</div>
								</a>


					</div>

					<?php endwhile; ?>

					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>


			<!-- The pagination component -->
			<?php understrap_pagination(); ?>




</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
