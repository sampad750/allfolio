<?php

Redux::set_section('allfolio_opt', array(
	'title'     => esc_html__( 'Blog Pages', 'allfolio' ),
	'id'        => 'blog_page',
	'icon'      => 'dashicons dashicons-admin-post',
));

/**
 * Blog archive settings
 */
Redux::set_section('allfolio_opt', array(
	'title'     => esc_html__( 'Blog archive', 'allfolio' ),
	'id'        => 'blog_meta_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Page title', 'allfolio' ),
            'subtitle'  => esc_html__( 'Wrap your text by <span></span> to highlight text.', 'allfolio' ),
            'id'        => 'blog_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Blog List', 'allfolio' )
        ),
		array(
			'title'     => esc_html__( 'Page Sub Title', 'allfolio' ),
			'subtitle'     => esc_html__( 'If you do not want this field, leave the blank.', 'allfolio' ),
			'id'        => 'blog_page_subtitle',
			'type'      => 'text',
			'default'   => esc_html__( 'Advice and answers from our expert and proffesional allfolio Team', 'allfolio' )
		),
        array(
            'title'     => esc_html__( 'Blog Layout', 'allfolio' ),
            'subtitle'  => esc_html__( 'The Blog layout will also apply on the blog category and tag pages.', 'allfolio' ),
            'id'        => 'blog_layout',
            'type'      => 'image_select',
            'options'   => array(
                'list' => array(
                    'alt' => esc_html__( 'Standard Layout', 'allfolio' ),
                    'img' => ALLFOLIO_DIR_IMG.'/layouts/standard.jpg'
                ),
                'grid' => array(
                    'alt' => esc_html__( 'Grid Layout', 'allfolio' ),
                    'img' => ALLFOLIO_DIR_IMG.'/layouts/grid.jpg'
                )
            ),
            'default' => 'list'
        ),
        array(
            'title'     => esc_html__( 'Column', 'allfolio' ),
            'id'        => 'blog_column',
            'type'      => 'select',
            'options'   => [
                '6' => esc_html__( 'Two', 'allfolio' ),
                '4' => esc_html__( 'Three', 'allfolio' ),
                '3' => esc_html__( 'Four', 'allfolio' ),
            ],
            'default'   => '6',
            'required' => array (
                array ( 'blog_layout', '=', array( 'grid', 'blog_category' ) ),
            )
        ),
        array(
            'title'     => esc_html__( 'Post title length', 'allfolio' ),
            'subtitle'  => esc_html__( 'Blog post title length in character', 'allfolio' ),
            'id'        => 'post_title_length',
            'type'      => 'slider',
            'default'   => 50,
            "min"       => 1,
            "step"      => 1,
            "max"       => 500,
            'display_value' => 'text',
        ),
        array(
            'title'     => esc_html__( 'Post word excerpt', 'allfolio' ),
            'subtitle'  => esc_html__( 'If post excerpt empty, the excerpt content will take from the post content. Define here how much word you want to show along with the each posts in the blog page.', 'allfolio' ),
            'id'        => 'blog_excerpt',
            'type'      => 'slider',
            'default'   => 40,
            "min"       => 1,
            "step"      => 1,
            "max"       => 500,
            'display_value' => 'text'
        ),
        array(
            'title'     => esc_html__( 'Continue Reading Label', 'allfolio' ),
            'id'        => 'blog_continue_read',
            'type'      => 'text',
            'default'   => esc_html__( 'Continue Reading', 'allfolio' ),
            'required' => array (
                 array ( 'blog_layout', '=', 'list' ),
            ),
        ),
		array(
			'title'     => esc_html__( 'Post meta', 'allfolio' ),
			'subtitle'  => esc_html__( 'Show/hide post meta on blog archive page', 'allfolio' ),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
		),
		array(
			'title'     => esc_html__( 'Post date', 'allfolio' ),
			'id'        => 'is_post_date',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
		array(
			'title'     => esc_html__( 'Post Reading Time', 'allfolio' ),
			'id'        => 'is_post_reading_time',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
		array(
			'title'     => esc_html__( 'Post category', 'allfolio' ),
			'id'        => 'is_post_cat',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
		array(
			'title'     => esc_html__( 'Author', 'allfolio' ),
			'id'        => 'is_post_author',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),
	)
));

