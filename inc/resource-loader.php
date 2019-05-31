<?php

add_action( 'wp_enqueue_scripts', 'script_and_styles');

function script_and_styles() {
	// absolutely need it, because we will get $wp_query->query_vars and $wp_query->max_num_pages from it.
	if(get_the_title() == "Resources"):
	$args = array(
		'post_type' => 'resource',
		'post_status' => 'publish',
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC or DESC
	);
	else:
		$args = array(
			'post_status' => 'publish',
			'orderby' => 'date', // we will sort posts by date
			'order'	=> $_POST['date'] // ASC or DESC
		);
	endif;

	// for taxonomies / categories
    if( isset( $_POST['categoryfilter'])  && $_POST['categoryfilter'] != 'All' ):
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'resource_type',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);

	$query = new WP_Query( $args );
	endif;

	// when you use wp_localize_script(), do not enqueue the target script immediately
	wp_register_script( 'scripts', get_stylesheet_directory_uri() . '/js/myscripts.js', array('jquery') );

	// passing parameters here
	// actually the <script> tag will be created and the object "loadmore_params" will be inside it
	wp_localize_script( 'scripts', 'loadmore_params', array(
		'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX
		'posts' => json_encode( $query->query_vars ), // everything about your loop is here
		'current_page' => $query->query_vars['paged'] ? $query->query_vars['paged'] : 1,
		'max_page' => $query->max_num_pages
	) );

	wp_enqueue_script( 'scripts' );
}

add_action('wp_ajax_loadmorebutton', 'loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmorebutton', 'loadmore_ajax_handler');

function loadmore_ajax_handler(){

	// prepare our arguments for the query
	$params = json_decode( stripslashes( $_POST['query'] ), true ); // query_posts() takes care of the necessary sanitization
	$params['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$params['post_status'] = 'publish';
	$params['post_type'] = 'resource';

	// it is always better to use WP_Query but not here
	query_posts( $params );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();

			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part( 'loop-templates/content-resource', get_post_format() );
			// for the test purposes comment the line above and uncomment the below one
			//the_title();


		endwhile;
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_filter', 'filter_function');
add_action('wp_ajax_nopriv_filter', 'filter_function');

function filter_function(){

	// example: date-ASC
	$order = explode( '-', $_POST['order_by'] );

	$params = array(
		'posts_per_page' => $_POST['number_of_results'], // when set to -1, it shows all posts
		'post_type' => 'resource',
		'orderby' => $order[0], // example: date
        'order'	=> $order[1] // example: ASC

	);


    if( isset( $_POST['categoryfilter'])  && $_POST['categoryfilter'] != 'All' )
    $params['tax_query'] = array(
        array(
            'taxonomy' => 'resource_type',
            'field' => 'id',
            'terms' => $_POST['categoryfilter']
        )
    );

    query_posts( $params );

	global $wp_query;

	$args = array(
		'post_type' => 'resource',
		'post_status' => 'publish',
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC or DESC
	);

	// for taxonomies / categories


	$query = new WP_Query( $args );

	if( have_posts() ) :

	ob_start(); // start buffering because we do not need to print the posts now

		while( have_posts() ): the_post();

			// adapted for Twenty Seventeen theme
			get_template_part( 'loop-templates/content-resource', get_post_format() );

		endwhile;

	$posts_html = ob_get_contents(); // we pass the posts to variable
	ob_end_clean(); // clear the buffer
	else:
		$posts_html = '<p>Nothing found for your criteria.</p>';
	endif;

	// no wp_reset_query() required

	echo json_encode( array(
		'posts' => json_encode( $wp_query->query_vars ),
		'max_page' => $wp_query->max_num_pages,
		'found_posts' => $wp_query->found_posts,
		'content' => $posts_html
	) );

	die();
}
?>