<?php
/**
 * Loop title
 *
 * This template can be overridden by copying it to yourtheme/listings/loop/title.php.
 *
 * @package Auto Listings.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$vehicle_title = $vehicle->brand . ' ' . $vehicle->model . ' ' .
	$vehicle->version . ' ' . $vehicle->year;
?>

<h3 class="title">
	<a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( $vehicle_title ); ?>">
		<?php echo esc_html( $vehicle_title ); ?>
	</a>
</h3>