/**
 * Post single
 */
Redux::set_section('allfolio_opt', array(
	'title'     => esc_html__( 'Blog Footer', 'allfolio' ),
	'id'        => 'blog_footer_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
		array(
			'title'   => esc_html__( 'Footer Block', 'allfolio' ),
			'id'      => 'blog_footer_visibility',
			'type'    => 'switch',
			'on'      => esc_html__( 'Show', 'allfolio' ),
			'off'     => esc_html__( 'Hide', 'allfolio' ),
			'default' => '1',
		),
		array(
			'title'    => esc_html__( 'Title', 'allfolio' ),
			'subtitle' => esc_html__( 'Wrap your text with <span></span> to highlight in title', 'allfolio' ),
			'id'       => 'blog_footer_title',
			'type'     => 'textarea',
			'required' => array(
				array( 'blog_footer_visibility', '=', '1' ),
			)
		),
		array(
			'title'    => esc_html__( 'Sub Title', 'allfolio' ),
			'subtitle' => esc_html__( 'If you do not want this field, leave the blank.', 'allfolio' ),
			'id'       => 'blog_footer_subtitle',
			'type'     => 'text',
			'default'  => esc_html__( 'Try it risk free — we don’t charge cancellation fees.', 'allfolio' ),
			'required' => array(
				array( 'blog_footer_visibility', '=', '1' ),
			)
		),
		array(
			'title'    => esc_html__( 'Button Text', 'allfolio' ),
			'id'       => 'blog_footer_btn',
			'type'     => 'text',
			'default'  => esc_html__( 'Get Your Free Quote.', 'allfolio' ),
			'required' => array(
				array( 'blog_footer_visibility', '=', '1' ),
			)
		),
		array(
			'title'    => esc_html__( 'Button Text URL', 'allfolio' ),
			'id'       => 'blog_footer_btnurl',
			'type'     => 'text',
			'default'  => esc_html__( 'Get Your Free Quote.', 'allfolio' ),
			'required' => array(
				array( 'blog_footer_visibility', '=', '1' ),
			)
		),
	)
));

/**
 * Post single
 */
Redux::set_section('allfolio_opt', array(
	'title'     => esc_html__( 'Blog single', 'allfolio' ),
	'id'        => 'blog_single_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Title Color', 'allfolio' ),
            'id'        => 'blog_single_title_color',
            'type'      => 'color_rgba',
            'output'    => array('.blog_single_heading' )
        ),
		array(
			'title'     => esc_html__( 'Social Share', 'allfolio' ),
			'id'        => 'is_social_share',
			'type'      => 'switch',
            'on'        => esc_html__( 'Enabled', 'allfolio' ),
            'off'       => esc_html__( 'Disabled', 'allfolio' ),
            'default'   => '1'
		),
		array(
			'title'     => esc_html__( 'Post Tag', 'allfolio' ),
			'id'        => 'is_post_tag',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1'
		),
        array(
            'title'     => esc_html__( 'Post meta', 'allfolio' ),
            'subtitle'  => esc_html__( 'Show/hide post meta on blog single page', 'allfolio' ),
            'id'        => 'is_single_post_meta',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Categories', 'allfolio' ),
            'id'        => 'is_single_cats',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
            'required' => array( 'is_single_post_meta', '=', 1 )
        ),
        array(
            'title'     => esc_html__( 'Comment Count Text', 'allfolio' ),
            'id'        => 'is_single_comment_meta',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
            'required' => array( 'is_single_post_meta', '=', 1 )
        ),
        array(
            'title'     => esc_html__( 'Post Date', 'allfolio' ),
            'id'        => 'is_single_post_date',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'allfolio' ),
            'off'       => esc_html__( 'Hide', 'allfolio' ),
            'default'   => '1',
            'required' => array( 'is_single_post_meta', '=', 1 )
        ),
		array(
			'title'     => esc_html__( 'Post Reading Time', 'allfolio' ),
			'id'        => 'is_single_post_reading_time',
			'type'      => 'switch',
			'on'        => esc_html__( 'Show', 'allfolio' ),
			'off'       => esc_html__( 'Hide', 'allfolio' ),
			'default'   => '1',
			'required' => array( 'is_single_post_meta', '=', 1 )
		),

	)
));
