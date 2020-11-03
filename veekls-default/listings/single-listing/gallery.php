<?php
/**
 * Single Vehicle Gallery
 *
 * Display the pictures gallery for the selected vehicle.
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vehicle = $args['vehicle'];
$starred = ! empty( $vehicle->promo ) && ! empty( $vehicle->promo->starredAt );
?>

<div class="gallery-wrap">
	<?php if ( $starred ) : ?>
		<span class="highlight-new">
			<i class="fas fa-star"></i> <?php esc_html_e( 'New Listing', 'veekls' ); ?>
		</span>
	<?php endif; ?>

	<ul id="image-gallery">
		<?php foreach ( $vehicle->pictures as $picture ) : ?>
			<?php
			$thumb_sm = apply_filters( 'veekls_picture', $picture, array( 'thumbnail' => 'sm' ) );
			$thumb_md = apply_filters( 'veekls_picture', $picture, array( 'thumbnail' => 'md' ) );
			$full     = apply_filters( 'veekls_picture', $picture );
			?>

			<li data-thumb="<?php echo esc_url( $thumb_sm ); ?>" data-src="<?php echo esc_url( $full ); ?>">
				<img src="<?php echo esc_url( $thumb_md ); ?>" />
			</li>
		<?php endforeach; ?>
	</ul>
</div>
