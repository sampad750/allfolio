<?php

// Navbar styling
/**
 * Main Menu styling
 */
Redux::set_section( 'allfolio_opt', array(
    'heading'            => esc_html__( 'Menu', 'allfolio' ),
    'id'               => 'menu_opt',
    'icon'             => 'el el-lines',
    'fields'           => array(

        // Noraml menu settings section
        array(
            'id'        => 'normal_menu_start',
            'type'      => 'section',
            'heading'     => esc_html__( 'Normal menu colors', 'allfolio' ),
            'subtitle'  => esc_html__( 'The following settings will only apply on the normal header mode..', 'allfolio' ),
            'indent'    => true
        ),

        array(
            'heading'         => esc_html__( 'Item Color', 'allfolio' ),
            'subtitle'      => esc_html__( 'This is the menu item font color.', 'allfolio' ),
            'id'            => 'menu_normal_font_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => '.main-menu ul li > a,.menu > .nav-item > .nav-link',
            )
        ),

        array(
            'heading'     => esc_html__( 'Item Hover Color', 'allfolio' ),
            'subtitle'  => esc_html__( 'Menu item\'s font color on hover stats.', 'allfolio' ),
            'id'        => 'menu_normal_hover_font_color',
            'output'    => array(
                'color'             => '.menu > .nav-item:hover .nav-link, .menu > .nav-item.submenu .dropdown-menu .nav-item:hover > .nav-link, .menu > .nav-item.submenu .dropdown-menu .nav-item:hover > .nav-link h5',
            ),
            'type'      => 'color',
        ),

        array(
            'heading'     => esc_html__( 'Item Active Color', 'allfolio' ),
            'subtitle'  => esc_html__( 'Menu item\'s font color on active stats.', 'allfolio' ),
            'id'        => 'menu_normal_item_active_color',
            'output'    => array(
                'color' => '.menu > .nav-item.active .nav-link, .nav-item.current-menu-current > .nav-link, .nav-item.current-menu-parent > .nav-link, .menu > .nav-item.submenu .dropdown-menu .nav-item:focus > .nav-link, .menu > .nav-item.submenu .dropdown-menu .nav-item.active > .nav-link',
            ),
            'type'      => 'color',
        ),

        array(
            'id'     => 'normal_menu_end',
            'type'   => 'section',
            'indent' => false,
        ),

        // Sticky menu settings section
        array(
            'id'        => 'sticky_menu_start',
            'type'      => 'section',
            'heading'     => esc_html__( 'Sticky menu colors', 'allfolio' ),
            'subtitle'  => esc_html__( 'The following settings will only apply on the sticky header mode..', 'allfolio' ),
            'indent'    => true
        ),

        array(
            'heading'         => esc_html__( 'Menu Color', 'allfolio' ),
            'subtitle'      => esc_html__( 'Menu item font color on sticky menu mode.', 'allfolio' ),
            'id'            => 'sticky_menu_font_color',
            'output'        => array (
                'color'     => '.main-head-two.menu-sticky .main-menu li a, .menu-sticky .main-menu ul li > a, .menu-sticky .menu > .nav-item > .nav-link',
            ),
            'type'          => 'color',
        ),

        array(
            'heading'     => esc_html__( 'Menu Hover Color', 'allfolio' ),
            'subtitle'  => esc_html__( 'Menu item hover font color on header sticky mode', 'allfolio' ),
            'id'        => 'menu_sticky_hover_font_color',
            'output'    => array(
                'color' => '.main-head-two.sticky .menu > .nav-item:hover > .nav-link',
            ),
            'type'      => 'color',
        ),

        array(
            'heading'     => esc_html__( 'Menu Active Color', 'allfolio' ),
            'subtitle'  => esc_html__( 'Menu item active font color on header sticky mode', 'allfolio' ),
            'id'        => 'menu_sticky_active_font_color',
            'output'    => array(
                'color' => '.main-head-two.sticky .menu > .nav-item.active > .nav-link',
            ),
            'type'      => 'color',
        ),

        array(
            'id'     => 'sticky_menu_end',
            'type'   => 'section',
            'indent' => false,
        ),

        // Dropdown menu settings section
        array(
            'id'        => 'dropdown_menu_start',
            'type'      => 'section',
            'heading'     => esc_html__( 'Dropdown menu colors', 'allfolio' ),
            'subtitle'  => esc_html__( 'The following settings will only apply on the dropdown header mode..', 'allfolio' ),
            'indent'    => true
        ),

        array(
            'heading'         => esc_html__( 'Menu Color', 'allfolio' ),
            'id'            => 'dropdown_menu_font_color',
            'output'        => array (
                'color'     => '.menu > .nav-item.submenu .submenu .nav-item .nav-link',
            ),
            'type'          => 'color',
        ),

        array(
            'heading'     => esc_html__( 'Menu Hover/Active Color', 'allfolio' ),
            'id'        => 'dropdown_menu_hover_font_color',
            'output'    => array(
                'color' => '.menu > .nav-item.submenu .submenu .nav-item.active > .nav-link, .menu > .nav-item.submenu .submenu .nav-item:hover > .nav-link, .menu > .nav-item.submenu .submenu .nav-item:focus > .nav-link, .menu > .nav-item.submenu .submenu .nav-item.active > .nav-link',
            ),
            'type'      => 'color',
        ),

        array(
            'heading'     => esc_html__( 'Background Color', 'allfolio' ),
            'id'        => 'dropdown_menu_bg_color',
            'output'    => array(
                'background-color' => '.menu > .nav-item.submenu .submenu, .menu > .nav-item.submenu .submenu:before',
            ),
            'type'      => 'color'
        ),

        array(
            'heading'     => esc_html__( 'Border Color', 'allfolio' ),
            'id'        => 'dropdown_menu_border_color',
            'output'    => array(
                'border-color' => '.menu > .nav-item.submenu .submenu, .menu > .nav-item.submenu .submenu:before',
            ),
            'type'      => 'color',
        ),

        array(
            'id'     => 'dropdown_menu_end',
            'type'   => 'section',
            'indent' => false,
        ),

        // Menu item padding and margin options
        array(
            'heading'     => esc_html__( 'Menu item padding', 'allfolio' ),
            'subtitle'  => esc_html__( 'Padding around menu item. Default is 37px 0px 37px 0px. You can reduce the top and bottom padding to make the menu bar height smaller.', 'allfolio' ),
            'id'        => 'menu_item_padding',
            'type'      => 'spacing',
            'output'    => array( '.menu > .nav-item > .nav-link' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        ),

        array(
            'heading'     => esc_html__( 'Menu item margin', 'allfolio' ),
            'subtitle'  => esc_html__( 'Margin around menu item.', 'allfolio' ),
            'id'        => 'menu_item_margin',
            'type'      => 'spacing',
            'output'    => array( '.menu > .nav-item' ),
            'mode'      => 'margin',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        )
    )
));