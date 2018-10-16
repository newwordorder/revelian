<?php // PRODUCTS
if( get_row_layout() == 'products' ): 
    
    $columns = get_sub_field('columns_per_row');    
    
    ?>

<div class="container">
<?php $posts = get_sub_field('products'); if( $posts ): ?>
<div class="row">

<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

<?php setup_postdata($post); ?>
<div class="col-md-<?php echo $columns; ?>">
  <div class="project-tile" style="">
    <a href="<?php the_permalink(); ?>">
      <div class="project-tile__image" style="">
        <?php
        $workImage = get_field('tile_image');

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
      <div class="project-tile__content">
        <h5><?php the_title(); ?></h5>
        <p><?php the_field('description'); ?></p>
        <a href="<?php the_permalink(); ?>" class="btn btn--link">Discover</a>
       </div>
       
        
      </a>
    </div>
    </div>
  <?php endforeach; ?>
  </div>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</div>
</div>
<?php endif; ?>