<?php
/**
 * Loop address
 *
 * This template can be overridden by copying it to yourtheme/listings/loop/address.php.
 *
 * @package Veekls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

$address = function_exists( 'veekls_meta' ) ? veekls_meta( 'displayed_address' ) : '';

if ( empty( $address ) ) {
	return;
}
?>

<div class="address">
	<i class="icofont icofont-social-google-map"></i>
	<?php echo esc_html( $address ); ?>
</div>
