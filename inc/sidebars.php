<?php
// Register Widget areas
add_action( 'widgets_init', function () {
	$opt = get_option( 'allfolio_opt' );
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'allfolio' ),
		'description'   => esc_html__( 'Place widgets in sidebar widgets area.', 'allfolio' ),
		'id'            => 'sidebar_widgets',
		'before_widget' => '<div id="%1$s" class="widget mb-80 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-heading mb-30">',
		'after_title'   => '</h3>'
	) );

	$footer_column = ! empty( $opt['footer_column'] ) ? $opt['footer_column'] : '3';
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'allfolio' ),
		'description'   => esc_html__( 'Add widgets here for Footer widgets area', 'allfolio' ),
		'id'            => 'footer_widgets',
		'before_widget' => '<div id="%1$s" class="col-xl-' . $footer_column . ' col-lg-4 col-md-6 footer__widget_wrap wow fadeInUp2">
                            <div class="footer__widget text-center text-md-left %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>'
	) );


} );
