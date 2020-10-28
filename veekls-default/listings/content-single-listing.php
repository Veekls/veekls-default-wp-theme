<?php
/**
 * The Template for displaying listing content in the single-listing.php template
 *
 * This template can be overridden by copying it to yourtheme/listings/content-single-listing.php.
 *
 * @package Veekls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

?>

<?php do_action( 'veekls_before_single_listing' ); ?>

<div id="listing-<?php the_ID(); ?>" class="veekls-single listing">
	<div class="has-sidebar">
		<div class="image-gallery">
			<?php
			/**
			 * Slider
			 *
			 * @hooked veekls_template_single_gallery
			 */
			do_action( 'veekls_single_gallery' );
			?>
		</div>

		<div class="full-width upper">
			<?php
			/**
			 * Title
			 *
			 * @hooked veekls_template_single_title
			 */
			do_action( 'veekls_single_upper_full_width' );
			?>
			<?php if ( function_exists( 'veekls_price' ) ) : ?>
				<h4><?php echo wp_kses_post( veekls_price() ); ?></h4>
			<?php endif; ?>
		</div>

		<div class="content">
			<?php
			/**
			 * Info single listing
			 *
			 * @hooked veekls_template_single_tagline
			 * @hooked veekls_template_single_description
			 * @hooked veekls_output_listing_tabs
			 */
			do_action( 'veekls_single_content' );
			?>
		</div>
	</div>

	<div class="sidebar">
		<?php
		/**
		 * Sidebar
		 *
		 * @hooked veekls_template_single_price
		 * @hooked veekls_template_single_at_a_glance
		 * @hooked veekls_template_single_address
		 * @hooked veekls_template_single_map
		 * @hooked veekls_template_single_contact_form
		 */
		do_action( 'veekls_single_sidebar' );
		?>
	</div>

	<div class="full-width lower">
		<?php do_action( 'veekls_single_lower_full_width' ); ?>
	</div>
</div>

<?php do_action( 'veekls_after_single_listing' ); ?>
