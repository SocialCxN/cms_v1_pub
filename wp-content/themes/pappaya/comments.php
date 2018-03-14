<?php
/**
 * Comment Template
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
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

<?php if ( have_comments() ) :
	wp_list_comments( array(
		'walker' => new pappaya_walker_comment,
		'style' => 'ul',
		'type' => 'all',
		'avatar_size' => 100,
		'callback' => null
	) ); ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<div class="comments-nav">
			<?php previous_comments_link( esc_html__( 'Older Comments', 'pappaya' ) ); ?>
			<?php next_comments_link( esc_html__( 'Newer Comments', 'pappaya' ) ); ?>
		</div>
	<?php endif; // check for comment navigation
endif; ?>
	<div class="wp_comment_form form-box">
		<?php comment_form(); ?>
	</div>