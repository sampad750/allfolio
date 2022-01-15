<?php
$opt                     = get_option( 'allfolio_opt' );
$copyright_text          = ! empty( $opt['copyright_txt'] ) ? $opt['copyright_txt'] : __( '© 2021 Spider-Themes. All rights reserved', 'allfolio' );
$right_content           = ! empty( $opt['right_content'] ) ? $opt['right_content'] : '';
$footer_visibility       = function_exists( 'get_field' ) ? get_field( 'footer_visibility' ) : '1';
$footer_background_color = function_exists( 'get_field' ) ? get_field( 'footer_background_color' ) : '';
$has_bg                  = ! empty( $footer_background_color ) ? 'has_bg_color ' : '';
$border_visibility       = function_exists( 'get_field' ) ? get_field( 'footer_border_visibility' ) : 'hr-border pt-110';
$border_visibility       = empty ( $border_visibility == '0' ) ? 'hr-border pt-110' : '';
$padding_top             = is_page() ? 'pt-30' : '';
$footer_visibility       = isset( $footer_visibility ) ? $footer_visibility : '1';
$is_preset_footer        = isset( $opt['is_footer_columns_preset'] ) ? $opt['is_footer_columns_preset'] : '';
$is_preset_footer        = ( $is_preset_footer == '1' ) ? ' preset_footer' : '';
?>


<!-- footer -->
<footer class="footer-area border-top pb-30 <?php echo esc_attr( $has_bg . $padding_top ) ?>">

	<?php if ( is_active_sidebar( 'footer_widgets' ) ) : ?>
    <div class="container">
        <div class="row">
	        <?php dynamic_sidebar( 'footer_widgets' ) ?>
            <div class="col-md-4 text-md-center">
                <div class="copyright-text">
	                <?php echo wp_kses_post( wpautop( $copyright_text ) ); ?>
                </div>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="social-link">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
</footer>
<!-- footer end -->