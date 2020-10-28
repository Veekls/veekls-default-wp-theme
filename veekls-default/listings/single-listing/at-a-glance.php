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

?>

<div class="at-a-glance">
	<h3><?php esc_html_e( 'Features Highlight', 'veekls' ); ?></h3>
	<table>
		<tbody>
			<tr>
				<td>
					<?php if ( function_exists( 'veekls_odometer' ) && veekls_odometer() ) : ?>
						<span class="odomoter"><i class="icofont icofont-speed-meter"></i> <?php echo esc_html( veekls_odometer() ); ?></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ( function_exists( 'veekls_transmission' ) && veekls_transmission() ) : ?>
						<span class="transmission"><i class="icofont icofont-ui-settings"></i> <?php echo esc_html( veekls_transmission() ); ?></span>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php if ( function_exists( 'veekls_body_type' ) && veekls_body_type() ) : ?>
						<span class="body"><i class="icofont icofont-car-alt-4"></i> <?php echo wp_kses_post( veekls_body_type() ); ?></span>
					<?php endif; ?>
				</td>
				<td>
					<?php if ( function_exists( 'veekls_engine' ) && veekls_engine() ) : ?>
						<span class="vehicle"><?php echo esc_html( veekls_engine() ); ?></span>
					<?php endif; ?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
