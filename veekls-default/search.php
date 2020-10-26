<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Veekls
 */

get_header();

?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'blog' ); ?>
			<?php endwhile; ?>

			<?php
			the_posts_pagination(
				array(
					'prev_text' => '<i class="icofont icofont-rounded-left"></i><span class="screen-reader-text">' . esc_html_e( 'Previous', 'veekls' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . esc_html_e( 'Next', 'veekls' ) . '</span><i class="icofont icofont-rounded-right"></i>',
				)
			);
			?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</main>
</section>

<?php
get_sidebar();
get_footer();
