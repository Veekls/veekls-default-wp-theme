<?php
/**
 * Add theme dashboard page
 *
 * @package Veekls_Default
 */

/**
 * Dashboard class.
 */
class Veekls_Dashboard {
	/**
	 * Store the theme data.
	 *
	 * @var WP_Theme Theme data.
	 */
	private $theme;

	/**
	 * Theme slug.
	 *
	 * @var string Theme slug.
	 */
	private $slug;

	/**
	 * UTM link.
	 *
	 * @var string UTM link.
	 */
	private $utm;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->theme = wp_get_theme();
		$this->slug  = $this->theme->template;
		$this->utm   = '?utm_source=WordPress&utm_medium=link&utm_campaign=' . $this->slug;

		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_notices', array( $this, 'notice' ) );
	}

	/**
	 * Add theme dashboard page.
	 */
	public function add_menu() {
		$page = add_theme_page(
			$this->theme->name,
			$this->theme->name,
			'edit_theme_options',
			$this->slug,
			array( $this, 'render' )
		);

		add_action( "admin_print_styles-$page", array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Show dashboard page.
	 */
	public function render() {
		add_action( 'admin_footer_text', array( $this, 'footer_text' ) );
		?>

		<div class="wrap">
			<div id="poststuff">
				<div id="post-body" class="columns-2">
					<div id="post-body-content">
						<div class="about-wrap">
							<?php include get_template_directory() . '/inc/dashboard/sections/welcome.php'; ?>
							<?php include get_template_directory() . '/inc/dashboard/sections/tabs.php'; ?>
							<?php include get_template_directory() . '/inc/dashboard/sections/getting-started.php'; ?>
							<?php include get_template_directory() . '/inc/dashboard/sections/actions.php'; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Enqueue scripts for dashboard page.
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( "{$this->slug}-dashboard-style", get_template_directory_uri() . '/inc/dashboard/css/dashboard-style.css', array(), '1.0.0' );
		wp_enqueue_script( "{$this->slug}-dashboard-script", get_template_directory_uri() . '/inc/dashboard/js/script.js', array( 'jquery' ), '1.0.0', true );
	}

	/**
	 *
	 * Change footer text in admin
	 */
	public function footer_text() {
		// Translators: theme name and theme slug.
		echo wp_kses_post( sprintf( __( 'Please rate <strong>%1$s</strong> <a href="https://wordpress.org/support/theme/%2$s/reviews/" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="https://wordpress.org/support/theme/%2$s/reviews/" target="_blank">WordPress.org</a> to help us spread the word. Thank you from WP Auto Listings!', 'veekls' ), $this->theme->name, $this->slug ) );
	}

	/**
	 * Add a notice after theme activation.
	 */
	public function notice() {
		global $pagenow;

		if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) { // phpcs:ignore
			?>

			<div class="updated notice notice-success is-dismissible">
				<p>
					<?php
					// translators: theme name and theme slug.
					echo wp_kses_post( sprintf( __( 'Welcome! Thank you for choosing %1$s. To get started, visit our <a href="%2$s">welcome page</a>.', 'veekls' ), $this->theme->name, esc_url( admin_url( 'themes.php?page=' . $this->slug ) ) ) );
					?>
				</p>
				<p>
					<a class="button" href="<?php echo esc_url( admin_url( 'themes.php?page=' . $this->slug ) ); ?>">
						<?php
						// translators: theme name and theme slug.
						echo esc_html( sprintf( __( 'Get started with %s', 'veekls' ), $this->theme->name ) );
						?>
					</a>
				</p>
			</div>
			<?php
		}
	}

	/**
	 * Recommended Plugin Action.
	 */
	public function recommended_plugins_action() {
		$plugins        = veekls_required_plugins();
		$plugins_number = count( $plugins );
		$installer      = TGM_Plugin_Activation::get_instance();
		$action         = array();

		if ( $plugins_number > 1 ) {
			$action['title'] = esc_html__( 'Install The Recommended Plugins', 'veekls' );
			/* translators: theme name. */
			$action['body']        = sprintf( esc_html__( '%s needs some plugins to working properly. Please install and activate our recommended plugins.', 'veekls' ), $this->theme->name );
			$action['button_text'] = esc_html__( 'Install Plugins', 'veekls' );
		} else {
			$plugin_name = $plugins[0]['name'];
			/* translators: theme name. */
			$action['body'] = sprintf( __( '%1$s needs %2$s to working properly. Please install and activate it.', 'veekls' ), $this->theme->name, $plugin_name );
			/* translators: plugin name. */
			$action['button_text'] = sprintf( esc_html__( 'Install %s', 'veekls' ), $plugin_name );
			$action['title']       = $action['button_text'];

		}

		if ( $installer->is_tgmpa_complete() ) {
			if ( $plugins_number > 1 ) {
				$action['body'] = '<strong>' . esc_html__( 'You have installed and active all recommended plugins', 'veekls' ) . '</strong>';
			} else {
				/* translators: plugin name. */
				$action['body'] = sprintf( __( '<strong>%s has been installed and activated</strong>', 'veekls' ), $plugin_name );
			}

			$action['button_text'] = '';
		}

		return $action;
	}

	/**
	 * Check if Jetpack is recommended
	 */
	public function jetpack_is_recommended() {
		$plugins = veekls_required_plugins();

		foreach ( $plugins as $plugin ) {
			if ( 'jetpack' === $plugin['slug'] ) {
				return true;
			}
		}
	}
}
