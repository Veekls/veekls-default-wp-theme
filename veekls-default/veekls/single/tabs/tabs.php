<?php
/**
 * Single vehicle tabs
 *
 * Displays vehicle info tabs.
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see auto_listings_default_tabs()
 */

$vehicle      = $args['vehicle'];
$vehicle_tabs = array(
	// Details tab.
	'details'        => array(
		'title'    => __( 'Details', 'veekls' ),
		'priority' => 10,
	),
	// Specs tab.
	'specifications' => array(
		'title'    => __( 'Specifications', 'veekls' ),
		'priority' => 20,
	),
);

if ( empty( $vehicle_tabs ) ) {
	return;
}
?>

<div class="veekls-tabs veekls-tabs-wrapper">
	<ul class="tabs veekls-tabs" role="tablist">
		<?php foreach ( $vehicle_tabs as $key => $value ) : ?>
			<li class="<?php echo esc_attr( $key ); ?>-tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
				<a href="#tab-<?php echo esc_attr( $key ); ?>">
					<?php echo esc_html( $value['title'] ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php foreach ( $vehicle_tabs as $key => $value ) : ?>
		<div class="veekls-tabs-panel veekls-tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content veekls-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
			<?php
			get_template_part(
				'veekls/single/tabs/' . $key,
				'Vehicle Tab ' . $value['title'],
				array(
					'vehicle' => $vehicle,
				)
			)
			?>
		</div>
	<?php endforeach; ?>
</div>
