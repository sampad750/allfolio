<?php
// Theme settings options
$opt = get_option( 'allfolio_opt' );


// add category nick names in body and post class
function allfolio_post_class( $classes ) {
	global $post;
	if ( ! has_post_thumbnail() ) {
		$classes[] = 'no-post-thumbnail';
	}
	if ( is_sticky() && ! in_array( 'sticky', $classes ) ) {
		$classes[] = 'sticky';
	}

	return $classes;
}

add_filter( 'post_class', 'allfolio_post_class' );

/**
 * Body classes
 */
add_filter( 'body_class', function ( $classes ) {
	$opt                = get_option( 'allfolio_opt' );
	$is_dark_mode       = isset( $opt['is_dark_mode'] ) ? $opt['is_dark_mode'] : '';
	$is_dark_mode_opt   = !empty( $is_dark_mode == '1' ) ? 'dark-home-one' : '';
	$has_menu           = has_nav_menu( 'main_menu' ) ? 'has_main_menu' : 'has_not_menu';
	$classes[] = $has_menu;
	$classes[] = $is_dark_mode_opt;
	return $classes;
} );

/**
 * Show post excerpt by default
 *
 * @param $user_login
 * @param $user
 */
function allfolio_show_post_excerpt( $user_login, $user ) {
	$unchecked = get_user_meta( $user->ID, 'metaboxhidden_post', true );
	$key       = is_array( $unchecked ) ? array_search( 'postexcerpt', $unchecked ) : false;
	if ( false !== $key ) {
		array_splice( $unchecked, $key, 1 );
		update_user_meta( $user->ID, 'metaboxhidden_post', $unchecked );
	}
}
add_action( 'wp_login', 'allfolio_show_post_excerpt', 10, 2 );

// filter to replace class on reply link
add_filter( 'comment_reply_link', function ( $class ) {
	$class = str_replace( "class='comment-reply-link", "class='reply f-right", $class );

	return $class;
} );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function allfolio_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

add_action( 'wp_head', 'allfolio_pingback_header' );

// Move the comment field to bottom
add_filter( 'comment_form_fields', function ( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
} );

// Remove WordPress admin bar default CSS
add_action( 'get_header', function () {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
} );


// Elementor post type support
function allfolio_add_cpt_support() {

	//if exists, assign to $cpt_support var
	$cpt_support = get_option( 'elementor_cpt_support' );

	//check if option DOESN'T exist in db
	if ( ! $cpt_support ) {
		$cpt_support = [ 'page', 'post', 'case-study', 'team-member' ]; //create array of our default supported post types
		update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
	} //if it DOES exist, but header is NOT defined
	elseif ( ! in_array( 'case-study', $cpt_support ) ) {
		$cpt_support[] = 'case-study'; //append to array
		update_option( 'elementor_cpt_support', $cpt_support ); //update database
	} //if it DOES exist, but header is NOT defined
	elseif ( ! in_array( 'team-member', $cpt_support ) ) {
		$cpt_support[] = 'team-member'; //append to array
		update_option( 'elementor_cpt_support', $cpt_support ); //update database
	}

	//otherwise do nothing, portfolio already exists in elementor_cpt_support option
}

add_action( 'after_switch_theme', 'allfolio_add_cpt_support' );


// Color Picker Issue solution
if ( is_admin() ) {
	add_action( 'wp_default_scripts', 'allfolio_default_custom_scripts' );
	function allfolio_default_custom_scripts( $scripts ) {
		$scripts->add( 'wp-color-picker', "/wp-admin/js/color-picker.js", array( 'iris' ), false, 1 );
		did_action( 'init' ) && $scripts->localize(
			'wp-color-picker',
			'wpColorPickerL10n',
			array(
				'clear'            => esc_html__( 'Clear', 'allfolio' ),
				'clearAriaLabel'   => esc_html__( 'Clear color', 'allfolio' ),
				'defaultString'    => esc_html__( 'Default', 'allfolio' ),
				'defaultAriaLabel' => esc_html__( 'Select default color', 'allfolio' ),
				'pick'             => esc_html__( 'Select Color', 'allfolio' ),
				'defaultLabel'     => esc_html__( 'Color value', 'allfolio' ),
			)
		);
	}
}

// Wrap up the Categories count in span tag /
add_filter( 'wp_list_categories', function ( $links ) {
	$links = str_replace( '</a> (', '<span>(', $links );
	$links = str_replace( ')', ')</span> </a>', $links );

	return $links;
} );

// Wrap up the archive count in span tag /
add_filter( 'get_archives_link', function ( $links ) {
	$links = str_replace( '</a>&nbsp;(', '<span>(', $links );
	$links = str_replace( ')', ')</span> </a>', $links );

	return $links;
} );

