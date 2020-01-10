<?php
/**
 * Contact Widget
 *
 * @package VeeklsDefaultTheme
 */

/**
 * Class Contact Widget.
 */
class Veekls_Default_Theme_Contact_Widget extends WP_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'veekls-default-theme-contact-info',
			'description' => __(
				'Display your contact information.',
				'veekls-default-theme'
			),
		);

		parent::__construct(
			'veekls-default-theme-contact-info',
			esc_html__(
				'Veekls Default Theme: Contact Info',
				'veekls-default-theme'
			),
			$widget_ops
		);
	}

	/**
	 * Return an associative array of default values
	 *
	 * These values are used in new widgets.
	 *
	 * @return array Array of default values for the Widget's options
	 */
	public function defaults() {
		return array(
			'address' => __( 'Veekls Av. 1133, Veekls - Chile. ', 'veekls-default-theme' ),
			'time'    => __( '10:00 AM to 5:00 PM', 'veekls-default-theme' ),
			'email'   => __( 'name@example.com ', 'veekls-default-theme' ),
		);
	}

	/**
	 * Outputs the HTML for this widget.
	 *
	 * @param array $args     An array of standard parameters for widgets in this theme.
	 * @param array $instance An array of settings for this widget instance.
	 *
	 * @return void Echoes it's output
	 **/
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults() );

		echo $args['before_widget']; // phpcs:ignore

		?>
		<ul class="contact">
		<?php

		if ( '' !== $instance['time'] ) {
			?>
			<li>
				<i class="icofont icofont-clock-time"></i>
				<?php echo esc_html( $instance['time'] ); ?>
			</li>
			<?php
		}

		if ( '' !== $instance['address'] ) {
			?>
			<li>
				<i class="icofont icofont-google-map"></i>
				<?php echo esc_html( $instance['address'] ); ?>
			</li>
			<?php
		}

		if ( is_email( trim( $instance['email'] ) ) ) {
			$email = $instance['email'];
			?>
			<li>
				<a href="mailto:<?php echo esc_html( $email ); ?>">
					<i class="icofont icofont-envelope"></i>
					<?php echo esc_html( $email ); ?>
				</a>
			</li>
			<?php
		}

		echo $args['after_widget']; // phpcs:ignore
	}


	/**
	 * Update the widget settings.
	 *
	 * @param array $new_instance New configuration values.
	 * @param array $old_instance Old configuration values.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance            = array();
		$instance['address'] = wp_strip_all_tags( $new_instance['address'] );
		$instance['email']   = wp_strip_all_tags( $new_instance['email'] );
		$instance['time']    = wp_strip_all_tags( $new_instance['time'] );

		return $instance;
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 *
	 * @param array $instance Instance configuration.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults() );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'time' ) ); ?>">
				<?php esc_html_e( 'Working Time:', 'veekls-default-theme' ); ?>
			</label>
			<input
				name="<?php echo esc_attr( $this->get_field_name( 'time' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'time' ) ); ?>"
				value="<?php echo esc_attr( $instance['time'] ); ?>"
				class="widefat"
				type="text"
				>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>">
				<?php esc_html_e( 'Address:', 'veekls-default-theme' ); ?>
			</label>
			<input
				name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"
				value="<?php echo esc_attr( $instance['address'] ); ?>"
				class="widefat"
				type="text"
				>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>">
				<?php esc_html_e( 'Email:', 'veekls-default-theme' ); ?>
			</label>
			<input
				name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"
				value="<?php echo esc_attr( $instance['email'] ); ?>"
				class="widefat"
				type="email"
				>
		</p>
		<?php
	}
}
