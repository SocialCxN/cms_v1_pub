<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying Reviews
 *
 * The area of the page that contains reviews and the review form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the reviews.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h4 class="comments-title">
			<?php
			printf( esc_html( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'pappaya' ) ),
				number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h4>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'pappaya' ); ?></h1>

				<div
					class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'pappaya' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'pappaya' ) ); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'walker'      => fw_ext_feedback_get_listing_walker(),
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 34,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'pappaya' ); ?></h1>

				<div
					class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'pappaya' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'pappaya' ) ); ?></div>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'pappaya' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php $comments_args = array(
								'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
								'title_reply_after'  => '</h4>'
						   );
	comment_form($comments_args); ?>

</div><!-- #comments -->
