<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();

?>

<div
	class="page-header page-header--work imagebg "
	style="padding:0;"
>

	<div data-overlay="5" style="width:100%; height:100%">
		<div class="background-image-holder">
			<img src="<?php echo $bg_image['url']; ?>" />
		</div>
		<div style="width:100%;">
			<div class="container">
				<p class="headingtext" style="padding: 200px 0 100px; z-index:5 !important;">Page Not Found!</p>
			</div>
		</div>
	</div>


</div>

<div class="wrapper blog-feed" id="index-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-10 offset-md-1">
				<h1 style="text-align: center;">404</h1>
				<hr  class="x-gap" style="margin: 33px 0 0 0;"><h2 style="text-align: center;"> We&#8217;re sorry.</h2>
				<h2 style="text-align: center;">The page you are looking for cannot be found.</h2>
			</div>



		</div>

	</div>

</div>


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
