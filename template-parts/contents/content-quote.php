<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package makro
 */

$post_author_id = get_post_field( 'post_author', get_the_ID() );
?>
<blockquote class="posts-format-quote">
    <?php allfolio_get_html_tag( 'blockquote', get_the_content(get_the_ID()) ); ?>
    <a href="<?php echo esc_url(get_author_posts_url($post_author_id)) ?>" class="author">
        <?php echo esc_html(get_the_author_meta('display_name')) ?>
    </a>
</blockquote>