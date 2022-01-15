<?php

// Case Study Content Settings
Redux::set_section( 'allfolio_opt', array(
	'title'  => esc_html__( 'Case Study Single', 'allfolio' ),
	'id'     => 'case_study_page',
	'icon'   => 'dashicons dashicons-media-spreadsheet',
	'fields' => array(
		array(
			'title'   => esc_html__( 'Footer Block', 'allfolio' ),
			'id'      => 'cs_footer_visibility',
			'type'    => 'switch',
			'on'      => esc_html__( 'Show', 'allfolio' ),
			'off'     => esc_html__( 'Hide', 'allfolio' ),
			'default' => '1',
		),
		array(
			'title'    => esc_html__( 'Title', 'allfolio' ),
			'subtitle' => esc_html__( 'Wrap your text with <span></span> to highlight in title', 'allfolio' ),
			'id'       => 'cs_page_title',
			'type'     => 'textarea',
			'required' => array(
				array( 'cs_footer_visibility', '=', '1' ),
			)
		),
		array(
			'title'    => esc_html__( 'Sub Title', 'allfolio' ),
			'subtitle' => esc_html__( 'If you do not want this field, leave the blank.', 'allfolio' ),
			'id'       => 'cs_page_subtitle',
			'type'     => 'text',
			'default'  => esc_html__( 'Try it risk free — we don’t charge cancellation fees.', 'allfolio' ),
			'required' => array(
				array( 'cs_footer_visibility', '=', '1' ),
			)
		),
		array(
			'title'    => esc_html__( 'Button Text', 'allfolio' ),
			'id'       => 'cs_page_btn',
			'type'     => 'text',
			'default'  => esc_html__( 'Get Your Free Quote.', 'allfolio' ),
			'required' => array(
				array( 'cs_footer_visibility', '=', '1' ),
			)
		),
		array(
			'title'    => esc_html__( 'Button Text URL', 'allfolio' ),
			'id'       => 'cs_page_btnurl',
			'type'     => 'text',
			'default'  => esc_html__( 'Get Your Free Quote.', 'allfolio' ),
			'required' => array(
				array( 'cs_footer_visibility', '=', '1' ),
			)
		),

	)
) );

// Case Study Color Settings
Redux::set_section( 'allfolio_opt', array(
	'title'      => esc_html__( 'Font colors', 'allfolio' ),
	'id'         => 'cs_footer_font_colors',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'title'  => esc_html__( 'Title Color', 'allfolio' ),
			'id'     => 'cs_footer_title_color',
			'type'   => 'color',
			'output' => array( '.cs_footer_title' )
		),
		array(
			'title'  => esc_html__( 'Title Highlight Text Color', 'allfolio' ),
			'id'     => 'cs_footer_block_text_color',
			'type'   => 'color',
			'output' => array( '.cs_footer_title > span' )
		),
		array(
			'title'  => esc_html__( 'Sub Title Color', 'allfolio' ),
			'id'     => 'cs_footer_subtitle_color',
			'type'   => 'color',
			'output' => array( '.cs_footer_subtitle' )
		),
		array(
			'title'  => esc_html__( 'Button Text Color', 'allfolio' ),
			'id'     => 'cs_footer_btn_text_color',
			'type'   => 'color',
			'output' => array( '.cs_footer_btn' )
		),

	)
) );

// Case Study Background Settings
Redux::set_section( 'allfolio_opt', array(
	'title'      => esc_html__( 'Background', 'allfolio' ),
	'id'         => 'cs_footer_background',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'title'            => esc_html__( 'Highlight Text Shape', 'allfolio' ),
			'id'               => 'cs_footer_highlight_text_bg',
			'type'             => 'background',
			'preview_height'   => '100px',
			'output'           => array( '.subscribe-wrapper .section-title .round-line::before' ),
		),
		array(
			'title'  => esc_html__( 'Button', 'allfolio' ),
			'id'     => 'cs_footer_btn_bg_color',
			'type'   => 'color',
			'output' => array( '.cs_footer_btn' ),
			'mode'   => 'background'
		),
		array(
			'title'  => esc_html__( 'Background Color', 'allfolio' ),
			'id'     => 'cs_footer_bg_color',
			'type'   => 'color',
			'output' => array( '.grey-bg-soft' ),
			'mode'   => 'background'
		),
	)
) );