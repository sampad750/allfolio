<?php
/**
 * Custom comment walker for this theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

if ( ! class_exists( 'Allfolio_Walker_Comment' ) ) {
	/**
	 * CUSTOM COMMENT WALKER
	 * A custom walker for comments, based on the walker in Twenty Nineteen.
	 */
	class Allfolio_Walker_Comment extends Walker_Comment {

		/**
		 * Outputs a comment in the HTML5 format.
		 *
		 * @param WP_Comment $comment Comment to display.
		 * @param int $depth Depth of the current comment.
		 * @param array $args An array of arguments.
		 *
		 * @see https://developer.wordpress.org/reference/functions/get_avatar/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
		 * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
		 *
		 * @see wp_list_comments()
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author/
		 */
		protected function html5_comment( $comment, $depth, $args ) {
			$arrow_icon = is_rtl() ? 'arrow_left' : 'arrow_right';
			?>

            <<?php echo ( 'div' === $args['style'] ) ? 'div' : 'li'; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'has_children' : '', $comment ); ?>>

            <div class="single-comments pt-30 pb-25">
				<?php if ( get_avatar( $comment ) ) { ?>
                    <div class="authors mr-30">
						<?php echo get_avatar( $comment, 50, null, null, array( 'class' => '' ) ); ?>
                    </div>
				<?php } ?>
                <div class="authors__content">
                    <h4><?php comment_author(); ?>
						<?php
						comment_reply_link( array_merge( $args, array(
									'reply_text' => esc_html__( 'Reply', 'allfolio' ),
									'depth'      => $depth,
									'before'     => '',
									'after'      => '',
									'max_depth'  => $args['max_depth']
								)
							)
						);
						?>
                    </h4>
                    <h6 class="mb-20"><?php comment_date( get_option( 'date_format' ) ); ?></h6>
                    <div><?php comment_text(); ?></div>
                </div>
            </div>

			<?php
		}
	}
}