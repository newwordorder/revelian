<?php // FEATURE COLUMNS

if( get_row_layout() == 'projects' ):
  ?>

  <div class="project-thumb project-thumb--<?php the_sub_field('tile_size'); ?> hover-element" data-aos="fade-up" data-aos-delay="300">
    <a href="<?php the_permalink(); ?>">
      <div class="hover-element__initial">
        <?php
        $workImage = get_field('background_image_background_image');

        if( !empty($workImage) ):

          // vars
          $url = $workImage['url'];
          $alt = $workImage['alt'];

          ?>
          <div class="background-image-holder">
            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
          </div>
        <?php endif; ?>
      </div>
      <div class="project-thumb__title">
        <h4><?php the_field('client'); ?></h4>
        <p class="lead"><?php the_field('one_liner'); ?></span>
        </div>
        <div class="hover-element__reveal" data-overlay="9">

        </div>
      </a>
    </div>

<?php  if( have_rows('work_tiles') ):?>

<?php while ( have_rows('work_tiles') ) : the_row();?>

<?php $posts = get_sub_field('project'); if( $posts ): ?>

<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

<?php setup_postdata($post); ?>

  <div class="project-thumb project-thumb--<?php the_sub_field('tile_size'); ?> hover-element" data-aos="fade-up" data-aos-delay="300">
    <a href="<?php the_permalink(); ?>">
      <div class="hover-element__initial">
        <?php
        $workImage = get_field('background_image_background_image');

        if( !empty($workImage) ):

          // vars
          $url = $workImage['url'];
          $alt = $workImage['alt'];

          ?>
          <div class="background-image-holder">
            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
          </div>
        <?php endif; ?>
      </div>
      <div class="project-thumb__title">
        <h4><?php the_field('client'); ?></h4>
        <p class="lead"><?php the_field('one_liner'); ?></span>
        </div>
        <div class="hover-element__reveal" data-overlay="9">

        </div>
      </a>
    </div>
  <?php endforeach; ?>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

<?php  endwhile;?>

<?php  else :?>


<?php endif; ?>
<?php endif; ?>
