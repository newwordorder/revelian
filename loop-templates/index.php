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

	$our_title = get_the_title( get_option('page_for_posts', true) );

?>

<div
	class="page-header page-header--work owl-carousel bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
	style="padding:0;"
>

<?php
	$args = array(
		'posts_per_page' => 3,
		'meta_key' => 'meta-checkbox',
		'meta_value' => 'yes'
	);

	$featured = new WP_Query($args);

if ($featured->have_posts()):?>

	<?php while ($featured->have_posts() ) : $featured->the_post();

		$image = get_field('background_image');
		$bg_image = $image['background_image'];
	?>
	<div data-overlay="5" style="width:100%; height:100%">
		<div class="background-image-holder" style="background-image:url('<?php echo $image['url']; ?>')">
			<img src="<?php echo $bg_image['url']; ?>" />
		</div>
		<div style="width:100%;">
			<div class="_container">
				<p class="headingtext" style="padding: 200px 0 100px; z-index:5 !important;"><?php the_title(); ?></p>
			</div>
		</div>
	</div>
	<?php endwhile; ?>

<?php endif; ?>

</div>

<div class="wrapper blog-feed" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<div class="row">

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-sm-6 col-lg-4">

							<a href="<?php the_permalink(); ?>" class="blog">
								<div class="blog__thumb">

									<?php
									$workImage = get_field('background_image_background_image');

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
									<div class="blog__content">
										<h5><?php the_title(); ?></h5>
										
									</div>
								</a>

					</div>

					<?php endwhile; ?>

							<?php
							global $wp_query; // you can remove this line if everything works for you

							// don't display the button if there are not enough posts
							if (  $wp_query->max_num_pages > 1 )
								echo '<div class="misha_loadmore btn btn--solid" style="margin:auto;">More posts</div>'; // you can use <a> as well
							?>

					</div>

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
