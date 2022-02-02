<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package allfolio
 */

// Theme settings options
$opt = get_option( 'allfolio_opt' );
$page_header_layout_opt  = ! empty( $opt['header_layout'] ) ? $opt['header_layout'] : 'default_menu';
$page_header_layout_opts = isset( $page_header_layout ) ? $page_header_layout : $page_header_layout_opt;



$is_menu_btn     = function_exists( 'get_field' ) ? get_field( 'is_menu_btn' ) : '';
$is_menu_btn_opt = ! empty( $opt['is_menu_btn'] ) ? $opt['is_menu_btn'] : '';
$is_menu_btn     = isset( $is_menu_btn ) ? $is_menu_btn : $is_menu_btn_opt;
$page_header_layout      = function_exists( 'get_field' ) ? get_field( 'header_type' ) : '';

$my_theme = wp_get_theme( 'allfolio' );
$s_value  = get_search_query() ? get_search_query() : '';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Theme Version -->
        <meta name="allfolio-version" content="<?php echo esc_attr( $my_theme->Version ) ?>">
        <!-- Charset Meta -->
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!-- For IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>

<body data-bs-target="#main_nav_spy" data-bs-spy="scroll" data-bs-offset="50" <?php body_class(); ?> >

<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}


$is_preloader = isset( $opt['is_preloader'] ) ? $opt['is_preloader'] : '';
if ( did_action( 'elementor/loaded' ) ) {
    if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
        $is_preloader = '';
    }
}

if ( $is_preloader == '1' ) {
    get_template_part( 'template-parts/header-elements/preloader' );
}



?>

    <div class="body_wrapper">
        <div class="click_capture"></div>




<?php

    // header layout
    if($page_header_layout_opts == 'default_menu'){
        get_template_part('template-parts/header-elements/header-default');
    } elseif($page_header_layout_opts == 'sidebar_menu'){
        //get_template_part('template-parts/header-elements/header-sidebar-menu');
    }
