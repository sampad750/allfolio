<?php
$opt                        = get_option('allfolio_opt');
$copyright_text             = !empty($opt['copyright_txt']) ? $opt['copyright_txt'] : __('© 2022 Spider-Themes. All rights reserved', 'allfolio');
$is_preset_footer           = isset($opt['is_footer_columns_preset']) ? $opt['is_footer_columns_preset'] : '';
$is_preset_footer           = ($is_preset_footer == '1') ? 'preset_footer' : '';

$footer_bg_meta             = function_exists('get_field') ? get_field('footer_bg_image') : '';
$footer_bg_opt              = !empty($opt['footer_bg']['url']) ? $opt['footer_bg']['url'] : '';

$bg_image                   = !empty($footer_bg_meta) ? $footer_bg_meta : $footer_bg_opt;

$shape_visibility           = function_exists('get_field') ? get_field('shape_visibility') : '';
$pt_spacer                  = !empty( $bg_image && $shape_visibility == 1 ) ? 'footer-top ' : 'pb-50 footer-top ';

?>

<!-- footer -->
<footer class="footer-area-6">

    <?php if (!empty($bg_image) && $shape_visibility == 1) { ?>
        <div class="bg-img">
            <img src="<?php echo esc_url($bg_image) ?>">
        </div>
    <?php } ?>

    <div class="container">
        <?php if (is_active_sidebar('footer_widgets')) : ?>
            <div class="row <?php echo esc_attr($pt_spacer . $is_preset_footer); ?>">
                <?php dynamic_sidebar('footer_widgets') ?>
            </div>
        <?php endif; ?>
        <div class="footer-bottom">
            <?php echo wp_kses_post($copyright_text); ?>
            <div>
                <?php
                if (is_array($opt['footer_btm_links'])) {
                    $footer_btm_links = !empty($opt['footer_btm_links']['redux_repeater_data']) ? $opt['footer_btm_links']['redux_repeater_data'] : '';
                    $footer_btm_title = !empty($opt['footer_btm_links']['title']) ? $opt['footer_btm_links']['title'] : '';
                    $footer_btm_url = !empty($opt['footer_btm_links']['url']) ? $opt['footer_btm_links']['url'] : '';

                    for ($i = 0; $i < count($footer_btm_links); $i++) {
                        echo '<a href="' . esc_url($footer_btm_url[$i]) . '"> ' . esc_html($footer_btm_title[$i]) . '</a>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->