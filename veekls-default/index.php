<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Veekls
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'blog' ); ?>
			<?php endwhile; ?>

			<?php
			the_posts_pagination(
				array(
					'prev_text' => '<i class="fas fa-chevron-left"></i><span class="screen-reader-text">' . esc_html_e( 'Previous', 'veekls' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . esc_html_e( 'Next', 'veekls' ) . '</span><i class="fas fa-chevron-right"></i>',
				)
			);
			?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</main>
</div>

<?php
get_sidebar();
get_footer();
