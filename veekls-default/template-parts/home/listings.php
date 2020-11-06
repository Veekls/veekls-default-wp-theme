<?php
/**
 * The Template for displaying the listings archive
 *
 * This template can be overridden by copying it to yourtheme/listings/archive-listing.php.
 *
 * @package Veekls
 */

if ( ! veekls_is_plugin_active() ) {
	return;
}

$vehicles = apply_filters( 'veekls_fetch_vehicles', array() );
?>

<div id="container" class="container">
	<div id="content" class="content" role="main">
		<div class="<?php echo is_active_sidebar( 'veekls' ) ? 'has-sidebar' : 'listing-no-sidebar'; ?>">

		<?php get_template_part( 'template-parts/view-switcher' ); ?>

		<?php
		$cols  = get_option( 'front_page_listings_column', 2 );
		$count = 1;
		?>

		<?php foreach ( $vehicles as $vehicle ) : ?>
			<?php if ( 1 === $count % $cols ) : ?>
				<ul class="veekls-items grid-view">
			<?php endif; ?>

			<?php
			get_template_part(
				'veekls/multiple/content',
				'Multiple Content',
				array(
					'vehicle' => $vehicle,
					'compact' => true,
				)
			);
			?>

			<?php if ( 0 === $count % $cols ) : ?>
				</ul>
			<?php endif; ?>

			<?php $count++; ?>
		<?php endforeach; ?>

		<?php if ( 1 !== $count % $cols ) : ?>
			</ul>
		<?php endif ?>
		</div>

		<?php if ( is_active_sidebar( 'veekls' ) ) : ?>
			<div class="sidebar">
				<?php dynamic_sidebar( 'veekls' ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
