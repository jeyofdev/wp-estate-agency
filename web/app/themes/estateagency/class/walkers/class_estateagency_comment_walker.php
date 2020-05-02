<?php
/**
 * Core walker class used to create an HTML list of comments.
 */
class EstateAgencyCommentWalker extends Walker_Comment {
	/**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker::start_lvl()
	 * @global int $comment_depth
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth  Optional. Depth of the current comment. Default 0.
	 * @param array  $args   Optional. Uses 'style' argument for type of HTML list. Default empty array.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;

		$output .= '<div class="reply col-lg-11 offset-lg-1">';
	}

	/**
	 * Ends the list of items after the elements are added.
	 *
	 * @see Walker::end_lvl()
	 * @global int $comment_depth
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth  Optional. Depth of the current comment. Default 0.
	 * @param array  $args   Optional. Will only append content if style argument value is 'ol' or 'ul'.
	 *                       Default empty array.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;

		$output .= '</div>';
	}

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		$commenter = wp_get_current_commenter();

		if ( $commenter['comment_author_email'] ) {
			$moderation_note = __( 'Your comment is awaiting moderation.' );
		} else {
			$moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.' );
		}

		?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
			<div id="div-comment-<?php comment_ID(); ?>" class="single-comment-item">
				<div class="sc-author">
					<?php
						if ( 0 != $args['avatar_size'] ) {
							echo get_avatar( $comment, $args['avatar_size'] );
						}
					?>
					
				</div><!-- .sc-author -->

				<div class="sc-text">
					<span><?= EstateAgencyFormatHelpers::format_date("j M Y"); ?></span>
					<h5><?= sprintf("%s", get_comment_author()); ?></h5>
                    <?php comment_text(); ?>
                    <div class="comment-link-btn">
					<?php
						comment_reply_link(array_merge($args, [
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'reply_text'    => __('Reply', "estateagency")
						]));
						edit_comment_link(__("Edit", "estateagency"));
                    ?>
                    </div>
				</div>

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
				<?php endif; ?>
			</div><!-- .single-comment-item -->
		<?php
	}
}
