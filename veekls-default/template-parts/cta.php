<?php
/**
 * Call to Action
 *
 * The template part for displaying CTA section.
 *
 * @package Veekls/Default_Theme
 */

$cta_title       = get_option( 'cta_title' );
$cta_description = get_option( 'cta_description' );
$button_url      = get_option( 'cta_button_url' );
$button_text     = get_option( 'cta_button_text' );

$image_background = get_option( 'cta_background', get_template_directory_uri() . '/img/cta.jpg' );
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
