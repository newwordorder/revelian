<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div
	class="page-header page-header--work imagebg "
	style="padding:0;"
>

	<div data-overlay="5" style="width:100%;">
		<div class="background-image-holder">
			<img src="<?php echo $bg_image['url']; ?>" />
		</div>
		<div style="width:100%;">
			<div class="container" style="padding: 200px 15px 100px; z-index:5 !important;">
					<?php
						the_archive_title( '<h1>', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
			</div>
		</div>
	</div>


</div>

<div class="wrapper blog-feed" id="index-wrapper">

<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>

				<div class="row" id="posts_row">

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-sm-6 col-lg-4 d-flex">
						<div class="blog-tile">
							<a href="<?php the_permalink(); ?>" class="blog-tile__tile-link">
							</a>


								<?php
								$workImage = get_field('background_image_background_image');

								if( !empty($workImage) ):

								// vars
								$url = $workImage['url'];
								$alt = $workImage['alt'];

								?>
								<a href="<?php the_permalink(); ?>">
							
									<div class="blog-tile__thumb">
										<div class="background-image-holder" style="background-image:url('<?php echo $url; ?>')">
											<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
										</div>
									</div>
								</a>
								<?php endif; ?>


								<div class="blog-tile__content">
									<h5><?php the_title(); ?></h5>
									<a class="btn" href="<?php the_permalink(); ?>">Read</a>
								</div>
						</div>

					</div>

				<?php endwhile; ?>
				</div>

				<div class='row'>
			<?php
				global $wp_query; // you can remove this line if everything works for you

				// don't display the button if there are not enough posts
				if (  $wp_query->max_num_pages > 1 )
					echo '<div id="misha_loadmore" class="btn btn--solid" style="margin:auto;">More posts</div>'; // you can use <a> as well
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
