<?php
/**
 * Loop description
 *
 * This template can be overridden by copying it to yourtheme/listings/loop/description.php.
 *
 * @package Auto Listings.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$description = isset( $vehicle->promo ) && isset( $vehicle->promo->message )
	? $vehicle->promo->message
	: '';
?>

<?php if ( empty( $description ) ) : ?>
	<div class="description"><?php echo esc_html__( 'No description.', 'veekls-default-theme' ); ?></div>
<?php else : ?>
	<div class="description"><?php echo esc_html( $description ); ?></div>
<?php endif; ?>
