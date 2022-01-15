<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package allfolio
 */

get_header();
$opt = get_option('allfolio_opt');
$wrap_class = 'page_wrapper';
while ( have_posts() ) : the_post();
    ?>
    <div class=" <?php echo esc_attr($wrap_class) ?>">
        <div class="container">
            <?php
            the_content();
            wp_link_pages(array(
                'before'      => '<div class="page-links"><span class="page-links-heading">' . esc_html__( 'Pages:', 'allfolio' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'allfolio' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ));

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
        </div>
    </div>
    <?php
endwhile; // End of the loop.
wp_reset_postdata();
get_footer();