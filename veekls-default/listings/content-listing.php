<?php
/**
 * The Template for displaying listing content in the single-listing.php template
 *
 * This template can be overridden by copying it to yourtheme/listings/content-single-listing.php.
 *
 * @package Veekls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

$front_page_listings_column = get_theme_mod( 'front_page_listings_column', 2 );

$vehicle            = $args['vehicle'];
$vehicle->title     = apply_filters( 'veekls_title', $vehicle );
$vehicle->url       = '/vehicle?id=' . $vehicle->_id;
$vehicle->price     = apply_filters( 'veekls_price', $vehicle );
$vehicle->thumbnail = apply_filters(
	'veekls_picture',
	$vehicle->pictures[0],
	array(
		'thumbnail' => 'sm',
	)
);

if ( is_front_page() ) {
	$cols = $front_page_listings_column;
} else {
	$cols = 2;
}

?>

<li <?php esc_attr( post_class( 'col-' . $cols ) ); ?>>
	<div class="image">
		<a href="<?php echo esc_url( $vehicle->url ); ?>" title="<?php echo esc_attr( $vehicle->title ); ?>">
			<img alt="<?php echo esc_attr( $vehicle->title ); ?>" src="<?php echo esc_url( $vehicle->thumbnail ); ?>"/>
		</a>
	</div>

	<div class="summary">
		<h3 class="title">
			<a href="<?php echo esc_url( $vehicle->url ); ?>" title="<?php echo esc_attr( $vehicle->title ); ?>">
				<?php echo esc_html( $vehicle->title ); ?>
			</a>
		</h3>

		<div class="at-a-glance">
			<ul>
				<li class="odometer">
					<i class="auto-icon-odometer"></i> <?php echo esc_html( $vehicle->odometer ); ?>
				</li>
				<li class="transmission">
					<i class="auto-icon-transmission"></i> <?php echo esc_html( $vehicle->gearbox ); ?>
				</li>
				<li class="characteristics">
					<i class="auto-icon-trunk"></i> <?php echo esc_html( $vehicle->characteristics[0] ); ?>
				</li>
			</ul>
		</div>

		<div class="price">
			<?php echo filter_var( $vehicle->price, FILTER_UNSAFE_RAW ); ?>
		</div>

			<div class="description">
				<?php if ( isset( $vehicle->promo ) && ! empty( $vehicle->promo->message ) ) : ?>
					<?php echo esc_html( $vehicle->promo->message ); ?>
				<?php else : ?>
					<?php echo esc_html_e( 'No description.', 'veekls' ); ?>
				<?php endif; ?>
			</div>

		<div class="bottom-wrap">
			<a class="al-button" href="<?php echo esc_url( $vehicle->url ); ?>" title="<?php esc_attr_e( 'View', 'veekls' ); ?> <?php esc_attr( $vehicle->title ); ?>">
				<?php echo esc_html_e( 'More Details', 'veekls' ); ?> &nbsp; <i class="fa fa-angle-right"></i>
			</a>
		</div>
	</div>
</li>
