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

$vehicle_gearbox  = apply_filters( 'veekls_gearbox', $vehicle );
$vehicle_odometer = apply_filters( 'veekls_odometer', $vehicle );
$vehicle_fuel     = apply_filters( 'veekls_fuel_type', $vehicle );
$vehicle_year     = $vehicle->year;
?>

<div class="at-a-glance">
	<h3><?php esc_html_e( 'Features Highlight', 'veekls' ); ?></h3>

	<table>
		<tbody>
			<tr>
				<td>
					<span class="odometer">
						<i class="fas fa-road"></i> <?php echo esc_html( $vehicle_odometer ); ?>
					</span>
				</td>
				<td>
					<span class="transmission">
						<i class="fas fa-cogs"></i> <?php echo esc_html( $vehicle_gearbox ); ?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span class="fuel">
						<i class="fas fa-fire"></i> <?php echo esc_html( $vehicle_fuel ); ?>
					</span>
				</td>
				<td>
					<span class="year">
						<i class="fas fa-calendar"></i> <?php echo esc_html( $vehicle_year ); ?>
					</span>
				</td>
			</tr>
		</tbody>
	</table>
</div>
