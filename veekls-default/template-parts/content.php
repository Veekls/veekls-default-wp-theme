<?php
/**
 * Template part for displaying posts.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-media">
		<?php the_post_thumbnail(); ?>
	</div>

	<div class="article__content">
		<header class="entry-header">
			<?php veekls_get_category(); ?>

			<div class="entry-meta">
				<?php veekls_print_comment_link(); ?>
				<?php veekls_posted_on(); ?>
			</div>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'veekls' ),
					'after'  => '</div>',
				)
			);
			?>

			<?php veekls_entry_footer(); ?>

			<?php if ( function_exists( 'sharing_display' ) ) : ?>
				<?php sharing_display( '', true ); ?>
			<?php endif; ?>
		</div><!-- .entry-content -->

		<?php veekls_author_box(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
