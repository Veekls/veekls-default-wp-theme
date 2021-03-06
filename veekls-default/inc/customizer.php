<?php
/**
 * Veekls Theme Customizer
 *
 * @package Veekls/Default_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function veekls_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			new WP_Customize_Partial(
				$wp_customize->selective_refresh,
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => 'veekls_customize_partial_blogname',
				)
			)
		);

		$wp_customize->selective_refresh->add_partial(
			new WP_Customize_Partial(
				$wp_customize->selective_refresh,
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => 'veekls_customize_partial_blogdescription',
				)
			)
		);
	}

	$wp_customize->remove_control( 'header_image' );

	// Add theme options panel.
	$wp_customize->add_panel(
		new WP_Customize_Panel(
			$wp_customize,
			'veekls',
			array(
				'title' => esc_html__( 'Theme Options', 'veekls' ),
			)
		)
	);

	// -- Homepage.

	$wp_customize->add_section(
		new WP_Customize_Section(
			$wp_customize,
			'homepage',
			array(
				'title'           => esc_html__( 'Homepage', 'veekls' ),
				'panel'           => 'veekls',
				'active_callback' => 'veekls_is_plugin_active',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'slider_speed',
			array(
				'sanitize_callback' => 'absint',
				'type'              => 'option',
				'default'           => 3000,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'slider_speed',
			array(
				'label'           => esc_html__( 'Featured slider speed', 'veekls' ),
				'section'         => 'homepage',
				'type'            => 'number',
				'active_callback' => 'is_front_page',
				'description'     => esc_html__(
					'The animation speed in milliseconds. Enter 0 to disable the slider.',
					'veekls'
				),
			)
		)
	);

	// -- Search page.

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'search_section',
			array(
				'sanitize_callback' => 'absint',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'search_section',
			array(
				'label'       => esc_html__( 'Search Form Page', 'veekls' ),
				'section'     => 'homepage',
				'type'        => 'dropdown-pages',
				'description' => wp_kses_post(
					__(
						'The content of this page will be displayed below the featured slider on your static front page.',
						'veekls'
					)
				),
			)
		)
	);

	$wp_customize->selective_refresh->add_partial(
		new WP_Customize_Partial(
			$wp_customize->selective_refresh,
			'search_section',
			array(
				'selector'            => '.section--search',
				'container_inclusive' => true,
				'render_callback'     => 'veekls_refresh_search_section',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'front_page_listings_column',
			array(
				'sanitize_callback' => 'absint',
				'type'              => 'option',
				'default'           => 2,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'front_page_listings_column',
			array(
				'label'   => esc_html__( 'Listing Columns', 'veekls' ),
				'section' => 'homepage',
				'type'    => 'select',
				'choices' => array(
					'2' => esc_html__( '2 columns', 'veekls' ),
					'3' => esc_html__( '3 columns', 'veekls' ),
					'4' => esc_html__( '4 columns', 'veekls' ),
				),
			)
		)
	);

	// -- All car section.

	$wp_customize->add_section(
		new WP_Customize_Section(
			$wp_customize,
			'allcar_section',
			array(
				'title' => esc_html__( 'All Cars Section', 'veekls' ),
				'panel' => 'veekls',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'allcar_title',
			array(
				'default'           => esc_html__( 'Browse Cars By Brand', 'veekls' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'allcar_title',
			array(
				'label'   => esc_html__( 'All Cars Section Title', 'veekls' ),
				'section' => 'allcar_section',
				'type'    => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'allcar_description',
			array(
				'default'           => esc_html__( 'Available in different categories', 'veekls' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'allcar_description',
			array(
				'label'   => esc_html__( 'All Cars Section Description', 'veekls' ),
				'section' => 'allcar_section',
				'type'    => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'allcar_button_text',
			array(
				'default'           => esc_html__( 'See All Cars', 'veekls' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'allcar_button_text',
			array(
				'label'   => esc_html__( 'All Cars Section Button Text', 'veekls' ),
				'section' => 'allcar_section',
				'type'    => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'allcar_button_url',
			array(
				'default'           => esc_url( get_post_type_archive_link( 'veekls-listing' ) ),
				'sanitize_callback' => 'esc_url',
				'transport'         => 'postMessage',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'allcar_button_url',
			array(
				'label'   => esc_html__( 'All Cars Section Button URL', 'veekls' ),
				'section' => 'allcar_section',
				'type'    => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'allcar_image',
			array(
				'default'           => get_template_directory_uri() . '/img/all-cars.png',
				'sanitize_callback' => 'veekls_sanitize_image',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'homepage',
			array(
				'label'    => esc_html__( 'All Cars Section Image', 'veekls' ),
				'section'  => 'allcar_section',
				'settings' => 'allcar_image',
			)
		)
	);

	// -- Call To Action.

	$wp_customize->add_section(
		new WP_Customize_Section(
			$wp_customize,
			'cta_section',
			array(
				'title' => esc_html__( 'Call To Action Section', 'veekls' ),
				'panel' => 'veekls',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'cta_title',
			array(
				'default'           => esc_html__( 'Still Looking For You Ideal Car?', 'veekls' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cta_title',
			array(
				'label'       => esc_html__( 'Title', 'veekls' ),
				'description' => esc_html__( 'The text to display as the section title.' ),
				'section'     => 'cta_section',
				'type'        => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'cta_description',
			array(
				'default'           => esc_html__( 'We have an extensive selection of vehicles for you to choose from.', 'veekls' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cta_description',
			array(
				'label'       => esc_html__( 'Description', 'veekls' ),
				'description' => esc_html__( 'The text to display under the section title.' ),
				'section'     => 'cta_section',
				'type'        => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'cta_button_text',
			array(
				'default'           => esc_html__( 'see all vehicles', 'veekls' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cta_button_text',
			array(
				'label'       => esc_html__( 'Button Text', 'veekls' ),
				'description' => esc_html__( 'The text to display on the button.' ),
				'section'     => 'cta_section',
				'type'        => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'cta_button_url',
			array(
				'default'           => esc_url( '/vehicles' ),
				'sanitize_callback' => 'esc_url',
				'transport'         => 'postMessage',
				'type'              => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cta_button_url',
			array(
				'label'       => esc_html__( 'Button URL', 'veekls' ),
				'description' => esc_html__( 'The URL for the button. Can be relative or absolute.' ),
				'section'     => 'cta_section',
				'type'        => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'cta_background',
			array(
				'default'           => get_template_directory_uri() . '/img/cta.jpg',
				'sanitize_callback' => 'veekls_sanitize_image',
				'type'              => 'option',
			)
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

	// -- Location.

	$wp_customize->add_section(
		new WP_Customize_Section(
			$wp_customize,
			'location_section',
			array(
				'title' => esc_html__( 'Location Section', 'veekls' ),
				'panel' => 'veekls',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'veekls_location_page',
			array(
				'type' => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'veekls_location_page',
			array(
				'label'       => esc_html__( 'Location Map Embed Page', 'veekls' ),
				'section'     => 'location_section',
				'type'        => 'dropdown-pages',
				'description' => wp_kses_post(
					__(
						'The content of this page will be displayed below the Call to Action section.',
						'veekls'
					)
				),
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'veekls_location_show_title',
			array(
				'sanitize_callback' => 'esc_attr',
				'type'              => 'option',
				'default'           => 1,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'veekls_location_show_title',
			array(
				'label'       => esc_html__( 'Show Title', 'veekls' ),
				'section'     => 'location_section',
				'type'        => 'checkbox',
				'description' => esc_html__( 'Whether to show the page title.', 'veekls' ),
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'veekls_location_show_excerpt',
			array(
				'sanitize_callback' => 'esc_attr',
				'type'              => 'option',
				'default'           => 0,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'veekls_location_show_excerpt',
			array(
				'label'       => esc_html__( 'Show Excerpt', 'veekls' ),
				'section'     => 'location_section',
				'type'        => 'checkbox',
				'description' => esc_html__( 'Whether to show the page excerpt.', 'veekls' ),
			)
		)
	);

	// -- Colors.
	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'veekls_primary_color',
			array(
				'default' => '#f01840',
				'type'    => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'veekls_primary_color',
			array(
				'label'    => esc_html__( 'Primary Color', 'veekls' ),
				'settings' => 'veekls_primary_color',
				'section'  => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'veekls_info_color',
			array(
				'default' => '#61707d',
				'type'    => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'veekls_info_color',
			array(
				'label'    => esc_html__( 'Info Color', 'veekls' ),
				'settings' => 'veekls_info_color',
				'section'  => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'veekls_success_color',
			array(
				'default' => '#04a777',
				'type'    => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'veekls_success_color',
			array(
				'label'    => esc_html__( 'Success Color', 'veekls' ),
				'settings' => 'veekls_success_color',
				'section'  => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'veekls_warning_color',
			array(
				'default' => '#e67f0d',
				'type'    => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'veekls_warning_color',
			array(
				'label'    => esc_html__( 'Warning Color', 'veekls' ),
				'settings' => 'veekls_warning_color',
				'section'  => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		new WP_Customize_Setting(
			$wp_customize,
			'veekls_danger_color',
			array(
				'default' => '#8332ac',
				'type'    => 'option',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'veekls_danger_color',
			array(
				'label'    => esc_html__( 'Danger Color', 'veekls' ),
				'settings' => 'veekls_danger_color',
				'section'  => 'colors',
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
