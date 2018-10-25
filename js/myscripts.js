jQuery(function($){

	$(document).ready(query());

	/*
	 * Load More
	 */
	$('#loadmore').click(function(){

		console.log('oi')

		$.ajax({
			url : loadmore_params.ajaxurl, // AJAX handler
			data : {
				'action': 'loadmorebutton', // the parameter for admin-ajax.php
				'query': loadmore_params.posts, // loop parameters passed by wp_localize_script()
				'page' : loadmore_params.current_page // current page
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('#loadmore').text('Loading...'); // some type of preloader
			},
			success : function( posts ){
				if( posts ) {

					$('#loadmore').text( 'More posts' );
					$('#posts_wrap').append( posts ); // insert new posts
					$('.background-image-holder').each(function() {
						var imgSrc = $(this).children('img').attr('src');
						$(this).css('background', 'url("' + imgSrc + '")').css('background-position', 'initial').css('opacity','1');
					});
	
					loadmore_params.current_page++;

					if ( loadmore_params.current_page == loadmore_params.max_page )
						$('#loadmore').hide(); // if last page, HIDE the button

				} else {
					$('#loadmore').hide(); // if no data, HIDE the button as well
				}
			}
		});
		return false;
	});

	/*
	 * Filter
	 */
	$('#select').change(function(){

		query();

	});

	function query(){
		$.ajax({
			url : loadmore_params.ajaxurl,
			data : $('#filters').serialize(), // form data
			dataType : 'json', // this data type allows us to receive objects from the server
			type : 'POST',
			beforeSend : function(xhr){
				$('#filters').find('button').text('Filtering...');
			},
			success : function( data ){

				// when filter applied:
				// set the current page to 1
				loadmore_params.current_page = 1;

				// set the new query parameters
				loadmore_params.posts = data.posts;

				// set the new max page parameter
				loadmore_params.max_page = data.max_page;

				// change the button label back
				$('#filters').find('button').text('Apply filter');

				// insert the posts to the container
				$('#posts_wrap').html(data.content);
				$('.background-image-holder').each(function() {
					var imgSrc = $(this).children('img').attr('src');
					$(this).css('background', 'url("' + imgSrc + '")').css('background-position', 'initial').css('opacity','1');
				});

				// hide load more button, if there are not enough posts for the second page
				if ( data.max_page < 2 ) {
					$('#loadmore').hide();
				} else {
					$('#loadmore').show();
				}
			}
		});
	}


});