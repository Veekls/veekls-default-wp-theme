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
?>

<nav class="veekls-pagination">
	<?php
	echo paginate_links(
		array(
			'base'      => add_query_arg( 'page', '%#%' ),
			'format'    => '?page=%#%',
			'mid-size'  => 1,
			'add_args'  => false,
			'current'   => ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1,
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '<i class="fas fa-angle-left"></i>',
			'next_text' => '<i class="fas fa-angle-right"></i>',
			'type'      => 'list',
			'end_size'  => 3,
		)
	);
	?>
</nav>
