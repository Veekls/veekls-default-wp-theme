<?php
/**
 * Single vehicle price
 *
 * Displays the sidebar price.
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vehicle = $args['vehicle'];
$price   = apply_filters( 'veekls_price', $vehicle );
$starred = ! empty( $vehicle->promo ) && ! empty( $vehicle->promo->starredAt );
?>

<div class="price">
	<h4><?php echo wp_kses_post( $price ); ?></h4>

	<span class="condition">
		<?php if ( $starred ) : ?>
			<i class="fas fa-star"></i>
		<?php endif; ?>
	</span>
</div>
