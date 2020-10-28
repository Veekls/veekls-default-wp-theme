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
	<ul>
		<?php if ( function_exists( 'veekls_odometer' ) && veekls_odometer() ) : ?>
			<li class="odomoter"><i class="icofont icofont-speed-meter"></i> <?php echo esc_html( veekls_odometer() ); ?></li>
		<?php endif; ?>

		<?php if ( function_exists( 'veekls_transmission' ) && veekls_transmission() ) : ?>
			<li class="transmission"><i class="icofont icofont-ui-settings"></i> <?php echo esc_html( veekls_transmission() ); ?></li>
		<?php endif; ?>

		<?php if ( function_exists( 'veekls_body_type' ) && veekls_body_type() ) : ?>
			<li class="body"><i class="icofont icofont-car-alt-4"></i> <?php echo wp_kses_post( veekls_body_type() ); ?></li>
		<?php endif; ?>
	</ul>
</div>
