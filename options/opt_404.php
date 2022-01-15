<?php

Redux::set_section('allfolio_opt', array(
    'title'     => esc_html__( '404 Error Settings', 'allfolio' ),
    'id'        => '404_0pt',
    'icon'      => 'dashicons dashicons-info',
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Title Text', 'allfolio' ),
            'id'        => 'error_heading',
            'type'      => 'text',
            'default'   => esc_html__( "Uhh ohhhh……!!", 'allfolio' ),
        ),

        array(
            'title'     => esc_html__( 'Subtitle', 'allfolio' ),
            'id'        => 'error_subtitle',
            'type'      => 'textarea',
            'default'   => esc_html__( 'The pages you were looking for doesn’t exist', 'allfolio' ),
        ),

        array(
            'title'     => esc_html__( 'Home Button Title', 'allfolio' ),
            'id'        => 'error_home_btn_label',
            'type'      => 'text',
            'default'   => esc_html__( 'GO HOME', 'allfolio' ),
        ),

        array(
            'id'          => 'btn_font_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Text Color', 'allfolio' ),
            'output'      => array(
                'color' => '.error_btn',
            ),
        ),

        array(
            'id'          => 'btn_bg_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Background Color', 'allfolio' ),
            'output'      => array(
                'background' => '.error_btn',
            ),
        ),

        array(
            'title'     => esc_html__( 'Background shape', 'allfolio' ),
            'subtitle'  => esc_html__( 'Upload here the default background shape image', 'allfolio' ),
            'id'        => 'error_bg_shape_image',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => [
                'url' => ALLFOLIO_DIR_IMG.'/404_bg.jpg'
            ]
        ),
    )
));
