<?php
/**
 * The Template for displaying the listings archive
 *
 * This template can be overridden by copying it to yourtheme/listings/archive-listing.php.
 *
 * @package VeeklsDefaultTheme
 */

if ( ! veekls_is_plugin_active() ) {
	return;
}

$vehicles = apply_filters( 'veekls_fetch_vehicles', array() );

if ( empty( $vehicles ) ) {
	return;
}
?>

<div id="container" class="container">
	<div id="content" class="content" role="main">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="has-sidebar">
		<?php else : ?>
			<div class="listing-no-sidebar">
		<?php endif; ?>
			<?php
			get_template_part( 'template-parts/listings/view-switcher' );

			$cols  = get_theme_mod( 'front_page_listings_column', 2 );
			$count = 1;

			foreach ( $vehicles as $vehicle ) {
				set_query_var( 'vehicle', $vehicle );

				if ( 1 === $count % $cols ) {
					?>
					<ul class="veekls-items grid-view">
					<?php
				}
				?>

				<li <?php post_class( 'col-' . $cols ); ?>>
					<?php
					get_template_part( 'template-parts/listings/image' );
					get_template_part( 'template-parts/listings/at-a-glance' );
					?>

					<div class="summary">
						<?php
						get_template_part( 'template-parts/listings/title' );
						get_template_part( 'template-parts/listings/price' );
						get_template_part( 'template-parts/listings/address' );
						get_template_part( 'template-parts/listings/description' );
						get_template_part( 'template-parts/listings/bottom' );
						?>
					</div>
				</li>
				<?php

				if ( 0 === $count % $cols ) {
					?>
					</ul>
					<?php
				}

				$count++;
			};

			if ( 1 !== $count % $cols ) {
				echo '</ul>';
			}

			wp_reset_postdata();
			?>

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			</div><!-- has-sidebar -->

			<div class="sidebar">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		<?php else : ?>
			</div>
		<?php endif; ?>
	</div>
</div>
