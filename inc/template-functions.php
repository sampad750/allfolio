<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package allfolio
 */


// Get comment count text
function allfolio_comment_count( $post_id ) {
    $comments_number = get_comments_number($post_id);
    if ( $comments_number == 0) {
        $comment_text = esc_html__( 'No Comments', 'allfolio' );
    } elseif( $comments_number == 1) {
        $comment_text = esc_html__( '1 Comment', 'allfolio' );
    } elseif( $comments_number > 1) {
        $comment_text = $comments_number.esc_html__( ' Comments', 'allfolio' );
    }
    echo esc_html($comment_text);
}

/**
 * Get a specific html tag from content
 * @return a specific HTML tag from the loaded content
 */
function allfolio_get_html_tag( $tag = 'blockquote', $content = '' ) {
	$dom = new DOMDocument();
	$dom->loadHTML($content);
	$divs = $dom->getElementsByTagName( $tag );
	$i = 0;
	foreach ( $divs as $div ) {
		if ( $i == 1 ) {
			break;
		}
		echo "<h4 class='c_head'>{$div->nodeValue}</h4>";
		++$i;
	}
}