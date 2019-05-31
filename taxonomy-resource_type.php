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
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <h1><?php single_term_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="wrapper blog-feed" id="index-wrapper">
	<div class="container" id="content">

		<div class="row">

	<?php
	
	
	
	while ( have_posts() ) : the_post(); 
	
	//get_template_part( 'loop-templates/content-resource', get_post_format() );
	
	endwhile; // end of the loop. ?>
			<form id="filters" action="#" style="display:none;">
					<?php 
					// to make it simple I use default categories
					$term_slug = get_query_var( 'term' );
					$taxonomyName = get_query_var( 'taxonomy' );
					$current_term = get_term_by( 'slug', $term_slug, $taxonomyName );
					echo '<select id="select" name="categoryfilter" class="select__filter">';
								echo '<option value="' . $current_term->term_id . '">' . $current_term->name . '</option>'; // ID of the category as the value of an option
							echo '</select>';
						?>
						<!-- required hidden field for admin-ajax.php -->
						<input type="hidden" name="action" value="filter" />
					</form>
						<div class="row" id="posts_wrap">
							
							</div>

				<?php
										$the_query = new WP_Query( array(
											'post_type' => 'resource',
											'tax_query' => array(
													array (
															'taxonomy' => 'resource_type',
															'field' => 'slug',
															'terms' => 'media',
													)
											),
										) );

										$term_slug = get_query_var( 'term' );
										$taxonomyName = get_query_var( 'taxonomy' );
										$current_term = get_term_by( 'slug', $term_slug, $taxonomyName );
										//print_r($term_slug);
										//print_r($taxonomyName); 
										//print_r($current_term);
									// don't display the button if there are not enough posts
					if (  $the_query->max_num_pages > 1 )
						echo '<div class="text-center w-100"><div id="loadmore" class="loadmore btn btn--solid" style="margin:auto;">More posts</div>'; // you can use <a> as well
						?>

		</div><!-- .row end -->
		

	</div><!-- .container end -->
</section>

<script>

function animateIn(){

	let masterTimeline = new TimelineMax();

	const t1 = new TimelineMax();

	t1Setup(t1);

	masterTimeline.add(t1);

};

function t1Setup(t1){

	t1

	.set('.navbar__navigation',{
		opacity:0,
	})

	.set('.page-header',{
		backgroundColor:'#000'
	})


	.set('.dropdown',{
		opacity:0,
	})

	.set('#site-logo',{
		opacity:0,
	})

	.to('.navbar__inner--after',0.6,{
		width:'100%',
		ease: Power1.easeInOut

	})

	.to('#site-logo',0.6,{
		opacity:1,
	},)

	.to('.navbar__navigation',0.6,{
		opacity:1,
	},'-=0.6')

	.to('.navbar__upper', 0.6,{
		opacity:1,
	}, '-=0.6')

	.to('.dropdown',0.6,{
		opacity:1,
	},'-=0.6')

}

jQuery(document).ready(() => {
	animateIn();
});

</script>

<?php get_footer(); ?>
