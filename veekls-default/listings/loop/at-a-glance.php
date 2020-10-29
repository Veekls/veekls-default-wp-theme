<?php
/**
 * Single listing at a glance
 *
 * This template can be overridden by copying it to yourtheme/listings/single-listing/at-a-glance.php.
 *
 * @package Veekls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

$vehicle = $args['vehicle'];

$gearbox  = apply_filters( 'veekls_gearbox_type', $vehicle );
$odometer = apply_filters( 'veekls_odometer', $vehicle );
?>

<div class="at-a-glance">
	<ul>
		<li class="odometer">
			<i class="fas fa-road"></i> <?php echo esc_html( $odometer ); ?>
		</li>
		<li class="transmission">
			<i class="fas fa-cogs"></i> <?php echo esc_html( $gearbox ); ?>
		</li>
		<li class="year">
			<i class="fas fa-calendar"></i> <?php echo esc_html( $vehicle->year ); ?>
		</li>
	</ul>
</div>
