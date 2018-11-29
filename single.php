<?php
/**
* Post template
*
*
* @package understrap
*/

get_header();

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

          <h1 class="<?php if( $hideTitle == 'yes' ): echo 'd-none'; endif; ?>"><?php the_title(); ?></h1>
          <?php if ($headingtext): ?>
            <p class="headingtext"><?php echo $headingtext; ?></p>
          <?php endif; ?>
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

       <h1><?php the_title(); ?></h1>
       <?php if ($headingtext): ?>
         <p class="headingtext"><?php echo $headingtext; ?></p>
       <?php endif; ?>

    </div>
  </div>
</div>


<?php endif;?>

</section>
<section class="bg--none space--sm">
<div class="container justify-content-center text-center">
  <?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_b4ew"]') ?>
</div>
</section>
<?php get_template_part( 'page-templates/post-blocks' ); ?>
<section class="bg--none space--sm">
<div class="container justify-content-center text-center">
  <?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_b4ew"]') ?>
</div>
</section>

<?php
           // the query
           $the_query = new WP_Query( array(
             'category__in' => wp_get_post_categories( $post->ID ), 
              'posts_per_page' => 3,
              'post__not_in' => array( $post->ID ) 
           ));
        ?>

			<?php if ( $the_query->have_posts() ) : ?>

<section class="related-posts space--lg">
  <div class="container">
    <div class="row">
      <div class="col text-center mb-3">
        <h3>Related posts</h3>
      </div>
    </div>
    <div class="row justify-content-center">
    
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
          <?php endwhile;

// reset post data
wp_reset_postdata();

?>
<?php endif; ?>

			
  </div>

</div>
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