<?php
/**
 * Details Tab
 *
 * Displays the details tabs.
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vehicle = $args['vehicle'];
$details = array(
	__( 'Vehicle', 'veekls' )      => apply_filters( 'veekls_title', $vehicle ),
	__( 'Price', 'veekls' )        => apply_filters( 'veekls_price', $vehicle ),
	__( 'Mileage', 'veekls' )      => apply_filters( 'veekls_odometer', $vehicle ),
	__( 'Color', 'veekls' )        => $vehicle->color,
	__( 'Transmission', 'veekls' ) => apply_filters( 'veekls_gearbox', $vehicle ),
	__( 'Body', 'veekls' )         => apply_filters( 'veekls_vehicle_type', $vehicle ),
	__( 'Owners', 'veekls' )       => empty( $vehicle->owners ) ? __( 'Unknown', 'veekls' ) : $vehicle->owners,
);
?>

<h4><?php esc_html_e( 'Details', 'veekls' ); ?></h4>

<table class="table table-striped">
	<tbody>
		<?php foreach ( $details as $label => $value ) : ?>
			<?php
			if ( empty( $value ) || '' === $value ) {
				continue;
			}
			?>

			<tr>
				<th><?php echo esc_html( $label ); ?></th>
				<td><?php echo wp_kses_post( $value ); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
