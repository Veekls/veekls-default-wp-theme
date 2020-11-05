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

$compact               = $args['compact'];
$vehicle               = $args['vehicle'];
$vehicle_title         = apply_filters( 'veekls_title', $vehicle );
$vehicle_url           = '/vehicle?id=' . $vehicle->_id;
$vehicle_price         = apply_filters( 'veekls_price', $vehicle );
$vehicle_branch        = isset( $vehicle->branch ) && ! empty( $vehicle->branch->name ) ? $vehicle->branch->name : null;
$vehicle_promo_message = isset( $vehicle->promo ) && ! empty( $vehicle->promo->message ) ? $vehicle->promo->message : null;
$vehicle_promo_starred = isset( $vehicle->promo ) && ! empty( $vehicle->promo->starredAt );
$vehicle_thumbnail     = apply_filters(
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

<li class="col-<?php echo esc_attr( $cols ); ?> has-thumbnail">
	<div class="image">
		<a href="<?php echo esc_url( $vehicle_url ); ?>" title="<?php echo esc_attr( $vehicle_title ); ?>">
			<?php if ( ! empty( $vehicle->pictures ) ) : ?>
				<span class="status">
					<i class="fas fa-images"></i>
					<?php echo esc_html( count( $vehicle->pictures ) ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $vehicle_promo_starred ) : ?>
				<span class="highlight-new">
					<i class="fas fa-star"></i> <?php esc_html_e( 'Starred', 'veekls' ); ?>
				</span>
			<?php endif; ?>

			<img alt="<?php echo esc_attr( $vehicle_title ); ?>" src="<?php echo esc_url( $vehicle_thumbnail ); ?>"/>
		</a>
	</div>

	<?php
	get_template_part(
		'listings/loop/at-a-glance',
		'At a Glance',
		array(
			'vehicle' => $vehicle,
		)
	);
	?>

	<div class="summary">
		<h3 class="title">
			<a href="<?php echo esc_url( $vehicle_url ); ?>" title="<?php echo esc_attr( $vehicle_title ); ?>">
				<?php echo esc_html( $vehicle_title ); ?>
			</a>
		</h3>

		<?php
		get_template_part(
			'listings/loop/at-a-glance',
			'At a Glance',
			array(
				'vehicle' => $vehicle,
			)
		);
		?>

		<div class="characteristics">
			<i class="fas fa-list"></i>
			<?php if ( ! isset( $vehicle->characteristics ) || empty( $vehicle->characteristics ) ) : ?>
				<?php echo esc_html_e( 'None specified', 'veekls' ); ?>
			<?php else : ?>
				<?php echo esc_html( apply_filters( 'veekls_short_characteristics', $vehicle ) ); ?>
			<?php endif; ?>
		</div>

		<div class="price">
			<?php echo wp_kses_post( $vehicle_price ); ?>
		</div>

		<?php if ( isset( $compact ) && ! $compact ) : ?>
			<div class="description">
				<?php if ( ! empty( $vehicle_promo_message ) ) : ?>
					<?php echo esc_html( $vehicle_promo_message ); ?>
				<?php else : ?>
					<?php echo esc_html_e( 'No description.', 'veekls' ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="bottom-wrap">
			<a class="veekls-button" href="<?php echo esc_url( $vehicle_url ); ?>" title="<?php esc_attr_e( 'View', 'veekls' ); ?> <?php esc_attr( $vehicle->title ); ?>">
				<?php echo esc_html_e( 'More Details', 'veekls' ); ?> &nbsp; <i class="fa fa-angle-right"></i>
			</a>
		</div>
	</div>
</li>
