<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package allfolio
 */

if ( ! is_active_sidebar( 'sidebar_widgets' ) ) {
	return;
}
?>
<div class="col-xl-4 col-lg-4">
    <div class="blog-widget-area">
	    <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
	</div>
</div>