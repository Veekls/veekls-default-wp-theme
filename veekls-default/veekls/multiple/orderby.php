<?php
/**
 * Ordering
 *
 * This template can be overridden by copying it to yourtheme/listings/loop/orderby.php.
 *
 * @package Veekls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

$by      = filter_input( INPUT_GET, 'orderby', FILTER_SANITIZE_STRING );
$by      = $by ? $by : 'date-new';
$options = apply_filters(
	'veekls_listings_orderby',
	array(
		'date-new'     => __( 'Newest', 'veekls' ),
		'date-old'     => __( 'Oldest', 'veekls' ),
		'mileage-low'  => __( 'Lowest Mileage', 'veekls' ),
		'mileage-high' => __( 'Highest Mileage', 'veekls' ),
		'price-low'    => __( 'Lowest Price', 'veekls' ),
		'price-high'   => __( 'Highest Price', 'veekls' ),
	)
);

?>

<form class="veekls-ordering" method="get" >
	<div class="select-wrap">
		<select name="orderby" class="orderby">
			<?php foreach ( $options as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $by, $value ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<?php foreach ( $_GET as $key => $val ) : ?>
		<?php
		if ( 'orderby' === $key || 'submit' === $key ) {
			continue;
		}
		?>

		<?php if ( is_array( $val ) ) : ?>
			<?php foreach ( $val as $inner_val ) : ?>
				<input type="hidden" name="<?php echo esc_attr( $key ); ?>[]" value="<?php echo esc_attr( $inner_val ); ?>" />
			<?php endforeach; ?>
		<?php else : ?>
			<input type="hidden" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $val ); ?>" />
		<?php endif; ?>
	<?php endforeach; ?>
</form>
