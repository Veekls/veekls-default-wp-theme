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
		<div class="<?php is_active_sidebar( 'veekls-api-client' ) ? 'has-sidebar' : 'listing-no-sidebar'; ?>">

		<div class="auto-listings-view-switcher">
			<div id="list" class="list"><i class="fa fa-list"></i></div>
			<div id="grid" class="grid"><i class="fa fa-th"></i></div>
		</div>

		<?php
		$cols  = get_theme_mod( 'front_page_listings_column', 2 );
		$count = 1;
		?>

		<?php foreach ( $vehicles as $vehicle ) : ?>
			<?php if ( 1 === $count % $cols ) : ?>
				<ul class="veekls-api-client-items">
			<?php endif; ?>

			<?php
			get_template_part(
				'listings/content-listing',
				'Content Listing',
				array(
					'vehicle' => $vehicle,
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

		<?php if ( is_active_sidebar( 'veekls-api-client' ) ) : ?>
			<div class="sidebar">
				<?php dynamic_sidebar( 'veekls-api-client' ); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
