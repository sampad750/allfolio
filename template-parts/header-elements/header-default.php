<?php

// Theme settings options
$opt                      = get_option( 'allfolio_opt' );
$is_menu_btn              = function_exists( 'get_field' ) ? get_field( 'is_menu_btn' ) : '';
$is_menu_btn_opt          = ! empty( $opt['is_menu_btn'] ) ? $opt['is_menu_btn'] : '';
$is_menu_btn              = isset( $is_menu_btn ) ? $is_menu_btn : $is_menu_btn_opt;
$is_menu_btn              = ! empty( $is_menu_btn == '1' ) ? 'mr-80' : '';
$is_sticky_header         = ! empty( $opt['is_sticky_header'] ) ? $opt['is_sticky_header'] : '';
$is_sticky_header_wrapper = $is_sticky_header == '1' ? 'is_sticky' : '';

?>

<nav class="navbar menu_one  sticky-nav">
    <div class="container">
        <a class="navbar-brand header_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php Allfolio_helper()->logo(); ?>
        </a>

        <div class="right-nav">
            <div class=" js-darkmode-btn" title="Toggle dark mode">
                <label for="something" class="tab-btn day">
                    <ion-icon name="sunny"></ion-icon>
                </label>
                <label for="something" class="tab-btn night">
                    <ion-icon name="moon"></ion-icon>
                </label>
                <label class=" ball" for="something"></label>
                <input type="checkbox" name="something" id="something" class="dark_mode_switcher">
            </div>

			<?php get_template_part( 'template-parts/header-elements/action-button' ); ?>

            <div class="mobile_menu_left">
                <button type="button" class="navbar-toggler mobile_menu_btn">
                    <span class="menu_toggle ">
                        <span class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </span>
                </button>
            </div>


        </div>
    </div>
</nav>
<div class="side_menu scroll">
    <div class="mobile_menu_header">
        <div class="close_nav">
            <i class="icon_close"></i>
        </div>
        <div class="mobile_logo">
            <a class="navbar-brand header_logo me-0" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php Allfolio_helper()->logo(); ?>
            </a>
        </div>
    </div>
    <div class="mobile_nav_wrapper ">
        <nav class="mobile_nav_top " id="main_nav_spy">

			<?php
			if ( has_nav_menu( 'main_menu' ) ) {
				wp_nav_menu( array(
					'menu'           => '',
					'theme_location' => 'main_menu',
					'container'      => null,
					'menu_class'     => "navbar-nav menu ms-auto",
					'walker'         => new Allfolio_Nav_Walker(),
					'depth'          => 2
				) );
			}
			?>

			<?php get_template_part( 'template-parts/header-elements/action-button' ); ?>

        </nav>
    </div>
</div>
<!-- Navbar end-->
