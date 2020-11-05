<?php
/**
 * Single vehicle tagline
 *
 * Displays the promo message if any.
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vehicle = $args['vehicle'];

if ( empty( $vehicle->promo ) || empty( $vehicle->promo->message ) ) {
	return;
}
?>

<h3 class="tagline"><?php echo esc_html( $vehicle->promo->message ); ?></h3>
