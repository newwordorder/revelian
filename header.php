<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html5>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo bloginfo('template_directory'); ?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo bloginfo('template_directory'); ?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo bloginfo('template_directory'); ?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo bloginfo('template_directory'); ?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo bloginfo('template_directory'); ?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo bloginfo('template_directory'); ?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo bloginfo('template_directory'); ?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo bloginfo('template_directory'); ?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo bloginfo('template_directory'); ?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo bloginfo('template_directory'); ?>/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo bloginfo('template_directory'); ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo bloginfo('template_directory'); ?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo bloginfo('template_directory'); ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo bloginfo('template_directory'); ?>/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo bloginfo('template_directory'); ?>/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NZ55W7');</script>
	<!-- End Google Tag Manager -->

	<script type="text/javascript">
    	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>

	<noscript>
		<style type="text/css">
			#site-logo{
				opacity:1;
			}

			.navbar__navigation{
				opacity:1;
			}

			.navbar__upper{
				opacity:1;
			}

			.dropdown{
				opacity;1;
			}

			h4{
				opacity:1;
			}
			.headingtext{
				opacity:1;
			}
			.line-container--before{
				opacity:1;
				height:140;
			}
			.line-container--after{
				opacity:1;
				height:140;
				bottom:'-20px';
			}
			.fa-arrow-down{
				opacity:1;
				bottom:40px;
			}
			.zoomimg{
				opacity:1;
			}
			
			.navbar__inner--after {
				width: 100%;
			}
			.preloader-wrap{
				display:none;
			}
			.background-image-holder{
				opacity:1;
			}
			.slider{
				display:none;
			}

			.product-tile{
				height:unset;
			}
			.collapse{
				display:unset;
			}

			.feature-card{
				height:unset;
			}

			.blog-tile{
				height:unset;
			}
			.line-container{
				text-align:center;
			}
			.preloader-wrap{
				display:none;
			}
		</style>
	</noscript>

	<!--[if IE]>
	Place content here to target all Internet Explorer users.
	<style type="text/css">
			#site-logo{
				opacity:1;
			}

			.navbar__navigation{
				opacity:1;
			}

			.navbar__upper{
				opacity:1;
			}

			.dropdown{
				opacity;1;
			}

			h4{
				opacity:1;
			}
			.headingtext{
				opacity:1;
			}
		
			.fa-arrow-down{
				opacity:1;
				bottom:40px;
			}
			.zoomimg{
				opacity:1;
			}

		
			.preloader-wrap{
				display:none;
			}
			.background-image-holder{
				opacity:1;
			}
			.slider{
				display:none;
			}

			.product-tile{
				height:unset;
			}
			.collapse{
				display:unset;
			}

			.feature-card{
				height:unset;
			}

			.blog-tile{
				height:unset;
			}
			.line-container{
				text-align:center;
			}
			.preloader-wrap{
				display:none;
			}

		</style>
	<![endif]-->

	<style>
	
	@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
     /* IE10+ CSS styles go here */
		#site-logo{
				opacity:1;
				position:absolute;
			}

			.footer-brand{
				position:relative;
			}

			.navbar__navigation{
				opacity:1;
			}

			.navbar__upper{
				opacity:1;
			}

			.dropdown{
				opacity;1;
			}

			h4{
				opacity:1;
			}
			.headingtext{
				opacity:1;
			}
		
			.fa-arrow-down{
				opacity:1;
				bottom:40px;
			}
			.zoomimg{
				opacity:1;
			}

		
			.preloader-wrap{
				display:none;
			}
			.background-image-holder{
				opacity:1;
			}
			.slider{
				display:none;
			}

			.product-tile{
				height:unset;
			}
			.collapse{
				display:unset;
			}

			.feature-card{
				height:unset;
			}

			.blog-tile{
				height:unset;
			}
			.line-container{
				text-align:center;
			}
			.preloader-wrap{
				display:none;
			}

				}
	</style>

</head>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZ55W7"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->



	<!-- ******************* The Navbar Area ******************* -->
