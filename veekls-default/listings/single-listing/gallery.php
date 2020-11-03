<?php
/**
 * Single listing gallery
 *
 * This template can be overridden by copying it to yourtheme/listings/single-listing/gallery.php.
 *
 * @package Veekls_Default
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vehicle = $args['vehicle'];
$new     = true;
?>

<div class="gallery-wrap">
	<?php if ( $new ) : ?>
		<span style="background:<?php echo esc_attr( $new ); ?>;" class="highlight-new">
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
