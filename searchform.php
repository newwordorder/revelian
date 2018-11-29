<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package understrap
 */

?>


<form method="get"  autocomplete="off" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
	</div>
</form>