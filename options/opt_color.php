<?php

// Color option
Redux::set_section('allfolio_opt', array(
    'heading'     => esc_html__( 'Color Scheme', 'allfolio' ),
    'id'        => 'color',
    'icon'      => 'dashicons dashicons-admin-appearance',
    'fields'    => array(
        array(
            'id'          => 'accent_solid_color_opt',
            'type'        => 'color',
            'heading'       => esc_html__( 'Accent Color', 'allfolio' ),
            'output_variables' => true,
	        'default'       => '#ff0000'
        ),
        array(
            'id'          => 'secondary_color_opt',
            'type'        => 'color',
            'heading'       => esc_html__( 'Secondary Color', 'allfolio' ),
            'subtitle'       => esc_html__( 'Normally used in Titles, Gradient Colors', 'allfolio' ),
            'output_variables' => true,
	        'default'       => '#050020'
        ),
        array(
            'id'          => 'paragraph_color_opt',
            'type'        => 'color',
            'heading'       => esc_html__( 'Paragraph Color', 'allfolio' ),
            'subtitle'    => esc_html__( 'Normally used in meta content, paragraph, doc lists, subtitles, icon', 'allfolio' ),
            'output_variables' => true,
	        'default'       => 'rgba(0, 0, 0, 0.8)'
        ),
    )
));