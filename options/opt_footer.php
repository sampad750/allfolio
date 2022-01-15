<?php

// Footer settings
Redux::set_section( 'allfolio_opt', array(
	'title'  => esc_html__( 'Footer', 'allfolio' ),
	'id'     => 'allfolio_footer',
	'icon'   => 'dashicons dashicons-arrow-down-alt2',
	'fields' => array(

		array(
			'id'            => 'is_footer_columns_preset',
			'type'          => 'switch',
			'title'         => esc_html__( 'Preset Columns', 'allfolio' ),
			'subtitle'      => esc_html__( 'If you enable this switcher, the Footer Widget columns will set as preset (25% + 16.666667% + 25% + 33.333333%) on the demo of Allfolio.', 'allfolio' ),
			'on'            => esc_html__( 'Yes', 'allfolio' ),
			'off'           => esc_html__( 'No', 'allfolio' ),
			'default'       => true
		),

		array(
			'title'     => esc_html__('Footer Column', 'allfolio'),
			'id'        => 'footer_column',
			'type'      => 'select',
			'default'   => '3',
			'options'   => array(
				'6' => esc_html__('Two Column', 'allfolio'),
				'4' => esc_html__('Three Column', 'allfolio'),
				'3' => esc_html__('Four Column', 'allfolio'),
			),
			'required' => array(
				array(
					'is_footer_columns_preset', '=', ''
				),
			)
		),

		array(
			'title'          => esc_html__( 'Padding', 'allfolio' ),
			'subtitle'       => esc_html__( 'Padding around the footer columns (Top Right Bottom Left)', 'allfolio' ),
			'id'             => 'footer_column_padding',
			'type'           => 'spacing',
			'output'         => array( '.footer_area .f_widget' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true',
			'required'       => array( 'footer_style', '=', 'normal' )
		)
	)
) );

// Footer settings
Redux::set_section( 'allfolio_opt', array(
	'title'      => esc_html__( 'Font colors', 'allfolio' ),
	'id'         => 'allfolio_footer_font_colors',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'title'  => esc_html__( 'Widget Title Color', 'allfolio' ),
			'id'     => 'widget_title_color',
			'type'   => 'color',
			'output' => array( '.footer__widget .widget-title' )
		),
		array(
			'title'  => esc_html__( 'Normal Font color', 'allfolio' ),
			'id'     => 'footer_top_normal_font_color',
			'type'   => 'color_rgba',
			'output' => array( '.footer__widget a, .footer__widget ul li a, .footer__widget p' )
		),
		array(
			'title'  => esc_html__( 'Hover Font color', 'allfolio' ),
			'id'     => 'footer_top_hover_font_color',
			'type'   => 'color_rgba',
			'output' => array( '.footer__widget a:hover, .footer__widget ul li a:hover' )
		)
	)
) );

// Footer background
Redux::set_section( 'allfolio_opt', array(
	'title'      => esc_html__( 'Background', 'allfolio' ),
	'id'         => 'allfolio_footer_background',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(

		array(
			'title'  => esc_html__( 'Background Color', 'allfolio' ),
			'id'     => 'footer_top_bg_color',
			'type'   => 'color',
			'output' => array( '.has_bg_color' ),
			'mode'   => 'background'
		),

		array(
			'title'    => esc_html__( 'Bottom Background Color', 'allfolio' ),
			'subtitle' => esc_html__( 'Footer bottom background color', 'allfolio' ),
			'id'       => 'footer_btm_bg_color',
			'type'     => 'color',
			'output'   => array( '.copy-right-area' ),
			'mode'     => 'background'
		),
	)
) );

// Footer settings
Redux::set_section( 'allfolio_opt', array(
	'title'      => esc_html__( 'Footer Bottom', 'allfolio' ),
	'id'         => 'allfolio_footer_btm',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'title'   => esc_html__( 'Copyright Text', 'allfolio' ),
			'id'      => 'copyright_txt',
			'type'    => 'editor',
			'default' => '© 2021 All Rights Reserved by Spider-Themes',
			'args'    => array(
				'wpautop'       => true,
				'media_buttons' => false,
				'textarea_rows' => 10,
				'teeny'         => false,
				'quicktags'     => false,
			)
		)
	)
) );