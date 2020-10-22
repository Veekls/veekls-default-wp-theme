<?php
/**
 * Contact Widget
 *
 * @package CarListings
 */

/**
 * Class Contact Widget
 */
class Carlistings_Contact_Widget extends WP_Widget
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'carlistings-contact-info',
            'description' => __('Display your contact information.', 'carlistings'),
        );

        parent::__construct(
            'carlistings-contact-info',
            esc_html__('Carlistings: Contact Info', 'carlistings'),
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
    public function defaults()
    {
        return array(
            'time' => __('10:00 AM to 5:00 PM', 'carlistings'),
            'email' => __('name@example.com', 'carlistings'),
            'address' => __('Example St. 4450 - City', 'carlistings'),
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
    public function widget($args, $instance)
    {
        $instance = wp_parse_args($instance, $this->defaults());
        ?>

		<?php echo $args['before_widget']; ?>

        <ul class="contact">
			<?php if ('' !== $instance['time']): ?>
				<li>
					<i class="icofont icofont-clock-time"></i>
					<?php echo esc_html($instance['time']); ?>
				</li>
			<?php endif;?>

			<?php if (is_email(trim($instance['email']))): ?>
				<?php $email = esc_html($instance['email']);?>
				<li>
					<a href="mailto:<?php echo $email; ?>">
						<i class="icofont icofont-envelope"></i>
						<?php echo $email; ?>
					</a>
				</li>
			<?php endif;?>

			<?php if (!empty(trim($instance['address']))): ?>
				<?php $address = esc_html($instance['address']);?>
				<li>
					<a href="https://maps.google.com/<?php echo urlencode($address); ?>" target="_blank">
						<i class="icofont icofont-google-map"></i>
						<?php echo $address; ?>
					</a>
				</li>
			<?php endif;?>
		</ul>

        <?php echo $args['after_widget']; ?>
		<?php
}

    /**
     * Update the widget settings.
     *
     * @param array $new_instance New configuration values.
     * @param array $old_instance Old configuration values.
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['time'] = wp_strip_all_tags($new_instance['time']);
        $instance['email'] = wp_strip_all_tags($new_instance['email']);
        $instance['address'] = wp_strip_all_tags($new_instance['address']);

        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array $instance Instance configuration.
     *
     * @return void
     */
    public function form($instance)
    {
        $instance = wp_parse_args($instance, $this->defaults());
        ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('time')); ?>"><?php esc_html_e('Working Time:', 'carlistings');?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('time')); ?>" name="<?php echo esc_attr($this->get_field_name('time')); ?>" type="text" value="<?php echo esc_attr($instance['time']); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'carlistings');?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($instance['email']); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'carlistings');?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($instance['address']); ?>">
		</p>
		<?php
}
}
