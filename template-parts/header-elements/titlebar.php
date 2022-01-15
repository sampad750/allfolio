<?php
// Theme settings options
$opt                = get_option( 'allfolio_opt' );
$title_bar_wrap     = function_exists( 'get_field' ) ? get_field( 'title_bar' ) : '1';
$title_bar          = isset( $title_bar_wrap ) ? $title_bar_wrap : '1';

if( is_singular('post') || is_attachment() ){
	$title_bar      = '';
}

$blog_title         = isset( $opt['blog_title'] ) ? $opt['blog_title'] : get_bloginfo( 'name' );
$blog_subtitle      = isset( $opt['blog_page_subtitle'] ) ? $opt['blog_page_subtitle'] : get_bloginfo( 'description' );
$faq_subtitle       = ! empty( $opt['faq_page_subtitle'] ) ? $opt['faq_page_subtitle'] : '';

$spacer             = '';
$title_class        = '';
$subtitle_class     = '';

if ( is_page() ) {
	$title_class    = empty( has_excerpt() ) ? 'col-lg-12 text-center' : 'col-lg-7';
	$subtitle_class = empty( get_the_title() ) ? 'col-lg-12 text-center' : 'col-lg-5';
} elseif ( is_home() ) {
	$title_class    = empty( $blog_subtitle ) ? 'col-lg-12 text-center blog-heading' : 'col-lg-6 blog-heading';
	$subtitle_class = empty( $blog_title ) ? 'col-lg-12 text-center' : 'col-lg-6';
} elseif ( is_singular( 'case-study' ) ) {
	$title_class    = empty( has_excerpt() ) ? 'col-lg-12 text-center' : 'col-lg-6';
	$subtitle_class = empty( get_the_title() ) ? 'col-lg-12 text-center' : 'col-lg-6';
} elseif ( is_singular( 'team-member' ) ) {
	$spacer = 'top-spacing';
}

if ( $title_bar     == '1' ) : ?>
    <!--page-heading-area start-->
    <section class="page-title-area <?php echo esc_attr($spacer); ?> pt-240 pb-75 pt-md-200 pt-xs-150">
        <div class="container">
            <div class="row align-items-center">
                <div class="<?php echo esc_attr($title_class); ?>">
                    <div class="page-title-wrapper page-title-2">
                        <h1 class="page-title mb-35">
							<?php Allfolio_helper()->banner_title() ?>
                        </h1>
                    </div>
                </div>
                <div class="<?php echo esc_attr($subtitle_class); ?>">
                    <div class="page-title-wrapper pl-45 pl-md-0 pl-xs-0">
                        <div class="sub-title mb-35">
							<?php
							if ( is_page() ) {
								echo has_excerpt() ? wpautop( get_the_excerpt() ) : '';
							} elseif ( is_home() ) {
								echo esc_html( $blog_subtitle );
							}elseif ( is_singular( 'case-study' ) ) {
								echo has_excerpt() ? wpautop( get_the_excerpt() ) : '';
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page-heading-area end-->
<?php endif;