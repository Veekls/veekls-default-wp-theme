<?php
/**
 * The Template for displaying the listings archive
 *
 * This template can be overridden by copying it to yourtheme/listings/archive-listing.php.
 *
 * @package Veekls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

get_header( 'listings' );

/**
 * Outputs opening divs for the content
 *
 * @hooked veekls_output_content_wrapper
 */
do_action( 'veekls_before_main_content' ); ?>

<div class="full-width upper">
	<?php
	/**
	 * Comment
	 *
	 * @hooked veekls_listing_archive_description (displays any content, including shortcodes, within the main content editor of your chosen listing archive page)
	 */
	do_action( 'veekls_archive_page_upper_full_width' );
	?>
</div>

<?php if ( is_active_sidebar( 'veekls' ) ) : ?>
	<div class="has-sidebar">
<?php else : ?>
	<div class="listing-no-sidebar">
<?php endif; ?>

<?php if ( have_posts() ) : ?>
	<?php
	/**
	 * Comment
	 *
	 * @hooked veekls_ordering (the ordering dropdown)
	 * @hooked veekls_view_switcher (the view switcher)
	 * @hooked veekls_pagination (the pagination)
	 */
	do_action( 'veekls_before_listings_loop' );

	$cols  = function_exists( 'veekls_columns' ) ? veekls_columns() : 1;
	$count = 1;

	while ( have_posts() ) :
		the_post();

		if ( 1 === $count % $cols ) {
			echo '<ul class="veekls-items">';
		}

		if ( function_exists( 'veekls_get_part' ) ) {
			veekls_get_part( 'content-listing.php' );
		}

		if ( 0 === $count % $cols ) {
			echo '</ul>';
		}

		$count++;
	endwhile;

	if ( 1 !== $count % $cols ) {
		echo '</ul>';
	}

	/**
	 * Comment
	 *
	 * @hooked veekls_pagination (the pagination)
	 */
	do_action( 'veekls_after_listings_loop' );

else :
	?>

	<p class="alert veekls-no-results"><?php esc_html_e( 'Sorry, no listings were found.', 'veekls' ); ?></p>

<?php endif; ?>

<?php if ( is_active_sidebar( 'veekls' ) ) : ?>

	</div><!-- has-sidebar -->

	<div class="sidebar">
		<?php dynamic_sidebar( 'veekls' ); ?>
	</div>

<?php else : ?>
	</div>
<?php endif; ?>

<div class="full-width lower">
	<?php do_action( 'veekls_archive_page_lower_full_width' ); ?>
</div>

<?php
/**
 * Comment
 *
 * @hooked veekls_output_content_wrapper_end (outputs closing divs for the content)
 */
do_action( 'veekls_after_main_content' );


get_footer( 'listings' );
?>
