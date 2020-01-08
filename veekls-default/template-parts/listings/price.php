<?php
/**
 * Loop price
 *
 * This template can be overridden by copying it to yourtheme/listings/loop/price.php.
 *
 * @package Auto Listings.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$price = number_format( $vehicle->price );
?>

<span class="price">
	<span class="currency-symbol">$</span>
	<?php echo esc_html( $price ); ?>
</span>
