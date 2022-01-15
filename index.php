<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package allfolio
 */

get_header();
$opt             = get_option( 'allfolio_opt' );
$blog_column     = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$blog_layout_opt = ! empty( $opt['blog_layout'] ) ? $opt['blog_layout'] : 'list';
$blog_layout     = ! empty( $_GET['blog_layout'] ) ? $_GET['blog_layout'] : $blog_layout_opt;
$is_blog_footer_block = isset( $opt['blog_footer_visibility'] ) ? $opt['blog_footer_visibility'] : '1';
$sec_class       = '';
if ( $blog_layout == 'list' ) {
	$sec_class   = 'blog-standard-area fix pt-90 pt-md-20 pb-md-60 pt-xs-20';
} elseif ( $blog_layout == 'grid' ) {
	$sec_class   = 'blog-area pt-160 pb-md-35 pb-xs-35';
	$blog_column = '12';
}



get_footer();