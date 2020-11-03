<?php
/**
 * Single vehicle description
 *
 * Displays the promo message and characteristics.
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vehicle = $args['vehicle'];
?>

<div class="description">
	<?php if ( ! empty( $vehicle->promo ) || ! empty( $vehicle->promo->message ) ) : ?>
		<p><?php echo esc_html( $vehicle->promo->message ); ?></p>
	<?php endif; ?>

	<h5><?php echo esc_html_e( 'Features & Options', 'veekls' ); ?></h5>

	<?php
	$comfort  = array();
	$exterior = array();
	$security = array();

	foreach ( $vehicle->characteristics as $characteristic ) {
		$value = apply_filters( 'veekls_characteristic', $characteristic );

		switch ( $value['type'] ) {
			case 'exterior':
				array_push( $exterior, $value['name'] );
				break;
			case 'comfort':
				array_push( $comfort, $value['name'] );
				break;
			case 'security':
				array_push( $security, $value['name'] );
				break;
		}
	}
	?>

	<?php if ( ! empty( $comfort ) ) : ?>
		<h6><?php esc_html_e( 'Comfort', 'veekls' ); ?></h6>
		<ul>
			<?php foreach ( $comfort as $characteristic ) : ?>
				<li><?php echo esc_html( $characteristic ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if ( ! empty( $exterior ) ) : ?>
		<h6><?php esc_html_e( 'Exterior', 'veekls' ); ?></h6>
		<ul>
		<?php foreach ( $exterior as $characteristic ) : ?>
				<li><?php echo esc_html( $characteristic ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if ( ! empty( $security ) ) : ?>
		<h6><?php esc_html_e( 'Security', 'veekls' ); ?></h6>
		<ul>
		<?php foreach ( $security as $characteristic ) : ?>
				<li><?php echo esc_html( $characteristic ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>
