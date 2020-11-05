<?php
/**
 * Template Name: Single Vehicle Layout
 * Template Post Type: page
 *
 * The Template for displaying listing content in the single-listing.php template
 *
 * This template can be overridden by copying it to yourtheme/listings/content-single-listing.php.
 *
 * @package Veekls/Default_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

$vehicle_id    = isset( $_GET['id'] ) && ! empty( $_GET['id'] ) ? sanitize_text_field( wp_unslash( $_GET['id'] ) ) : null; // phpcs:ignore
$vehicle       = apply_filters( 'veekls_fetch_vehicle', $vehicle_id );
$vehicle_title = apply_filters( 'veekls_title', $vehicle ) . ' ' . $vehicle->year;

// Set proper document title.
add_filter(
	'document_title_parts',
	function ( $title_parts ) use ( $vehicle_title ) {
		$title_parts['title'] = $vehicle_title;

		return $title_parts;
	}
);

// Set proper page title.
add_filter(
	'the_title',
	function ( $title ) use ( $vehicle_title ) {
		// Only if it's this page.
		if ( 'Vehicle' === $title ) {
			return $vehicle_title;
		}

		return $title;
	}
);

wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/css/lightslider.min.css', array(), '1.1.3' );
wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/js/lightslider.min.js', array(), '1.1.3', true );

wp_enqueue_style( 'lightgallery', get_template_directory_uri() . '/css/lightgallery.min.css', array(), '1.9.1' );
wp_enqueue_script( 'lightgallery', get_template_directory_uri() . '/js/lightgallery-all.min.js', array(), '1.9.1', true );

get_header();

get_template_part(
	'veekls/single/content',
	'Vehicle Page',
	array(
		'vehicle' => $vehicle,
	)
);

get_footer();
