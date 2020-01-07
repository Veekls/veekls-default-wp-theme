<?php
/**
 * Bottom section
 *
 * This template can be overridden by copying it to yourtheme/listings/loop/bottom.php.
 *
 * @package VeeklsDefaultTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! carlistings_is_plugin_active() ) {
	return;
}
?>

<div class="bottom-wrap">
	<a class="al-button" href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'View', 'veekls-default-theme' ); ?> <?php the_title_attribute(); ?>"><?php esc_html_e( 'More Details', 'veekls-default-theme' ); ?>
	</a>
</div>
