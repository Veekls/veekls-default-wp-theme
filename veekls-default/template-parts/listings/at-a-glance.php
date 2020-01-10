<?php
/**
 * Single listing at a glance
 *
 * This template can be overridden by copying it to yourtheme/listings/single-listing/at-a-glance.php.
 *
 * @package Auto Listings.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$t_gearbox = apply_filters( 'veekls_gearbox_type', $vehicle );
$t_type    = apply_filters( 'veekls_vehicle_type', $vehicle );
?>

<div class="at-a-glance">
	<ul>
		<li class="odometer">
			<i class="icofont icofont-speed-meter"></i>
			<?php echo esc_html( $vehicle->odometer ); ?>
		</li>

		<?php if ( ! empty( $t_gearbox ) ) : ?>
			<li class="transmission">
				<i class="icofont icofont-ui-settings"></i>
				<?php echo esc_html( $t_gearbox ); ?>
			</li>
		<?php endif; ?>

		<?php if ( ! empty( $t_type ) ) : ?>
			<li class="body">
				<i class="icofont icofont-car-alt-4"></i>
				<?php echo esc_html( $t_type ); ?>
			</li>
		<?php endif; ?>
	</ul>
</div>
