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
	
	let appContainer = document.getElementById('header');

	window.onload = loaded(appContainer);

function setAppSize(app, width, height){
  app.renderer.resize(width, height);
}


function setImgSize(sprite, width, height, imgSize){
	console.log(imgSize);

	let aspectRatio = (width / height);
	let imageRatio = (imgSize.width / imgSize.height);
	let scaleFactor;
	let offsetX;
	let offsetY;

	if(aspectRatio > imageRatio){
		sprite.width = width;
		scaleFactor = width / imgSize.width;
		sprite.height = scaleFactor * imgSize.height;
		offsetY = (sprite.height - height) / 2;
		console.log('offset');
		sprite.y = 0 - offsetY;
		sprite.x = 0;
	}else{
		sprite.height = height;
		scaleFactor = height / imgSize.height;
		sprite.width = scaleFactor * imgSize.width;
		offsetX = (sprite.width - width) / 2;
		sprite.x = 0 - offsetX;
		sprite.y = 0;

	}
}

function onResize(app, appContainer, sprite, width, height, imgSize){
	console.log('resize');
  width = appContainer.offsetWidth;
  height = appContainer.offsetHeight;
  setAppSize(app, width, height);
  setImgSize(sprite, width, height, imgSize); 
}

function followMouse(app, delta, speed, xp, yp, name){
	var delta = 1;

	speed = 0.8;
	var dt = speed; // fixed step
	var dt = 1.0 - Math.exp(1.0 - dt, delta); // if you have a delta time in frame.

	let position = name.position;
	const target = app.renderer.plugins.interaction.mouse.global;

	console.log(xp);
  
	xp += ((target.x - xp)/6);
	yp += ((target.y - yp)/6);

	position.x = xp;
	position.y = yp;	
}

function makeGraphics(name){
	
  var name = new PIXI.Graphics();

  // Set the fill color
  name.beginFill(0xffffff, 1); // Red

  // Draw a circle
  name.drawCircle(0,0,100,100); // drawCircle(x, y, radius)

  // Applies fill to lines and shapes since the last call to beginFill.
  name.endFill();

  // Add to Stage
  return name

}

async function loaded(appContainer){
  
  let height = appContainer.offsetHeight;
  let width = appContainer.offsetWidth;

  let xp = 0;
  let yp = 0;

  var speed = 0.8;
  
  let app = new PIXI.Application();

  app.renderer.backgroundColor = 0x061639;

  setAppSize(app, width, height);

  <?php 
			$backgroundImage_ = get_field('background_image');
			$image_ = $backgroundImage_['background_image'];
			$url_ = $image_['url'];

		?>

  var sprite = PIXI.Sprite.fromImage('<?php echo $url_; ?>');
  var blurFilter = new PIXI.filters.BlurFilter();
		
  var sprite__clear = PIXI.Sprite.fromImage('<?php echo $url_; ?>');
  sprite.filters = [blurFilter];


  var size = {'width':0,'height':0};

  var imgpromise = new Promise( async function(resolve,reject) {
	  var newimage = new Image();
	  newimage.src = '<?php echo $url_; ?>'; 
	  newimage.onload = async function(){
		  let promise = new Promise((resolve, reject) => {
			  size.width = this.naturalWidth;
			  size.height = this.naturalHeight;
			  resolve();
		  });
		  let wait = await promise;
		  resolve();
		  }
	  });

  var imgSize = await imgpromise;

  console.log(size);

  var imgHeight = sprite.height;
  var imgWidth = sprite.width;

  console.log(imgHeight + " " + imgWidth);

  //Add the Sprite to the Stage

  app.stage.addChild(sprite);
  app.stage.addChild(sprite__clear);


  setImgSize(sprite, width, height, size);
  setImgSize(sprite__clear, width, height, size);

  

  var circle = new PIXI.Graphics();

  // Set the fill color
  circle.beginFill(0xffffff, 1); // Red

  // Draw a circle
  circle.drawCircle(0,0,100,100); // drawCircle(x, y, radius)

  // Applies fill to lines and shapes since the last call to beginFill.
  circle.endFill();


  app.stage.addChild(circle);
 sprite__clear.mask = circle;
	//sprite.mask = circle;

  window.addEventListener('resize', function(){
	  onResize(app, appContainer, sprite, width, height, size);
	  onResize(app, appContainer, sprite__clear, width, height, size);

  }, true);

  var delay = new Promise( function(resolve,reject) {
	setTimeout(() => {
		app.ticker.add(function(delta) {

			var speed = 0.8;
			var delta = 1;

			var dt = speed; // fixed step
			var dt = 1.0 - Math.exp(1.0 - dt, delta); // if you have a delta time in frame.

			let position = circle.position;
			const target = app.renderer.plugins.interaction.mouse.global;
			
			xp += ((target.x - xp)/6);
			yp += ((target.y - yp)/6);

			position.x = xp;
			position.y = yp;	

			
		});
		resolve();
	  },100);

	  });
	
	var wait2 = delay;
  
  appContainer.appendChild(app.view);

}

  
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
