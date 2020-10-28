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
		--color-primary: <?php echo esc_html( get_theme_mod( 'primary_color' ) ); ?>;
		--color-info: <?php echo esc_html( get_theme_mod( 'info_color' ) ); ?>;
		--color-success: <?php echo esc_html( get_theme_mod( 'success_color' ) ); ?>;
		--color-warning: <?php echo esc_html( get_theme_mod( 'warning_color' ) ); ?>;
		--color-danger: <?php echo esc_html( get_theme_mod( 'danger_color' ) ); ?>;
	}
	</style>
	<?php
}

add_action( 'wp_head', 'veekls_custom_colors', -1 );
