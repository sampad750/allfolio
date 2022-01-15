<?php
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function allfolio_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = '';

	if ( 'off' !== 'on' ) {
		$fonts[] = "PT Serif:400,700";
	}
	if ( 'off' !== 'on' ) {
		$fonts[] = "Rubik:300,400,500,600,700,800,900";
	}

	$is_ssl = is_ssl() ? 'https' : 'http';

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), "$is_ssl://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue site scripts and styles
 */
function allfolio_scripts() {
	$opt                            = get_option( 'allfolio_opt' );
	$is_back_to_top_btn_switcher    = isset( $opt['is_back_to_top_btn_switcher'] ) ? $opt['is_back_to_top_btn_switcher'] : '1';
	$is_dark_mode                   = isset( $opt['is_dark_mode'] ) ? $opt['is_dark_mode'] : '';

	/**
	 * Registering site's scripts and styles
	 */

	//wp_enqueue_style( 'allfolio-google-fonts', allfolio_fonts_url(), array(), null );
	wp_enqueue_style( 'bootstrap', ALLFOLIO_DIR_CSS . '/bootstrap.min.css' );
	wp_enqueue_style( 'elegant', ALLFOLIO_DIR_CSS . '/elegant-icons.min.css' );
    wp_enqueue_style( 'allfolio-all', ALLFOLIO_DIR_CSS . '/all.min.css' );
    wp_enqueue_style( 'mCustomScrollbar', ALLFOLIO_DIR_CSS . '/jquery.mCustomScrollbar.min.css' );
    wp_register_style( 'animate', ALLFOLIO_DIR_CSS . '/animate.css' );
    wp_enqueue_style( 'allfolio-default', ALLFOLIO_DIR_CSS . '/default.css' );
    wp_enqueue_style( 'allfolio-style', ALLFOLIO_DIR_CSS . '/style.css' );
	wp_enqueue_style( 'allfolio-main', ALLFOLIO_DIR_CSS . '/main.css' );
	wp_enqueue_style( 'allfolio-responsive', ALLFOLIO_DIR_CSS . '/responsive.css' );
	wp_enqueue_style( 'allfolio-wpd', ALLFOLIO_DIR_CSS . '/wpd-style.css' );
	wp_enqueue_style( 'allfolio-root', get_stylesheet_uri() );

	$css_output = array(
		'menu_item_color'            => array(
			'color' => '.menu > .nav-item > .nav-link',
		),
		'footer_pt__px'              => array(
			'padding-top' => '.footer-area'
		),

	);

	Allfolio_helper()->meta_css_render( 'allfolio-wpd', $css_output );

	/**
	 * Register and enqueue theme script files
	 */
	/**
	 * JavaScripts
	 */

	/**
	 * Theme Options
	 */

	wp_register_script( 'allfolio-preloader', ALLFOLIO_DIR_JS.'/preloader.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bootstrap', ALLFOLIO_DIR_JS . '/bootstrap.bundle.min.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'wow', ALLFOLIO_DIR_JS . '/wow.min.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'mCustomScrollbar', ALLFOLIO_DIR_JS . '/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), true, true );

    wp_enqueue_script( 'allfolio-script', ALLFOLIO_DIR_JS . '/script.js', array( 'jquery' ), '1.0.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'allfolio_scripts' );


function wpdocs_mytheme_block_styles() {
	//wp_enqueue_style( 'allfolio-google-fonts', allfolio_fonts_url(), array(), null );
	//wp_enqueue_style( 'allfolio-font', ALLFOLIO_DIR_CSS . '/font.css' );
}
add_action( 'enqueue_block_assets', 'wpdocs_mytheme_block_styles' );