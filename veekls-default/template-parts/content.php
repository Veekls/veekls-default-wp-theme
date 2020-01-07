<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VeeklsDefaultTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-media">
		<?php the_post_thumbnail(); ?>
	</div>

	<div class="article__content">

		<header class="entry-header">
			<?php carlistings_get_category(); ?>
			<div class="entry-meta">
				<?php
				carlistings_print_comment_link();
				carlistings_posted_on();
				?>
			</div>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'veekls-default-theme' ),
					'after'  => '</div>',
				)
			);

			carlistings_entry_footer();

			if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			}
			?>
		</div><!-- .entry-content -->

		<?php carlistings_author_box(); ?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
