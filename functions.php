<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

require get_template_directory() . '/inc/acf-options.php';

require get_template_directory() . '/inc/accordian-shortcode.php';

require get_template_directory() . '/inc/menu-rename.php';

require get_template_directory() . '/inc/resource-loader.php';


function misha_my_load_more_scripts() {

	global $wp_query;

	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );

 	wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );


function misha_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';

	// it is always better to use WP_Query but not here
	query_posts( $args );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();

        ?>
            <div class="col-sm-6 col-lg-4">
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
									<div class="blog-tile__thumb">
										<div class="background-image-holder" >
											<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
										</div>
									</div>
						        	<?php endif; ?>


									<div class="blog-tile__content">
										<h5><?php the_title(); ?></h5>
										<a class="btn" href="<?php the_permalink(); ?>">Read</a>
									</div>
							</div>

						</div>
            <?php


			// for the test purposes comment the line above and uncomment the below one
			// the_title();


		endwhile;

	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

function saveRemoteJsonData(){

	$jsonurl = "https://app.revelian.com/rss/skillsTests/skillsTests.json";
	$json = file_get_contents($jsonurl);
	var_dump(json_decode($json));

	$file = fopen(get_template_directory() . '/js/skillsTests.json','w');
	fwrite($file, $json);
	fclose($file);

} add_action('saveRemoteJsonData', 'saveRemoteJsonData');

function readLocalJsonData(){

    //Use file_get_contents to GET the URL in question.
    $contents = file_get_contents(get_template_directory() . '/js/skillsTests.json');

    //If $contents is not a boolean FALSE value.
    if($contents !== false){
        //Print out the contents.
        return $contents;
    }
}