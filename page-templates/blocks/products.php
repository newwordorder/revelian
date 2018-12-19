<?php // PRODUCTS
if( get_row_layout() == 'products' ): 
    
    $columns = get_sub_field('columns_per_row');
    $filters = get_sub_field('include_filters');    
    
?>


<div class="container mixer">

<?php if( $filters == 'yes' ): ?>
    <div class="row justify-content-center">
        <div class="col-12 text-center product-controls">
            <?php
                $all_categories = get_terms( array(
                    'taxonomy' => 'outcome',
                    'hide_empty' => false,
                ) );
            ?>
            <button class="" data-filter="all">All</button>
            <?php foreach($all_categories as $category): ?>
                <button class="" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>    


<?php $posts = get_sub_field('products'); if( $posts ): ?>
<div class="row">

   

<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
    
    <?php
        $terms = get_the_terms($post->ID, 'outcome');
        if ($terms && !is_wp_error($terms)) :
            $outcome_filter_slug = array();
            $outcome_filter_name = array();
            foreach ($terms as $term) {
                $outcome_filter_slug[] = $term->slug;
            }
            foreach ($terms as $term) {
                $outcome_filter_name[] = $term->name;
            }
            $outcome_filter_array = join(", ", $outcome_filter_slug);
            $outcome_filter_class_array = join(" ", $outcome_filter_slug);
            $outcome_filter_assigned_list = join(", ", $outcome_filter_name);
        endif;
    ?>
    

<?php setup_postdata($post); ?>
<?php if(get_post_status() == 'publish'): ?>
<div class="col-md-6 col-lg-<?php echo $columns; ?> mix <?php echo $outcome_filter_class_array; ?> product-flex">
    <div class="product-tile">
            <a href="<?php the_permalink(); ?>"  class="product-tile__link"></a>
            <a href="<?php the_permalink(); ?>">
                <div class="product-tile__image">
                    <?php
                    $workImage = get_field('tile_image');

                    if( !empty($workImage) ):

                    // vars
                    $url = $workImage['url'];
                    $alt = $workImage['alt'];

                    ?>
                    <div class="background-image-holder" style="background-image:url('<?php echo $url; ?>')">
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                    </div>
                    <?php endif; ?>
                </div>
                </a>
                <div class="product-tile__content">
                    <h5><?php the_title(); ?></h5>
                    <p><?php the_field('description'); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn--link">Discover</a>
                </div>
            
                
            </div>
        
    </div>
    <?php else: endif; ?>
  <?php endforeach; ?>
  </div>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</div>
</div>




<?php endif; ?>