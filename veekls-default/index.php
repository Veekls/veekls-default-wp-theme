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
 * @package VeeklsDefaultTheme
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

	<?php
	if ( have_posts() ) {
		/* Start the Loop */
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', 'blog' );
		}

		the_posts_pagination(
			array(
				'prev_text' =>
					'<i class="icofont icofont-rounded-left"></i>' .
					'<span class="screen-reader-text">' .
						esc_html_e( 'Previous', 'veekls-default-theme' ) .
					'</span>',

				'next_text' =>
					'<span class="screen-reader-text">' .
						esc_html_e( 'Next', 'veekls-default-theme' ) .
					'</span><i class="icofont icofont-rounded-right"></i>',
			)
		);

	} else {
		get_template_part( 'template-parts/content', 'none' );
	}
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
