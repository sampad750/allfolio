<?php

/**
 * Allfolio theme helper functions and resources
 */

class Allfolio_Helper_Class
{
    /**
     * Hold an instance of Allfolio_Helper_Class class.
     * @var Allfolio_Helper_Class
     */
    protected static $instance = null;

    /**
     * Main Allfolio_Helper_Class instance.
     * @return Allfolio_Helper_Class - Main instance.
     */
    public static function instance()
    {

        if (null == self::$instance) {
            self::$instance = new Allfolio_Helper_Class();
        }

        return self::$instance;
    }

    /**
     * Website Logo
     */
    public function logo()
    {
        $opt = get_option('allfolio_opt');

        // Main Logo
        $logo_one = isset($opt['main_logo']['url']) ? $opt['main_logo']['url'] : '';
        $logo_two = !empty($opt['sticky_logo']['url']) ? $opt['sticky_logo']['url'] : '';

        if (!empty($logo_one || $logo_two)) {
        ?>
            <img class="first_logo sticky_logo mCS_img_loaded" src="<?php echo esc_url($logo_one) ?>" alt="<?php bloginfo('name'); ?>">
            <img class="white_logo main_logo" src="<?php echo esc_url($logo_two) ?>" alt="<?php bloginfo('name'); ?>">

        <?php
        } else {
            echo "<h3>" . bloginfo('name') . "</h3>";
        }
        echo '</a>';
    }

    // Banner Title
    function banner_title()
    {
        $opt = get_option('allfolio_opt');
        if (is_home()) {
            $blog_title = !empty($opt['blog_title']) ? $opt['blog_title'] : get_bloginfo('name');
            echo wp_kses_post($blog_title);
        } elseif (is_page()) {
            the_title();
        } elseif (is_category()) {
            single_cat_title();
        } elseif (is_archive()) {
            the_archive_title();
        } elseif (is_search()) {
            esc_html_e('Search result for: "', 'allfolio');
            echo get_search_query() . '"';
        } elseif (is_singular('faq')) {
            $faq_page_title = !empty($opt['faq_page_title']) ? $opt['faq_page_title'] : '';
            echo wp_kses_post($faq_page_title);
        } elseif (is_singular('case-study')) {
            the_title();
        }
    }

    /**
     * Social Links
     **/
    function social_links()
    {
        $opt = get_option('allfolio_opt');
        ?>
        <?php if (!empty($opt['facebook'])) { ?>
            <a href="<?php echo esc_url($opt['facebook']); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
        <?php } ?>

        <?php if (!empty($opt['twitter'])) { ?>
            <a href="<?php echo esc_url($opt['twitter']); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
        <?php } ?>

        <?php if (!empty($opt['instagram'])) { ?>
            <a href="<?php echo esc_url($opt['instagram']); ?>"><i class="fab fa-instagram"></i></a>
        <?php } ?>

        <?php if (!empty($opt['linkedin'])) { ?>
            <a href="<?php echo esc_url($opt['linkedin']); ?>"><i class="fab fa-linkedin-in"></i></a>
        <?php } ?>

        <?php if (!empty($opt['youtube'])) { ?>
            <a href="<?php echo esc_url($opt['youtube']); ?>"><i class="fab fa-youtube"></i></a>
        <?php } ?>

        <?php if (!empty($opt['github'])) { ?>
            <a href="<?php echo esc_url($opt['github']); ?>"><i class="fab fa-github"></i></a>
        <?php } ?>

        <?php if (!empty($opt['dribbble'])) { ?>
            <a href="<?php echo esc_url($opt['dribbble']); ?>"><i class="fab fa-dribbble"></i></a>
<?php }
    }


    /** Render Meta CSS value
     *
     * @param $handle
     * @param $css_items
     */
    function meta_css_render($handle, $css_items)
    {
        $dynamic_css = '';
        $opt = get_option('allfolio_opt');

        if (function_exists('get_field')) {
            $keys = array_keys($css_items);
            for ($i = 0; $i < count($css_items); $i++) {
                $split_id = explode('__', $keys[$i]);
                $meta_id = $split_id[0];
                $append = !empty($split_id[1]) ? $split_id[1] : '';
                $meta_value = get_field($meta_id);
                if (!empty($meta_value)) {
                    $css_i = 1;
                    foreach ($css_items[$keys[$i]] as $property => $selector) {
                        $css_output = "$selector {";
                        $css_output .= "$property: $meta_value$append;";
                        $css_output .= "}";
                        $dynamic_css .= $css_output;
                        $css_i++;
                    }
                }
            }
        }

        $title_block = function_exists('get_field') ? get_Field('highlight_text_shape') : '';
        if (!empty($title_block['url'])) {
            $dynamic_css .= ".page-title-wrapper .page-title .round-line::before{background:url({$title_block['url']})}";
        }

        if (!empty($opt['custom_css'])) {
            $dynamic_css .= $opt['custom_css'];
        }

        wp_add_inline_style($handle, $dynamic_css);
    }

