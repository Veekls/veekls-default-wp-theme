<?php
/**
 * Add required and recommended plugins.
 *
 * @package VeeklsDefaultTheme
 */

add_action( 'tgmpa_register', 'carlistings_register_required_plugins', 11 );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function carlistings_register_required_plugins() {
	$plugins = carlistings_required_plugins();

	$config = array(
		'id'          => 'veekls-default-theme',
		'has_notices' => false,
		'parent_slug' => 'themes.php',
		'capability'  => 'install_themes',
	);
	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function carlistings_required_plugins() {
	return array(
		array(
			'name' => esc_html__( 'Jetpack', 'veekls-default-theme' ),
			'slug' => 'jetpack',
		),
		array(
			'name' => esc_html__( 'Veekls', 'veekls-default-theme' ),
			'slug' => 'auto-listings',
		),
		array(
			'name' => esc_html__( 'Meta Box', 'veekls-default-theme' ),
			'slug' => 'meta-box',
		),
		array(
			'name' => esc_html__( 'Slim SEO', 'veekls-default-theme' ),
			'slug' => 'slim-seo',
		),
	);
}
