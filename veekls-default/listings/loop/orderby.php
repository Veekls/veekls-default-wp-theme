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

global $wp_query;

if ( 1 === $wp_query->found_posts ) {
	return;
}

$by      = filter_input( INPUT_GET, 'orderby', FILTER_SANITIZE_STRING );
$by      = $by ? $by : 'date';
$options = apply_filters(
	'auto_listings_listings_orderby',
	array(
		'date'       => __( '- Newest Listings -', 'veekls' ),
		'date-old'   => __( '- Oldest Listings -', 'veekls' ),
		'price'      => __( '- Price (Low to High) -', 'veekls' ),
		'price-high' => __( '- Price (High to Low) -', 'veekls' ),
	)
);

?>

<form class="veekls-api-client-ordering" method="get" >
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