    /**
     * Pagination
     **/
    function pagination()
    {
        the_posts_pagination(array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="far fa-chevron-left"></i>',
            'next_text'          => '<i class="far fa-chevron-right"></i>'
        ));
    }

    /**
     * Day link to archive page
     **/
    function day_link()
    {
        $archive_year   = get_the_time('Y');
        $archive_month  = get_the_time('m');
        $archive_day    = get_the_time('d');
        echo get_day_link($archive_year, $archive_month, $archive_day);
    }

    /**
     * estimated reading time
     **/
    function reading_time()
    {
        $content = get_post_field('post_content', get_the_ID());
        $word_count = str_word_count(strip_tags($content));
        $readingtime = ceil($word_count / 200);
        if ($readingtime == 1) {
            $timer = esc_html__(" minute read", 'allfolio');
        } else {
            $timer = esc_html__(" minutes read", 'allfolio');
        }
        $totalreadingtime = $readingtime . $timer;
        echo esc_html($totalreadingtime);
    }

    /**
     * Post's excerpt text
     *
     * @param $settings_key
     * @param bool $echo
     *
     * @return string
     **/
    function excerpt($settings_key, $echo = true)
    {
        $opt = get_option('allfolio_opt');
        $blog_layout_opt = !empty($opt['blog_layout']) ? $opt['blog_layout'] : 'list';
        $blog_layout = !empty($_GET['blog_layout']) ? $_GET['blog_layout'] : $blog_layout_opt;
        $excerpt_limit = !empty($opt[$settings_key]) ? $opt[$settings_key] : 40;

        $post_excerpt = get_the_excerpt();
        $excerpt = (strlen(trim($post_excerpt)) != 0) ? wp_trim_words(get_the_excerpt(), $excerpt_limit, '') : wp_trim_words(get_the_content(), $excerpt_limit, '');
        if ($echo == true) {
            echo wp_kses_post(wpautop($excerpt));
        } else {
            return wp_kses_post(wpautop($excerpt));
        }
    }

    /**
     * Post author avatar
     **/
    function post_author_avatar($size = 50, $default = '', $alt = '', $args = null)
    {
        $post_author_id = get_post_field('post_author', get_the_ID());
        echo get_avatar($post_author_id, $size, $default, $alt, $args);
    }

    /**
     * Get the first category name
     *
     * @param string $term
     */
    function first_category($term = 'category')
    {
        $cats = get_the_terms(get_the_ID(), $term);
        $cat  = is_array($cats) ? $cats[0]->name : '';
        echo esc_html($cat);
    }

    /**
     * Get the first category link
     *
     * @param string $term
     */
    function first_category_link($term = 'category')
    {
        $cats = get_the_terms(get_the_ID(), $term);
        $cat  = is_array($cats) ? get_category_link($cats[0]->term_id) : '';
        echo esc_url($cat);
    }

    /**
     * Limit latter
     *
     * @param $string
     * @param $limit_length
     * @param string $suffix
     */
    function limit_latter($string, $limit_length, $suffix = '...')
    {
        if (strlen($string) > $limit_length && !empty($limit_length)) {
            echo strip_shortcodes(substr($string, 0, $limit_length) . $suffix);
        } else {
            echo strip_shortcodes($string);
        }
    }

    /**
     * Image from Theme Settings
     *
     * @param $settins_key
     * @param string $class
     * @param string $alt
     */
    function image_from_settings($settings_key = '', $class = '', $alt = '')
    {
        $opt = get_option('allfolio_opt');
        $page_image = function_exists('get_field') ? get_field($settings_key) : '';
        $sett_image = !empty($opt[$settings_key]) ? $opt[$settings_key] : '';
        $image = $page_image == '' ? $sett_image : $page_image;
        if (!empty($image['id'])) {
            echo wp_get_attachment_image($image['id'], 'full', '', array('class' => $class));
        } elseif (!empty($image['url']) && empty($image['id'])) {
            $class = !empty($class) ? "class='$class'" : '';
            echo "<img src='{$image['url']}' $class alt='$alt'>";
        }
    }
}

/**
 * Instance of Allfolio_Helper_Class class
 */
function Allfolio_helper()
{
    return Allfolio_Helper_Class::instance();
}
