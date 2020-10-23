<?php
/**
 * Single listing contact-form
 *
 * This template can be overridden by copying it to yourtheme/listings/single-listing/contact-form.php.
 *
 * @package Veekls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

?>
<div class="contact-form">
	<h3><?php esc_html_e( 'Quick Contact', 'veekls' ); ?></h3>
	<div id="veekls-api-client-contact">
		<?php echo do_shortcode( '[auto_listings_contact_form]' ); ?>
	</div>
</div>
