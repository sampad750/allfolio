<?php

// Header Section
Redux::set_section( 'allfolio_opt', array(
	'title'            => esc_html__( 'Header', 'allfolio' ),
	'id'               => 'header_sec',
	'customizer_width' => '400px',
	'icon'             => 'dashicons dashicons-arrow-up-alt2',
	'fields'           => array(

		array(
			'title'    => esc_html__( 'Header Layout', 'allfolio' ),
			'subtitle' => esc_html__( 'Select header logo and menu bar layout', 'allfolio' ),
			'id'       => 'header_layout',
			'type'     => 'image_select',
			'options'  => array(
				'default_menu' => array(
					'alt' => esc_html__( 'Default', 'allfolio' ),
					'img' => ALLFOLIO_DIR_IMG . '/header-default-layout.png'
				),
				'sidebar_menu'  => array(
					'alt' => esc_html__( 'Side Bar Nav Menu', 'allfolio' ),
					'img' => ALLFOLIO_DIR_IMG . '/header-default-layout.png'
				),
			),
			'default'  => 'default'
		),
		array(
			'title'    => esc_html__( 'Search placeholder', 'allfolio' ),
			'id'       => 'top_search_placeholder',
			'type'     => 'text',
			'default'  => esc_html__( 'Search here..', 'allfolio' ),
			'required' => [
				[ 'header_layout', '=', 'topbar' ]
			]
		),
		array(
			'title'    => esc_html__( 'Email', 'allfolio' ),
			'id'       => 'top_email',
			'type'     => 'text',
			'default'  => esc_html__( 'ensure@inc.com', 'allfolio' ),
			'required' => [
				[ 'header_layout', '=', 'topbar' ]
			]
		),
		array(
			'title'    => esc_html__( 'Phone', 'allfolio' ),
			'id'       => 'top_phone',
			'type'     => 'text',
			'default'  => esc_html__( '(479) 421-6814', 'allfolio' ),
			'required' => [
				[ 'header_layout', '=', 'topbar' ]
			]
		)

	)
) );


