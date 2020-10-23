<?php
/**
 * Veekls Theme Customizer
 *
 * @package Veekls
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function veekls_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'veekls_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'veekls_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->remove_control( 'header_image' );

	// Add theme options panel.
	$wp_customize->add_panel(
		'veekls',
		array(
			'title' => esc_html__( 'Theme Options', 'veekls' ),
		)
	);

	/**
	 * Homepage.
	 */
	$wp_customize->add_section(
		'homepage',
		array(
			'title'           => esc_html__( 'Homepage', 'veekls' ),
			'panel'           => 'veekls',
			'active_callback' => 'veekls_is_plugin_active',
		)
	);

	$wp_customize->add_setting(
		'slider_speed',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 3000,
		)
	);
	$wp_customize->add_control(
		'slider_speed',
		array(
			'label'           => esc_html__( 'Featured slider speed', 'veekls' ),
			'section'         => 'homepage',
			'type'            => 'number',
			'active_callback' => 'is_front_page',
			'description'     => esc_html__( 'The animation speed in milliseconds. Enter 0 to disable the slider.', 'veekls' ),
		)
	);

	/**
	 * Search page.
	 */
	$wp_customize->add_setting(
		'search_section',
		array(
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'search_section',
		array(
			'label'       => esc_html__( 'Search Page', 'veekls' ),
			'section'     => 'homepage',
			'type'        => 'dropdown-pages',
			'description' => wp_kses_post( __( 'The content of this page will be displayed below the featured slider on your static front page.', 'veekls' ) ),
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'search_section',
		array(
			'selector'            => '.section--search',
			'container_inclusive' => true,
			'render_callback'     => 'veekls_refresh_search_section',
		)
	);

	/**
	 * All car section.
	 */
	$wp_customize->add_setting(
		'allcar_title',
		array(
			'default'           => esc_html__( 'Browse Cars By Make', 'veekls' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'allcar_title',
		array(
			'label'   => esc_html__( 'All Cars Section Title', 'veekls' ),
			'section' => 'homepage',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'allcar_description',
		array(
			'default'           => esc_html__( 'Available in different categories', 'veekls' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'allcar_description',
		array(
			'label'   => esc_html__( 'All Cars Section Description', 'veekls' ),
			'section' => 'homepage',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'allcar_button_text',
		array(
			'default'           => esc_html__( 'See All Cars', 'veekls' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'allcar_button_text',
		array(
			'label'   => esc_html__( 'All Cars Section Button Text', 'veekls' ),
			'section' => 'homepage',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'allcar_button_url',
		array(
			'default'           => esc_url( get_post_type_archive_link( 'auto-listing' ) ),
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'allcar_button_url',
		array(
			'label'   => esc_html__( 'All Cars Section Button URL', 'veekls' ),
			'section' => 'homepage',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'allcar_image',
		array(
			'sanitize_callback' => 'veekls_sanitize_image',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'homepage',
			array(
				'label'    => esc_html__( 'All Cars Section Image', 'veekls' ),
				'section'  => 'homepage',
				'settings' => 'allcar_image',
			)
		)
	);

	$wp_customize->add_setting(
		'front_page_listings_column',
		array(
			'default'           => '2',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'front_page_listings_column',
		array(
			'label'   => esc_html__( 'Listing Columns.', 'veekls' ),
			'section' => 'homepage',
			'type'    => 'select',
			'choices' => array(
				'2' => esc_html__( '2 columns', 'veekls' ),
				'3' => esc_html__( '3 columns', 'veekls' ),
				'4' => esc_html__( '4 columns', 'veekls' ),
			),
		)
	);

	/**
	 * Call To Action.
	 */
	$wp_customize->add_section(
		'cta_section',
		array(
			'title' => esc_html__( 'Call To Action Section', 'veekls' ),
			'panel' => 'veekls',
		)
	);

	/**
	 * Cta section.
	 */

	$wp_customize->add_setting(
		'cta_title',
		array(
			'default'           => wp_kses_post( __( 'You Want To Have Your Favorite Car?', 'veekls' ) ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'cta_title',
		array(
			'label'   => esc_html__( 'Title', 'veekls' ),
			'section' => 'cta_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'cta_description',
		array(
			'default'           => esc_html__( 'We have a big list of modern & classic cars in both used and new categories.', 'veekls' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'cta_description',
		array(
			'label'   => esc_html__( 'Description', 'veekls' ),
			'section' => 'cta_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'cta_button_text',
		array(
			'default'           => esc_html__( 'go to car listings', 'veekls' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'cta_button_text',
		array(
			'label'   => esc_html__( 'Button Text', 'veekls' ),
			'section' => 'cta_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'cta_button_url',
		array(
			'default'           => esc_url( 'http://example.com/' ),
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'cta_button_url',
		array(
			'label'   => esc_html__( 'Button URL', 'veekls' ),
			'section' => 'cta_section',
			'type'    => 'text',
		)
	);

	// Cta background.
	$wp_customize->add_setting(
		'cta_background',
		array(
			'sanitize_callback' => 'veekls_sanitize_image',
			'default'           => get_template_directory_uri() . '/images/cta.png',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'cta_background',
			array(
				'label'    => esc_html__( 'Background', 'veekls' ),
				'section'  => 'cta_section',
				'settings' => 'cta_background',
			)
		)
	);
}
add_action( 'customize_register', 'veekls_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function veekls_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function veekls_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function veekls_customize_preview_js() {
	wp_enqueue_script( 'veekls-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20180702', true );
}
add_action( 'customize_preview_init', 'veekls_customize_preview_js' );

/**
 * Sanitizes Image Upload.
 *
 * @param string $input potentially dangerous data.
 *
 * @return string
 */
function veekls_sanitize_image( $input ) {
	$filetype = wp_check_filetype( $input );
	if ( $filetype['ext'] && wp_ext2type( $filetype['ext'] ) === 'image' ) {
		return esc_url( $input );
	}

	return '';
}

/**
 * Live refresh search section.
 */
function veekls_refresh_search_section() {
	get_template_part( 'template-parts/home/search-form' );
}
