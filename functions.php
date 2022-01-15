<?php
/**
 * allfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package allfolio
 */


if ( ! function_exists( 'allfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function allfolio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gull, use a find and replace
	 * to change 'gull' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'allfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable excerpt support for page
    add_post_type_support( 'page', 'excerpt' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', array( 'video', 'quote', 'link' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main_menu'   => esc_html__( 'Main Menu', 'allfolio' ),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style-editor.css' );
    add_theme_support( 'responsive-embeds' );
}
endif;
add_action( 'after_setup_theme', 'allfolio_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function allfolio_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'allfolio_content_width', 1170 );
}
add_action( 'after_setup_theme', 'allfolio_content_width', 0 );

// Upload SVG Image /
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});


/**
 * Constants
 * Defining default asset paths
 */
define('ALLFOLIO_DIR_CSS', get_template_directory_uri().'/assets/css' );
define('ALLFOLIO_DIR_JS', get_template_directory_uri().'/assets/js' );
define('ALLFOLIO_DIR_VEND', get_template_directory_uri().'/assets/vendors' );
define('ALLFOLIO_DIR_IMG', get_template_directory_uri().'/assets/img' );
define('ALLFOLIO_DIR_FONT', get_template_directory_uri().'/assets/fonts' );


/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';


/**
 * Theme's helper functions
 */
require get_template_directory() . '/inc/classes/Allfolio_helper.php';

/**
 * Theme's filters and actions
 */
require get_template_directory() . '/inc/filter_actions.php';

/**
 * Classes
 */
require get_template_directory() . '/inc/classes/Allfolio_Mobile_Nav_Walker.php';
require get_template_directory() . '/inc/classes/Allfolio_Walker_Comment.php';

/**
 * Theme settings
 */
require get_template_directory() . '/options/opt-config.php';

/**
 * Configure one click demo
 */
require get_template_directory() . '/inc/demo_config.php';

/**
 * Required plugins activation
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Required plugins activation
 */
require get_template_directory() . '/inc/plugin_activation.php';

/**
 * Bootstrap Nav Walker
 */
require get_template_directory() . '/inc/classes/Allfolio_Nav_Walker.php';

/**
 * Register Sidebar Areas
 */
require get_template_directory() . '/inc/sidebars.php';