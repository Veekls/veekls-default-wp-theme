<?php
/**
 * Recommended Actions Section.
 *
 * @package VeeklsDefaultTheme
 */

$actions = $this->recommended_plugins_action();
?>
<div id="actions" class="gt-tab-pane">
	<h3><?php echo esc_html( $actions['title'] ); ?></h3>
	<p><?php echo wp_kses_post( $actions['body'] ); ?></p>

	<?php if ( ! empty( $actions['button_text'] ) ) : ?>
		<a class="button" href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins&plugin_status=install' ) ); ?>"><?php echo esc_html( $actions['button_text'] ); ?></a>
	<?php endif; ?>

	<?php if ( $this->jetpack_is_recommended() ) : ?>
		<h3><?php esc_html_e( 'Connect Your Site To Jetpack', 'veekls-default-theme' ); ?></h3>
		<p>
			<?php
			/* translators: theme name. */
			echo esc_html( sprintf( __( '%s uses Jetpack to support featured content, social menu. Connect to Jetpack to use these features as well as variety of other tools.', 'veekls-default-theme' ), $this->theme->name ) );
			?>
		</p>
		<a class="button" href="<?php echo esc_url( admin_url( 'themes.php?page=jetpack#/dashboard' ) ); ?>"><?php esc_html_e( 'Connect To Jetpack', 'veekls-default-theme' ); ?></a>
	<?php endif; ?>

	<h3><?php esc_html_e( 'Import Demo Data (Optional)', 'veekls-default-theme' ); ?></h3>
	<p><?php esc_html_e( 'Import demo data if you want your website exactly the same as our demo.', 'veekls-default-theme' ); ?></p>
	<a class="button" href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ); ?>"><?php esc_html_e( 'Import Demo Now', 'veekls-default-theme' ); ?></a>
</div>
