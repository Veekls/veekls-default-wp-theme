<?php
/**
 * The template for displaying custom search form
 *
 * @package VeeklsDefaultTheme
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'veekls-default-theme' ); ?></span>
		<input type="text" class="search-field" placeholder="<?php esc_attr_e( 'Type and hit Enter...', 'veekls-default-theme' ); ?>" value="<?php the_search_query(); ?>" name="s">
	</label>
	<button type="submit" class="search-submit">
		<i class="icofont icofont-search"></i>
		<span class="screen-reader-text"><?php esc_html_e( 'Search', 'veekls-default-theme' ); ?></span>
	</button>
</form>
