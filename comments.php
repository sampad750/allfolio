<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package allfolio
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
$opt                    = get_option( 'allfolio_opt' );
$is_single_post_meta    = isset( $opt['is_single_post_meta'] ) ? $opt['is_single_post_meta'] : '1';
$is_single_comment_meta = isset( $opt['is_single_comment_meta'] ) ? $opt['is_single_comment_meta'] : '1';

if ( post_password_required() ) {
	return;
}
$singleCommentClass            = is_single() ? 'mb-105' : '';
$is_comments = have_comments() ? 'have_comments' : 'no_comments';
?>

<?php if ( have_comments() ) : ?>

    <div class="blog-comments mt-105 <?php echo esc_attr( $is_comments ); ?>">
		<?php
		if ( $is_single_post_meta == '1' && $is_single_comment_meta == '1' ) {
			?>
            <h3 class="blog-details-title mb-45"><?php allfolio_comment_count( get_the_ID() ) ?></h3>
		<?php } ?>
        <ul class="latest-comments">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ul',
					'short_ping' => true,
					'walker'     => new Allfolio_Walker_Comment,
				)
			);
			the_comments_navigation();
			?>
        </ul>
    </div>
<?php
endif;
?>

<div class="blog-comments <?php echo esc_attr( $is_comments.' '. $singleCommentClass ) ?>">
	<?php
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments alert alert-warning"><?php esc_html_e( 'Comments are closed.', 'allfolio' ); ?></p>
	    <?php
	endif;
	?>

    <div class="quote-form mb-20 mt-90">
		<?php
		$commenter     = wp_get_current_commenter();
		$req           = get_option( 'require_name_email' );
		$aria_req      = ( $req ? " aria-required='true'" : '' );
		$fields        = array(
			'author'  => '<div class="email-input"><label class="input-title">' . esc_html__( "Name", "allfolio" ) . '</label><input type="text" placeholder="' . esc_attr__( "Your name", "allfolio" ) . '" name="author" id="name" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . '>' . '</div>',
			'email'   => '<div class="email-input"><label class="input-title">' . esc_html__( "Email", "allfolio" ) . '</label> <input type="email" placeholder="' . esc_attr__( "Your email", "allfolio" ) . '" name="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . '>' . '</div>',
			'url'     => '',
			'cookies' => '',
		);
		$comments_args = array(
			'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
			'class_form'           => '',
			'class_submit'         => 'theme_btn comments-btn',
			'title_reply_before'   => '<h3 class="blog-details-title mb-35">',
			'title_reply'          => esc_html__( 'Leave A Comment', 'allfolio' ),
			'title_reply_after'    => '</h3>',
			'comment_notes_before' => '<h5 class="blog-comment-short-insturction">' . esc_html__( "Sign in to post your comment or sine up if you dont have any account.", "allfolio" ) . '</h5>',
			'comment_field'        => '<div class="email-input"><label class="input-title">' . esc_html__( "Comment", "allfolio" ) . '</label><textarea placeholder="' . esc_attr__( "Write your comment here...", "allfolio" ) . '" name="comment" id="comment"></textarea> ' . '</div>',
			'comment_notes_after'  => ''
		);
		comment_form( $comments_args );
		?>
    </div>
</div>