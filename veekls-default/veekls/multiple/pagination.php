<?php
/**
 * Pagination
 *
 * This template can be overridden by copying it to yourtheme/listings/loop/pagination.php.
 *
 * @package Veekls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! veekls_is_plugin_active() ) {
	return;
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>

<nav class="veekls-pagination">
	<?php
	echo wp_kses_post(
		paginate_links(
			array(
				'base'      => add_query_arg( 'paged', '%#%' ),
				'format'    => '?paged=%#%',
				'mid-size'  => 1,
				'add_args'  => false,
				'current'   => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
				'total'     => $wp_query->max_num_pages,
				'prev_text' => '<i class="icofont icofont-simple-left"></i>',
				'next_text' => '<i class="icofont icofont-simple-right"></i>',
				'type'      => 'list',
				'end_size'  => 3,
			)
		)
	);
	?>
</nav>
