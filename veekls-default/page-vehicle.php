<?php
/**
 * Template Name: Single Vehicle Layout
 * Template Post Type: page
 *
 * The Template for displaying listing content in the single-listing.php template
 *
 * This template can be overridden by copying it to yourtheme/listings/content-single-listing.php.
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

$vehicle_id    = ! empty( $_GET['id'] ) ? wp_unslash( $_GET['id'] ) : null;
$vehicle       = apply_filters( 'veekls_fetch_vehicle', $vehicle_id );
$vehicle_title = apply_filters( 'veekls_title', $vehicle ) . ' ' . $vehicle->year;
$vehicle_price = apply_filters( 'veekls_price', $vehicle );

// Set proper document title.
add_filter(
	'document_title_parts',
	function ( $title_parts ) use ( $vehicle_title ) {
		$title_parts['title'] = $vehicle_title;

		return $title_parts;
	}
);

// Set proper page title.
add_filter(
	'the_title',
	function ( $title ) use ( $vehicle_title ) {
		// Only if it's this page.
		if ( 'Vehicle' === $title ) {
			return $vehicle_title;
		}

		return $title;
	}
);

wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/css/lightslider.min.css', array(), '1.1.3' );
wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/js/lightslider.min.js', array(), '1.1.3', true );

wp_enqueue_style( 'lightgallery', get_template_directory_uri() . '/css/lightgallery.min.css', array(), '1.9.1' );
wp_enqueue_script( 'lightgallery', get_template_directory_uri() . '/js/lightgallery-all.min.js', array(), '1.9.1', true );

get_header();
?>

<?php do_action( 'veekls_before_single_listing' ); ?>

<div id="listing-<?php echo esc_attr( $vehicle_id ); ?>" class="veekls-single listing">
	<div class="has-sidebar">
		<div class="image-gallery">
			<?php
			get_template_part(
				'listings/single-listing/gallery',
				'Vehicle Gallery',
				array(
					'vehicle' => $vehicle,
				)
			);
			?>
		</div>

		<div class="full-width upper">
			<?php
			get_template_part(
				'listings/single-listing/title',
				'Vehicle Title',
				array(
					'vehicle' => $vehicle,
				)
			);
			?>

			<h4><?php echo filter_var( $vehicle_price, FILTER_UNSAFE_RAW ); ?></h4>
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
			get_template_part(
				'listings/single-listing/description',
				'Vehicle Description',
				array(
					'vehicle' => $vehicle,
				)
			);

			get_template_part(
				'listings/single-listing/tabs/tabs',
				'Vehicle Tabs',
				array(
					'vehicle' => $vehicle,
				)
			);
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

	<?php get_sidebar(); ?>

	<div class="full-width lower">
		<?php do_action( 'veekls_single_lower_full_width' ); ?>
	</div>
</div>

<?php do_action( 'veekls_after_single_listing' ); ?>

<?php
get_footer();