<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-lg ">
			<div class="container">
				<div class="navbar__upper">
					<div class="dropdown show dropdown--heading">
						<a class="dropdown-toggle--heading dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							I am a 
						</a>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="<?php echo network_home_url(); ?>">Home</a>
							<a class="dropdown-item" href="<?php echo network_home_url(); ?>/employer/">For employers</a>
							<a class="dropdown-item" href="<?php echo network_home_url(); ?>/jobseeker/">For jobseekers</a>
						</div>
					</div>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'top',
							'container_class' => 'navbar__navigation',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'secondary-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>
			</div>
			<div class="container navbar--container" >
				<div class="navbar__inner">
					<div class="navbar__inner--after"></div>
						<section class='navbar__mega space--md' id="dropdown">
							<div class="navbar__mega--inner container">
								<?php if( have_rows('mega_menus', 'header') ):
									while ( have_rows('mega_menus', 'header') ) : the_row();
									$number_of_menus = get_sub_field('number_of_menus','header');

									if($number_of_menus){
										$colsize = 12 / $number_of_menus;
									}

								?>

								<div class="row mega_menu" data-menu="<?php echo get_sub_field('parent'); ?>">

									<div class="col-md-4">
										<?php echo get_sub_field('content', 'header'); ?>
									</div>

									<div class="col-md-8">
										<div class="row">
										<?php
											// check if the repeater field has rows of data
											if( have_rows('menus', 'header') ):

											// loop through the rows of data
											while ( have_rows('menus', 'header') ) : the_row();
										?>
											<div class="col-md-<?php echo $colsize; ?>">
												<?php if(have_rows('sub_menu', 'header')):

													while( have_rows('sub_menu', 'header')): the_row();

													$link = get_sub_field('link');

													if(get_sub_field('menu_title')):
												?>

												<li><a href="<?php echo $link['url']; ?>" class="mega_menu_title small"><?php echo $link['title']; ?></a></li>
												<?
												else:
												?>
												<li><a href="<?php echo $link['url']; ?>" class="mega_menu_link small"><?php echo $link['title']; ?></a></li>
											<?
												endif;
												endwhile;

											endif;
											?>
											</div>
											<?
											endwhile;

											else:
											// no rows found
											endif;
											?>
										</div>
									</div>
								</div>

								<?php
								endwhile;
								endif; ?>
							</div>
						</section>
						<div class="navbar__mega--line"></div>


						<a href="<?php echo get_home_url(); ?>" id="site-logo" class="navbar-brand">
							Revelian
						</a>
						<div style="display:flex; direction:row;">
							<!-- The WordPress Menu goes here -->
							<?php wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'container_class' => 'navbar__navigation',
									'container_id'    => 'navbarNavDropdown',
									'menu_class'      => 'navbar-nav',
									'fallback_cb'     => '',
									'menu_id'         => 'main-menu',
									'walker'          => new understrap_WP_Bootstrap_Navwalker(),
								)
							); ?>

						</div>

						<div class="toggler-container">
							<button class="navbar-toggler" data-toggle="menu">
							<a href="#" class="burger-click">
								<div class="burger">
								<div class="burger__container">
									<span class="burger__icon burger__icon--top"></span>
									<span class="burger__icon burger__icon--middle"></span>
									<span class="burger__icon burger__icon--bottom"></span>
								</div>
								</div>
							</a>
							</button>
						</div>
				</div>
			</div><!-- .container -->

		</nav><!-- .site-navigation -->
	</div><!-- .wrapper-navbar end -->

	<div class="mobile-nav container" id="expanding-nav" >
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'mobile',
					'container_class' => 'mobile__navigation',
					'container_id'    => 'mobile',
					'menu_class'      => 'navbar-nav',
					'fallback_cb'     => '',
					'menu_id'         => 'mobile-menu',
					'walker'          => new understrap_WP_Bootstrap_Navwalker(),
				)
			); ?>
	</div>


	<div class="hfeed site" id="page">


