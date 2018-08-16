<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<footer id="footer">
		<div class="container">

				

</footer>




</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/flickity.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/fontawesome-all.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/parallax.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/typed.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/smooth-scroll.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/aos.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/4.7.1/pixi.min.js"></script>

<?php if(get_the_title() == "Home"): ?>
<script type="text/javascript">
	
	jQuery(document).ready(function($) {
	
		let type = "WebGL"
		if(!PIXI.utils.isWebGLSupported()){
		type = "canvas"
		}


		let header = $('#header');
		let height = header.outerHeight();
		let width = header.width();
		let app = new PIXI.Application();
		

		function setAppSize(width, height){
			app.renderer.resize(width, height);
		}

		setAppSize(width, height);

		app.renderer.backgroundColor = 0x000000;
		
		<?php 
			$backgroundImage_ = get_field('background_image');
			$image_ = $backgroundImage_['background_image'];
			$url_ = $image_['url'];

		?>
		console.log("<?php echo $image_ ?>");
	PIXI.loader.add("<?php echo $url_; ?>");
	PIXI.loader.load(setup);

	function setup() {
	//This code will run when the loader has finished loading the image
		let bg = new PIXI.Sprite(
		PIXI.loader.resources["<?php echo $url_; ?>"].texture
		);
		app.stage.addChild(bg);

		let fg = new PIXI.Sprite(
				PIXI.loader.resources["<?php echo $url_; ?>"].texture
		);

		function setImg(fg, bg){
			fg.width = width;
			fg.height = ((width / 1440) * 924);
			bg.width = width;
			bg.height = ((width / 1440) * 924);

		}

		setImg(fg, bg);

		$( window ).resize(function() {
			width = header.width();
			height = header.outerHeight();
			setAppSize(width, height);
			setImg(fg,bg);
			
		});

		app.stage.addChild(fg);		

		var blurFilter = new PIXI.filters.BlurFilter();
		bg.filters = [blurFilter];

		const p = new PIXI.Graphics();

		let xp = 0;
		let yp = 0;


		let graphics = new PIXI.Graphics();
		let graphics2 = new PIXI.Graphics();

		// Set the fill color
		graphics.beginFill(0xffffff, 1); // Red

		// Draw a circle
		graphics.drawCircle(0,0, 100); // drawCircle(x, y, radius)
		
		// Applies fill to lines and shapes since the last call to beginFill.
		graphics.endFill();

		graphics2.lineStyle(10, 0xffffff);

		graphics2.drawCircle(0,0, 100);

		
		app.stage.addChild(graphics);

		//app.stage.addChild(graphics2);

		fg.mask = graphics;


		graphics2.filters = [blurFilter];

		app.ticker.add(function(delta) {

		var speed = 0.8;
		var delta = 1;

		var dt = speed; // fixed step
		var dt = 1.0 - Math.exp(1.0 - dt, delta); // if you have a delta time in frame.

		let position = graphics.position;
		let position2 = graphics2.position;
		const target = app.renderer.plugins.interaction.mouse.global;
		
		xp += ((target.x - xp)/6);
		yp += ((target.y - yp)/6);


		position.x = xp;
		position.y = yp;	
		position2.x = xp;
		position2.y = yp;
			
		});

	}

		
	document.getElementById("header").appendChild(app.view);
	
	});
  
</script>
<?php endif; ?>

<script>
	AOS.init();

	var toggler = document.querySelector('[data-toggle="menu"]');
	$(toggler).click(function (){toggleMenu(toggler)});

	function toggleMenu(toggler){
		var classList = document.getElementById('expanding-nav').classList;
		if(classList.contains('active-menu')){
			classList.remove('active-menu')
			$('.burger__container').toggleClass('active');
		}else{
			classList.add('active-menu');
			$('.burger__container').toggleClass('active');
		}
	}
		
</script>

</body>

</html>
