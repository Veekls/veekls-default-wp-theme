<?php
/**
 * Welcome section.
 *
 * @package Veekls
 */

?>

<h1>
	<?php
	// translators: Theme name.
	echo esc_html( sprintf( __( 'Welcome to %1$s', 'veekls' ), $this->theme->name, $this->theme->version ) );
	?>
</h1>

<p class="about-rating">
	<?php
	// translators: Theme name.
	echo wp_kses_post( sprintf( __( 'Please rate us <a href="https://wordpress.org/support/theme/%1$s/reviews/" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="https://wordpress.org/support/theme/%1$s/reviews/" target="_blank">WordPress.org</a> to help us improve for you.', 'veekls' ), $this->slug ) );
	?>
</p>

<div class="about-text"><?php echo esc_html( $this->theme->description ); ?></div>

<a target="_blank" href="<?php echo esc_url( 'https://wordpress.veekls.com/' . $this->utm ); ?>" class="wp-badge"><?php esc_html_e( 'Veekls WordPress', 'veekls' ); ?></a>

<p class="about-buttons">
	<a target="_blank" class="button" href="<?php echo esc_url( 'https://wordpress.veekls.com/support/' . $this->utm ); ?>"><?php esc_html_e( 'Support', 'veekls' ); ?></a>
</p>
