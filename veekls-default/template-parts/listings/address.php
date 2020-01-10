<?php
/**
 * Loop address
 *
 * This template can be overridden by copying it to yourtheme/listings/loop/address.php.
 *
 * @package Auto Listings.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$branch = isset( $vehicle->branch ) && isset( $vehicle->branch->name )
	? $vehicle->branch->name
	: '';

if ( empty( $branch ) ) {
	return;
}
?>

<div class="address">
	<i class="fa fa-map-marker"></i> &nbsp; <?php echo esc_html( $branch ); ?>
</div>
