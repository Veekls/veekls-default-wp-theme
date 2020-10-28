<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Veekls
 */

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function veekls_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	?>

	<span class="posted-on">
		<a href="' . esc_url( get_the_permalink() ) . '"><i class="fas fa-clock"></i>
		<?php wp_kses_post( $time_string ); ?>
		</a>
	</span>
	<?php
}

/**
 * Prints HTML with meta information for the comment number.
 */
function veekls_print_comment_link() {
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		?>
		<span class="comments-link"><i class="fas fa-comments"></i>
			<?php comments_popup_link(); ?>
		</span>
		<?php
	}
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function veekls_entry_footer() {
	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'veekls' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);

	// Post tags.
	if ( 'post' === get_post_type() ) {
		the_tags( '<span class="tags-links">', '', '</span>' );
	}
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function veekls_get_category() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		?>
		<span class="entry-header__category">
		<?php
		// translators: used between list items, there is a space after the comma.
		the_category( esc_html__( ', ', 'veekls' ) );
		?>

		</span>
		<?php
	}
}

/**
 * Author Box.
 */
function veekls_author_box() {
	$description = get_the_author_meta( 'description' );

	if ( empty( $description ) ) {
		return;
	}
	?>

	<div class="entry-author">
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 85 ); ?>
		</div><!-- .author-avatar -->

		<div class="author-info">
			<div class="author-header">
				<div class="author-heading">
					<h3 class="author-title">
						<?php echo '<span class="author-name">' . esc_html( get_the_author() ) . '</span>'; ?>
					</h3>
				</div>
			</div>

			<div class="author-bio">
				<?php the_author_meta( 'description' ); ?>
			</div><!-- .author-bio -->
		</div><!-- .author-info -->
	</div><!-- .entry-author -->
	<?php
}

/**
 * Get car ids.
 */
function veekls_get_car_ids() {
	$vehicles = apply_filters( 'veekls_fetch_vehicles', array() );

	return $vehicles;
}

/**
 * Getter function for section car by make.
 */
function veekls_get_car_lists() {
	$vehicles = veekls_get_car_ids();
	$brands   = array();

	if ( $vehicles ) {
		foreach ( $vehicles as $vehicle ) {
			$brands[] = $vehicle->brand;
		}
	}

	$brands       = array_count_values( $brands );
	$archive_link = '/vehicles';
	?>

	<ul>

	<?php foreach ( $brands as $brand => $value ) : ?>
		<?php
		$brand_link = add_query_arg(
			array(
				's'       => '',
				'brand[]' => $brand,
			),
			$archive_link
		);
		?>

		<li>
			<a href="<?php echo esc_url( $brand_link ); ?>">
				<?php
				// translators: %1$s - brand, %2$s number of cars.
				echo wp_kses_post( sprintf( __( '%1$s <span>(%2$s)</span>', 'veekls' ), $brand, $value ) );
				?>
			</a>
		</li>
	<?php endforeach; ?>

	</ul>

	<?php
}
