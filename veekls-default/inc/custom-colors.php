<?php
/**
 * Sample implementation of the Custom colors feature
 *
 * @package Veekls_Default
 */

/**
 * Set up the WordPress custom CSS colors feature.
 */
function veekls_custom_colors() {
	?>
	<!-- Theme custom colors -->
	<style type="text/css">
	:root {
		--color-primary: <?php echo esc_html( get_option( 'veekls_primary_color', '#f01840' ) ); ?>;
		--color-info: <?php echo esc_html( get_option( 'veekls_info_color', '#61707d' ) ); ?>;
		--color-success: <?php echo esc_html( get_option( 'veekls_success_color', '#04a777' ) ); ?>;
		--color-warning: <?php echo esc_html( get_option( 'veekls_warning_color', '#e67f0d' ) ); ?>;
		--color-danger: <?php echo esc_html( get_option( 'veekls_danger_color', '#8332ac' ) ); ?>;
	}
	</style>
	<?php
}

add_action( 'wp_head', 'veekls_custom_colors', -1 );
