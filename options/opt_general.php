<?php

Redux::set_section('allfolio_opt', array(
	'title'     => esc_html__( 'General', 'allfolio' ),
	'id'        => 'general_settings',
	'icon'      => 'dashicons dashicons-admin-generic',
	'fields'    => array(
		array(
			'id'        => 'is_dark_mode',
			'type'      => 'switch',
			'title'     => esc_html__( 'Dark Mode', 'allfolio' ),
			'on'        => esc_html__( 'Enable', 'allfolio' ),
			'off'       => esc_html__( 'Disable', 'allfolio' ),
			'default'   => false,
		)
	)
));

Redux::set_section( 'allfolio_opt', array(
	'title'            => esc_html__( 'Preloader', 'allfolio' ),
	'id'               => 'preloader_opt',
	'icon'             => '',
	'subsection'       => true,
	'fields'           => array(

		array(
			'id'        => 'is_preloader',
			'type'      => 'switch',
			'title'     => esc_html__( 'Pre-loader', 'allfolio' ),
			'on'        => esc_html__( 'Enable', 'allfolio' ),
			'off'       => esc_html__( 'Disable', 'allfolio' ),
			'default'   => false,
		),
		/**
		 * Preloader Logo
		 */
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'id'            => 'preloader_logo',
			'type'          => 'media',
			'title'         => esc_html__( 'Pre-loader Logo', 'allfolio' ),
			'compiler'      => true,
			'default'  => array(
				'url' => ALLFOLIO_DIR_IMG . '/logo.svg'
			)
		),

		/**
		 * Preloader Title
		 */
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'id'            => 'preloader_title',
			'type'          => 'text',
			'title'         => esc_html__( 'Preloader Title', 'allfolio' ),
			'default'       => 'Did You Know?'
		),
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'title'         => esc_html__( 'Preloader Title Color', 'allfolio' ),
			'id'            => 'preloader_title_color',
			'type'          => 'color',
			'output'        => array( '#preloader .head' ),
		),

		/**
		 * Preloader Quotes
		 */
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'id'            => 'preloader_quotes',
			'type'          => 'multi_text',
			'title'         => esc_html__( 'Quotes', 'allfolio' ),
			'subtitle'      => esc_html__( 'The quotes will display randomly under the title.', 'allfolio' ),
			'default'       => 'Did You Know?'
		),
		array(
			'required'      => array( 'is_preloader', '=', '1' ),
			'title'         => esc_html__( 'Preloader Quotes Color', 'allfolio' ),
			'id'            => 'preloader_quotes_color',
			'type'          => 'color',
			'output'        => array( '#preloader p' ),
		),
	)
));


/**
 * Back to Top settings
 */
Redux::set_section('allfolio_opt', array(
	'title'     => esc_html__( 'Back to Top', 'allfolio' ),
	'id'        => 'back_to_top_btn',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
		array(
			'title'     => esc_html__( 'Back to Top Button', 'allfolio' ),
			'subtitle'  => esc_html__( 'Show/hide back to top button globally settings', 'allfolio' ),
			'id'        => 'is_back_to_top_btn_switcher',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
		),

        /**
         * Button Normal Colors
         */
        array(
            'id' => 'normal_color_start',
            'type' => 'section',
            'title' => esc_html__( 'Normal Color', 'allfolio' ),
            'indent' => true,
            'required' => array( 'is_back_to_top_btn_switcher', '=', 1 )
        ),
        array(
            'title'     => esc_html__( 'Icon Color', 'allfolio' ),
            'id'        => 'back_to_top_btn_icon_color',
            'type'      => 'color',
            'output'    => array(
                'color' => '#scrollUp i'
            ),
        ),
        array(
            'title'     => esc_html__( 'Background Color', 'allfolio' ),
            'id'        => 'back_to_top_btn_bg_color',
            'type'      => 'color_rgba',
            'output'    => array(
                'background-color' => '#scrollUp'
            ),
        ),
        array(
            'id' => 'normal_color_end',
            'type' => 'section',
            'indent' => true
        ),

        /**
         * Button Hover Colors
         */
        array(
            'id' => 'hover_color_start',
            'type' => 'section',
            'title'     => esc_html__( 'Hover Color', 'allfolio' ),
            'indent' => true,
            'required' => array( 'is_back_to_top_btn_switcher', '=', 1 )
        ),
        array(
            'title'     => esc_html__( 'Icon Color', 'allfolio' ),
            'id'        => 'back_to_top_btn_icon_hover_color',
            'type'      => 'color',
            'output'    => array(
                'color' => '#scrollUp:hover i'
            ),
        ),
        array(
            'title'     => esc_html__( 'Background Color', 'allfolio' ),
            'id'        => 'back_to_top_btn_bg_hover_color',
            'type'      => 'color_rgba',
            'output'    => array(
                'background-color' => '#scrollUp:hover'
            ),
        ),
        array(
            'id' => 'hover_color_end',
            'type' => 'section',
            'indent' => true
        ),
	)
));