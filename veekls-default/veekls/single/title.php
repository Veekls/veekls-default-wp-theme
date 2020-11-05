<?php
/**
 * Single listing title.
 *
 * This template can be overridden by copying it to yourtheme/veekls/single/address.php.
 *
 * @package Veekls_Default
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vehicle = $args['vehicle'];
?>

<h1 class="title entry-title"><?php echo esc_html( apply_filters( 'veekls_title', $vehicle ) ); ?></h1>

<span class="status">
	<i class="fas fa-star"></i>
	<?php echo esc_html( 'Wer' ); ?>
</span>
