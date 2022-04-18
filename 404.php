<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
$opt       = get_option( 'allfolio_opt' );
$bg_shape  = ! empty( $opt['error_bg_shape_image'] ) ? $opt['error_bg_shape_image']['url'] : ALLFOLIO_DIR_IMG . '/404_bg.jpg';
?>

<!--error-area start-->
<section class="error-area" style="background-image: url(<?php echo esc_url( $bg_shape ) ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="error-wrapper text-center">
                    <div class="logo-img mb-145 mt-45">
                        <?php Allfolio_helper()->logo(); ?>
                    </div>

                    <h3 class="error-title mb-15">
                        <?php echo ! empty( $opt['error_heading'] ) ? $opt['error_heading'] : esc_html__( 'Uhh ohhhh……!!', 'allfolio' ); ?>
                    </h3>

                    <h3 class="error-title mb-75">
                        <?php echo ! empty( $opt['error_subtitle'] ) ? $opt['error_subtitle'] : esc_html__( "The page you were looking for doesn't exist", "allfolio" ); ?>
                    </h3>

                    <a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="theme_btn error_btn">
                        <?php echo ! empty( $opt['error_home_btn_label'] ) ? $opt['error_home_btn_label'] : esc_html__( 'GO HOME', 'allfolio' ); ?>
                    </a>

                </div>
            </div>
        </div>
    </div>
</section>
<!--error-area end-->
<?php
get_footer();