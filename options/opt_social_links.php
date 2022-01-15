<?php

Redux::set_section('allfolio_opt', array(
    'heading'     => esc_html__( 'Social links', 'allfolio' ),
    'id'        => 'opt_social_links',
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(

        array(
            'id'    => 'facebook',
            'type'  => 'text',
            'heading' => esc_html__( 'Facebook', 'allfolio' ),
            'default'	 => '#'
        ),

        array(
            'id'    => 'twitter',
            'type'  => 'text',
            'heading' => esc_html__( 'Twitter', 'allfolio' ),
            'default'	  => '#'
        ),

        array(
            'id'    => 'instagram',
            'type'  => 'text',
            'heading' => esc_html__( 'Instagram', 'allfolio' ),
        ),

        array(
            'id'    => 'linkedin',
            'type'  => 'text',
            'heading' => esc_html__( 'LinkedIn', 'allfolio' ),
            'default'	  => '#'
        ),

        array(
            'id'    => 'youtube',
            'type'  => 'text',
            'heading' => esc_html__( 'Youtube', 'allfolio' ),
        ),

        array(
            'id'    => 'dribbble',
            'type'  => 'text',
            'heading' => esc_html__( 'Dribbble', 'allfolio' ),
        ),

        array(
            'id'    => 'github',
            'type'  => 'text',
            'heading' => esc_html__( 'GitHub', 'allfolio' ),
        )
    )
));