<?php
/**
 * Location
 *
 * The template part for displaying location section.
 *
 * @package Veekls/Default_Theme
 */

$location_page = get_option( 'veekls_location_page' );
$show_title    = get_option( 'veekls_location_show_title' );
$show_excerpt  = get_option( 'veekls_location_show_excerpt' );

if ( empty( $location_page ) ) {
	return;
}

$post = get_post( $location_page ); // phpcs:ignore

setup_postdata( $post );
?>

<section class="section--location">
	<div class="container">
		<?php if ( $show_title ) : ?>
			<h2 class="location-title"><?php the_title(); ?></h2>
		<?php endif; ?>

		<div class="location-content">
			<?php if ( $show_excerpt ) : ?>
				<div class="location__title">
					<p><?php the_excerpt(); ?></p>
				</div>
			<?php endif; ?>

			<?php the_content(); ?>
		</div>
	</div>
</section>
