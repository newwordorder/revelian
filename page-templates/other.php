<?php
/**
* Template Name: Other pages
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

          <h1><?php the_title(); ?></h1>
          <hr></hr>
          <p class="headingtext"><?php echo $headingtext; ?></p>

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
        <hr></hr>
        <p class="headingtext"><?php echo $headingtext; ?></p>

    </div>
  </div>
</div>


<?php endif;?>

</section>

<?php get_template_part( 'page-templates/blocks' ); ?>


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