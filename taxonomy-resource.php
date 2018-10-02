<?php
/**
 *  Resource archive
 * @package understrap
 */

get_header();
?>
<div class="main-container">
    <section class="cover imagebg page-header" data-overlay="2">
        <div class="background-image-holder">
          <?php

          $image = get_field('projects_background_image','options');

          if( !empty($image) ): ?>

            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

          <?php endif; ?>
        </div>
        <div class="container pos-vertical-center">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                  <h1><?php the_field('projects_page_title','options'); ?></h1>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="content-container">
	<div class="container" id="content">

		<div class="row">

    <?php while ( have_posts() ) : the_post(); ?>

			<div class="col-md-3">
          <a href="<?php the_permalink(); ?>">
            <?php

            $image = get_field('background_image');

            if( !empty($image) ):

              // vars
              $url = $image['url'];
              $alt = $image['alt'];

              // thumbnail
              $size = '600x600';
              $thumb = $image['sizes'][ $size ];
              ?>
              <img class="project__image" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />


            <?php endif; ?>

            <h4 class="project__name"><?php the_title(); ?></h4>
            <p class="project__client"><?php the_field('client_name'); ?></p>

          </a>



			</div><!-- #primary -->

      <?php endwhile; // end of the loop. ?>

		</div><!-- .row end -->

	</div><!-- .container end -->
</section>

<?php get_footer(); ?>
