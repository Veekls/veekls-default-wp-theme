<?php
/**
 * The template part for displaying cta section
 *
 * @package Veekls
 */

$cta_title       = get_theme_mod( 'cta_title', __( 'You Want To Have Your Favorite Car?', 'veekls' ) );
$cta_description = get_theme_mod( 'cta_description', __( 'We have a big list of modern & classic cars in both used and new categories.', 'veekls' ) );
$button_url      = get_theme_mod( 'cta_button_url', 'http://example.com/' );
$button_text     = get_theme_mod( 'cta_button_text', __( 'go to car listings', 'veekls' ) );

$image_background = get_theme_mod( 'cta_background', get_template_directory_uri() . '/images/cta.png' );

?>

<section class="section--cta" style="background-image: url( <?php echo esc_url( $image_background ); ?> )">
	<div class="container">
		<div class="section-cta__left">
			<h2 class="cta-title"><?php echo esc_html( $cta_title ); ?></h2>
			<p class="cta-description"><?php echo esc_html( $cta_description ); ?></p>
		</div>

		<?php if ( ! empty( $button_url ) && ! empty( $button_text ) ) : ?>
			<div class="section-cta__right">
				<a href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_text ); ?></a>
			</div>
		<?php endif; ?>
</div>
</section>
