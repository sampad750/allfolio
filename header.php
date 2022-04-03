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
$opt = get_option( 'allfolio_opt' ); ?>

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Theme Version -->
        <meta name="allfolio-version" content="1.0.0">
        <!-- Charset Meta -->
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!-- For IE -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
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
// if ( did_action( 'elementor/loaded' ) ) {
//     if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
//         $is_preloader = '';
//     }
// }

if ( $is_preloader == '1' ) {
    get_template_part( 'template-parts/header-elements/preloader' );
}
?>

<div class="body_wrapper">
    <div class="click_capture"></div>

    <?php
    // header layout
    
        get_template_part('template-parts/header-elements/header-default');
    
