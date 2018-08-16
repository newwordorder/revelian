<?php
/**
* Template Name: Service Page
*
* Template for displaying a page without sidebar even if a sidebar widget is published.
*
* @package understrap
*/

get_header();
?>
<div class="main-container">
  <section class="cover imagebg parallax height-40" data-overlay="4">
    <div class="background-image-holder">
      <?php

      $image = get_field('background_image');

      if( !empty($image) ): ?>

      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>
  </div>
  <div class="container pos-vertical-center">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>
</div>
<section class="content-container">
  <div class="container" id="content">

    <div class="row">

      <div class="col-md-3">

        <h6>Key team members</h6>
        <?php

        $team = get_field('key_team');

        if( $team ): ?>
        <ul class="key-team">
          <?php foreach( $team as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
            <li class="key-team__person">
              <a href="<?php the_permalink(); ?>">
                <?php

                $image = get_field('profile_image');

                if( !empty($image) ):

                  // vars
                  $url = $image['url'];
                  $alt = $image['alt'];

                  // thumbnail
                  $size = '600x600';
                  $thumb = $image['sizes'][ $size ];
                  ?>
                  <img class="key-team__image" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>


                <?php endif; ?>
                <h5 class="mb-0"><?php the_title(); ?></h5>
                <p><?php the_field('position'); ?></p>
              </a>

            </li>
          <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php endif; ?>

    </div>

    <div class="col-md-9 " id="primary">

      <main class="site-main" id="main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>


        <?php endwhile; // end of the loop. ?>

      </main><!-- #main -->

    </div><!-- #primary -->

  </div><!-- .row end -->

</div><!-- .container end -->
</section>


<?php

$projects = get_field('projects');

if( $projects ): ?>
<section class="related-projects">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h3 class="mb-4">Related projects</h3>
      </div>
    </div>
    <div class="row justify-content-center">
      <?php foreach( $projects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
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
      <?php endforeach; ?>
    </div>
  </div>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
</section>
<?php endif; ?>



<?php get_footer(); ?>
