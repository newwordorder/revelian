<?php // BLOG POSTS

if( get_row_layout() == 'blog_posts' ):

  $spaceBelow = get_sub_field('space_below');

  $posts = get_sub_field('posts');

  ?>


<div class="container space-below--<?php echo $spaceBelow ?>">

<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>

<div class="row">

<?php while ( have_posts() ) : the_post(); ?>
    <div class="col-md-6">

        <a href="<?php the_permalink(); ?>" class="blog">
            <div class="blog__thumb">

              <?php
              $image = get_field('background_image_background_image');

              if( !empty($workImage) ):

                // vars
                $url = $image['url'];
                $alt = $image['alt'];

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

</div>


<?php endif; ?>
