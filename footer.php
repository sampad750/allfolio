<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package allfolio
 */

/**
 * Theme Options
 */
$opt = get_option( 'allfolio_opt' );
/**
 * Page Options
 */

$footer_visibility = function_exists( 'get_field' ) ? get_field( 'footer_visibility' ) : '1';
$footer_visibility = isset( $footer_visibility ) ? $footer_visibility : '1';


if ( $footer_visibility == '1' ) {
	get_template_part( 'template-parts/footers/footer', 'normal' );
}
?>
</div>
<?php wp_footer(); ?>
</body>
</html>