// Logo
Redux::set_section( 'allfolio_opt', array(
	'title'      => esc_html__( 'Logo', 'allfolio' ),
	'id'         => 'logo_opt',
	'subsection' => true,
	'icon'       => '',
	'fields'     => array(
		array(
			'title'    => esc_html__( 'Black Logo', 'allfolio' ),
			'subtitle' => esc_html__( 'Upload here the main version of your logo.', 'allfolio' ),
			'id'       => 'main_logo',
			'type'     => 'media',
			'compiler' => true,
			'default'  => array(
				'url' => ALLFOLIO_DIR_IMG . '/logo.png'
			)
		),

		array(
			'title'    => esc_html__( 'White Logo', 'allfolio' ),
			'subtitle' => esc_html__( 'Upload here the Sticky version of your logo.', 'allfolio' ),
			'id'       => 'sticky_logo',
			'type'     => 'media',
			'compiler' => true,
			'default'  => array(
				'url' => ALLFOLIO_DIR_IMG . '/logo-w.png'
			)
		),

		array(
			'title'    => esc_html__( 'Logo dimensions', 'allfolio' ),
			'subtitle' => esc_html__( 'Set a custom height width for your upload logo.', 'allfolio' ),
			'id'       => 'logo_dimensions',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'output'   => '.navbar-brand>img'
		),

		array(
			'title'          => esc_html__( 'Padding', 'allfolio' ),
			'subtitle'       => esc_html__( 'Padding around the logo. Input the padding as clockwise (Top Right Bottom Left)', 'allfolio' ),
			'id'             => 'logo_padding',
			'type'           => 'spacing',
			'output'         => array( '.header_area .navbar-brand' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true',
		),
	)
) );

/**
 * Action button
 */
Redux::set_section( 'allfolio_opt', array(
	'title'      => esc_html__( 'Action Button', 'allfolio' ),
	'id'         => 'menu_action_btn_opt',
	'subsection' => true,
	'icon'       => '',
	'fields'     => array(
		array(
			'title'   => esc_html__( 'Button Visibility', 'allfolio' ),
			'id'      => 'is_menu_btn',
			'type'    => 'switch',
			'on'      => esc_html__( 'Show', 'allfolio' ),
			'off'     => esc_html__( 'Hide', 'allfolio' ),
			'default' => true
		),

		array(
			'title'    => esc_html__( 'Button label', 'allfolio' ),
			'subtitle' => esc_html__( 'Leave the button label field empty to hide the menu action button.', 'allfolio' ),
			'id'       => 'menu_btn_label',
			'type'     => 'text',
			'default'  => esc_html__( 'Get Started', 'allfolio' ),
			'required' => array( 'is_menu_btn', '=', '1' )
		),

		array(
			'title'    => esc_html__( 'Button URL', 'allfolio' ),
			'id'       => 'menu_btn_url',
			'type'     => 'text',
			'default'  => '#',
			'required' => array( 'is_menu_btn', '=', '1' )
		),

		array(
			'title'    => esc_html__( 'Button URL Target', 'allfolio' ),
			'id'       => 'menu_btn_target',
			'type'     => 'select',
			'options'  => array(
				'_blank' => esc_html__( 'Blank (Open in new tab)', 'allfolio' ),
				'_self'  => esc_html__( 'Self (Open in the same tab)', 'allfolio' ),
			),
			'default'  => '_self',
			'required' => array( 'is_menu_btn', '=', '1' )
		),

		array(
			'title'          => esc_html__( 'Button padding', 'allfolio' ),
			'subtitle'       => esc_html__( 'Padding around the menu action button.', 'allfolio' ),
			'id'             => 'menu_btn_padding',
			'type'           => 'spacing',
			'output'         => array( '.main-nav .right-nav .quote-btn .theme_btn' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true',
			'required'       => array( 'is_menu_btn', '=', '1' )
		),

		/**
		 * Button colors
		 * Style will apply on the Non sticky mode and sticky mode of the header
		 */
		array(
			'title'    => esc_html__( 'Button Colors', 'allfolio' ),
			'subtitle' => esc_html__( 'Button style attributes on normal (non sticky) mode.', 'allfolio' ),
			'id'       => 'button_colors',
			'type'     => 'section',
			'indent'   => true,
			'required' => array( 'is_menu_btn', '=', '1' ),
		),

		array(
			'title'  => esc_html__( 'Font color', 'allfolio' ),
			'id'     => 'menu_btn_font_color',
			'type'   => 'color',
			'output' => array( '.main-nav .right-nav .quote-btn .theme_btn' ),
		),

		array(
			'title'  => esc_html__( 'Border Color', 'allfolio' ),
			'id'     => 'menu_btn_border_color',
			'type'   => 'color',
			'mode'   => 'border-color',
			'output' => array( '.main-nav .right-nav .quote-btn .theme_btn' ),
		),

		array(
			'title'  => esc_html__( 'Background Color', 'allfolio' ),
			'id'     => 'menu_btn_bg_color',
			'type'   => 'color',
			'mode'   => 'background',
			'output' => array( '.main-nav .right-nav .quote-btn .theme_btn' ),
		),

		// Button color on hover stats
		array(
			'title'    => esc_html__( 'Hover Font Color', 'allfolio' ),
			'subtitle' => esc_html__( 'Font color on hover stats.', 'allfolio' ),
			'id'       => 'menu_btn_hover_font_color',
			'type'     => 'color',
			'output'   => array( '.main-nav .right-nav .quote-btn .theme_btn:hover' ),
		),
		array(
			'title'  => esc_html__( 'Hover Border Color', 'allfolio' ),
			'id'     => 'menu_btn_hover_border_color',
			'type'   => 'color',
			'mode'   => 'border-color',
			'output' => array( '.main-nav .right-nav .quote-btn .theme_btn:hover' ),
		),
		array(
			'title'    => esc_html__( 'Hover background color', 'allfolio' ),
			'subtitle' => esc_html__( 'Background color on hover stats.', 'allfolio' ),
			'id'       => 'menu_btn_hover_bg_color',
			'type'     => 'color',
			'output'   => array(
				'background'   => '.main-nav .right-nav .quote-btn .theme_btn:hover',
				'border-color' => '.main-nav .right-nav .quote-btn .theme_btn:hover'
			),
		),

		array(
			'id'     => 'button_colors-end',
			'type'   => 'section',
			'indent' => false,
		),

		/*
		 * Button colors on sticky mode
		 */
		array(
			'title'    => esc_html__( 'Sticky Button Style', 'allfolio' ),
			'subtitle' => esc_html__( 'Button colors on sticky mode.', 'allfolio' ),
			'id'       => 'button_colors_sticky',
			'type'     => 'section',
			'indent'   => true,
			'required' => array( 'is_menu_btn', '=', '1' ),
		),
		array(
			'title'  => esc_html__( 'Border color', 'allfolio' ),
			'id'     => 'menu_btn_border_color_sticky',
			'type'   => 'color',
			'mode'   => 'border-color',
			'output' => array( '.main-head-two.sticky .main-nav .right-nav .quote-btn .theme_btn' ),
		),
		array(
			'title'  => esc_html__( 'Font color', 'allfolio' ),
			'id'     => 'menu_btn_font_color_sticky',
			'type'   => 'color',
			'output' => array( '.main-head-two.sticky .main-nav .right-nav .quote-btn .theme_btn' ),
		),
		array(
			'title'  => esc_html__( 'Background color', 'allfolio' ),
			'id'     => 'menu_btn_bg_color_sticky',
			'type'   => 'color',
			'mode'   => 'background',
			'output' => array( '.main-head-two.sticky .main-nav .right-nav .quote-btn .theme_btn' ),
		),

		// Button color on hover stats
		array(
			'title'    => esc_html__( 'Hover font color', 'allfolio' ),
			'subtitle' => esc_html__( 'Font color on hover stats.', 'allfolio' ),
			'id'       => 'menu_btn_hover_font_color_sticky',
			'type'     => 'color',
			'output'   => array( '.main-head-two.sticky .main-nav .right-nav .quote-btn .theme_btn:hover' ),
		),
		array(
			'title'    => esc_html__( 'Hover background color', 'allfolio' ),
			'subtitle' => esc_html__( 'Background color on hover stats.', 'allfolio' ),
			'id'       => 'menu_btn_hover_bg_color_sticky',
			'type'     => 'color',
			'output'   => array(
				'background' => '.main-head-two.sticky .main-nav .right-nav .quote-btn .theme_btn:hover',
			),
		),
		array(
			'title'    => esc_html__( 'Hover border color', 'allfolio' ),
			'subtitle' => esc_html__( 'Background color on hover stats.', 'allfolio' ),
			'id'       => 'menu_btn_hover_border_color_sticky',
			'type'     => 'color',
			'output'   => array(
				'border-color' => '.main-head-two.sticky .main-nav .right-nav .quote-btn .theme_btn:hover',
			),
		),

		array(
			'id'     => 'button_colors-sticky-end',
			'type'   => 'section',
			'indent' => false,
		)
	)
) );

/**
 * Title-bar banner
 */
Redux::set_section( 'allfolio_opt', array(
	'title'      => esc_html__( 'Title Bar', 'allfolio' ),
	'id'         => 'title_bar_opt',
	'subsection' => true,
	'icon'       => '',
	'fields'     => array(
		array(
			'title'          => esc_html__( 'Title-bar padding', 'allfolio' ),
			'subtitle'       => esc_html__( 'Padding around the Title-bar.', 'allfolio' ),
			'id'             => 'title_bar_padding',
			'type'           => 'spacing',
			'output'         => array( '.page-title-area' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true',
		)
	)
) );

/**
 * Sticky Header
 */
Redux::set_section( 'allfolio_opt', array(
	'title'      => esc_html__( 'Sticky Header', 'allfolio' ),
	'id'         => 'sticky_header_mode',
	'subsection' => true,
	'icon'       => '',
	'fields'     => array(
		array(
			'title'   => esc_html__( 'Sticky Header', 'allfolio' ),
			'id'      => 'is_sticky_header',
			'type'    => 'switch',
			'on'      => esc_html__( 'Enable', 'allfolio' ),
			'off'     => esc_html__( 'Disable', 'allfolio' ),
			'default' => true
		),
	)
) );