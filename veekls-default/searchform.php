<?php
/**
 * The template for displaying custom search form
 *
 * @package Veekls
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'veekls' ); ?></span>
		<input type="text" class="search-field" placeholder="<?php esc_attr_e( 'Type and hit Enter...', 'veekls' ); ?>" value="<?php the_search_query(); ?>" name="s">
	</label>

	<button type="submit" class="search-submit">
		<i class="icofont icofont-search"></i>
		<span class="screen-reader-text"><?php esc_html_e( 'Search', 'veekls' ); ?></span>
	</button>
</form>
