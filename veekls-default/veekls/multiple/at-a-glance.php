<?php
/**
 * Single listing at a glance
 *
 * This template can be overridden by copying it to yourtheme/veekls/single/at-a-glance.php.
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

$vehicle_gearbox  = apply_filters( 'veekls_gearbox', $vehicle );
$vehicle_odometer = apply_filters( 'veekls_odometer', $vehicle );
$vehicle_year     = $vehicle->year;
?>

<div class="at-a-glance">
	<ul>
		<li class="odometer" title="<?php echo esc_html( $vehicle_odometer ); ?>">
			<i class="fas fa-road"></i> <?php echo esc_html( $vehicle_odometer ); ?>
		</li>
		<li class="transmission" title="<?php echo esc_html( $vehicle_gearbox ); ?>">
			<i class="fas fa-cogs"></i> <?php echo esc_html( $vehicle_gearbox ); ?>
		</li>
		<li class="year" title="<?php echo esc_html( $vehicle_year ); ?>">
			<i class="fas fa-calendar"></i> <?php echo esc_html( $vehicle_year ); ?>
		</li>
	</ul>
</div>
