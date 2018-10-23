<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

	<?php if ( have_posts() ) : ?>

<section

class="page-header imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
  id="header"
>
<div class="container">
    <div class="row">
    	<div class="col-lg-10 col-md-10">
			<h1><?php printf(
			/* translators:*/
			esc_html__( 'Search Results for: %s', 'understrap' ),
			'<span><span style="color:#ef0d33">&#8220;</span>' . get_search_query() . '<span style="color:#ef0d33">&#8221;</span></span>' ); ?></h1>
			</div>
		</div>
		</div>

</section><!-- .page-header -->

<?php endif; ?>

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->

			<main class="site-main" id="main" style="width:100%;">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'search' );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->

	</div><!-- .row -->

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
