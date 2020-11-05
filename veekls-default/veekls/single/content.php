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

$vehicle       = $args['vehicle'];
$vehicle_price = apply_filters( 'veekls_price', $vehicle );
$vehicle_id    = $vehicle->_id;
?>

<?php do_action( 'veekls_before_single_listing' ); ?>

<div id="listing-<?php echo esc_attr( $vehicle_id ); ?>" class="veekls-single listing">
	<div class="has-sidebar">
		<div class="image-gallery">
			<?php
			get_template_part(
				'veekls/single/gallery',
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
				'veekls/single/title',
				'Vehicle Title',
				array(
					'vehicle' => $vehicle,
				)
			);
			?>

			<h4><?php echo wp_kses_post( $vehicle_price ); ?></h4>
		</div>

		<div class="content">
			<?php
			get_template_part(
				'veekls/single/description',
				'Vehicle Description',
				array(
					'vehicle' => $vehicle,
				)
			);

			get_template_part(
				'veekls/single/tabs/tabs',
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
		get_template_part(
			'veekls/single/price',
			'Vehicle Sidebar Price',
			array(
				'vehicle' => $vehicle,
			)
		);

		get_template_part(
			'veekls/single/at-a-glance',
			'Vehicle Sidebar At a Glance',
			array(
				'vehicle' => $vehicle,
			)
		);

		get_template_part(
			'veekls/single/contact-form',
			'Vehicle Sidebar Contact',
			array(
				'vehicle' => $vehicle,
			)
		);
		?>
	</div>

	<?php get_sidebar(); ?>

	<div class="full-width lower">
		<?php do_action( 'veekls_single_lower_full_width' ); ?>
	</div>
</div>

<?php do_action( 'veekls_after_single_listing' ); ?>
