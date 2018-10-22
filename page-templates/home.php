<?php
/**
* Template Name: Home
*
*
* @package understrap
*/

get_header();

$image = get_field('background_image');
$imageOverlay = get_field('image_overlay');

//$backgroundImage = get_field('background_image');

  //$image = $backgroundImage['background_image'];
  $secondaryimage = $backgroundImage['secondary_image'];
  $imageOverlay = $backgroundImage['image_overlay'];
  $backgroundEffect = $backgroundImage['background_effect'];
  $invertColours = $backgroundImage['invert_colours'];
  $headingtext = get_field('headingtext');

?>

<div class="preloader-wrap">
  <svg class="loader_R" viewBox="0 0 140 202" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <g id="r" stroke="none" stroke-width="0.2" fill="none" fill-rule="evenodd">
        <path class="svgpath" d="M139.461538,56.3846154 C139.461538,85.6153846 121.615385,105.615385 91.1538462,111.153846 L137,199.769231 L136.076923,201 L125,201 L79.1538462,112.384615 L13.3076923,112.384615 L13.3076923,201 L1,201 L1,1 L74.5384615,1 C114.846154,1 139.461538,22.5384615 139.461538,56.3846154 Z M13.3076923,101.923077 L76.6923077,101.923077 C107.769231,101.923077 127.153846,83.1538462 127.153846,56.3846154 C127.153846,29.9230769 107.769231,11.7692308 76.6923077,11.7692308 L13.3076923,11.7692308 L13.3076923,101.923077 Z" id="REVELIAN-Copy" stroke="#EA0029"></path>
    </g>
  </svg>

  <div class="loader">
    <div class="trackbar">
      <div class="loadbar"></div>
    </div>
  </div>
</div>

<section

  class="page-header page-header--home bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>"
    data-overlay="0"
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

  <div class="container line-container">
    <div class="line-container--before"></div>
    <div class="line-container--after"></div>

    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">

          <?php echo $headingtext;?>

      </div>
    </div>
  </div>
  <i class="fal fa-arrow-down"></i>



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
        <p class="headingtext"><?php echo $headingtext; ?></p>

    </div>
  </div>
</div>


<?php endif;?>

</section>

<?php get_template_part( 'page-templates/blocks' ); ?>


<script>
  var width = 100,
    perfData = window.performance.timing, // The PerformanceTiming interface represents timing-related performance information for the given page.
    EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
    time = parseInt((EstimatedTime/1000)%60)*100;

    strokedashoffset = 0,


  // Loadbar Animation
  $(".navbar__inner--after").animate({
    width: width + '%'
  }, time);


  // Percentage Increment Animation
  var PercentageID = $("#precent"),
          start = 0,
          end = 100,
          durataion = time;
          animateValue(PercentageID, start, end, durataion);
          
  function animateValue(id, start, end, duration) {
    
      var range = end - start,
        current = start,
        increment = end > start? 1 : -1,
        stepTime = Math.abs(Math.floor(duration / range)),
        obj = $(id);
      
      var timer = setInterval(function() {
          current += increment;
          $(obj).text(current + "%");
        //obj.innerHTML = current;
          if (current == end) {
              clearInterval(timer);
          }
      }, stepTime);
  }

  // Fading Out Loadbar on Finised
  setTimeout(function(){
    $('.preloader-wrap').fadeOut(300);
    animateIn();
  }, time);

  function animateIn(){

      let masterTimeline = new TimelineMax();

      const t1 = new TimelineMax();

      let t2 = new TimelineMax();

      t1Setup(t1);

      t2Setup(t2);


      masterTimeline.add(t1);
      masterTimeline.add(t2, '-=0.6');

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

  function t2Setup(t2){


      t2.set('.line-container--before',{
        opacity:0,
        height:0,
      })
      
      .set('.line-container--after',{
        opacity:0,
        height:0,
        bottom:120,
      })

      .set('canvas', {
        opacity:0,
      })

      .set('h4',{
        opacity:0,
      })

      .set('.headingtext',{
        opacity:0,
      })

      .set('.zoomimg', {
        opacity:0,
      })

      .set('.bg--none',{
        backgroundColor:'#000',
      })

      .set('.fa-arrow-down',{
        opacity:0,
        bottom:'80px'
      })

      .to('h4',0.6, {
        opacity:1,
        ease: Power1.easeInOut
      })

      .to('.headingtext',0.6,{
        opacity:1,
        ease: Power1.easeInOut
      },"-=0.6")


      .to('.line-container--before',0.3,{
        opacity:1,
        height:140,
        ease: Power1.easeInOut
      },'-=0.4')

      .to('.line-container--after',0.3,{
        opacity:1,
        height:140,
        ease: Power1.easeInOut,
        bottom:'-20px',
      }, '-=0.3')

      .to('.fa-arrow-down',0.3,{
        opacity:1,
        bottom:'40px'
      }, '-=0.1')


      .to('canvas',1.2, {
        opacity:1,
        ease: Power1.easeInOut
      }, '-=0.3')

      .to('.zoomimg', 0.8, {
        opacity:1,
        ease:Power1.easeInOut,
      },"-=0.8")

  }

</script>


<?php get_footer(); ?>