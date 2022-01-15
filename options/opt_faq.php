<?php

// FAQ Settings
Redux::set_section('allfolio_opt', array(
	'title'     => esc_html__( 'FAQ Single', 'allfolio' ),
	'id'        => 'faq_page',
	'icon'      => 'dashicons dashicons-lightbulb',
	'fields'    => array(
		array(
			'title'     => esc_html__( 'Title Bar', 'allfolio' ),
			'id'        => 'faq_title_visibility',
			'type'      => 'switch',
			'on'        => esc_html__( 'Show', 'allfolio' ),
			'off'       => esc_html__( 'Hide', 'allfolio' ),
			'default'   => '1',
		),

		array(
			'title'     => esc_html__( 'Page Title', 'allfolio' ),
			'subtitle'     => esc_html__( 'If you do not want this field, leave the blank.', 'allfolio' ),
			'id'        => 'faq_page_title',
			'type'      => 'text',
			'default'   => esc_html__( 'Help & Support', 'allfolio' ),
			'required' => array (
				array ( 'faq_title_visibility', '=', '1' ),
			)
		),

		array(
			'title'     => esc_html__( 'Page Sub Title', 'allfolio' ),
			'subtitle'     => esc_html__( 'If you do not want this field, leave the blank.', 'allfolio' ),
			'id'        => 'faq_page_subtitle',
			'type'      => 'text',
			'default'   => esc_html__( 'Advice and answers from our expert and proffesional allfolio Team', 'allfolio' ),
			'required' => array (
				array ( 'faq_title_visibility', '=', '1' ),
			)
		),
		array(
			'title'     => esc_html__( 'Publish Date', 'allfolio' ),
			'id'        => 'is_faq_date',
			'type'      => 'switch',
			'on'        => esc_html__( 'Show', 'allfolio' ),
			'off'       => esc_html__( 'Hide', 'allfolio' ),
			'default'   => '1',
		),

		array(
			'title'     => esc_html__( 'Author Name', 'allfolio' ),
			'id'        => 'is_faq_author',
			'type'      => 'switch',
			'on'        => esc_html__( 'Show', 'allfolio' ),
			'off'       => esc_html__( 'Hide', 'allfolio' ),
			'default'   => '1',
		),
	)
));