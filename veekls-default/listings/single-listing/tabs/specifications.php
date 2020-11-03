<?php
/**
 * Specifications Tab
 *
 * Displays the specifications tabs.
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vehicle = $args['vehicle'];
$specs   = array(
	__( 'Brand', 'veekls' )        => $vehicle->brand,
	__( 'Model', 'veekls' )        => $vehicle->model,
	__( 'Version', 'veekls' )      => $vehicle->version,
	__( 'Year', 'veekls' )         => $vehicle->year,
	__( 'Transmission', 'veekls' ) => apply_filters( 'veekls_gearbox', $vehicle ),
	__( 'Fuel', 'veekls' )         => apply_filters( 'veekls_fuel_type', $vehicle ),
);
?>

<h4><?php esc_html_e( 'Specifications', 'veekls' ); ?></h4>

<table class="table table-striped">
	<tbody>
		<?php foreach ( $specs as $label => $value ) : ?>
			<tr>
				<th><?php echo esc_html( $label ); ?></th>
				<td><?php echo esc_html( $value ); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
