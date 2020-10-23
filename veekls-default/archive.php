<?php
/**
 * The template for displaying archive pages
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

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'blog' );

			endwhile;

			the_posts_pagination(
				array(
					'prev_text' => '<i class="icofont icofont-rounded-left"></i><span class="screen-reader-text">' . esc_html_e( 'Previous', 'veekls' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . esc_html_e( 'Next', 'veekls' ) . '</span><i class="icofont icofont-rounded-right"></i>',
				)
			);

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
