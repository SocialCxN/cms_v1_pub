<?php  
class pappaya_walker_comment extends Walker_Comment
{ 
	// init classwide variables
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	/** CONSTRUCTOR
	 * You'll have to use this if you plan to get to the top of the comments list, as
	 * start_lvl() only goes as high as 1 deep nested comments */
	function __construct() { ?>
   	<div class="fw-heading"><h4><?php esc_html_e('Comments','pappaya'); ?></h4></div>
	<ol class="comment-list">	
		<?php }
		
		/** START_LVL 
		 * Starts the list before the CHILD elements are added. Unlike most of the walkers,
		 * the start_lvl function means the start of a nested comment. It applies to the first
		 * new level under the comments that are not replies. Also, it appear that, by default,
		 * WordPress just echos the walk instead of passing it to &$output properly. Go figure.  */
		function start_lvl( &$output, $depth = 0, $args = array() ) {		
			$GLOBALS['comment_depth'] = $depth + 1; ?>
			<ul class="children">
				<?php }

		/** END_LVL 
		 * Ends the children list of after the elements are added. */
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 1; ?>
		</ul><!-- /.children -->			
		<?php }
		
		/** START_EL */
		function start_el( &$output, $comment, $depth=0, $args=array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment; 
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
			<li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
				<div id="comment-body-<?php comment_ID() ?>" class="comment-section">
					
					<div class="comment_avatar">
						<?php echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?>					
					</div><!-- /.comment-author -->
					<div class="comment-text">
						<div class="comment_details">
							<div class="commenter_name">
								<?php echo get_comment_author_link(); ?>
								<?php if ( $comment->comment_author_email == get_the_author_meta('email') ){ ?>
									<span class="author_comment"><?php esc_html_e('Author','pappaya'); ?></span>
								<?php }	?>
							</div>
						</div>
						<div id="comment-content-<?php comment_ID(); ?>" class="comment_message">
							<?php if( !$comment->comment_approved ) : ?>
							<em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>					
							<?php else: ?><?php comment_text();?><?php ?>
							<?php endif; ?>
						</div><!-- /.comment-content -->
						<div class="comment-date"><?php comment_date(); ?></div>
						<div class="reply-link">
							<?php 
							$reply_args = array(					
								'depth' => $depth,
								'max_depth' => $args['max_depth'] );
							comment_reply_link( array_merge( $args, $reply_args ) );  
							?>
						</div><!-- /.reply -->
					</div>
				</div><!-- /.comment-body -->

				<?php }
				function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>		
			</li><!-- /#comment-' . get_comment_ID() . ' -->	
			<?php }
	
		/** DESTRUCTOR
		 * I just using this since we needed to use the constructor to reach the top 
		 * of the comments list, just seems to balance out :) */
		function __destruct() { ?>
		
	</ol><!-- /#comment-list -->

	<?php }
}