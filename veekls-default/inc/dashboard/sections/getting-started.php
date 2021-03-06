<?php
/**
 * Getting started section.
 *
 * @package Veekls_Default
 */

?>

<div id="getting-started" class="gt-tab-pane gt-is-active">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Implement Recommended Actions', 'veekls' ); ?></h3>
			<p>
				<?php
				// translators: Theme name.
				echo esc_html( sprintf( __( 'We have made a list of steps for you, to make sure you will get the most of %s. They are easy to follow.', 'veekls' ), $this->theme->name ) );
				?>
			</p>
			<p>
				<a href="#actions" class="action-links button"><?php esc_html_e( 'Recommended Actions', 'veekls' ); ?></a>
			</p>

			<h3><?php esc_html_e( 'Customize The Theme', 'veekls' ); ?></h3>
			<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'veekls' ); ?></p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button"><?php esc_html_e( 'Start Customize', 'veekls' ); ?></a>
			</p>

			<h3><?php esc_html_e( 'Read Full Documentation', 'veekls' ); ?></h3>
			<p class="about"><?php esc_html_e( 'Need any help to setup and configure the theme? Please check our full documentation for detailed information on how to use it.', 'veekls' ); ?></p>
			<p>
				<a href="<?php echo esc_url( "https://wordpress.veekls.com/docs/{$this->slug}/{$this->utm}" ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Read Documentation', 'veekls' ); ?></a>
			</p>
		</div>

		<div class="col">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.jpg' ); ?>" alt="<?php esc_attr_e( 'screenshot', 'veekls' ); ?>">
		</div>
	</div>
</div>
