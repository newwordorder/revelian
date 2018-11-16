jQuery(function($){

	$('#misha_loadmore').click(function(){

 
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : misha_loadmore_params.current_page
		};

 
		$.ajax({
			url : misha_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					$('#posts_row').append( data ); // insert new posts
					button.text( 'More posts' );

					misha_loadmore_params.current_page++;
					$('.background-image-holder').each(function() {
						var imgSrc = $(this).children('img').attr('src');
						$(this).css('background', 'url("' + imgSrc + '")').css('background-position', 'initial').css('opacity','1');
					});
 
					if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});

});