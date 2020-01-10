<?php
/**
 * The template part for displaying search form on front page
 *
 * @package VeeklsDefaultTheme
 */

$new_listing = false;

$listing_status = array(
	'status'     => __( 'Low Mileage' ),
	'icon'       => 'default',
	'text_color' => 'white',
	'bg_color'   => 'blue',
);

$image_url = apply_filters(
	'veekls_picture',
	$vehicle->pictures[0],
	array(
		'thumbnail' => 'md',
	)
);
?>

<div class="image">
	<a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
		<?php if ( $listing_status ) : ?>
			<span style="background:<?php echo esc_attr( $listing_status['bg_color'] ); ?>;color:<?php echo esc_attr( $listing_status['text_color'] ); ?>" class="status <?php echo esc_attr( $listing_status['status'] ); ?>">
				<?php if ( $listing_status['icon'] ) : ?>
					<i class="<?php echo esc_attr( $listing_status['icon'] ); ?>"></i>
				<?php endif; ?>
				<?php echo esc_html( $listing_status['status'] ); ?>
			</span>
		<?php endif; ?>

		<?php if ( $new_listing ) : ?>
			<span style="background:<?php echo esc_attr( $new_listing ); ?>;" class="highlight-new">
				<i class="fa fa-star"></i>
				<?php esc_html_e( 'New Listing', 'veekls' ); ?>
			</span>
		<?php endif; ?>

		<img
			src="<?php echo esc_url( $image_url ); ?>"
			alt="Picture from Veekls"
			/>
	</a>
</div>
