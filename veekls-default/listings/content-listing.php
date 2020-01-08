<?php
/**
 * The Template for displaying listing content in the single-listing.php template
 *
 * This template can be overridden by copying it to yourtheme/listings/content-single-listing.php.
 *
 * @package VeeklsDefaultTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

$front_page_listings_column = get_theme_mod( 'front_page_listings_column', 2 );

if ( is_front_page() ) {
	$cols = $front_page_listings_column;
} else {
	$cols = function_exists( 'auto_listings_columns' ) ? auto_listings_columns() : 1;
}
?>

<li <?php post_class( 'col-' . $cols ); ?>>
	<?php
	/**
	 * Image and at a glance
	 *
	 * @hooked auto_listings_template_loop_image
	 */
	do_action( 'auto_listings_before_listings_loop_item_summary' );
	?>

	<div class="at-a-glance">
		<ul>
			<li class="odomoter"><i class="auto-icon-odometer"></i> <?php echo esc_html( auto_listings_odometer() ); ?></li>
		<?php if ( auto_listings_transmission() ) { ?>
			<li class="transmission"><i class="auto-icon-transmission"></i> <?php echo esc_html( auto_listings_transmission() ); ?></li>
		<?php } ?>
		<?php if ( auto_listings_body_type() ) { ?>
			<li class="body"><i class="auto-icon-trunk"></i> <?php echo auto_listings_body_type(); // wpcs xss: ok. ?></li>
		<?php } ?>
		</ul>
	</div>

	<div class="summary">
		<?php
		// do_action( 'auto_listings_before_listings_loop_item' );

		/**
		 * Info single listings
		 *
		 * @hooked auto_listings_template_loop_title
		 * @hooked auto_listings_template_loop_at_a_glance
		 * @hooked auto_listings_template_loop_address
		 * @hooked auto_listings_template_loop_price
		 * @hooked auto_listings_template_loop_description
		 * @hooked auto_listings_template_loop_bottom
		 */
		// do_action( 'auto_listings_listings_loop_item' );

		// do_action( 'auto_listings_after_listings_loop_item' );
		?>

	</div>

	<?php

	do_action( 'auto_listings_after_listings_loop_item_summary' );
	?>

</li>
