<?php
/**
 * Resources archive
 * @package understrap
 */

get_header();

	$container   = get_theme_mod( 'understrap_container_type' );

	$our_title = get_the_title( get_option('page_for_posts', true) );

	$image = get_field('background_image');
	$imageOverlay = get_field('image_overlay');

	$backgroundImage = get_field('background_image');

	$image = $backgroundImage['background_image'];
	$secondaryimage = $backgroundImage['secondary_image'];
	$imageOverlay = $backgroundImage['image_overlay'];
	$backgroundEffect = $backgroundImage['background_effect'];
	$invertColours = $backgroundImage['invert_colours'];
	$headingtext = get_field('headingtext');

?>

<section

class="page-header bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
  data-overlay="<?php echo $imageOverlay ?>"
  id="header"
>
<?php if($backgroundEffect != 'reveal' ):?>

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
	<div class="col-lg-10 col-md-10">

		<h1>Resources</h1>


	</div>
  </div>
</div>

<?php else: ?>

<?php

if( !empty($image) ):

// vars
$url = $image['url'];
$alt = $image['alt'];

?>

<?php endif; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-10 col-md-10">

			<h1>Resources</h1>


		</div>
	</div>
</div>


<?php endif;?>

</section>

<div class="wrapper blog-feed" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

				<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php
					?>
					<div class="row dflex justify-content-center my-4">
					<form id="filters" action="#">
					<?php if( $terms = get_terms( 'resource_type', 'orderby=name' ) ) : // to make it simple I use default categories
							echo '<select id="select" name="categoryfilter" class="select__filter"><option>All</option>';
							foreach ( $terms as $term ) :
								echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
							endforeach;
							echo '</select>';
							endif;
						?>
						<i class="fal fa-chevron-down select__chevron"></i>

						<!-- required hidden field for admin-ajax.php -->
						<input type="hidden" name="action" value="filter" />
					</form>
					</div>

					<div class="row" id="posts_wrap">
					</div>

						<?php
						global $wp_query; // you can remove this line if everything works for you

						// don't display the button if there are not enough posts
						if (  $wp_query->max_num_pages > 1 )
							echo '<div class="text-center w-100"><div id="loadmore" class="loadmore btn btn--solid" style="margin:auto;">More posts</div>'; // you can use <a> as well
							?>



				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>


</div><!-- Container end -->

</div><!-- Wrapper end -->

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
