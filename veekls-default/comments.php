<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Veekls
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title underline-heading">
			<?php $veekls_comment_count = get_comments_number(); ?>
			<?php echo esc_html( _nx( 'Comment', 'Comments', $veekls_comment_count, 'comments', 'veekls' ) ); ?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 60,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'veekls' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php comment_form(); ?>
</div><!-- #comments -->
