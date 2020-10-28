<?php
/**
 * Add required and recommended plugins.
 *
 * @package Veekls
 */

add_action( 'tgmpa_register', 'veekls_register_required_plugins', 11 );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function veekls_register_required_plugins() {
	$plugins = veekls_required_plugins();

	$config = array(
		'id'          => 'veekls',
		'has_notices' => false,
		'parent_slug' => 'themes.php',
		'capability'  => 'install_themes',
	);

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function veekls_required_plugins() {
	return array(
		array(
			'name' => esc_html__( 'Jetpack', 'veekls' ),
			'slug' => 'jetpack',
		),
		array(
			'name' => esc_html__( 'Veekls API Client', 'veekls' ),
			'slug' => 'veekls-api-client',
		),
		array(
			'name' => esc_html__( 'Slim SEO', 'veekls' ),
			'slug' => 'slim-seo',
		),
	);
}
