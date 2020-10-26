<?php
/**
 * The template part for displaying search form on front page
 *
 * @package Veekls
 */

$search_page = get_theme_mod( 'search_section' );

if ( ! $search_page ) {
	return;
}

$current_post = get_post( $search_page );

setup_postdata( $current_post );

?>

<section class="section--search container">
	<h2 class="search-title"><?php the_title(); ?></h2>
	<div class="search-content">
		<div class="search-form__title">
			<p><?php the_excerpt(); ?></p>
		</div>

		<?php the_content(); ?>
	</div>
</section>
