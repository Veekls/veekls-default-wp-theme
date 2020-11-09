<?php
/**
 * Template Name: Multiple Vehicles Layout
 * Template Post Type: page
 *
 * The Template for displaying listing content in the veekls/multiple/content.php template
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

get_header();

$vehicles = apply_filters( 'veekls_fetch_vehicles', $_GET );
?>

<div id="container" class="container">
	<main id="content" class="content">
		<div class="full-width upper">
			<?php the_content(); ?>
		</div>

		<div class="<?php echo is_active_sidebar( 'veekls' ) ? 'has-sidebar' : 'listing-no-sidebar'; ?>">
			<?php get_template_part( '/veekls/multiple/orderby' ); ?>
			<?php get_template_part( '/veekls/multiple/pagination' ); ?>
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
	</main>
</div>

<?php
get_footer();
