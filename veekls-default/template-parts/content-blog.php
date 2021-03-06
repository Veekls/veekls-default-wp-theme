<?php
/**
 * Template part for blog style large.
 *
 * @package Veekls
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'template-parts/content', 'media' ); ?>

	<div class="article__content">
		<header class="entry-header">
			<?php veekls_get_category(); ?>

			<div class="entry-meta">
				<?php veekls_posted_on(); ?>
			</div>
		</header><!-- .entry-header -->

		<?php
		the_title(
			'<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
			'</a></h2>'
		);
		?>

		<div class="entry-content">
			<?php $main_content = apply_filters( 'the_content', get_the_content() ); ?>
			<?php if ( in_array( get_post_format(), array( 'audio', 'video' ), true ) ) : ?>
				<?php
				$media = get_media_embedded_in_content(
					$main_content,
					array(
						'audio',
						'video',
						'object',
						'embed',
						'iframe',
					)
				);
				?>

				<?php $main_content = str_replace( $media, '', $main_content ); ?>
			<?php endif; ?>

			<?php echo wp_kses_post( $main_content ); ?>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'veekls' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
