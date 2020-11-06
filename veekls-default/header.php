<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Veekls
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'veekls' ); ?>
		</a>

		<header id="ui segment masthead" class="site-header">
			<div class="ui small menu">
				<div class="ui container">
					<?php if ( is_active_sidebar( 'topbar-contact' ) ) : ?>
						<?php dynamic_sidebar( 'topbar-contact' ); ?>
					<?php endif; ?>

					<?php if ( function_exists( 'jetpack_social_menu' ) ) : ?>
						<?php jetpack_social_menu(); ?>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'topbar-languages' ) ) : ?>
						<?php dynamic_sidebar( 'topbar-languages' ); ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="ui menu">
				<div class="ui container">
					<div class="site-branding header item">
						<?php the_custom_logo(); ?>

						<?php if ( is_front_page() || is_home() ) : ?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
						<?php else : ?>
							<p class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</p>
						<?php endif; ?>

						<?php $description = get_bloginfo( 'description', 'display' ); ?>

						<?php if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo wp_kses_post( $description ); ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->

					<nav id="site-navigation" class="main-navigation right menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'primary-menu',
							)
						);
						?>

						<div class="menu item">
							<button class="menu-toggle ui button" aria-controls="primary-menu" aria-expanded="false">
								<span class="bar"></span>
								<?php esc_html_e( 'Menu', 'veekls' ); ?>
							</button>
						</div>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</header><!-- #masthead -->

		<?php if ( is_front_page() && ! is_home() ) : ?>
			<?php get_template_part( 'template-parts/featured-content' ); ?>
		<?php endif; ?> <!-- featured-content -->

		<?php if ( ! is_front_page() ) : ?>
			<div class="page-header">
				<div class="container">
					<?php veekls_breadcrumbs(); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( is_front_page() && ! is_home() ) : ?>
			<div id="content" class="site-content">
		<?php else : ?>
			<div id="content" class="site-content container">
		<?php endif; ?>
