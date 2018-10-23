<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
	'</a></h4>' ); ?>


</div><!-- #post-## -->
